<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Filters\ByAdvisorName;
use App\Http\Controllers\Filters\ByCourse;
use App\Models\Advisor;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Pipeline\Pipeline;

class AdvisorSearchableController extends Controller
{
    public function __invoke(Request $request)
    {
        $courses = Course::search()->get();

        $items = app(Pipeline::class)
            ->send(Advisor::query()->orderByDesc('id'))
            ->through([
                ByCourse::class,
                ByAdvisorName::class,
            ])
            ->thenReturn()
            ->paginate(10);

        return view('admin.advisor.index', compact('items', 'courses'));
    }
}
