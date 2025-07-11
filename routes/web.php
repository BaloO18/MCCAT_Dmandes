<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\StructureController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\DemandeController;
use App\Http\Controllers\MaterielController;

Route::get('/', function () {
    return view('welcome');
});
Route::resource('users', UserController::class);
Route::resource('structures', StructureController::class);
Route::resource('roles', RoleController::class);
Route::resource('demandes', DemandeController::class);
Route::resource('materiels', MaterielController::class);
