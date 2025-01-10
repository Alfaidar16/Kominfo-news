<?php

namespace App\Http\Controllers;

use App\Models\GaleriKegiatan;
use App\Models\Halaman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Post;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;

class IndexController extends Controller
{
	public function index()
	{
		$hitstat = hitstat(true);
		$beritaUtama = DB::table('posts')
			->leftJoin('categories', 'posts.category_id', '=', 'categories.id')
			->select('categories.name', 'posts.*')
			->where('categories.id', '!=', 3)
			->where('categories.id', '!=', 5)
			->where('posts.status', 'PUBLISHED')->orderBy('id', 'DESC')->limit(6)->get();

		// dd($beritaUtama);
		$humas = DB::table('posts')->where('category_id', 8)->where('status', 'PUBLISHED')->orderBy('created_at', 'DESC')->limit(6)->get([
			'posts.image',
			'posts.slug',
			'posts.title',
			'posts.created_at'
		]);
		$aptika = DB::table('posts')->where('category_id', 7)->where('status', 'PUBLISHED')->orderBy('created_at', 'DESC')->limit(6)->get([
			'posts.image',
			'posts.slug',
			'posts.title',
			'posts.created_at'
		]);
		$persandian = DB::table('posts')->where('category_id', 9)->where('status', 'PUBLISHED')->orderBy('created_at', 'DESC')->limit(6)->get([
			'posts.image',
			'posts.slug',
			'posts.title',
			'posts.created_at'
		]);
		$statistik = DB::table('posts')->where('category_id', 10)->where('status', 'PUBLISHED')->orderBy('created_at', 'DESC')->limit(6)->get([
			'posts.image',
			'posts.slug',
			'posts.title',
			'posts.created_at'
		]);
		$opini = DB::table('posts')
			->join('categories', 'posts.category_id', '=', 'categories.id')
			->select('categories.name', 'posts.*')
			->where('categories.id', '=', 5)
			->orderBy('posts.id', 'DESC')
			->take(2)->get();
		$videos = DB::table('video_kegiatan')->orderBy('created_at', 'DESC')->get();

		// Ambil 3 video pertama
		$featuredVideos = $videos->take(3);
		$title = 'Beranda';
		return view('guest.index', compact('humas', 'aptika', 'persandian', 'statistik',  'beritaUtama', 'title', 'opini', 'featuredVideos', 'hitstat'));
	}

	public function postAll(Request $request)
	{

		$model = Post::orderBy('created_at', 'desc')->paginate(10);
		$title = 'Semua Berita';
		return view('guest.SemuaBerita', compact('model', 'title'));
	}


	public function postSlug($slug)
	{
		$model = Post::where('slug', $slug)->firstOrFail();
		$title = 'Postingan Berita';
		return view('guest.post', compact('title', 'model'));
	}

	public function allGaleri(Request $r)
	{
		$model = GaleriKegiatan::orderBy('created_at', 'desc')->paginate(10);
		if (!empty($r->get('q'))) {
			$model = GaleriKegiatan::where('title', 'like', '%' . $r->get('q') . '%')->orderBy('created_at')->paginate(10);
		}
		$title = 'Semua Galeri';
		return view('guest.galeri-kegiatan', compact('model', 'title'));
	}

	public function pageSlug($slug)
	{
		$model = Halaman::where('slug', $slug)->first();
		// dd($model);
		$title = 'Halaman Detal';
		return view('guest.Pages', compact('title', 'model'));
	}

	public function slugGaleri($slug)
	{
		$model = GaleriKegiatan::where('slug', $slug)->firstOrFail();
		$title = 'Galeri Kegiatan';

		return view('guest.kegiatan', compact('model', 'title'));
	}

	public function search(Request $request)
	{
		$model = [];
		if (isset($request->search)) {
			$model = Post::leftJoin('categories', 'posts.category_id', '=', 'categories.id')
				->where('posts.title', 'like', '%' . $request->search . '%')
				->orWhere('posts.body', 'like', '%' . $request->search . '%')
				->orWhere('categories.name', 'like', '%' . $request->search . '%')
				->select('posts.*', 'categories.name as category_name')
				->paginate(10);
			// $model = Post::where('title','like','%'.$request->search.'%')
			// ->orWhere('body','like','%'.$request->search.'%')
			// ->paginate(10);
		}
		return view('guest.search')->with('model', $model);
	}

	public function informasiPublik($id)
	{
		$category = DB::table('kategori_file')
			->where(DB::raw('slug'), strtolower($id))
			->first();
		// Jika kategori tidak ditemukan, kembalikan respon 404
		if (!$category) {
			abort(404, 'Belum Ada Data');
		}

		// Ambil dokumen berdasarkan ID kategori
		$fileInformasi = DB::table('dokumens')
			->join('kategori_file', 'dokumens.id_file', '=', 'kategori_file.id')
			->select('kategori_file.title as category_title', 'dokumens.*')
			->where('dokumens.id_file', $category->id)
			->orderBy('dokumens.id', 'DESC')
			->paginate(10);
		return view('guest.informasi_file', compact('fileInformasi', 'category'));
	}

	public function totalDownload($id_file, $id)
	{

		$cek =  updateCountDownload($id_file, $id);
		//   dd($cek);
		$file = DB::table('dokumens')->where('id', $id)->value('dokumen');
		// return response()->download(public_path("uploads/dokumen/$file") , "dow.pdf", [], "inline");

		return redirect("storage/$file");
	}

	public function allRegulasi($regulasi_slug)
	{

		$category = DB::table('dok_regulasis')->where('slug', $regulasi_slug)->first();

		// Jika kategori tidak ditemukan, kembalikan respon 404
		if (!$category) {
			abort(404, 'Belum Ada Data');
		}

		// Ambil dokumen berdasarkan ID kategori
		$files = DB::table('regulasis')
			->join('dok_regulasis', 'regulasis.id_dok_regulasis', '=', 'dok_regulasis.id')
			->select('dok_regulasis.title as category_title', 'regulasis.*')
			->where('regulasis.id_dok_regulasis', $category->id)
			->orderBy('regulasis.id', 'DESC')
			->paginate(10);
		return view('guest.regulasiFile', compact('files', 'category'));
	}


	public function forPermohonanInformasi()
	{
		return view('guest.formulir_permohonan_informasi');
	}

	public function forPermohonanInformasiStore(Request $request)
	{
		$validator = Validator::make($request->all(), [
			'foto_ktp' => 'required|mimes:jpeg,png,jpg|max:4048',
			'nama_permohonan' => 'string|required',
			'no_ktp' => 'digits:16|required',
			'no_hp' => 'digits:12|required',
		]);

		if ($validator->fails()) {
			return redirect()->back()->withErrors($validator)->withInput();
		}
		$file = $request->file('foto_ktp');
		$filename = time() . '.' . $file->getClientOriginalExtension();
		$file->move('foto_ktp/', $filename);

		$data = [
			'nama_permohonan' => $request->nama_permohonan,
			'foto_ktp' => $filename,
			'no_hp' => $request->no_hp,
			'email' => $request->email,
			'no_ktp' => $request->no_ktp,
			'alamat' => $request->alamat,
			'no_hp' => $request->no_hp,
			'nomor_pengesahan' => $request->nomor_pengesahan,
			'rincian_informasi' => $request->rincian_informasi,
			'pekerjaan' => $request->pekerjaan,
			'tujuan_permohonan' => $request->tujuan_permohonan,
			'status' => 0,
			'created_at' => Carbon::now(),
		];
		// return $data;
		DB::table('permohonan_informasi')->insert($data);
		return redirect()->back()->with('success', 'Permohonan Informasi Berhasil Dikirim');;
	}

	public function forPermohonanKeberatan()
	{
		$title = 'Formulir Permohonan Keberatan';
		return view('guest.formulir_keberatan', compact('title'));
	}
	public function forPermohonanKeberatanStore(Request $request)
	{
		$validator = Validator::make($request->all(), [
			'nama_permohonan' => 'string|required',
		]);

		if ($validator->fails()) {
			return redirect()->back()->withErrors($validator)->withInput();
		}
		$data = [
			'nama_permohonan' => $request->nama_permohonan,
			'no_daftar' => $request->no_daftar,
			'tujuan_pemohon' => $request->tujuan_pemohon,
			'alamat' => $request->alamat,
			'street_address' => $request->street_address,
			'apertemen' => $request->apertemen,
			'provinsi' => $request->provinsi,
			'city' => $request->city,
			'negara' => $request->negara,
			'pekerjaan' => $request->pekerjaan,
			'no_hp' => $request->no_hp,
			'email' => $request->email,
			'nama_kuasa_pemohon' => $request->nama_kuasa_pemohon,
			'alamat_kuasa_pemohon' => $request->alamat_kuasa_pemohon,
			'street_address_kuasa_pemohon' => $request->street_address_kuasa_pemohon,
			'apertemen_kuasa_pemohon' => $request->apertemen_kuasa_pemohon,
			'provinsi_kuasa_pemohon' => $request->provinsi_kuasa_pemohon,
			'city_kuasa_pemohon' => $request->city_kuasa_pemohon,
			'negara_kuasa_pemohon' => $request->negara_kuasa_pemohon,
			'no_hp_kuasa_pemohon' => $request->no_hp_kuasa_pemohon,
			'alasan_pengajuan' => implode(',', $request->alasan_pengajuan),
			'kasus_posisi' => $request->kasus_posisi,
			'status' => 0,
			'created_at' => Carbon::now(),
		];
		DB::table('pengajuan_keberatan')->insert($data);
		return redirect()->back()->with('success', 'Permohonan Keberatan Berhasil Dikirim');
	}

	public function opiniAll()
	{
		$opiniAll = DB::table('posts')
			->join('categories', 'posts.category_id', '=', 'categories.id')
			->select('categories.name', 'posts.*')
			->where('categories.id', '=', 5)
			->orderBy('posts.id', 'DESC')->get();

		return view('guest.opiniAll', compact('opiniAll'));
	}
}
