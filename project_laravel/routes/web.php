<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MessagesController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/mensajes', function () {
    return view('ver_mesajes');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

    Route::get('/dashboard', [MessagesController::class, 'index'])->name('dashboard');
    Route::post('/messages', [MessagesController::class, 'store'])->name('messages.store');
    Route::put('/messages/{message}', [MessagesController::class, 'update'])->name('messages.update');
    Route::delete('/messages/{id}', [MessagesController::class, 'destroy'])->name('messages.destroy');
    
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
