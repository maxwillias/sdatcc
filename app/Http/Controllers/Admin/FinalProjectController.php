<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreFinalProjectRequest;
use App\Http\Requests\UpdateFinalProjectRequest;
use App\Models\FinalProject;
use Illuminate\Support\Facades\Storage;

class FinalProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = FinalProject::search()->paginate(10);

        return view('admin.final-project.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.final-project.new');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreFinalProjectRequest $request)
    {
        $data = $request->validated();
        $file = $data['arquivo'];
        $arquivo_nome = $file->getClientOriginalName();
        $arquivo_path = $file->store('TCCs', 'public');

        FinalProject::create([
            'aluno' => $data['aluno'],
            'orientador' => $data['orientador'],
            'data_publicacao' => $data['data_publicacao'],
            'titulo' => $data['titulo'],
            'arquivo_nome' => $arquivo_nome,
            'arquivo_path' => $arquivo_path,
            'resumo' => $data['resumo'],
        ]);

        return to_route('admin.final-projects.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(FinalProject $final_project)
    {
        return view('admin.final-project.edit', ['item' => $final_project]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateFinalProjectRequest $request, FinalProject $final_project)
    {
        $data = $request->validated();

        if(isset($data['arquivo'])){
            Storage::disk('public')->delete($final_project->arquivo_path);

            $file = $data['arquivo'];
            $arquivo_nome = $file->getClientOriginalName();
            $arquivo_path = $file->store('TCCs', 'public');

            $final_project->updateOrFail([
                'aluno' => $data['aluno'],
                'orientador' => $data['orientador'],
                'data_publicacao' => $data['data_publicacao'],
                'titulo' => $data['titulo'],
                'arquivo_nome' => $arquivo_nome,
                'arquivo_path' => $arquivo_path,
                'resumo' => $data['resumo'],
            ]);
        }else{
            $final_project->updateOrFail([
                'aluno' => $data['aluno'],
                'orientador' => $data['orientador'],
                'data_publicacao' => $data['data_publicacao'],
                'titulo' => $data['titulo'],
                'resumo' => $data['resumo'],
            ]);
        }
        return to_route('admin.final-projects.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FinalProject $final_project)
    {
        $final_project->deleteOrFail();

        return to_route('admin.final-projects.index');
    }
}
