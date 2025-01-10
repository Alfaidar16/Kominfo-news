<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use App\Models\Banner;
use Exception;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\DB;

class BannerController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Banner::get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->editColumn('image', function ($data) {
                    return '<img src="' . asset('header/' . $data->image) . '" width="100px" alt="Image">';
                })->editColumn('aksi', function ($data) {
                    $actionButton = '
                   <div class="text-center">
                   <button data-bs-toggle="modal" data-bs-target="#editCategory" onclick="editBanner(&quot;' . $data->id . '&quot;)" class="btn waves-effect waves-light btn-warning btn-sm">
                   <i class="bi bi-pencil-square"></i>
              </button>
               <button class="btn waves-effect waves-light btn-danger btn-sm" onclick="hapusBanner(&quot;' . $data->id . '&quot;)">
                   <i class="bi bi-trash"></i>
              </button>
                   </div>';
                    return $actionButton;
                })
                ->escapeColumns([])
                ->make(true);
        }

        $title = 'Halaman Banner';
        return view('admin.banner.index', compact('title'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'image.*' => 'required|image|mimes:png,jpg,jpeg,web',
        ]);

        try {
            $data =  new Banner();
            if ($request->hasFile('image')) {
                $image = $request->image;
                $imageName =    $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();;
                $image->move('header/', $imageName);
                $data->image =  $imageName;
            }
            $data->created_at = $request->created_at;
            $data->save();
            Alert::success('Berhasil', 'Banner Berhasil Di buat');
            return redirect()->route('banner.index');
            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            Alert::error('Gagal', 'Banner Gagal Di Buat');
            return redirect()->back();
        }
    }

    public function edit(Request $request)
    {
        $data = Banner::findOrFail($request->id);
        // dd($data);
        return response()->json($data, 200);
    }

    public function update(Request $request)
    {

        DB::beginTransaction();
        try {
            $id = $request->id;
            if ($request->hasFile('image')) {
                $gambarLama = Banner::where('id', $id)->value('image');
                if ($gambarLama && file_exists(public_path('header/' . $gambarLama))) {
                    unlink(public_path('header/' . $gambarLama));
                }
                $image = $request->file('image');
                $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('header/'), $imageName);
            } else {
                $imageName = Banner::where('id', $id)->value('image');
            }
            $data = [
                'image' => $imageName,
                'created_at' => $request->created_at,
                'updated_at' => date('Y-m-d H:i:s')
            ];
            Banner::where('id', $id)->update($data);
            DB::commit();
            Alert::success('Berhasil', 'Banner Berhasil Di Ubah');
            return redirect()->route('banner.index');
        } catch (Exception $e) {
            return $e;
            DB::rollBack();
            Alert::error('Gagal', 'Banner Gagal Di Ubah');
            return redirect()->back();
        }
    }

    public function destroy(Request $request)
    {
        $id = $request->id;

        $data = Banner::where('id', $id)->first();
        if ($data->image) {
            unlink('storage/' . $data->image);
        }
        $data->delete();
        toast('success', 'Berhasil Di Hapus');
        return redirect()->route('banner.index');
    }
}
