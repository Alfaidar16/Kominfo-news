<?php

namespace App\Http\Controllers;

use App\Models\VideoKegiatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VideoKegiatanController extends Controller
{
    public function index()
    {
        $title = 'Video Kegiatan';
        $data = VideoKegiatan::orderBy('id', 'desc')->get();
        return view('admin.video-kegiatan.index', compact('title', 'data'));
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'judul' => 'required',
                'video' => 'mimes:mp4,mov,ogg,avi|max:40240',
            ]);
            if ($request->hasFile('video')) {
                $imageName = time() . '.' . $request->video->getClientOriginalExtension();
                $request->video->move('video-kegiatan', $imageName);
            } else {
                $imageName = null;
            }

            $data  = [
                'judul' => $request->judul,
                'video' => $imageName,
                'link' => $request->link ? $request->link : null,
                'created_at' => now(),
            ];
            VideoKegiatan::create($data);
            return redirect()->route('video_kegiatan.index')->with('success', 'Data berhasil disimpan');
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function edit(Request $request)
    {
        $id = $request->id;
        $data = VideoKegiatan::find($id);
        return response()->json($data);
    }

    public function update(Request $request)
    {
        try {
            $request->validate([
                'judul' => 'required',
                'video' => 'mimes:mp4,mov,ogg,avi|max:40240',
            ]);

            if ($request->hasFile('video')) {
                $gambarLama =
                    DB::table('video_kegiatan')->where('id', $request->id)->value('video');
                if ($gambarLama && file_exists(public_path('video-kegiatan' . $gambarLama))) {
                    unlink(public_path('video-kegiatan' . $gambarLama));
                }
                $video = $request->file('video');
                $videoName = time() . '_' . uniqid() . '.' . $video->getClientOriginalExtension();
                $video->move(public_path('video-kegiatan'), $videoName);
            } else {
                $videoName =  DB::table('video_kegiatan')->where('id', $request->id)->value('video');
            }
            $data = [
                'judul' => $request->judul,
                'video' => $videoName ? $videoName : null,
                'link' => $request->link ? "https://www.youtube.com/embed/" . $request->link : null,
                'created_at' => now(),
            ];
            // dd($data);
            VideoKegiatan::where('id', $request->id)->update($data);
            return redirect()->route('video_kegiatan.index')->with('success', 'Data berhasil diubah');
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function destroy(Request $request)
    {
        try {
            $id = $request->id;
            $gambarLama =
                DB::table('video_kegiatan')->where('id', $id)->value('video');
            if ($gambarLama && file_exists(public_path('video-kegiatan/' . $gambarLama))) {
                unlink(public_path('video-kegiatan/' . $gambarLama));
            }
            VideoKegiatan::destroy($id);
            return response()->json(['message' => 'Data berhasil dihapus']);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
