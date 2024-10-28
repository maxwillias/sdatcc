<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\FIlters\ByAdvisor;
use App\Http\Controllers\FIlters\ByAuthor;
use App\Http\Controllers\FIlters\ByDate;
use App\Http\Controllers\FIlters\ByTitle;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Pipeline\Pipeline;

class ArticleSearchableController extends Controller
{
    public function __invoke(Request $request)
    {
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

        return view('admin.article.index', compact('items'));
    }
}
