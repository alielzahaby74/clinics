<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix'=>'patients', 'as'=>'patients.'], function (){
    Route::get('/', [\App\Http\Controllers\Dash\PatientController::class, 'index'])->name('all');
    Route::get('/filter', [\App\Http\Controllers\Dash\PatientController::class, 'filter'])->name('filter');
    Route::get('/add', [\App\Http\Controllers\Dash\PatientController::class, 'add'])->name('add');
    Route::post('/create', [\App\Http\Controllers\Dash\PatientController::class, 'create'])->name('create');
    Route::get('/edit/{id}', [\App\Http\Controllers\Dash\PatientController::class, 'edit'])->name('edit');
    Route::post('/update/{id}', [\App\Http\Controllers\Dash\PatientController::class, 'update'])->name('update');
    Route::get('/delete/{id}', [\App\Http\Controllers\Dash\PatientController::class, 'delete'])->name('delete');
    Route::get('/getCities/{id?}', [\App\Http\Controllers\Dash\PatientController::class, 'getCities'])->name('getCities');

});
