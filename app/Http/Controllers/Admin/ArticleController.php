<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreArticleRequest;
use App\Http\Requests\UpdateArticleRequest;
use App\Models\Article;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = Article::search()->paginate(10);

        return view('admin.article.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.article.new');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreArticleRequest $request)
    {
        $data = $request->validated();
        $file = $data['arquivo'];
        $arquivo_nome = $file->getClientOriginalName();
        $arquivo_path = $file->store('Artigos', 'public');

        Article::create([
            'autor' => $data['autor'],
            'orientador' => $data['orientador'],
            'data_publicacao' => $data['data_publicacao'],
            'titulo' => $data['titulo'],
            'arquivo_nome' => $arquivo_nome,
            'arquivo_path' => $arquivo_path,
            'resumo' => $data['resumo'],
        ]);

        return to_route('admin.articles.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        return view('admin.article.edit', ['item' => $article]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateArticleRequest $request, Article $article)
    {
        $data = $request->validated();

        if(isset($data['arquivo'])){
            Storage::disk('public')->delete($article->arquivo_path);

            $file = $data['arquivo'];
            $arquivo_nome = $file->getClientOriginalName();
            $arquivo_path = $file->store('Artigos', 'public');

            $article->updateOrFail([
                'autor' => $data['autor'],
                'orientador' => $data['orientador'],
                'data_publicacao' => $data['data_publicacao'],
                'titulo' => $data['titulo'],
                'arquivo_nome' => $arquivo_nome,
                'arquivo_path' => $arquivo_path,
                'resumo' => $data['resumo'],
            ]);
        }else{
            $article->updateOrFail([
                'autor' => $data['autor'],
                'orientador' => $data['orientador'],
                'data_publicacao' => $data['data_publicacao'],
                'titulo' => $data['titulo'],
                'resumo' => $data['resumo'],
            ]);
        }
        return to_route('admin.articles.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        $article->deleteOrFail();

        return to_route('admin.articles.index');
    }
}
