<?php

use App\Http\Controllers\JabatanController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\LokasiController;
use App\Http\Controllers\NomorController;
use App\Http\Controllers\PangkatController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\PeriodeController;
use App\Http\Controllers\SuratKeluarController;
use App\Http\Controllers\SuratMasukController;
use App\Models\Jabatan;
use App\Models\Kategori;
use App\Models\Lokasi;
use App\Models\Nomor;
use App\Models\Pangkat;
use App\Models\Pegawai;
use App\Models\Periode;
use App\Models\SuratKeluar;
use App\Models\SuratMasuk;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware(['auth'])->group(function () {
    Route::get('/', function () {
        return view('dashboard', [
            'surat_keluar' => SuratKeluar::all(),
            'surat_masuk' => SuratMasuk::all(),
            'pegawai' => Pegawai::all(),
            'jabatan' => Jabatan::all(),
            'pangkat' => Pangkat::all(),
            'lokasi' => Lokasi::all(),
            'nomor' => Nomor::all(),
            'periode' => Periode::all(),
            'kategori' => Kategori::all(),
        ]);
    })->name('home');

    Route::prefix('master')->group(function () {
        Route::resources([
            'jabatan' => JabatanController::class,
            'kategori' => KategoriController::class,
            'lokasi' => LokasiController::class,
            'nomor' => NomorController::class,
            'pangkat' => PangkatController::class,
            'pegawai' => PegawaiController::class,
            'periode' => PeriodeController::class,
        ]);
    });

    Route::name('surat.')->group(function () {
        Route::resources([
            'surat-keluar' => SuratKeluarController::class,
            'surat-masuk' => SuratMasukController::class,
        ]);
        Route::get('surat-masuk/{surat_masuk}/download', [SuratMasukController::class, 'download'])->name('surat-masuk.download');
        Route::get('surat-keluar/{surat_keluar}/export', [SuratKeluarController::class, 'export'])->name('surat-keluar.export');
    });
});

require __DIR__ . '/auth.php';
