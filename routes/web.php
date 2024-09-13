<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\ItemController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::prefix('home')->group(function () {
    Route::get('/', [HomeController::class, "index"])->name('home');
    Route::get('/all', [HomeController::class, "all"])->name('home.all');
});

Route::prefix('item')->group(function () {
    Route::get('/', [ItemController::class, "index"])->name('item.index');
    Route::get('/all', [ItemController::class, "all"])->name('item.all');
    Route::post('/store', [ItemController::class, "store"])->name('item.store');
    Route::get('/{item_id}/delete', [ItemController::class, "delete"])->name('item.delete');
    Route::get('/{item_id}/get', [ItemController::class, "get"])->name('item.get');
    Route::get('/{item_id}/edit', [ItemController::class, "edit"])->name('item.edit');
    Route::put('/{item_id}/update', [ItemController::class, "update"])->name('item.update');
    Route::get('/{item_id}/status', [ItemController::class, "status"])->name('item.status');
});
