<?php
use App\Http\Controllers\ResourcesController;
use Illuminate\Support\Facades\Route;


Route::middleware('web')->group(function () {
    Route::get('/', [ResourcesController::class, 'home'])->name('home');
    Route::get('/add', [ResourcesController::class, 'add'])->name('add');
    Route::post('/add', [ResourcesController::class, 'store'])->name('store_resource');
    Route::get('/collection', [ResourcesController::class, 'collection'])->name('collection');
    Route::get('/resource/{resource}', [ResourcesController::class, 'resource'])->name('resource.resource');
    Route::delete('/resource/{resource}', [ResourcesController::class, 'delete'])->name('resource.delete');

    Route::get('/resource/{id}/edit', [ResourcesController::class, 'edit'])->name('resource.edit');
    Route::put('/resource/{id}', [ResourcesController::class, 'update'])->name('resource.update');
  
    Route::get('/download/{resource}', [ResourcesController::class, 'download'])->name('resource.download');

});

