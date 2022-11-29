<?php

use Illuminate\Support\Facades\Route;
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

Route::group(['middleware' => ['auth']], function () {
    Route::get('/',   [AdminController::class, 'index'])->name('admin');
    Route::get('delete-json/{id}',   [AdminController::class, 'delete'])->name('delete-json');
    Route::get('edit-json/{id}',   [AdminController::class, 'edit'])->name('edit-json');
    Route::post('save-json/{id}',   [AdminController::class, 'update'])->name('update-json');
});

Auth::routes([
    'register' => false,
    'reset' => false,
    'verify' => false,
]);
