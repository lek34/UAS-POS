<?php

use App\Http\Controllers\Admin\Master\SupplierController;
use Illuminate\Support\Facades\Route;

Route::controller(SupplierController::class)->prefix('admin/master/supplier')->name('admin.master.supplier.')->middleware('auth')->group(function(){
    Route::get('/index', 'index')->name('index');
    Route::get('/create','create')->name('create');
    Route::post('/store','store')->name('store');
    Route::get('/show/{id}','show')->name('show');
    Route::get('/edit/{id}','edit')->name('edit');
    Route::put('/update/{id}','update')->name('update');
    Route::delete('/delete/{id}', 'destroy')->name('delete');
});
