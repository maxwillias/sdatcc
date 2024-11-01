<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreFinalProjectRequest;
use App\Http\Requests\UpdateFinalProjectRequest;
use App\Models\Advisor;
use App\Models\FinalProject;
use App\Models\Student;
use Illuminate\Support\Facades\Storage;

class FinalProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = FinalProject::search()->paginate(10);
        $students = Student::search()->get();
        $advisors = Advisor::search()->get();

        return view('admin.final-project.index', compact('items', 'students', 'advisors'));
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
        ]);

        return to_route('admin.final-projects.index')->with('success', 'O TCC foi salvo com sucesso.');
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
            ]);
        }else{
            $final_project->updateOrFail([
                'aluno' => $data['aluno'],
                'orientador' => $data['orientador'],
                'data_publicacao' => $data['data_publicacao'],
                'titulo' => $data['titulo'],
            ]);
        }
        return to_route('admin.final-projects.index')->with('success', 'O TCC foi atualizado com sucesso.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FinalProject $final_project)
    {
        $final_project->deleteOrFail();

        return to_route('admin.final-projects.index')->with('error', 'O TCC foi deletado com sucesso.');
    }
}
