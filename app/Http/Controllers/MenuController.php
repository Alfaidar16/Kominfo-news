<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;
use Carbon\Carbon;
use Exception;
use RealRashid\SweetAlert\Facades\Alert;

class MenuController extends Controller
{
    public function index(Request $request) {

        if($request->ajax()) {
            $data = DB::table('menus')->get();
            return DataTables::of($data)
            ->addIndexColumn()
            ->editColumn('created_at', function($data) {
                return Carbon::parse($data->created_at)->format('d-m-Y');
                })->editColumn('aksi', function ($data) {
                   $actionButton = '
                   <div class="text-center">
                   <button data-bs-toggle="modal" data-bs-target="#editCategory" onclick="editMenu(&quot;' . $data->id . '&quot;)" class="btn waves-effect waves-light btn-warning btn-sm">
                   <i class="bi bi-pencil-square"></i>
              </button>
               <button class="btn waves-effect waves-light btn-danger btn-sm" onclick="hapusMenu(&quot;' . $data->id . '&quot;)">
                   <i class="bi bi-trash"></i>
              </button>
                   </div>';
                return $actionButton;
               }) 
               ->escapeColumns([])
               ->make(true);
        }


        $title = 'Halaman Menu';
        return view('admin.menu.index', compact('title'));

    }

    public function store(Request $request) {
           $this->validate($request, [
            'name' => 'required|string|max:255'
           ]);

           try{
              $name = $request->name;
              $created_at = $request->created_at;

              DB::table('menus')->insert([
                'name' => $name,
                'created_at' =>  $created_at
              ]);
              Alert::success('Berhasil', 'Berhasil Menambahkan Menu Utamaa');
              DB::commit();
              return redirect()->route('menu.index');
           }catch(Exception $e) {
            DB::rollBack();
            Alert::error('Gagal', 'Gagal Menambahkan Menu Utama');
            return redirect()->back();
           }
    }

    public function edit(Request $request) {
        $id = $request->id;
        $data = DB::table('menus')->where('id', $id)->first();

        return response()->json($data);
    }


    public function update(Request $request) {
        $this->validate($request, [
            'name' =>'required|string|max:255'
        ]);

        try {
            $id = $request->id;
            $name = $request->name;
            $created_at = $request->created_at;

            DB::table('menus')
                ->where('id', $id)
                ->update([
                    'name' => $name,
                    'created_at' => $created_at
                ]);
            Alert::success('Berhasil', 'Berhasil Mengubah Menu Utama');
            DB::commit();
            return redirect()->route('menu.index');
        } catch (Exception $e) {
            DB::rollBack();
            Alert::error('Gagal', 'Gagal Mengubah Menu Utama');
            return redirect()->back();
        }
    }

    public function destroy(Request $request) {
        $id = $request->id;

        try {
            DB::table('menus')
                ->where('id', $id)
                ->delete();
            Alert::success('Berhasil', 'Berhasil Menghapus Menu Utama');
            DB::commit();
            return response()->json(['message' => 'Menu Utama Berhasil Dihapus']);
        } catch (Exception $e) {
            DB::rollBack();
            Alert::error('Gagal', 'Gagal Menghapus Menu Utama');
            return response()->json(['message' => 'Gagal Menghapus Menu Utama']);
        }
    } 
}
