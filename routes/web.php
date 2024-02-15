<?php
use App\Http\Controllers\ResourcesController;
use Illuminate\Support\Facades\Route;


Route::middleware('web')->group(function () {
    Route::get('/', [ResourcesController::class, 'home'])->name('home');
    Route::get('/add', [ResourcesController::class, 'add'])->name('add');
    Route::post('/add', [ResourcesController::class, 'store'])->name('store_resource');
    Route::get('/collection', [ResourcesController::class, 'collection'])->name('collection');
    Route::get('/resource/{id}', [ResourcesController::class, 'resource'])->name('resource');
});