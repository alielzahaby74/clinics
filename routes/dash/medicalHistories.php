<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix'=>'medicalHistories', 'as'=>'medicalHistories.'], function (){
    Route::get('/add', [\App\Http\Controllers\Dash\MedicalHistoryController::class, 'add'])->name('add');
    Route::post('/create', [\App\Http\Controllers\Dash\MedicalHistoryController::class, 'create'])->name('create');
    Route::get('/edit/{id}', [\App\Http\Controllers\Dash\MedicalHistoryController::class, 'edit'])->name('edit');
    Route::post('/update/{id}', [\App\Http\Controllers\Dash\MedicalHistoryController::class, 'update'])->name('update');
    Route::get('/delete/{id}', [\App\Http\Controllers\Dash\MedicalHistoryController::class, 'delete'])->name('delete');

});
