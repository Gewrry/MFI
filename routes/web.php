<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ContactController;

Route::get('/',          [PageController::class, 'home'])->name('home');
Route::get('/about',     [PageController::class, 'about'])->name('about');
Route::get('/products',  [PageController::class, 'products'])->name('products');
Route::get('/products/{id}/spec-sheet', [PageController::class, 'specSheet'])->name('products.spec-sheet');
Route::get('/projects',  [PageController::class, 'projects'])->name('projects');
Route::get('/contact',   [PageController::class, 'contact'])->name('contact');
Route::post('/contact',  [ContactController::class, 'store'])->name('contact.store');
