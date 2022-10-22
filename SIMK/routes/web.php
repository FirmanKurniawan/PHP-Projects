<?php

use App\Http\Controllers\ExportController;
use App\Http\Controllers\OmsetController;
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
    Route::get('/', [OmsetController::class, 'index'])->name('dashboard');
    Route::get('/omset/create', [OmsetController::class, 'create'])->name('omset.create');
    Route::post('/omset', [OmsetController::class, 'store'])->name('omset.store');
    Route::get('/omset/edit/{omset}', [OmsetController::class, 'edit'])->name('omset.edit');
    Route::put('/omset/{omset}', [OmsetController::class, 'update'])->name('omset.update');
    Route::delete('/omset/{omset}', [OmsetController::class, 'delete'])->name('omset.delete');

    Route::get('/export/database', [ExportController::class, 'database'])->name('export.database');
    Route::get('/export/excel', [ExportController::class, 'excel'])->name('export.excel');
    Route::get('/export/word', [ExportController::class, 'word'])->name('export.word');
    Route::get('/export/pdf', [ExportController::class, 'pdf'])->name('export.pdf');
});
require __DIR__ . '/auth.php';
