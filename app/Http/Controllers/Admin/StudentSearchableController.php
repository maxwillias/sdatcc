<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Filters\ByCourse;
use App\Http\Controllers\Filters\ByRegistration;
use App\Http\Controllers\Filters\ByStudentName;
use App\Models\Course;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Pipeline\Pipeline;

class StudentSearchableController extends Controller
{
    public function __invoke(Request $request)
    {
        $courses = Course::search()->get();

        $items = app(Pipeline::class)
            ->send(Student::query()->orderByDesc('id'))
            ->through([
                ByCourse::class,
                ByRegistration::class,
                ByStudentName::class,
            ])
            ->thenReturn()
            ->paginate(10);

        return view('admin.student.index', compact('items', 'courses'));
    }
}
