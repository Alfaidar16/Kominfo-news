<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProfilWebsiteController extends Controller
{
    public function profilWebsite()
    {
        $data =   DB::table('identitas')->first();
        $title = "Profil Website";
        return view('admin.identitas.profil_website', compact('data', 'title'));
    }

    public function updateProfilWebsite(Request $request)
    {
        $id = $request->id;
        $request->validate([
            'image' => 'nullable|mimes:jpg,jpeg,png,bmp,webm',
            'image_white' => 'nullable|mimes:jpg,jpeg,png,bmp,webm',
            'favicon' => 'nullable|mimes:jpg,jpeg,png,bmp,webm',
            'image_login' => 'nullable|mimes:jpg,jpeg,png,bmp,webm',
        ]);

        $data = [
            'nama_website' => $request->nama_website,
            'deskripsi' => $request->deskripsi,
            'email' => $request->email,
            'url' => $request->url,
            'facebook' => $request->facebook,
            'youtube' => $request->youtube,
            'twitter' => $request->twitter,
            'instagram' => $request->instagram,
            'no_telp' => $request->no_telp,
            'alamat' => $request->alamat,
        ];


        if ($request->has('image')) {
            $image = $request->image;
            $imageName = time() . $image->getClientOriginalName();
            $image->move('uploads/foto_website', $imageName);
            $data['image'] = $imageName;
        }
        if ($request->has('image_white')) {
            $image = $request->image_white;
            $imageName = time() . $image->getClientOriginalName();
            $image->move('uploads/foto_website', $imageName);
            $data['image_white'] = $imageName;
        }
        if ($request->has('favicon')) {
            $image = $request->favicon;
            $imageName = time() . $image->getClientOriginalName();
            $image->move('uploads/foto_website', $imageName);
            $data['favicon'] = $imageName;
        }
        if ($request->has('image_login')) {
            $image = $request->image_login;
            $imageName = time() . $image->getClientOriginalName();
            $image->move('uploads/foto_website', $imageName);
            $data['image_login'] = $imageName;
        }
        DB::table('identitas')->where('id', $id)->update($data);
        // Identitas::where('id', $id)->update($data);
        toast('Data Berhasil Di Update', 'success');
        return redirect()->back();
    }

    public function sambutan()
    {
        $data =   DB::table('identitas')->first();
        $title = "Sambutan Kepala Dinas";
        return view('admin.identitas.sambutan_kepala_dinas', compact('data', 'title'));
    }

    public function sambutanUpdate(Request $request)
    {
        $id = $request->id;
        $request->validate([
            'foto_kepala' => 'nullable|mimes:jpg,jpeg,png,bmp,webm',
        ]);

        $data = [
            'sambutan' => $request->sambutan,
            'nama_kepala' => $request->nama_kepala,
            'jabatan_kepala' => $request->jabatan_kepala,
        ];

        if ($request->has('foto_kepala')) {
            $image = $request->foto_kepala;
            $imageName = time() . $image->getClientOriginalName();
            $image->move('uploads/foto_pimpinan', $imageName);
            $data['foto_kepala'] = $imageName;
        }

        DB::table('identitas')->where('id', $id)->update($data);
        toast('Data Berhasil Di Update', 'success');
        return redirect()->back();
    }
}
