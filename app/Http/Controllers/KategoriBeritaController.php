<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Exception;
use RealRashid\SweetAlert\Facades\Alert;
use Yajra\DataTables\Contracts\DataTable;

class KategoriBeritaController extends Controller
{
    public function index(Request $request) {
        if($request->ajax()) {
            $data = Kategori::get();
              
            return DataTables::of($data)
           
            ->addIndexColumn()
           ->editColumn('created_at', function($data) {
             return Carbon::parse($data->created_at)->format('d-m-Y');
             })->editColumn('aksi', function ($data) {
                $actionButton = '
                <div class="text-center">
                <button data-bs-toggle="modal" data-bs-target="#editCategory" onclick="editCategory(&quot;' . $data->id . '&quot;)" class="btn waves-effect waves-light btn-warning btn-sm">
                <i class="bi bi-pencil-square"></i>
           </button>
            <button class="btn waves-effect waves-light btn-danger btn-sm" onclick="hapusCategory(&quot;' . $data->id . '&quot;)">
                <i class="bi bi-trash"></i>
           </button>
                </div>';
             return $actionButton;
            }) 
            ->escapeColumns([])
            ->make(true);
          }
         $title = 'Halaman Berita';
          return view('admin.category.index', compact('title'));
    }

    public function store(Request $request) {
        $this->validate($request, [
            'name' => 'required|string',
        ]);

       
            try{
                $data = new Kategori();
                $data->name = $request->name;
                $data->slug = Str::slug($request->slug);
                $data->created_at = $request->created_at;
                $data->save();
                Alert::success('Success', 'Tambah Kategori Berhasil');
                return redirect()->route('category.index');
                DB::commit();
            }catch(Exception $e) {
                DB::rollBack();
                Alert::error('Error', 'Tambah Kategori Gagal');
                return redirect()->back();
    
            }
        }

        public function edit(Request $request) {
           
            // $id = $request->id;
            $data = Kategori::findOrFail($request->id);
    
            return response()->json($data, 200);
        }


        public function update(Request $request) {
            
            
            $this->validate($request, [
                'name' =>'required|string',
            ]);
            // dd($request->id);
            try{
                $data = Kategori::findOrFail($request->id);
                $data->name = $request->name;
                $data->slug = Str::slug($request->slug);
                $data->created_at = $request->created_at;            
                $data->save();
                Alert::success('Success', 'Update Kategori Berhasil');
                return redirect()->route('category.index');
                DB::commit();
            }catch(Exception $e) {
                DB::rollBack();
                Alert::error('Error', 'Update Kategori Gagal');
                return redirect()->back();
        }
    }

    public function destroy(Request $request) {
        $data = Kategori::findOrFail($request->id);
        try {
            $data->delete();
            Alert::success('Success', 'Hapus Kategori Berhasil');
            return response()->json(['message' => 'Berhasil menghapus data Kategori'], 200);
        } catch (Exception $e) {
            Alert::error('Error', 'Hapus Kategori Gagal');
            return response()->json(['message' => 'Gagal menghapus data Kategori'], 500);
        }
    }

}
