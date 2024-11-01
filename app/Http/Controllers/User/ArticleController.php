<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Advisor;
use App\Models\Article;
use App\Models\Student;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = Article::search()->paginate(10);
        $students = Student::search()->get();
        $advisors = Advisor::search()->get();

        return view('user.article.index', compact('items', 'students', 'advisors'));
    }
}
