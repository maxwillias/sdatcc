<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Filters\ByAdvisor;
use App\Http\Controllers\Filters\ByAuthor;
use App\Http\Controllers\Filters\ByCourse;
use App\Http\Controllers\Filters\ByDate;
use App\Http\Controllers\Filters\ByIssn;
use App\Http\Controllers\Filters\ByKeyWords;
use App\Http\Controllers\Filters\ByPosted;
use App\Http\Controllers\Filters\ByTitle;
use App\Models\Advisor;
use App\Models\Article;
use App\Models\Course;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Pipeline\Pipeline;

class ArticleSearchableController extends Controller
{
    public function __invoke(Request $request)
    {
        $students = Student::search()->get();
        $advisors = Advisor::search()->get();
        $courses = Course::search()->get();

        $items = app(Pipeline::class)
            ->send(Article::query()->orderByDesc('id'))
            ->through([
                ByTitle::class,
                ByIssn::class,
                ByKeyWords::class,
                ByPosted::class,
                ByAuthor::class,
                ByAdvisor::class,
                ByDate::class,
                ByCourse::class,
            ])
            ->thenReturn()
            ->paginate(10);

        return view('user.article.index', compact('items', 'students', 'advisors', 'courses'));
    }
}
