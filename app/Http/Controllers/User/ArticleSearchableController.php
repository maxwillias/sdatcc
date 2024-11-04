<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Controllers\FIlters\ByAdvisor;
use App\Http\Controllers\FIlters\ByAuthor;
use App\Http\Controllers\FIlters\ByDate;
use App\Http\Controllers\FIlters\ByTitle;
use App\Models\Advisor;
use App\Models\Article;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Pipeline\Pipeline;

class ArticleSearchableController extends Controller
{
    public function __invoke(Request $request)
    {
        $students = Student::search()->get();
        $advisors = Advisor::search()->get();

        $items = app(Pipeline::class)
            ->send(Article::query()->orderByDesc('id'))
            ->through([
                ByTitle::class,
                ByAuthor::class,
                ByAdvisor::class,
                ByDate::class,
            ])
            ->thenReturn()
            ->paginate(10);

        return view('user.article.index', compact('items', 'students', 'advisors'));
    }
}
