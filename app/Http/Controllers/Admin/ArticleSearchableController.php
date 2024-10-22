<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;

class ArticleSearchableController extends Controller
{
    public function __invoke(Request $request)
    {
        $items = Article::search($request->get('search'))->paginate(10);

        return view('admin.article.index', compact('items'));
    }
}
