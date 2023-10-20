<?php

use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\ProfileController;
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
    return view('home');
})->name('/');


Route::prefix('/admin')->middleware(['auth', 'isAdmin'])->group(function () {

    Route::controller(AdminDashboardController::class)->group(function () {
        Route::get('/dashboard', 'home')->name('admin-dashboard');
        Route::get('/order', 'order')->name('admin-order');
    });
});


Route::middleware('auth')->group(function () {

    Route::controller(PesananController::class)->group(function () {

        Route::get('/pesan/{id}', 'pesan');
        Route::get('/list-pesanan', 'history')->name('list-pesanan');
        Route::get('/list-pesanan/detail/{id}', 'listDetail')->name('list-pesanan-detail');
        Route::get('/payment/{noPesan}', 'payment')->name('payment');
        Route::post('/payment-confirm/-{noPesan}', 'confirmPayment')->name('confirm');
    });

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
