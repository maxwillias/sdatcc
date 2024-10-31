<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCourseRequest;
use App\Http\Requests\UpdateCourseRequest;
use App\Models\Course;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = Course::search()->paginate(10);

        return view('admin.course.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.course.new');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCourseRequest $request)
    {
        $data = $request->validated();

        Course::create([
            'nome' => $data['nome'],
            'sigla' => strtoupper($data['sigla']),
        ]);

        return to_route('admin.courses.index')->with('success', 'O Curso foi salvo com sucesso.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Course $course)
    {
        return view('admin.course.edit', ['item' => $course]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCourseRequest $request, Course $course)
    {
        $data = $request->validated();

        $course->updateOrFail([
            'nome' => $data['nome'],
            'sigla' => strtoupper($data['sigla']),
        ]);

        return to_route('admin.courses.index')->with('success', 'O Curso foi atualizado com sucesso.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $course)
    {
        $course->deleteOrFail();

        return to_route('admin.courses.index')->with('error', 'O Curso foi deletado com sucesso.');
    }
}
