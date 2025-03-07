<?php

use App\Http\Controllers\CMS\CMSRekruterController;
use App\Http\Controllers\CMS\CMSArtikelController;
use App\Http\Controllers\CMS\CMSLowonganController;
use App\Http\Controllers\CMS\CMSBerandaController;
use App\Http\Controllers\CMS\CMSKeterserapanController;
use App\Http\Controllers\CMS\CMSFooterController;
use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\LowonganController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\PerusahaanController;
use App\Http\Controllers\PendidikanUserController;
use App\Http\Controllers\PekerjaanUserController;
use App\Http\Controllers\NavbarController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LamaranController;
use App\Http\Controllers\WirausahaController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TracerController;
use App\Http\Controllers\TracerAdminController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
|
 Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Public Routes
Route::get('/', [FrontController::class, 'home'])->name('/');
Route::get('/lowongan', [FrontController::class, 'lowongan'])->name('lowongan');
Route::get('/openedlowongan/{id}', [FrontController::class, 'show'])->name('openedlowongan');
Route::get('/company', [FrontController::class, 'perusahaan'])->name('company');
Route::get('/openedcompany/{id}', [FrontController::class, 'detailperusahaan'])->name('openedcompany');
Route::get('/artikel', [FrontController::class, 'artikel'])->name('artikel');
Route::get('/artikel/{id}', [FrontController::class, 'allartikel'])->name('openedartikel');
Route::get('/dataKeterserapan', [FrontController::class, 'dataKeterserapan'])->name('dataKeterserapan');

// Login
Route::prefix('login')->name('login.')->group(function () {
    Route::get('/', [LoginController::class, 'index'])->name('index');
    Route::post('/', [LoginController::class, 'login'])->name('attempt');
});

Route::prefix('register')->name('register.')->group(function () {
    Route::get('/', [RegisterController::class, 'index'])->name('index');
    Route::post('/', [RegisterController::class, 'register'])->name('makeaccount');
});

// Admin Routes
Route::middleware('checkRole:admin')->group(function () {
    Route::name('dashboard-admin.')->group(function () {
        Route::get('/dashboardAdmin', [DashboardController::class, 'indexAdmin'])->name('indexAdmin');
        Route::get('/navbar', [NavbarController::class, 'getNotif']);
    });

    // Lowongan Routes
    Route::prefix('lowongan-list')->name('lowongan-admin.')->group(function () {
        Route::get('/', [LowonganController::class, 'index'])->name('index');
        Route::get('/{id}', [LowonganController::class, 'create'])->name('create');
        Route::post('/', [LowonganController::class, 'store'])->name('store');
        Route::put('/{id}', [LowonganController::class, 'update'])->name('update');
        Route::delete('/{id}', [LowonganController::class, 'destroy'])->name('destroy');
    });

    // Lamaran Routes
    Route::prefix('lamaran-list')->name('lamaran-admin.')->group(function () {
        Route::get('/export/{LowonganId}', [LamaranController::class, 'export'])->name('export');
        Route::get('/', [LamaranController::class, 'dataLamaran'])->name('dataLamaran');
        Route::get('/{id}', [LamaranController::class, 'detailLamaran'])->name('detailLamaran');
        Route::get('/send-email/{id}', [LamaranController::class, 'SendEmail'])->name('send.email');
    });

    // Artikel Routes
    Route::prefix('artikel-list')->name('artikel.')->group(function () {
        Route::get('/', [ArtikelController::class, 'index'])->name('index');
        Route::get('/tipsKarir', [ArtikelController::class, 'tipsKarir'])->name('tipsKarir');
        Route::get('/beritaWikrama', [ArtikelController::class, 'beritaWikrama'])->name('beritaWikrama');
        Route::post('/', [ArtikelController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [ArtikelController::class, 'edit'])->name('edit');
        Route::patch('/update/{artikel}', [ArtikelController::class, 'update'])->name('update');
        Route::delete('/delete/{id}', [ArtikelController::class, 'destroy'])->name('destroy');
    }); // Penutupan blok artikel-list


    Route::prefix('perusahaan-list')->name('perusahaan.')->group(function () {
        Route::get('/', [PerusahaanController::class, 'index'])->name('index');
        Route::post('/', [PerusahaanController::class, 'store'])->name('store');
        Route::put('/{id}', [PerusahaanController::class, 'update'])->name('update');
        Route::delete('/{id}', [PerusahaanController::class, 'destroy'])->name('destroy');
    }); // Penutupan blok perusahaan

    Route::prefix('TracerStudyAdmin')->name('tracerStudyAdmin.')->group(function () {
        Route::get('/export', [TracerAdminController::class, 'export'])->name('export');
        Route::get('/', [TracerAdminController::class, 'index'])->name('index');
        Route::get('/{id}', [TracerAdminController::class, 'show'])->name('show');
    });

    Route::prefix('CMS')->name('CMS.')->group(function () {
        Route::get('/settings-artikel', [CMSArtikelController::class, 'index'])->name('index-artikel');
        Route::get('/settings-beranda', [CMSBerandaController::class, 'index'])->name('index-beranda');
        Route::get('/settings-data-testimoni', [CMSBerandaController::class, 'dataTestimoni'])->name('data-testimoni');
        Route::delete('/{id}', [CMSBerandaController::class, 'destroyTestimoni'])->name(
            'testimoniDestroy');
        Route::put('/updateAbout/{id}', [CMSBerandaController::class, 'updateAbout'])->name('beranda.settings.updateAbout');
        Route::post('/', [CMSBerandaController::class, 'store'])->name('beranda.settings.store');
        Route::post('/store-about', [CMSBerandaController::class, 'storeAbout'])->name('beranda.settings.store-about');
        Route::get('/settings-lowongan', [CMSLowonganController::class, 'index'])->name('index-lowongan');
        Route::get('/settings-rekruter', [CMSRekruterController::class, 'index'])->name('index-rekruter');
        Route::get('/settings-data-keterserapan', [CMSKeterserapanController::class, 'index'])->name('index-keterserapan');
        Route::get('/settings-footer/', [CMSFooterController::class, 'index'])->name('index-footer');
        Route::get('/cms/footer/{id}/edit', [CMSFooterController::class, 'edit'])->name('footer.edit');
        Route::put('/cms/footer/{id}', [CMSFooterController::class, 'update'])->name('footer.update');
        Route::put('/cms/keunggulan/{id}', [CMSBerandaController::class, 'updateKeunggulan'])->name('keunggulan.update');
        Route::put('/cms/lowongan/{id}', [CMSLowonganController::class, 'update'])->name('lowongan.update');
        Route::put('/cms/rekruter/{id}', [CMSRekruterController::class, 'update'])->name('rekruter.update');
        Route::put('/cms/keterserapan/{id}', [CMSKeterserapanController::class, 'update'])->name('keterserapan.update');
    });

    Route::prefix('profile')->name('profile.')->group(function () {
        Route::get('/{id}', [ProfileController::class, 'detail'])->name('detail'); // Sebelumnya 'profile.detail', harus 'detail' saja.
        Route::get('/settings', [ProfileController::class, 'settings'])->name('settings');
        Route::post('/', [ProfileController::class, 'update'])->name('update');
        Route::post('/logout', [ProfileController::class, 'logout'])->name('logout');
    });
});


Route::middleware('checkRole:user')->group(function () {
    Route::middleware('trackVisitor')->group(function () {
        Route::name('dashboard-user.')->group(function () {
            Route::get('/dashboard', [DashboardController::class, 'indexUser'])->name('indexUser');
            Route::post('/logout', [DashboardController::class, 'logout'])->name('logout');
        });
        Route::prefix('lamaran')->name('lamaran.')->group(function () {
            Route::get('/', [LamaranController::class, 'index'])->name('index');
            Route::get('/list', [LamaranController::class, 'list'])->name('list'); // Mengubah route agar unik
            Route::post('/', [LamaranController::class, 'store'])->name('store');
        });


        Route::prefix('TracerStudy')->name('tracerStudy.')->group(function () {
            Route::get('/', [TracerController::class, 'index'])->name('index');
            Route::patch('/{id}', [TracerController::class, 'updateProfile'])->name('updateProfile');
            Route::post('/', [PekerjaanUserController::class, 'store'])->name('createPekerjaan');
            Route::patch('/pekerjaan/{id}', [PekerjaanUserController::class, 'update'])->name('updatePekerjaan');
            Route::post('/pendidikan', [PendidikanUserController::class, 'store'])->name('createPendidikan');
            Route::patch('/pendidikan/{id}', [PendidikanUserController::class, 'update'])->name('updatePendidikan');
            Route::post('/wirausaha', [WirausahaController::class, 'store'])->name('createWirausaha');
            Route::patch('/wirausaha/{id}', [WirausahaController::class, 'update'])->name('updateWirausaha');
        });
    });
});
