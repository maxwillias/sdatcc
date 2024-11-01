<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Advisor;
use App\Models\FinalProject;
use App\Models\Student;

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

        return view('user.final-project.index', compact('items', 'students', 'advisors'));
    }
}
