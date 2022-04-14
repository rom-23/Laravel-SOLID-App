<?php

use App\Http\Controllers\Api\MenuController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::get('/menus/all', [MenuController::class, 'getAllMenus'])->name('menus.all');


Route::middleware('auth:sanctum')->group(function () {
//    Route::post('logout', [AuthController::class, 'logout']);
    Route::get('user', static function (Request $request) {
        return $request->user();
    });

});
