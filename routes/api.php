<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => ['cors']], function () {
    Route::prefix('v1')->group(function () {
        Route::resource('unidad', App\Http\Controllers\UnitController::class)
            ->only(['index','store','update','show','destroy']);
        /* Route::resource('adviser', App\Http\Controllers\UnitController::class)
            ->only(['index','store','update','show','destroy']);
        Route::resource('client', App\Http\Controllers\UnitController::class)
            ->only(['index','store','update','show','destroy']); */
    });
});

Route::resource('blog', App\Http\Controllers\BlogController::class)
    ->only(['index','store','update','show','destroy']);