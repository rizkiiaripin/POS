<?php

use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::middleware(['auth'])->group(function () {
    Route::get('/', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::resource('/users', UserController::class)->except('show')->name('index', 'users');
    Route::resource('/roles', RoleController::class);;
    Route::resource('/permissions', PermissionController::class)->except('show')->name('index', 'permissions');
});


require __DIR__ . '/auth.php';
require __DIR__ . '/ajax.php';
