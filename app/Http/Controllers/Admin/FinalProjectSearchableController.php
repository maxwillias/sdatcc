<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\FIlters\ByAdvisor;
use App\Http\Controllers\FIlters\ByDate;
use App\Http\Controllers\FIlters\ByStudent;
use App\Http\Controllers\FIlters\ByTitle;
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

        return view('admin.final-project.index', compact('items', 'students', 'advisors'));
    }
}
