<?php

use App\Http\Controllers\MainController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/checkout', [MainController::class, 'checkout'])->name('checkout');
Route::get('/album', [MainController::class, 'album'])->name('album');
Route::get('/switch/{locale}', [MainController::class, 'switch']);

// Route with prefix
Route::group([
    'prefix' => '{locale}',
    'where' => ['locale' => '[a-zA-Z]{2}']
], function () {
    Route::get('/checkout', [MainController::class, 'checkout'])->name('checkout');
    Route::get('/album', [MainController::class, 'album'])->name('album');
    Route::get('/switch/{locale}', [MainController::class, 'switch']);
});
