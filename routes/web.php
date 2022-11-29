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

Route::get('/', function () {
    return view('welcome');
});

Route::get('admin',   [AdminController::class, 'index']);
Route::delete('delete-json',   [AdminController::class, 'index'])->name('delete-json');
Route::get('edit-json',   [AdminController::class, 'index'])->name('edit-json');
