<?php

use Illuminate\Support\Facades\DB;


function getAllPost($limit, $start = 0)
{
	return \App\Models\Post::where('status', 'PUBLISHED')->offset($start)->limit($limit)->orderBy('created_at', 'desc')->get();
}
function getPost($slugCategory,  $start = 0, $limit)
{
	return DB::table('posts')->leftJoin('categories', function ($q) {
		$q->on('posts.category_id', '=', 'categories.id');
	})->where('categories.slug', $slugCategory)
		->where('status', 'PUBLISHED')
		->offset($start)
		->limit($limit)
		->orderBy('posts.id', 'desc')
		->get([
			'posts.image',
			'posts.slug',
			'posts.title',
			'posts.created_at'
		]);
}


function getGaleriKegiatan()
{
	return \App\Models\GaleriKegiatan::orderBy('post_date', 'DESC')->offset(0)->limit(6)->get();
}

function hitstat($is_hit = false)
{

	if ($is_hit) {
		$hitstat =  \App\Models\Hitsat::updateOrCreate(
			[
				'daya' => date('d'),
				'month' => date('m'),
				'year' => date('Y'),
				'hits' => 0

			],
			[
				'hits' => \Illuminate\Support\Facades\DB::raw('hits + 1'),
			]
		);
	}

	$today = \App\Models\Hitsat::where('daya', date('d'))->where('month', date('m'))->where('year', date('Y'))->sum('hits');
	$month = \App\Models\Hitsat::where('month', date('m'))->where('year', date('Y'))->sum('hits');
	$total = \App\Models\Hitsat::sum('hits');


	return compact('today', 'month', 'total');
}

function totalDownload($dokumen, $id_file)
{
	$count = DB::table('total_download_dokumen')
		->where('dokumen', $dokumen)
		->where('id_file', $id_file)->value('count');
	//    dd($count, $dokumen, $kategori_id);
	return $count ?? 0;
}

function updateCountDownload($dokumen, $id_file)
{
	$count = DB::table('total_download_dokumen')
		->where('dokumen', $dokumen)
		->where('id_file', $id_file)->value('count');
	//   dd($count);
	if ($count > 0) {
		DB::table('total_download_dokumen')->where('dokumen', $dokumen)
			->where('id_file', $id_file)->update([
				'count' => $count + 1
			]);
	} else {
		DB::table('total_download_dokumen')->insert([
			'dokumen' => $dokumen,
			'id_file' => $id_file,
			'count' => 1
		]);
	}
	return $count + 1;
}
