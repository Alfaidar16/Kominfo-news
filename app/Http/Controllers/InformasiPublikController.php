<?php

namespace App\Http\Controllers;

use App\Models\InformasiPublik;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Exception;
use Illuminate\Support\Facades\File;



class InformasiPublikController extends Controller
{
    public function index()
    {
        $title = 'Informasi Publik';
        $kategoriFile = DB::table('kategori_file')->get();
        $dokumen =  DB::table('dokumens')
            ->join('kategori_file', 'dokumens.id_file', '=', 'kategori_file.id')
            ->select('kategori_file.title', 'dokumens.id',  'dokumens.name', 'dokumens.link', 'dokumens.dokumen', 'dokumens.created_at')
            ->orderBy('dokumens.id', 'desc')
            ->get();
        return view('admin.informasi_publik.index', compact('title', 'dokumen', 'kategoriFile'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:dokumens,name',
            'dokumen' => 'nullable|file|mimes:png,jpg,pdf,docx',
            'link' => 'nullable|string|max:255'
        ]);

        try {
            if ($request->file('dokumen')) {
                $imageName = time() . '.' . $request->dokumen->getClientOriginalExtension();
                $request->dokumen->move('storage/', $imageName);
            } else {
                $imageName = null;
            }
            DB::table('dokumens')->insert([
                'name' =>  $request->name,
                'dokumen' =>  $imageName,
                'id_file' => $request->id_file,
                'link' => $request->link
            ]);
            return redirect()->route('informasi_publik.index')->with('success', 'Dokumen berhasil dibuat.');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Gagal upload dokumen');
        }
    }

    public function edit(Request $request)
    {
        $data =
            DB::table('dokumens')
            ->join('kategori_file', 'dokumens.id_file', '=', 'kategori_file.id')
            ->select('kategori_file.title', 'dokumens.id',  'dokumens.name', 'dokumens.link', 'dokumens.dokumen', 'dokumens.created_at')
            ->where('dokumens.id', $request->id)->first();
        return response()->json($data, 200);
    }

    public function update(Request $request)
    {
        $id = $request->id;
        $request->validate([
            'name' => 'required',
            'dokumen' => 'nullable',
        ]);
        try {

            if ($request->hasFile('dokumen')) {
                $gambarLama = DB::table('dokumens')->where('id', $id)->value('dokumen');
                if ($gambarLama && file_exists(public_path('storage/' . $gambarLama))) {
                    unlink(public_path('storage/' . $gambarLama));
                }
                $image = $request->file('dokumen');
                $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('storage/'), $imageName);
            } else {
                $imageName = DB::table('dokumens')->where('id', $id)->value('dokumen');
                $imageName = null;
            }
            $data = [
                'name' =>  $request->name,
                'dokumen' => $imageName ? $imageName : null,
                'id_file' => $request->id_file,
                'link'  => $request->link ? $request->link : null,
                'created_at' => now()
            ];
            // dd($data);
            DB::table('dokumens')->where('id', $id)->update($data);
            return redirect()->route('informasi_publik.index')->with('success', 'Dokumen berhasil diupdate.');
        } catch (Exception $e) {
            return $e;
            return redirect()->back()->with('error', 'Gagal update data');
        }
    }

    public function destroy(Request $request)
    {
        try {
            $id = $request->id;
            $informasi =
                InformasiPublik::where('id', $id)->first();
            if ($informasi) {
                $imagePath = public_path('storage/' . $informasi->dokumen);
                if ($informasi->dokumen && File::exists($imagePath)) {
                    File::delete($imagePath);
                }
                $informasi->delete();
            }
            return redirect()->back()->with('success', 'Regulasi berhasil dihapus.')->with('type', 'success');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Regulasi gagal dihapus.')->with('type', 'error');
        }
    }
}
