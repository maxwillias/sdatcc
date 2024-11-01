<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAdvisorRequest;
use App\Http\Requests\UpdateAdvisorRequest;
use App\Models\Advisor;
use App\Models\Course;

class AdvisorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = Advisor::search()->paginate(10);
        $courses = Course::search()->get();

        return view('admin.advisor.index', compact('items', 'courses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.advisor.new');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAdvisorRequest $request)
    {
        $data = $request->validated();

        Advisor::create([
            'nome' => $data['nome'],
            'curso' => $data['curso'],
        ]);

        return to_route('admin.advisors.index')->with('success', 'O Orientador foi salvo com sucesso.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Advisor $advisor)
    {
        return view('admin.advisor.edit', ['item' => $advisor]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAdvisorRequest $request, Advisor $advisor)
    {
        $data = $request->validated();

        $advisor->updateOrFail([
            'nome' => $data['nome'],
            'curso' => $data['curso'],
        ]);

        return to_route('admin.advisors.index')->with('success', 'O Orientador foi atualizado com sucesso.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Advisor $advisor)
    {
        $advisor->deleteOrFail();

        return to_route('admin.advisors.index')->with('error', 'O Orientador foi deletado com sucesso.');
    }
}
