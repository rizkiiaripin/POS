<?php

use App\Http\Controllers\Ajax\PermissionAjaxController;
use Illuminate\Support\Facades\Route;


Route::prefix('/ajax')->group(function () {
    Route::get('/test', function () {
        return response()->json(['message' => 'Hello, this is an AJAX response!']);
    })->name('ajax.index');
    Route::resource('permissions', PermissionAjaxController::class);
});