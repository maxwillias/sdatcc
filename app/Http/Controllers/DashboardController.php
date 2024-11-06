<?php

namespace App\Http\Controllers;

use App\Models\Course;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard');
    }

    public function chartProjects()
    {
        $projectsByCourse = Course::withCount('projects')->get();

        return response()->json($projectsByCourse);
    }

    public function chartArticles()
    {
        $articlesByCourse = Course::withCount('articles')->get();

        return response()->json($articlesByCourse);
    }
}
