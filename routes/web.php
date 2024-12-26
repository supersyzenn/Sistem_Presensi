<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\PenggunaController;
use App\Http\Controllers\Admin\KelasController;
use App\Http\Controllers\Admin\SemesterController;
use App\Http\Controllers\Admin\TahunAjaranController;
use App\Http\Controllers\Admin\MapelController;
use App\Http\Controllers\Admin\JadwalController;
use App\Http\Controllers\Admin\InfaqController;
use App\Http\Controllers\Admin\SiswaController;
use App\Http\Controllers\Admin\GuruController;
use App\Http\Controllers\Admin\TendikController;

use App\Http\Controllers\User\DashboardUserController;
use App\Http\Controllers\User\ProfileUserController;
use App\Http\Controllers\User\PresensiController;
use App\Http\Controllers\User\JadwalUserController;

//pwa
Route::get('/offline', function () {
    return view('vendor.laravelpwa.offline');
});

// Update route '/' untuk mengecek status login
Route::get('/', function () {
    // Jika sudah login
    if (Auth::check()) {
        if (Auth::user()->role === 'admin') {
            return redirect()->route('admin.dashboard');
        }
        return redirect()->route('user.dashboard');
    }
    // Jika belum login
    return view('welcome');
});

// Route untuk admin
Route::middleware(['auth', 'checkRole:admin'])->prefix('admin')->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

    Route::get('/profile', [ProfileController::class, 'index'])->name('admin.profile');
    Route::post('/profile/update-password', [ProfileController::class, 'updatePassword'])->name('admin.profile.update-password');

    Route::resource('pengguna', PenggunaController::class, ['as' => 'admin']);

    // Kelas Routes
    Route::get('/kelas', [KelasController::class, 'index'])->name('admin.kelas.index');
    Route::post('/kelas', [KelasController::class, 'store'])->name('admin.kelas.store');
    Route::put('/kelas/{id}', [KelasController::class, 'update'])->name('admin.kelas.update');
    Route::delete('/kelas/{id}', [KelasController::class, 'destroy'])->name('admin.kelas.destroy');

    // Semester Routes
    Route::get('/semester', [SemesterController::class, 'index'])->name('admin.semester.index');
    Route::post('/semester', [SemesterController::class, 'store'])->name('admin.semester.store');
    Route::put('/semester/{id}', [SemesterController::class, 'update'])->name('admin.semester.update');
    Route::delete('/semester/{id}', [SemesterController::class, 'destroy'])->name('admin.semester.destroy');

    // Tahun Ajaran Routes
    Route::get('/tahun-ajaran', [TahunAjaranController::class, 'index'])->name('admin.tahunajar.index');
    Route::post('/tahun-ajaran', [TahunAjaranController::class, 'store'])->name('admin.tahunajar.store');
    Route::put('/tahun-ajaran/{id}', [TahunAjaranController::class, 'update'])->name('admin.tahunajar.update');
    Route::delete('/tahun-ajaran/{id}', [TahunAjaranController::class, 'destroy'])->name('admin.tahunajar.destroy');

    // Mapel Routes
    Route::get('/mapel', [MapelController::class, 'index'])->name('admin.mapel.index');
    Route::post('/mapel', [MapelController::class, 'store'])->name('admin.mapel.store');
    Route::put('/mapel/{id}', [MapelController::class, 'update'])->name('admin.mapel.update');
    Route::delete('/mapel/{id}', [MapelController::class, 'destroy'])->name('admin.mapel.destroy');

    // Jadwal Routes
    Route::resource('jadwal', JadwalController::class, ['as' => 'admin']);

    Route::resource('infaq', InfaqController::class, ['as' => 'admin']);

    // Siswa Routes
    Route::get('/siswa', [SiswaController::class, 'index'])->name('admin.siswa.index');
    Route::post('/siswa', [SiswaController::class, 'store'])->name('admin.siswa.store');
    Route::put('/siswa/{id}', [SiswaController::class, 'update'])->name('admin.siswa.update');
    Route::delete('/siswa/{id}', [SiswaController::class, 'destroy'])->name('admin.siswa.destroy');

    Route::resource('guru', GuruController::class, ['as' => 'admin']);

    // Tendik Routes
    Route::get('/tendik', [TendikController::class, 'index'])->name('admin.tendik.index');
    Route::post('/tendik', [TendikController::class, 'store'])->name('admin.tendik.store');
    Route::put('/tendik/{id}', [TendikController::class, 'update'])->name('admin.tendik.update');
    Route::delete('/tendik/{id}', [TendikController::class, 'destroy'])->name('admin.tendik.destroy');
});

// Route untuk user (guru)
Route::middleware(['auth', 'checkRole:user'])->prefix('user')->group(function () {
    // Dashboard
    route::get('/dashboard', [DashboardUserController::class, 'index'])->name('user.dashboard');

    // Profile
    Route::get('/profile', [ProfileUserController::class, 'index'])->name('user.profile');
    Route::post('/profile/update-password', [ProfileUserController::class, 'updatePassword'])->name('user.profile.update-password');

    // Jadwal routes
    Route::controller(JadwalUserController::class)->group(function () {
        Route::get('/jadwal', 'index')->name('user.jadwal');
    });

    Route::post('/pertemuan/store', [PertemuanController::class, 'store'])->name('pertemuan.store');


    // Presensi routes
    Route::controller(PresensiController::class)->group(function () {
        Route::get('/presensi/list', 'list')->name('user.presensi.list');
        Route::get('/presensi', 'index')->name('user.presensi');
        Route::get('/presensi/jadwal/{id}', 'getJadwalDetail')->name('user.presensi.jadwal.detail');
        Route::post('/presensi/store', 'storePresensi')->name('user.presensi.store');
        Route::get('/presensi/{id}/edit', 'edit')->name('user.presensi.edit');
        Route::put('/presensi/{id}', 'update')->name('user.presensi.update');
        Route::delete('/presensi/{id}/delete', 'destroy')->name('user.presensi.destroy');
        Route::get('/presensi/{id}/export-pdf', 'exportPDF')->name('user.presensi.export-pdf');
    });

    Route::post('/pertemuan/store', [PertemuanController::class, 'store'])->name('pertemuan.store');

});

// Update redirect setelah login
Route::get('/dashboard', function () {
    if (Auth::user()->role === 'admin') {
        return redirect()->route('admin.dashboard');
    }
    return redirect()->route('user.dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';
