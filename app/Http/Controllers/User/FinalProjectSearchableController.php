<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Filters\ByAdvisor;
use App\Http\Controllers\Filters\ByDate;
use App\Http\Controllers\Filters\ByStudent;
use App\Http\Controllers\Filters\ByTitle;
use App\Models\Advisor;
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

        $items = app(Pipeline::class)
            ->send(FinalProject::query()->orderByDesc('id'))
            ->through([
                ByTitle::class,
                ByStudent::class,
                ByAdvisor::class,
                ByDate::class,
            ])
            ->thenReturn()
            ->paginate(10);

        return view('user.final-project.index', compact('items', 'students', 'advisors'));
    }
}
