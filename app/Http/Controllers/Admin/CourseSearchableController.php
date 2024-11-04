<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Filters\ByAcronym;
use App\Http\Controllers\Filters\ByCourseName;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Pipeline\Pipeline;

class CourseSearchableController extends Controller
{
    public function __invoke(Request $request)
    {
        $items = app(Pipeline::class)
            ->send(Course::query()->orderByDesc('id'))
            ->through([
                ByAcronym::class,
                ByCourseName::class,
            ])
            ->thenReturn()
            ->paginate(10);

        return view('admin.course.index', compact('items'));
    }
}
