<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix'=>"specialities",'as'=>"specialities."],function () {
    Route::get('/',[\App\Http\Controllers\Dash\SpecialityController::class,'getAll'])->name('all');
    Route::get('/add',[\App\Http\Controllers\Dash\SpecialityController::class,'add'])->name('add');
    Route::post('/create',[\App\Http\Controllers\Dash\SpecialityController::class,'create'])->name('create');
    Route::get('/edit/{id}',[\App\Http\Controllers\Dash\SpecialityController::class,'edit'])->name('edit');
    Route::post('/update/{id}',[\App\Http\Controllers\Dash\SpecialityController::class,'update'])->name('update');
    Route::get('/delete/{id}',[\App\Http\Controllers\Dash\SpecialityController::class,'delete'])->name('delete');
});
