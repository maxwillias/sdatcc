<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FinalProjectController;
use App\Models\FinalProject;
use Illuminate\Support\Facades\Route;

Route::resource('TCCs', FinalProjectController::class);

Route::get('/', function () {

    $items = FinalProject::search()->paginate(20);

    return view('index', compact('items'));
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
