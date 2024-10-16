<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Article;

class ArticleEmbedController extends Controller
{
    public function __invoke(Article $article){
        $path = storage_path('app/public/' . $article->arquivo_path);
        return response()->file($path);
    }
}
