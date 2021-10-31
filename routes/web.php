<?php

//Import statements
//use App\Http\Controllers\AboutController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\CreateController;
use App\Http\Controllers\PracticeController;
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

//ProjectController
Route::get('/', [ProjectController::class, 'index'])->name('project');
Route::get('/about{id}', [ProjectController::class, 'details'])->name('about');
Route::get('/search', [ProjectController::class, 'search'])->name('search');
Route::get('/filter', [ProjectController::class, 'filter'])->name('filter');

//HomeController
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Admin only
Route::middleware(['protectedPages'])->group(function () {

    //CreateController
    Route::get('create', [CreateController::class, 'index'])->name('create');
    Route::post('create', [CreateController::class, 'store'])->name('store');
    Route::post('practice', [CreateController::class, 'storePractice'])->name('storePractice');

    //PracticeController
    Route::get('practice', [PracticeController::class, 'index'])->name('practice');

});


