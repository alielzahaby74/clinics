<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix'=>'shifts', 'as'=>'shifts.'], function (){
    Route::get('/', [\App\Http\Controllers\Dash\ShiftController::class, 'index'])->name('all');
    Route::get('/filter', [\App\Http\Controllers\Dash\ShiftController::class, 'filter'])->name('filter');
    Route::get('/add', [\App\Http\Controllers\Dash\ShiftController::class, 'add'])->name('add');
    Route::post('/create', [\App\Http\Controllers\Dash\ShiftController::class, 'create'])->name('create');
    Route::get('/edit/{id}', [\App\Http\Controllers\Dash\ShiftController::class, 'edit'])->name('edit');
    Route::post('/update/{id}', [\App\Http\Controllers\Dash\ShiftController::class, 'update'])->name('update');
    Route::get('/delete/{id}', [\App\Http\Controllers\Dash\ShiftController::class, 'delete'])->name('delete');

});
