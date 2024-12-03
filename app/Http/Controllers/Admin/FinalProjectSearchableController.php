<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Filters\ByAdvisor;
use App\Http\Controllers\Filters\ByCourse;
use App\Http\Controllers\Filters\ByDate;
use App\Http\Controllers\Filters\ByKeyWords;
use App\Http\Controllers\Filters\ByStudent;
use App\Http\Controllers\Filters\ByTitle;
use App\Models\Advisor;
use App\Models\Course;
use App\Models\FinalProject;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Pipeline\Pipeline;

class FinalProjectSearchableController extends Controller
{
    public function __invoke(Request $request)
    {
        $students = Student::search()->get();
        $advisors = Advisor::search()->get();
        $courses = Course::search()->get();

        $items = app(Pipeline::class)
            ->send(FinalProject::query()->orderByDesc('id'))
            ->through([
                ByTitle::class,
                ByKeyWords::class,
                ByStudent::class,
                ByAdvisor::class,
                ByDate::class,
                ByCourse::class,
            ])
            ->thenReturn()
            ->paginate(10);

        return view('admin.final-project.index', compact('items', 'students', 'advisors', 'courses'));
    }
}
