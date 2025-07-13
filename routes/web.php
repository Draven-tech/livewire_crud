<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Products\Index;
use App\Livewire\Products\Create;
use App\Livewire\Products\Edit;
use App\Livewire\Products\Show;

Route::get('/', function () {
    return redirect()->route('products.index');
});

Route::get('/products', Index::class)->name('products.index');
Route::get('/products/create', Create::class)->name('products.create');
Route::get('/products/{product}/edit', Edit::class)->name('products.edit');
Route::get('/products/{product}', Show::class)->name('products.show');