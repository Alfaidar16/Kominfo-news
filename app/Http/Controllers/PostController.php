<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Post;
use Exception;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\File;

class PostController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = DB::table('posts')
                ->leftJoin('users', 'posts.author_id', '=', 'users.id')
                ->leftJoin('categories', 'posts.category_id', '=', 'categories.id')
                ->select('categories.name', 'users.name', 'posts.*')->orderBy('posts.id', 'DESC')->get();

            return DataTables::of($data)
                ->addIndexColumn()
                ->editColumn('created_at', function ($data) {
                    return Carbon::parse($data->created_at)->format('d-m-Y');
                })->editColumn('image', function ($data) {
                    return '<img src="' . asset('storage/' . $data->image) . '" width="100px" alt="Image">';
                })->editColumn('aksi', function ($data) {
                    $actionButton = '
               <a href="' . route('post.edit', $data->id) . '"><button class="btn waves-effect waves-light btn-warning btn-sm">
               <i class="bi bi-pencil-square"></i>
          </button></a>
                 <button class="btn waves-effect waves-light btn-danger btn-sm" onclick="alertHapus(&quot;' . $data->id . '&quot;)">
                     <i class="bi bi-trash"></i>
                </button>';
                    return $actionButton;
                })
                ->escapeColumns([])
                ->make(true);
        }
        $title = 'Halaman Berita';
        return view('admin.post.index', compact('title'));
    }


    public function create()
    {
        $categories = DB::table('categories')->get();
        $title = 'Tambah Berita';
        return view('admin.post.create', compact('title', 'categories'));
    }


    public function store(Request $request)
    {
        // dd($request->all());
        $this->validate($request, [
            'title' => 'required|min:5',
            'body' => 'required|min:20',
            'category_id' => 'required',
            'image' => 'required|mimes:jpg,bmp,png,jpeg',
        ], [
            'title.required'    =>  'Judul Tidak Boleh Kosong!',
            'title.min'         =>  'Judul Minimal :min Karakter!',
            'body.required'   =>  'Isi Berita Tidak Boleh Kosong!',
            'body.min'        =>  'Isi Berita Minimal :min Karakter!',
            'image.required'    =>  'image Tidak Boleh Kosong!',
            'image.image'       =>  'image Harus Gambar!',
            'image.dimensions'       =>  'image Gambar harus minimal 832x524px',
            'category_id.required' =>  'Kategori Tidak Boleh Kosong!',
        ]);

        try {
            $data = new Post();
            $data->title = $request->title;
            $data->body = $request->body;
            $data->author_id = Auth::user()->id;
            $data->category_id = $request->category_id;
            $data->excerpt = $request->excerpt;
            $data->slug = Str::slug($request->title);
            $data->status = $request->status;
            $data->meta_description = $request->meta_description;
            $data->meta_keywords = $request->meta_keywords;
            $data->seo_title = $request->seo_title;

            if ($request->hasFile('image')) {
                $image = $request->image;
                $imageName =    $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();;
                $image->move('storage/', $imageName);
                $data->image = $imageName;
            }
            $data->save();
            Alert::success('success', 'Berhasil Menambah Data');
            return redirect()->route('post.index');
            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Gagal Menyimpan Data!');
        }
    }


    public function show()
    {
        $title = 'Detail Berita';
        return view('admin.post.show', compact('title'));
    }


    public function edit($id)
    {
        $categories = DB::table('categories')->get();

        $post = Post::findOrFail($id);
        $title = 'Edit Berita';
        return view('admin.post.edit', compact('title', 'categories', 'post'));
    }


    public function update(Request $request)
    {
        // dd($request->all());


        $this->validate($request, [
            'title' => 'required|min:5',
            'body' => 'required|min:20',
            'category_id' => 'required',
            'image' => 'nullable|mimes:jpg,bmp,png,jpeg',
        ], [
            'title.required'    =>  'Judul Tidak Boleh Kosong!',
            'title.min'         =>  'Judul Minimal :min Karakter!',
            'body.required'   =>  'Isi Berita Tidak Boleh Kosong!',
            'body.min'        =>  'Isi Berita Minimal :min Karakter!',
            'image.required'    =>  'image Tidak Boleh Kosong!',
            'image.image'       =>  'image Harus Gambar!',
            'image.dimensions'       =>  'image Gambar harus minimal 832x524px',
            'category_id.required' =>  'Kategori Tidak Boleh Kosong!',
        ]);
        $id = $request->id;
        // dd($id);
        try {

            $data =  Post::findOrFail($id);

            $data->title = $request->title;
            $data->body = $request->body;
            $data->author_id = Auth::user()->id;
            $data->category_id = $request->category_id;
            $data->excerpt = $request->excerpt;
            $data->slug = Str::slug($request->title);
            $data->status = $request->status;
            $data->meta_description = $request->meta_description;
            $data->meta_keywords = $request->meta_keywords;
            $data->seo_title = $request->seo_title;
            if ($request->hasFile('image')) {
                $gambarLama = Post::where('id', $id)->value('image');
                if ($gambarLama && file_exists(public_path('storage/' . $gambarLama))) {
                    unlink(public_path('storage/' . $gambarLama));
                }
                $image = $request->file('image');
                $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('storage/'), $imageName);
                $data->image = $imageName;
            } else {
                $imageName = Post::where('id', $id)->value('image');
            }
            // if ($request->hasFile('image')) {
            //     $image = $request->image;
            //     $imageName =    $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();;
            //     $image->move('storage/', $imageName);
            //     $data->image = $imageName;
            // }
            // dd($data);
            $data->save();
            Alert::success('success', 'Berhasil Mengubah Data');
            return redirect()->route('post.index');
            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Gagal Menyimpan Data!');
        }
    }


    public function destroy(Request $request)
    {
        $id = $request->id;
        $post =
            Post::where('id', $id)->first();
        if ($post) {
            $imagePath = public_path('storage/' . $post->image);
            if ($post->image && File::exists($imagePath)) {
                File::delete($imagePath);
            }
            $post->delete();
        }
        toast('success', 'Berhasil Di Hapus');
        return redirect()->back();
    }
}
