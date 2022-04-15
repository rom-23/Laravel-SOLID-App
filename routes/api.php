<?php

use App\Http\Controllers\Api\MenuController;
use App\Http\Controllers\Api\ReservationController;
use App\Http\Controllers\Api\TableController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::get('/menus/all', [MenuController::class, 'getAllMenus'])->name('menus.all');
Route::get('/tables/all', [TableController::class, 'getAllTables'])->name('tables.all');
Route::post('/menus/details', [MenuController::class, 'getMenu'])->name('menus.details');
Route::post('/reservations/new', [ReservationController::class, 'store'])->name('menus.new');



Route::middleware('auth:sanctum')->group(function () {
//    Route::post('logout', [AuthController::class, 'logout']);
    Route::get('user', static function (Request $request) {
        return $request->user();
    });

});
