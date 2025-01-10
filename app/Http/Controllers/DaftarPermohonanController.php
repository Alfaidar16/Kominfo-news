<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DaftarPermohonanController extends Controller
{
    public function daftarPermohonanInformasi()
    {
        $title = 'Daftar Permohonan Informasi';
        $permohonanInformasi = DB::table('permohonan_informasi')->get();
        return view('admin.Daftar-Formulir.permohonan-informasi',  compact('permohonanInformasi', 'title'));
    }

    public function isSetuju(Request $request)
    {
        $data = [
            'status' => 1
        ];
        DB::table('permohonan_informasi')->where('id', $request->id)->update($data);
        return redirect()->back();
    }

    public function isTolak(Request $request)
    {
        $data = [
            'status' => 2
        ];
        DB::table('permohonan_informasi')->where('id', $request->id)->update($data);
        return redirect()->back();
    }

    public function pengajuanKeberatan()
    {
        $title = 'Daftar Pengajuan Keberatan';
        $pengajuanKeberatan = DB::table('pengajuan_keberatan')->get();
        return view('admin.Daftar-Formulir.pengajuan_kebaratan',  compact('pengajuanKeberatan', 'title'));
    }
    public function PengajuanisSetuju(Request $request)
    {
        $data = [
            'status' => 1
        ];
        DB::table('pengajuan_keberatan')->where('id', $request->id)->update($data);
        return redirect()->back()->with('success', 'Pengajuan berhasil disetujui');
    }

    public function PengajuanisTolak(Request $request)
    {
        $data = [
            'status' => 2
        ];
        DB::table('pengajuan_keberatan')->where('id', $request->id)->update($data);
        return redirect()->back()->with('success', 'Pengajuan berhasil ditolak');
    }
}
