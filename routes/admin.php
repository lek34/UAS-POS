<?php

use App\Models\PaymentKontrakBeli;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\Master\SupirController;
use App\Http\Controllers\Admin\Master\ArmadaController;
use App\Http\Controllers\Admin\Master\CustomerController;
use App\Http\Controllers\Admin\Master\SupplierController;
use App\Http\Controllers\Admin\Transaksi\KontrakBeliController;
use App\Http\Controllers\Admin\Transaksi\KontrakJualController;
use App\Http\Controllers\Admin\Transaksi\MuatBongkarController;
use App\Http\Controllers\Admin\Transaksi\Payment\PaymentKontrakBeliController;
use App\Http\Controllers\Admin\Transaksi\Payment\PaymentKontrakJualController;

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/admin', [DashboardController::class, 'index'])->middleware('auth')->name('admin.dashboard');

// Route::controller(ProfileController::class)->prefix('/profile')->name('profile.')->group(function(){

// });

Route::group(['middleware' => ['auth']], function () {
    Route::controller(SupplierController::class)->prefix('admin/master/supplier')->name('admin.master.supplier.')->group(function () {
        Route::get('/index', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/store', 'store')->name('store');
        Route::get('/show/{id}', 'show')->name('show');
        Route::get('/edit/{id}', 'edit')->name('edit');
        Route::put('/update/{id}', 'update')->name('update');
        Route::delete('/delete/{id}', 'destroy')->name('delete');
    });

    Route::controller(CustomerController::class)->prefix('admin/master/customer')->name('admin.master.customer.')->group(function () {
        Route::get('/index', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/store', 'store')->name('store');
        Route::get('/show/{id}', 'show')->name('show');
        Route::get('/edit/{id}', 'edit')->name('edit');
        Route::put('/update/{id}', 'update')->name('update');
        Route::delete('/delete/{id}', 'destroy')->name('delete');
    });

    Route::controller(ArmadaController::class)->prefix('admin/master/armada')->name('admin.master.armada.')->group(function () {
        Route::get('/index', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/store', 'store')->name('store');
        Route::get('/show/{id}', 'show')->name('show');
        Route::get('/edit/{id}', 'edit')->name('edit');
        Route::put('/update/{id}', 'update')->name('update');
        Route::delete('/delete/{id}', 'destroy')->name('delete');
    });

    Route::controller(SupirController::class)->prefix('admin/master/supir')->name('admin.master.supir.')->group(function () {
        Route::get('/index', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/store', 'store')->name('store');
        Route::get('/show/{id}', 'show')->name('show');
        Route::get('/edit/{id}', 'edit')->name('edit');
        Route::put('/update/{id}', 'update')->name('update');
        Route::delete('/delete/{id}', 'destroy')->name('delete');
    });


    Route::controller(KontrakBeliController::class)->prefix('admin/transaksi/kontrakbeli')->name('admin.transaksi.kontrakbeli.')->group(function () {
        Route::get('/index', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/store', 'store')->name('store');
        Route::get('/show/{id}', 'show')->name('show');
        Route::get('/edit/{id}', 'edit')->name('edit');
        Route::put('/update/{id}', 'update')->name('update');
        Route::delete('/delete/{id}', 'delete')->name('delete');
        //generate pdf
        Route::get('generatepdf/{id}', 'generatepdf')->name('generate.pdf');
    });

    Route::controller(KontrakJualController::class)->prefix('admin/transaksi/kontrakjual')->name('admin.transaksi.kontrakjual.')->group(function () {
        Route::get('/index', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/store', 'store')->name('store');
        Route::get('/show/{id}', 'show')->name('show');
        Route::get('/edit/{id}', 'edit')->name('edit');
        Route::put('/update/{id}', 'update')->name('update');
        Route::delete('/delete/{id}', 'destroy')->name('destroy');
        Route::get('generatepdf/{id}', 'generatepdf')->name('generate.pdf');
    });

    Route::controller(MuatBongkarController::class)->prefix('admin/transaksi/muatbongkar')->name('admin.transaksi.muatbongkar.')->group(function () {
        Route::get('/index', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/store', 'store')->name('store');
        Route::get('/show/{id}', 'show')->name('show');
        Route::get('/edit/{id}', 'edit')->name('edit');
        Route::put('/update/{id}', 'update')->name('update');
        Route::delete('/delete/{id}', 'destroy')->name('delete');
    });

    Route::controller(PaymentKontrakBeliController::class)->middleware('auth')->prefix('admin/transaksi/payment/kontrakbeli')->name('admin.transaksi.payment.kontrakbeli.')->group(function () {
        Route::get('/index/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/store', 'store')->name('store');
        Route::get('/show/{id}', 'show')->name('show');
        Route::get('/edit/{id}', 'edit')->name('edit');
        Route::put('/update/{id}', 'update')->name('update');
        Route::delete('/delete/{id}', 'destroy')->name('delete');
    });

    Route::controller(PaymentKontrakJualController::class)->middleware('auth')->prefix('admin/transaksi/payment/kontrakjual')->name('admin.transaksi.payment.kontrakjual.')->group(function () {
        Route::get('/index/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/store', 'store')->name('store');
        Route::get('/show/{id}', 'show')->name('show');
        Route::get('/edit/{id}', 'edit')->name('edit');
        Route::put('/update/{id}', 'update')->name('update');
        Route::delete('/delete/{id}', 'destroy')->name('delete');
    });
});


