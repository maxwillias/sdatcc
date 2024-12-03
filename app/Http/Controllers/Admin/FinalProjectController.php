<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreFinalProjectRequest;
use App\Http\Requests\UpdateFinalProjectRequest;
use App\Models\Advisor;
use App\Models\Course;
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
        $courses = Course::search()->get();

        return view('admin.final-project.index', compact('items', 'students', 'advisors', 'courses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $students = Student::search()->get();
        $advisors = Advisor::search()->get();

        return view('admin.final-project.new', compact('students', 'advisors'));
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
            'aluno_id' => $data['aluno'],
            'orientador_id' => $data['orientador'],
            'curso_id' => Student::find($data['aluno'])->curso->id,
            'data_publicacao' => $data['data_publicacao'],
            'titulo' => $data['titulo'],
            'palavras_chave' => $data['palavras_chave'],
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
        $students = Student::search()->get();
        $advisors = Advisor::search()->get();

        return view('admin.final-project.edit', ['item' => $final_project, 'students' => $students, 'advisors' => $advisors]);
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
                'aluno_id' => $data['aluno'],
                'orientador_id' => $data['orientador'],
                'curso_id' => Student::find($data['aluno'])->curso->id,
                'data_publicacao' => $data['data_publicacao'],
                'titulo' => $data['titulo'],
                'palavras_chave' => $data['palavras_chave'],
                'arquivo_nome' => $arquivo_nome,
                'arquivo_path' => $arquivo_path,
            ]);
        }else{
            $final_project->updateOrFail([
                'aluno_id' => $data['aluno'],
                'orientador_id' => $data['orientador'],
                'curso_id' => Student::find($data['aluno'])->curso->id,
                'data_publicacao' => $data['data_publicacao'],
                'titulo' => $data['titulo'],
                'palavras_chave' => $data['palavras_chave'],
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
