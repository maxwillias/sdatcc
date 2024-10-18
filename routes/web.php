<?php

use App\Http\Controllers\Admin\ArticleController as AdminArticleController;
use App\Http\Controllers\Admin\FinalProjectController as AdminFinalProjectController;
use App\Http\Controllers\User\ArticleController;
use App\Http\Controllers\User\FinalProjectController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\User\ArticleDownloadController;
use App\Http\Controllers\User\ArticleEmbedController;
use App\Http\Controllers\User\FinalProjectDownloadController;
use App\Http\Controllers\User\FinalProjectEmbedController;
use Illuminate\Support\Facades\Route;


Route::middleware(['auth', 'verified'])->group(function () {
    Route::group(['as' => 'admin.'],function () {
        Route::prefix('admin')->group(function () {
            Route::resource('final-projects', AdminFinalProjectController::class)->except(['show']);
            Route::resource('articles', AdminArticleController::class)->except(['show']);
        });
    });
});

Route::get('download/final-project/{project}', FinalProjectDownloadController::class)->name('project.download');
Route::get('embed/final-project/{project}', FinalProjectEmbedController::class)->name('project.embed');
Route::get('download/article/{article}', ArticleDownloadController::class)->name('article.download');
Route::get('embed/article/{article}', ArticleEmbedController::class)->name('article.embed');

Route::group(['as' => 'user.'], function () {
    Route::prefix('user')->group(function () {
        Route::resource('final-projects', FinalProjectController::class)->only(['index']);
        Route::resource('articles', ArticleController::class)->only(['index']);
    });
});

Route::get('/', function () {
    return to_route('user.final-projects.index');
});

Route::get('/dashboard', function () {
    return view('admin.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
