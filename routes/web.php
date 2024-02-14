<?php
use App\Http\Controllers\ResourcesController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ResourcesController;
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
Route::controller(ResourcesController::class)->group(function() {
    Route::get('/',  'home' )-> name ('home');
    Route::get('/add', 'add')-> name ('add');
    Route::get('/collection', 'collection')-> name ('collection');
    Route::get('/resource', 'resource')-> name ('resource');

<<<<<<< HEAD
=======
Route::controller(ResourcesController::class)->group(function() {
    Route::get('/',  'home' )-> name ('home');
    Route::get('/add', 'add')-> name ('add');
    Route::get('/collection', 'collection')-> name ('collection');
    Route::get('/resource', 'resource')-> name ('resource');

>>>>>>> 5ed5a95e2704c27ca2ff0c604d4b6bc8a3ad0932
    //Route::get('blog/{slug}', 'post' ) -> name ('post');
});