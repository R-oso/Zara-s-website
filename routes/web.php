<?php

//Import statements
//use App\Http\Controllers\AboutController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\CreateController;
use App\Http\Controllers\ProjectController;
use Illuminate\Support\Facades\Auth;
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

//Enable Auth routes
Auth::routes();

//Get to the project and route to details function
Route::get('/', [ProjectController::class, 'index'])->name('project');
Route::get('/about{id}', [ProjectController::class, 'details'])->name('about');

//Route to function 'index' in HomeController
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Route to the functions 'index' and 'upload' in CreateController
Route::get('create', [CreateController::class, 'index'])->name('create');
Route::post('create', [CreateController::class, 'store'])->name('store');

Route::get('/search', [ProjectController::class, 'search'])->name('search');

