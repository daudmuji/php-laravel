<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CostumersController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('/nasabah', CostumersController::class, ['parameters' => ['nasabah' => 'id']])->except(['index', 'show']);
Route::get('/nasabah', [CostumersController::class, 'index'])->name('nasabah.index');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


//require __DIR__.'/auth.php';
