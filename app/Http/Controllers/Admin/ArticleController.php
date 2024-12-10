<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreArticleRequest;
use App\Http\Requests\UpdateArticleRequest;
use App\Models\Advisor;
use App\Models\Article;
use App\Models\Course;
use App\Models\Student;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = Article::search()->paginate(10);
        $students = Student::search()->get();
        $advisors = Advisor::search()->get();
        $courses = Course::search()->get();

        return view('admin.article.index', compact('items', 'students', 'advisors', 'courses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $students = Student::search()->get();
        $advisors = Advisor::search()->get();

        return view('admin.article.new', compact('students', 'advisors'));
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
            'autor_id' => $data['autor'],
            'orientador_id' => $data['orientador'],
            'curso_id' => Student::find($data['autor'])->curso->id,
            'data_publicacao' => $data['data_publicacao'],
            'titulo' => $data['titulo'],
            'issn' => $data['issn'],
            'publicado_em' => $data['publicado_em'],
            'palavras_chave' => $data['palavras_chave'],
            'arquivo_nome' => $arquivo_nome,
            'arquivo_path' => $arquivo_path,
        ]);

        return to_route('admin.articles.index')->with('success', 'O Artigo foi salvo com sucesso.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        $students = Student::search()->get();
        $advisors = Advisor::search()->get();

        return view('admin.article.edit', ['item' => $article, 'students' => $students, 'advisors' => $advisors]);
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
                'autor_id' => $data['autor'],
                'orientador_id' => $data['orientador'],
                'curso_id' => Student::find($data['autor'])->curso->id,
                'data_publicacao' => $data['data_publicacao'],
                'titulo' => $data['titulo'],
                'issn' => $data['issn'],
                'publicado_em' => $data['publicado_em'],
                'palavras_chave' => $data['palavras_chave'],
                'arquivo_nome' => $arquivo_nome,
                'arquivo_path' => $arquivo_path,
            ]);
        }else{
            $article->updateOrFail([
                'autor_id' => $data['autor'],
                'orientador_id' => $data['orientador'],
                'curso_id' => Student::find($data['autor'])->curso->id,
                'data_publicacao' => $data['data_publicacao'],
                'titulo' => $data['titulo'],
                'issn' => $data['issn'],
                'publicado_em' => $data['publicado_em'],
                'palavras_chave' => $data['palavras_chave'],
            ]);
        }
        return to_route('admin.articles.index')->with('success', 'O Artigo foi atualizado com sucesso.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        $article->deleteOrFail();

        return to_route('admin.articles.index')->with('error', 'O Artigo foi deletado com sucesso.');
    }
}
