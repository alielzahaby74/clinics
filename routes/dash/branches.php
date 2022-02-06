<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix'=>"branches",'as'=>"branches."],function () {
    Route::get('/',[\App\Http\Controllers\Dash\BranchController::class,'getAll'])->name('all');
    Route::get('/add',[\App\Http\Controllers\Dash\BranchController::class,'add'])->name('add');
    Route::post('/create',[\App\Http\Controllers\Dash\BranchController::class,'create'])->name('create');
    Route::get('/edit/{id}',[\App\Http\Controllers\Dash\BranchController::class,'edit'])->name('edit');
    Route::post('/update/{id}',[\App\Http\Controllers\Dash\BranchController::class,'update'])->name('update');
    Route::get('/delete/{id}',[\App\Http\Controllers\Dash\BranchController::class,'delete'])->name('delete');
});
