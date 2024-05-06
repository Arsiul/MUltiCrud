<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderDtController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');


    Route::resource('customer', CustomerController::class);
    Route::resource('order', OrderController::class);
    Route::get('orderdetail2/{ID}', [OrderDtController::class, 'crear'])->name('orderdetail2.crear');
    Route::put('orderdetail2/{OID}/{PID}', [OrderDtController::class, 'updates'])->name('orderdetail2.updates');
    Route::get('orderdetail3/{OID}/{PID}', [OrderDtController::class, 'edits'])->name('orderdetail3.edits');
    Route::resource('orderdetail', OrderDtController::class);
    Route::delete('orderdetail/{OrderID}/{ProductID}', [OrderDtController::class, 'destroy']);
    

    
    //->name('order.delete')


});
