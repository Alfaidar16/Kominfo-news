<?php

use App\Http\Controllers\BannerController;
use App\Http\Controllers\DaftarPermohonanController;
use App\Http\Controllers\GaleriKegiatanController;
use App\Http\Controllers\HalamanController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\InformasiPublikController;
use App\Http\Controllers\KategoriBeritaController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\MenuListController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProfilWebsiteController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\RegulasiController;
use App\Http\Controllers\VideoKegiatanController;
use App\Models\GaleriKegiatan;
use App\Models\VideoKegiatan;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Redirect;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [IndexController::class, 'index']);
Route::get('/post/{slug}', [IndexController::class, 'postSlug'])->name('post.slug');
Route::get('/semua-galeri', [IndexController::class, 'allGaleri'])->name('galeri.all');
Route::get('/galeri/{slug}', [IndexController::class, 'galeriSlug'])->name('galeri.slug');
Route::get('/semua/berita', [IndexController::class, 'postAll'])->name('post.all');
Route::get('/search', [IndexController::class, 'search'])->name('search');
Route::get('/page/{slug}', [IndexController::class, 'pageSlug'])->name('page.slug');
Route::get('/informasi/publik/{slug}', [IndexController::class, 'informasiPublik']);
Route::get('/countDowloand/{id_file}/{id}', [IndexController::class, 'totalDownload'])->name('total.download');
Route::get('/front-regulasi/{regulasi_slug}', [IndexController::class, 'allRegulasi']);
Route::get('/front/formulir_permohonan/informasi', [IndexController::class, 'forPermohonanInformasi']);
Route::post('/front/formulir_permohonan/informasi/store', [IndexController::class, 'forPermohonanInformasiStore'])->name('Permohonan.informasi.store');
Route::get('/front/formulir_pengajuan/keberatan', [IndexController::class, 'forPermohonanKeberatan']);
Route::post('/front/formulir_pengajuan/keberatan/store', [IndexController::class, 'forPermohonanKeberatanStore'])->name('Permohonan.keberatan.store');
Route::get('/opini/all',  [IndexController::class, 'opiniAll'])->name('opini-all');

// Route::get('/hubungi-kami', function () {
//     return Redirect::to('https://chat.whatsapp.com/C89c42lHacfByDtNyUnk7m');
// });
Route::get('/dashboard', function () {
    return view('admin.dashboard');
    // return view('admin.layouts.app');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::prefix('/panel')->group(function () {
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

        Route::prefix('user')->group(function () {
            Route::get('/', [UsersController::class, 'index'])->name('user.index');
            Route::post('/store', [UsersController::class, 'store'])->name('user.store');
            Route::post('/edit', [UsersController::class, 'edit'])->name('user.edit');
            Route::put('/update', [UsersController::class, 'update'])->name('user.update');
            Route::post('/destroy', [UsersController::class, 'destroy'])->name('user.destroy');
        });

        Route::prefix('posts')->group(function () {
            Route::get('/', [PostController::class, 'index'])->name('post.index');
            Route::get('/create', [PostController::class, 'create'])->name('post.create');
            Route::get('/show', [PostController::class, 'show'])->name('post.show');
            Route::get('/edit/{id}', [PostController::class, 'edit'])->name('post.edit');
            Route::post('/store', [PostController::class, 'store'])->name('post.store');
            Route::put('/update', [PostController::class, 'update'])->name('post.update');
            Route::post('/destroy', [PostController::class, 'destroy'])->name('post.destroy');
        });

        Route::prefix('categories')->group(function () {
            Route::get('/', [KategoriBeritaController::class, 'index'])->name('category.index');
            Route::post('/edit', [KategoriBeritaController::class, 'edit'])->name('category.edit');
            Route::post('/store', [KategoriBeritaController::class, 'store'])->name('category.store');
            Route::put('/update', [KategoriBeritaController::class, 'update'])->name('category.update');
            Route::post('/destroy', [KategoriBeritaController::class, 'destroy'])->name('category.destroy');
        });

        Route::prefix('halaman')->group(function () {
            Route::get('/', [HalamanController::class, 'index'])->name('halaman.index');
            Route::get('/create', [HalamanController::class, 'create'])->name('halaman.create');
            Route::get('/edit/{id}', [HalamanController::class, 'edit'])->name('halaman.edit');
            Route::post('/store', [HalamanController::class, 'store'])->name('halaman.store');
            Route::put('/update', [HalamanController::class, 'update'])->name('halaman.update');
            Route::post('/destroy', [HalamanController::class, 'destroy'])->name('halaman.destroy');
        });

        Route::prefix('kegiatan')->group(function () {
            Route::get('/', [GaleriKegiatanController::class, 'index'])->name('kegiatan.index');
            Route::get('/create', [GaleriKegiatanController::class, 'create'])->name('kegiatan.create');
            Route::get('/edit/{id}', [GaleriKegiatanController::class, 'edit'])->name('kegiatan.edit');
            Route::post('/store', [GaleriKegiatanController::class, 'store'])->name('kegiatan.store');
            Route::put('/update', [GaleriKegiatanController::class, 'update'])->name('kegiatan.update');
            Route::post('/destroy', [GaleriKegiatanController::class, 'destroy'])->name('kegiatan.destroy');
        });

        Route::prefix('video-kegiatan')->group(function () {
            Route::get('/', [VideoKegiatanController::class, 'index'])->name('video_kegiatan.index');
            Route::post('/store', [VideoKegiatanController::class, 'store'])->name('video_kegiatan.store');
            Route::post('/edit', [VideoKegiatanController::class, 'edit'])->name('video_kegiatan.edit');
            Route::put('/update', [VideoKegiatanController::class, 'update'])->name('video_kegiatan.update');
            Route::post('/destroy', [VideoKegiatanController::class, 'destroy'])->name('video_kegiatan.destroy');
        });

        Route::prefix('banner')->group(function () {
            Route::get('/', [BannerController::class, 'index'])->name('banner.index');
            Route::post('/edit', [BannerController::class, 'edit'])->name('banner.edit');
            Route::post('/store', [BannerController::class, 'store'])->name('banner.store');
            Route::put('/update', [BannerController::class, 'update'])->name('banner.update');
            Route::post('/destroy', [BannerController::class, 'destroy'])->name('banner.destroy');
        });

        Route::prefix('regulasi')->group(function () {
            Route::get('/', [RegulasiController::class, 'index'])->name('regulasi.index');
            Route::post('/edit', [RegulasiController::class, 'edit'])->name('regulasi.edit');
            Route::post('/store', [RegulasiController::class, 'store'])->name('regulasi.store');
            Route::put('/update', [RegulasiController::class, 'update'])->name('regulasi.update');
            Route::post('/destroy', [RegulasiController::class, 'destroy'])->name('regulasi.destroy');
        });

        Route::prefix('informasi_publik')->group(function () {
            Route::get('/', [InformasiPublikController::class, 'index'])->name('informasi_publik.index');
            Route::post('/store', [InformasiPublikController::class, 'store'])->name('informasi_publik.store');
            Route::post('/edit', [InformasiPublikController::class, 'edit'])->name('informasi_publik.edit');
            Route::put('/update', [InformasiPublikController::class, 'update'])->name('informasi_publik.update');
            Route::post('/destroy', [InformasiPublikController::class, 'destroy'])->name('informasi_publik.destroy');
        });

        Route::prefix('daftar-permohonan')->group(function () {
            Route::get('/informasi', [DaftarPermohonanController::class, 'daftarPermohonanInformasi'])->name('daftar_permohonan.informasi');
            Route::post('informasi/setuju', [DaftarPermohonanController::class, 'isSetuju'])->name('permohonan.isSetuju');
            Route::post('informasi/tolak', [DaftarPermohonanController::class, 'isTolak'])->name('permohonan.isTolak');
            Route::get('pengajuan/keberatan', [DaftarPermohonanController::class, 'pengajuanKeberatan'])->name('daftar_permohonan.pengajuanKeberatan');
            Route::post('pengajuan/setuju', [DaftarPermohonanController::class, 'PengajuanisSetuju'])->name('pengajuan.isSetuju');
            Route::post('pengajuan/tolak', [DaftarPermohonanController::class, 'PengajuanisTolak'])->name('Pengajuan.isTolak');
        });

        Route::prefix('identitas')->group(function () {
            Route::get('/', [ProfilWebsiteController::class, 'profilWebsite'])->name('profil.website');
            Route::put('/update', [ProfilWebsiteController::class, 'updateProfilWebsite'])->name('profil.update');
            Route::get('/sambutan', [ProfilWebsiteController::class, 'sambutan'])->name('profil.sambutan');
            Route::put('/sambutan/update', [ProfilWebsiteController::class, 'sambutanUpdate'])->name('sambutan.update');
        });
        Route::prefix('menu')->group(function () {
            Route::get('/', [MenuController::class, 'index'])->name('menu.index');
            Route::post('/store', [MenuController::class, 'store'])->name('menu.store');
            Route::post('/edit', [MenuController::class, 'edit'])->name('menu.edit');
            Route::put('/update', [MenuController::class, 'update'])->name('menu.update');
            Route::post('/destroy', [MenuController::class, 'destroy'])->name('menu.destroy');
        });

        Route::prefix('menu/list')->group(function () {
            Route::get('/', [MenuListController::class, 'index'])->name('menuList.index');
            Route::get('/create', [MenuListController::class, 'create'])->name('menuList.create');
            Route::post('/store', [MenuListController::class, 'store'])->name('menuList.store');
            Route::post('/update', [MenuListController::class, 'updateOrder'])->name('menuList.update');
            Route::post('/destroy', [MenuListController::class, 'destroy'])->name('menuList.destroy');
        });
    });
});

require __DIR__ . '/auth.php';
