<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Products\Index;
use App\Livewire\Products\Create;
use App\Livewire\Products\Edit;
use App\Livewire\Products\Show;
use App\Livewire\Auth\Login as LivewireLogin;
use App\Livewire\Auth\Register as LivewireRegister;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return redirect()->route('products.index');
});

Route::middleware('auth')->group(function () {
    Route::get('/products', Index::class)->name('products.index');
    Route::get('/products/create', Create::class)->name('products.create');
    Route::get('/products/{product}/edit', Edit::class)->name('products.edit');
    Route::get('/products/{product}', Show::class)->name('products.show');
});
Route::get('/login', LivewireLogin::class)->name('login');
Route::get('/register', LivewireRegister::class)->name('register');
Route::post('/logout', function () {
    Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();
    return redirect()->route('login');
})->name('logout');