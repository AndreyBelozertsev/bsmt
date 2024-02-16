<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\MasterController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('pages.home.index');
});

Route::middleware('guest:web')->group(function () {

    Route::get('master-panel/login', [LoginController::class, 'index'])->name('login');

    Route::post('master-panel/login', [LoginController::class, 'store']);

});

Route::middleware(['auth:web'])->prefix('master-panel')->name('master.')->group(function () {

    Route::get('index', [MasterController::class,'index'])->name('index');

    Route::post('index', [ProductController::class,'store'])->name('product.store');

});

Route::get('logout', [LoginController::class, 'logout'])
    ->name('logout');

Route::get('product/{id}', [ProductController::class, 'show'])->name('product.show');
