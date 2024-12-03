<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;
use App\Models\Course;
use App\Models\Student;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = Student::search()->paginate(10);
        $courses = Course::search()->get();

        return view('admin.student.index', compact('items', 'courses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $courses = Course::search()->get();

        return view('admin.student.new', compact('courses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreStudentRequest $request)
    {
        $data = $request->validated();

        Student::create([
            'nome' => $data['nome'],
            'matricula' => $data['matricula'],
            'curso_id' => $data['curso'],
        ]);

        return to_route('admin.students.index')->with('success', 'O Aluno foi salvo com sucesso.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        $courses = Course::search()->get();

        return view('admin.student.edit', ['item' => $student, 'courses' => $courses]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStudentRequest $request, Student $student)
    {
        $data = $request->validated();

        $student->updateOrFail([
            'nome' => $data['nome'],
            'matricula' => $data['matricula'],
            'curso_id' => $data['curso'],
        ]);

        return to_route('admin.students.index')->with('success', 'O Aluno foi atualizado com sucesso.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        $student->deleteOrFail();

        return to_route('admin.students.index')->with('error', 'O Aluno foi deletado com sucesso.');
    }
}
