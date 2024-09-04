<?php

use App\Http\Controllers\Admin\FinalProjectController;
use App\Http\Controllers\ProfileController;
use App\Models\FinalProject;
use Illuminate\Support\Facades\Route;

Route::resource('TCCs', FinalProjectController::class);
Route::get('download/{project}', [FinalProjectController::class, 'download']);

Route::get('/', function () {

    $items = FinalProject::search()->paginate(10);

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
