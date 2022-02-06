<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix'=>'doctors', 'as'=>'doctors.'], function (){
    Route::get('/', [\App\Http\Controllers\Dash\DoctorController::class, 'index'])->name('all');
    Route::get('/filter', [\App\Http\Controllers\Dash\DoctorController::class, 'filter'])->name('filter');
    Route::get('/add', [\App\Http\Controllers\Dash\DoctorController::class, 'add'])->name('add');
    Route::post('/create', [\App\Http\Controllers\Dash\DoctorController::class, 'create'])->name('create');
    Route::get('/edit/{id}', [\App\Http\Controllers\Dash\DoctorController::class, 'edit'])->name('edit');
    Route::post('/update/{id}', [\App\Http\Controllers\Dash\DoctorController::class, 'update'])->name('update');
    Route::get('/delete/{id}', [\App\Http\Controllers\Dash\DoctorController::class, 'delete'])->name('delete');

});
