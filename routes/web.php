<?php

//Import statements
use App\Http\Controllers\CreateController;
use App\Http\Controllers\HomeController;
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

//FavoritesController
Route::post('/about{id}/favorite/', [ProjectController::class, 'favorite'])->name('favorite');
//Route::post('/projects/{id}/favorite', [App\Http\Controllers\ProjectFavoritesController::class, 'destroy']);

//HomeController
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/edit', [HomeController::class, 'edit'])->name('edit');
Route::post('update', [HomeController::class, 'update'])->name('update');

//Admin only
Route::middleware(['protectedPages'])->group(function () {

    //CreateController
    Route::get('create', [CreateController::class, 'index'])->name('create');
    Route::post('create', [CreateController::class, 'store'])->name('store');
    Route::post('practice', [CreateController::class, 'storePractice'])->name('storePractice');

    //PracticeController
    Route::get('practice', [PracticeController::class, 'index'])->name('practice');

    //Delete
    Route::delete('/about{id}/destroy', [ProjectController::class, 'destroy'])->name('destroy');

});


