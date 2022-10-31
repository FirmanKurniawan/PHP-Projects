<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\TodoListController;
use App\Http\Controllers\TaskDetailController;
use App\Http\Controllers\AdminController;

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


Auth::routes();

Route::middleware(['guest', 'users'])->group(function () { 
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
});

Route::prefix('users/')->name('users.')->group(function () {
    Route::get('/home', [TodoListController::class, 'index'])->name('index-home');
    Route::post('/simpan-task', [TodoListController::class, 'saveTask'])->name('save-task');
    Route::put('/{id}/update-task', [TodoListController::class, 'updateTask'])->name('update-task');
    Route::post('/{id}/edit-task', [TodoListController::class, 'editTask'])->name('edit-task');
    Route::post('/{id}/selesai', [TodoListController::class, 'doneTask'])->name('done-task');
    Route::post('/{id}/hapus-task', [TodoListController::class, 'deleteTask'])->name('delete-task');
    Route::get('/{id}/detail-task', [TaskDetailController::class, 'index'])->name('detail-task');
    Route::post('/{id}/detail-task-create', [TaskDetailController::class, 'create'])->name('detail-task-create');

    Route::middleware('auth:users', 'verified')->group(function () {
          Route::post('logout', [LoginController::class, 'logout'])->name('logout');
    });
});
