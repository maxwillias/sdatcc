<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Support\Facades\Storage;

class ArticleDownloadController extends Controller
{
    public function __invoke(Article $article){
        return Storage::disk('public')->download($article->arquivo_path, $article->arquivo_nome);
    }
}
