<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\VendaprodutoController;
use App\Http\Controllers\VendaTmpController;
use App\Http\Controllers\ClienteController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('categoria', CategoriaController::class);
    Route::resource('produto', ProdutoController::class);
    Route::resource('vendaproduto', VendaprodutoController::class);
    Route::resource('vendatmp', VendaTmpController::class);
    Route::resource('cliente', ClienteController::class);
});

require __DIR__.'/auth.php';
