<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Course;
use App\Models\FinalProject;

class DashboardController extends Controller
{
    public function index()
    {
        $courses = Course::search()->get();
        $finalProjects = FinalProject::search()->get();
        $articles = Article::search()->get();

        return view('admin.dashboard', compact('courses', 'finalProjects', 'articles'));
    }

    public function chartProjects()
    {
        $projectsByCourse = Course::withCount('finalProjects')->get();

        return response()->json($projectsByCourse);
    }

    public function chartArticles()
    {
        $articlesByCourse = Course::withCount('articles')->get();

        return response()->json($articlesByCourse);
    }
}
