<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::delete('/contact/{id}', [ContactController::class, 'destroy'])->name('contact.destroy');

});

// Route::post('/dashboard', [PagesController::class, 'index'])->name('dashboard');
Route::get('/dashboard', [PagesController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');
Route::post('/contact', [PagesController::class, 'store'])->name('contact.store');


require __DIR__.'/auth.php';
