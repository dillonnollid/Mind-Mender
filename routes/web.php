<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\PodcastController;
use App\Http\Controllers\VideoController;
use Illuminate\Support\Facades\Route;

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

//Define resource controller routes
Route::resource('blogs', BlogController::class);
Route::resource('videos', VideoController::class);
Route::resource('podcasts', PodcastController::class);


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
