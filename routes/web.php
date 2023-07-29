<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\crud;

Route::get('/', [crud::class, 'ShowIndex']);
Route::post('/inserData', [crud::class, 'InsertData']);
Route::get('/delete/{id}', [crud::class, 'DeleteData']);
Route::get('/edit/{id}', [crud::class, 'EditData']);
Route::post('/update/{id}', [crud::class, 'UpdateData']);
