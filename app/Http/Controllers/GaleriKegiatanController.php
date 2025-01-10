<?php

namespace App\Http\Controllers;

use App\Models\GaleriKegiatan;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Str;
use Carbon\Carbon;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\DB;
use Exception;
use Illuminate\Support\Facades\Auth;

class GaleriKegiatanController extends Controller
{
    public function index(Request $request)
    {

        if ($request->ajax()) {
            $data = GaleriKegiatan::orderBy('created_at', 'DESC')->get();

            return DataTables::of($data)->addIndexColumn()
                ->editColumn('created_at', function ($data) {
                    return Carbon::parse($data->created_at)->format('d-m-Y');
                })->editColumn('images', function ($data) {
                    // Decode JSON string menjadi array
                    $images = json_decode($data->images, true);

                    // Generate HTML untuk menampilkan gambar
                    $html = '';
                    if (!empty($images)) {
                        foreach ($images as $image) {
                            $html .= '<a href="' . asset('storage/' . $image) . '" ><img src="' . asset('storage/' . $image) . '" width="100px" alt="Image" style="margin-right: 5px;"></a>';
                        }
                    }

                    return $html;
                })
                ->editColumn('body', function ($data) {
                    return Str::limit($data->body, 100) . '...';
                })
                ->editColumn('aksi', function ($data) {
                    $actionButton = '
                <a href="' . route('kegiatan.edit', $data->id) . '"><button class="btn waves-effect waves-light btn-warning btn-sm">
                <i class="bi bi-pencil-square"></i>
           </button></a>
                  <button class="btn waves-effect waves-light btn-danger btn-sm" onclick="hapusKegiatan(&quot;' . $data->id . '&quot;)">
                      <i class="bi bi-trash"></i>
                 </button>';
                    return $actionButton;
                })
                ->escapeColumns([])
                ->make(true);
        }

        $title = "Kegiatan";

        return view('admin.kegiatan.index', compact('title'));
    }

    public function create()
    {
        $title = "Tambah Kegiatan";
        return view('admin.kegiatan.create', compact('title'));
    }

    public function store(Request $request)
    {

        $this->validate($request, [
            'title' => 'required|string|max:255',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:5048'
            // 'images' => 'nullable|image|mimes:jpg,bmp,png,jpeg'
        ]);
        try {
            $imagePaths = [];
            if ($request->hasFile('images')) {
                foreach ($request->file('images') as $file) {

                    $imageName = time() . '_' . $file->getClientOriginalName();
                    $file->move('storage/', $imageName);


                    $imagePaths[] = $imageName;
                }
            }


            $imagePathsString = json_encode($imagePaths);

            $data = [
                'title' => $request->title,
                'body' => $request->body,
                'post_date' => $request->post_date,

                'slug' => Str::slug($request->title),
                'images' => $imagePathsString,
            ];
            GaleriKegiatan::create($data);
            Alert::success('success', 'Berhasil Menambah Kegiatan');
            return redirect()->route('kegiatan.index');
            DB::commit();
        } catch (Exception $e) {
            return redirect()->back()->withInput()->with('error', 'Gagal menyimpan data.');
        }
    }
    public function edit($id)
    {
        $title = "Edit Kegiatan";
        $kegiatan = GaleriKegiatan::where('id', $id)->first();

        return view('admin.kegiatan.edit', compact('title', 'kegiatan'));
    }

    public function update(Request $request)
    {
        // dd($request->all());
        $this->validate($request, [
            'title' => 'required|string|max:255',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:5024'
            // 'images' => 'nullable|image|mimes:jpg,bmp,png,jpeg'
        ]);
        try {
            $id = $request->id;
            $galeriKegiatan = GaleriKegiatan::find($id);
            $imagePaths = [];
            if ($request->hasFile('images')) {
                foreach ($request->file('images') as $file) {
                    // Buat nama unik untuk setiap file
                    $imageName = time() . '_' . $file->getClientOriginalName();
                    $file->move('storage/', $imageName);

                    // Tambahkan nama file ke array
                    $imagePaths[] = $imageName;
                }

                // Encode array menjadi string JSON
                $imagePathsString = json_encode($imagePaths);
            } else {
                $imagePathsString = $galeriKegiatan->images;
            }

            $data = [
                'title' => $request->title,
                'body' => $request->body,
                'post_date' => $request->post_date,
                'slug' => Str::slug($request->title),
                'images' =>  $imagePathsString
            ];
            DB::table('kegiatan')->where('id', $id)->update($data);
            //    dd($cek);
            Alert::success('success', 'Berhasil Menambah Kegiatan');
            return redirect()->route('kegiatan.index');
            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->back()->withInput()->with('error', 'Gagal menyimpan data.');
        }
    }

    public function destroy(Request $request)
    {
        $id = $request->id;

        $data = GaleriKegiatan::where('id', $id)->first();
        if ($data->image) {
            unlink('storage/' . $data->image);
        }
        $data->delete();
        toast('success', 'Berhasil Di Hapus');
        return redirect()->route('kegiatan.index');
    }
}
