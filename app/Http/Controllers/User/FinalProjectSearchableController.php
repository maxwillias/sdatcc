<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Controllers\FIlters\ByAdvisor;
use App\Http\Controllers\FIlters\ByDate;
use App\Http\Controllers\FIlters\ByStudent;
use App\Http\Controllers\FIlters\ByTitle;
use App\Models\FinalProject;
use Illuminate\Http\Request;
use Illuminate\Pipeline\Pipeline;

class FinalProjectSearchableController extends Controller
{
    public function __invoke(Request $request)
    {
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

        return view('user.final-project.index', compact('items'));
    }
}
