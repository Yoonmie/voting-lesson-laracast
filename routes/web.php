<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ComminityLinksController;
use App\Http\Controllers\VotesController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('community',[ComminityLinksController::class, 'index']);
Route::post('community',[ComminityLinksController::class, 'store']);
Route::get('community/{channel}',[ComminityLinksController::class, 'index']);
Route::get('popular',[ComminityLinksController::class, 'popular'])->name('popular');
// Route::get('community/links/{link}/votes',[ComminityLinksController::class, 'toggleVote']);

Route::post('votes/{link}',[VotesController::class, 'store']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
