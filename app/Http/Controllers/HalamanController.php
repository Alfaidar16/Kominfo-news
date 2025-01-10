<?php

namespace App\Http\Controllers;

use App\Models\Halaman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Exception;
use RealRashid\SweetAlert\Facades\Alert;

class HalamanController extends Controller
{
    public function index(Request $request)
    {

        if ($request->ajax()) {
            $data = DB::table('pages')->leftJoin('users', 'author_id', '=', 'users.id')
                ->select('users.name', 'pages.*')->orderBy('created_at', 'DESC')->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->editColumn('created_at', function ($data) {
                    return Carbon::parse($data->created_at)->format('d-m-Y');
                })->editColumn('image', function ($data) {
                    return '<img src="' . asset('storage/' . $data->image) . '" width="100px" alt="Image">';
                })->editColumn('aksi', function ($data) {
                    $actionButton = '
                  <a href="' . route('halaman.edit', $data->id) . '"><button class="btn waves-effect waves-light btn-warning btn-sm">
                  <i class="bi bi-pencil-square"></i>
             </button></a>
                    <button class="btn waves-effect waves-light btn-danger btn-sm" onclick="hapusHalaman(&quot;' . $data->id . '&quot;)">
                        <i class="bi bi-trash"></i>
                   </button>';
                    return $actionButton;
                })
                ->escapeColumns([])
                ->make(true);
        }

        $title = 'Membuat Halaman';
        return view('admin.halaman.index', compact('title'));
    }


    public function create()
    {
        $title = 'Tambah Halaman';
        return view('admin.halaman.create', compact('title'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|string|max:255',
            'image' => 'nullable|mimes:png,jpg,jpeg'
        ]);

        try {
            $data = new Halaman();
            $data->title = $request->title;
            $data->body = $request->body;
            $data->excerpt = $request->excerpt;
            $data->slug = Str::slug($request->title);
            $data->meta_keywords = $request->meta_keywords;
            $data->meta_description = $request->meta_description;
            $data->author_id = auth()->user()->id;
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
                $image->move('storage/', $imageName);
                $data->image = $imageName;
            } else {
                $imageName = null;
            }
            $data->save();
            Alert::success('success', 'Berhasil Menambah Halaman');
            return redirect()->route('halaman.index');
            DB::commit();
        } catch (Exception $e) {
            return redirect()->back()->withInput()->with('error', 'Gagal menyimpan data.');
        }
    }

    public function edit($id)
    {
        $data = Halaman::where('id', $id)->first();

        $title = "Edit Halaman";
        return view('admin.halaman.edit', compact('title', 'data'));
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|string|max:255',
            'image' => 'nullable|mimes:png,jpg,jpeg'
        ]);

        $id = $request->id;
        try {
            $data = Halaman::findOrFail($id);
            $data->title = $request->title;
            $data->body = $request->body;
            $data->excerpt = $request->excerpt;
            $data->slug = Str::slug($request->title);
            $data->meta_keywords = $request->meta_keywords;
            $data->meta_description = $request->meta_description;
            $data->author_id = auth()->user()->id;
            $data->status = $request->status;
            if ($request->hasFile('image')) {
                $gambarLama = Halaman::where('id', $id)->value('image');
                if ($gambarLama && file_exists(public_path('storage/' . $gambarLama))) {
                    unlink(public_path('storage/' . $gambarLama));
                }
                $image = $request->file('image');
                $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('storage/'), $imageName);
                $data->image = $imageName;
            } else {
                $imageName = Halaman::where('id', $id)->value('image');
            }
            $data->save();
            Alert::success('success', 'Berhasil Mengubah Halaman');
            return redirect()->route('halaman.index');
            DB::commit();
        } catch (Exception $e) {
            return redirect()->back()->withInput()->with('error', 'Gagal mengubah data.');
        }
    }

    public function destroy(Request $request)
    {
        $id = $request->id;
        $data = Halaman::where('id', $id)->first();
        if ($data->image) {
            unlink('storage/' . $data->image);
        }
        $data->delete();
        toast('success', 'Berhasil Di Hapus');
        return redirect()->back();
    }
}
