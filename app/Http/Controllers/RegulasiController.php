<?php

namespace App\Http\Controllers;

use App\Models\Regulasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class RegulasiController extends Controller
{
    public function index()
    {
        $title = 'Regulasi';
        $regulasi =
            DB::table('regulasis')
            ->join('dok_regulasis', 'regulasis.id_dok_regulasis', '=', 'dok_regulasis.id')
            ->select('dok_regulasis.title', 'regulasis.id', 'regulasis.tahun',  'regulasis.judul', 'regulasis.dokumen', 'regulasis.created_at')
            ->orderBy('regulasis.id', 'desc')
            ->get();
        $kategoriFile = DB::table('dok_regulasis')->get();

        return view('admin.regulasi.index', compact('title', 'regulasi', 'kategoriFile'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'judul' => 'required|unique:regulasis,judul',
            'dokumen' => 'nullable|required|file|mimes:png,jpg,pdf,docx',

        ]);
        if ($request->file('dokumen')) {
            $imageName = time() . '.' . $request->dokumen->getClientOriginalExtension();
            $request->dokumen->move('storage', $imageName);
        } else {
            $imageName = null;
        }
        DB::table('regulasis')->insert([
            'judul' =>  $request->judul,
            'tahun' => $request->tahun,
            'dokumen' =>  $imageName,
            'created_at' => now(),
            'id_dok_regulasis' => $request->id_dok_regulasis
        ]);
        return redirect()->route('regulasi.index')->with('success', 'Dokumen berhasil dibuat.');
    }

    public function edit(Request $request)
    {
        $data =
            DB::table('regulasis')
            ->join('dok_regulasis', 'regulasis.id_dok_regulasis', '=', 'dok_regulasis.id')
            ->select('dok_regulasis.title', 'regulasis.id', 'regulasis.tahun',  'regulasis.judul', 'regulasis.dokumen', 'regulasis.created_at')
            ->where('regulasis.id', $request->id)->first();
        // dd($data);
        return response()->json($data, 200);
    }

    public function update(Request $request)
    {
        $id = $request->id;
        $this->validate($request, [
            'judul' => 'required',
            'dokumen' => 'nullable|file|mimes:png,jpg,pdf,docx',

        ]);
        if ($request->file('dokumen')) {
            $imageName = time() . '.' . $request->dokumen->getClientOriginalExtension();
            $request->dokumen->move('storage/', $imageName);
        } else {
            $oldDokumen = DB::table('regulasis')->where('id', $id)->first();
            $imageName = $oldDokumen->dokumen;
        }
        $data = [
            'judul' =>  $request->judul,
            'dokumen' =>  $imageName,
            'id_dok_regulasis' => $request->id_dok_regulasis,
            'tahun' => $request->tahun
        ];
        DB::table('regulasis')->where('id', $id)->update($data);

        // Redirect ke halaman indeks layanan dengan pesan sukses
        return redirect()->route('regulasi.index')->with('success', 'Layanan berhasil diperbarui.');
    }

    public function destroy(Request $request)
    {
        try {
            $id = $request->id;
            $regulasi =
                Regulasi::where('id', $id)->first();
            if ($regulasi) {
                $imagePath = public_path('storage/' . $regulasi->dokumen);
                if ($regulasi->dokumen && File::exists($imagePath)) {
                    File::delete($imagePath);
                }
                $regulasi->delete();
            }
            return redirect()->back()->with('success', 'Regulasi berhasil dihapus.')->with('type', 'success');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Regulasi gagal dihapus.')->with('type', 'error');
        }
    }
}
