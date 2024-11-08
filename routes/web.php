<?php

use App\Http\Controllers\Admin\ArticleController as AdminArticleController;
use App\Http\Controllers\Admin\ArticleSearchableController as AdminArticleSearchableController;
use App\Http\Controllers\Admin\FinalProjectController as AdminFinalProjectController;
use App\Http\Controllers\Admin\FinalProjectSearchableController as AdminFinalProjectSearchableController;
use App\Http\Controllers\Admin\AdvisorController;
use App\Http\Controllers\Admin\AdvisorSearchableController;
use App\Http\Controllers\Admin\StudentController;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\CourseSearchableController;
use App\Http\Controllers\Admin\StudentSearchableController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\User\ArticleController;
use App\Http\Controllers\User\FinalProjectController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\User\FinalProjectSearchableController;
use App\Http\Controllers\User\ArticleDownloadController;
use App\Http\Controllers\User\ArticleEmbedController;
use App\Http\Controllers\User\ArticleSearchableController;
use App\Http\Controllers\User\DashboardController as UserDashboardController;
use App\Http\Controllers\User\FinalProjectDownloadController;
use App\Http\Controllers\User\FinalProjectEmbedController;
use Illuminate\Support\Facades\Route;


Route::middleware(['auth', 'verified'])->group(function () {
    Route::group(['as' => 'admin.'],function () {
        Route::prefix('admin')->group(function () {
            Route::resource('final-projects', AdminFinalProjectController::class)->except(['show']);
            Route::resource('articles', AdminArticleController::class)->except(['show']);
            Route::resource('advisors', AdvisorController::class)->except(['show']);
            Route::resource('students', StudentController::class)->except(['show']);
            Route::resource('courses', CourseController::class)->except(['show']);
            Route::get('/final-projects/search', AdminFinalProjectSearchableController::class)->name('project.search');
            Route::get('/articles/search', AdminArticleSearchableController::class)->name('article.search');
            Route::get('/students/search', StudentSearchableController::class)->name('student.search');
            Route::get('/advisors/search', AdvisorSearchableController::class)->name('advisor.search');
            Route::get('/courses/search', CourseSearchableController::class)->name('course.search');
            Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
            Route::get('dashboard/chart-project', [DashboardController::class, 'chartProjects'])->name('dashboard.chart-project');
            Route::get('dashboard/chart-article', [DashboardController::class, 'chartArticles'])->name('dashboard.chart-article');
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
        Route::get('/final-projects/search', FinalProjectSearchableController::class)->name('project.search');
        Route::get('/articles/search', ArticleSearchableController::class)->name('article.search');
        Route::get('dashboard', [UserDashboardController::class, 'index'])->name('dashboard');
        Route::get('dashboard/chart-project', [UserDashboardController::class, 'chartProjects'])->name('dashboard.chart-project');
        Route::get('dashboard/chart-article', [UserDashboardController::class, 'chartArticles'])->name('dashboard.chart-article');
    });
});

Route::get('/', function () {
    return to_route('user.final-projects.index');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
