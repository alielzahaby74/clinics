<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix'=>'appointments', 'as'=>'appointments.'], function (){
    Route::get('/', [\App\Http\Controllers\Dash\AppointmentController::class, 'index'])->name('all');
    Route::get('/filter', [\App\Http\Controllers\Dash\AppointmentController::class, 'filter'])->name('filter');
    Route::get('/getEvents', [\App\Http\Controllers\Dash\AppointmentController::class, 'getEvents'])->name('getEvents');
    Route::get('/add', [\App\Http\Controllers\Dash\AppointmentController::class, 'add'])->name('add');
    Route::post('/create', [\App\Http\Controllers\Dash\AppointmentController::class, 'create'])->name('create');
    Route::get('/edit/{id}', [\App\Http\Controllers\Dash\AppointmentController::class, 'edit'])->name('edit');
    Route::post('/update/{id}', [\App\Http\Controllers\Dash\AppointmentController::class, 'update'])->name('update');
    Route::get('/delete/{id}', [\App\Http\Controllers\Dash\AppointmentController::class, 'delete'])->name('delete');
    Route::get('/getshifts/{id?}', [\App\Http\Controllers\Dash\AppointmentController::class, 'getDoctorShifts'])->name('getshifts');
    Route::get('/getPatient/{id?}', [\App\Http\Controllers\Dash\AppointmentController::class, 'getPatient'])->name('getPatient');

});
