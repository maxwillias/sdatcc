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

        return view('index', compact('items'));
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
            'status' => 1,
        ]);

        return view('dashboard');
    }

    public function download(FinalProject $project){
        return Storage::disk('public')->download($project->arquivo_path);
    }

    /**
     * Display the specified resource.
     */
    public function show(FinalProject $FinalProject)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(FinalProject $FinalProject)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateFinalProjectRequest $request, FinalProject $FinalProject)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FinalProject $FinalProject)
    {
        //
    }
}
