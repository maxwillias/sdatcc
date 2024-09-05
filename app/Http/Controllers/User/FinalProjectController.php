<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\FinalProject;

class FinalProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = FinalProject::search()->paginate(10);

        return view('user.final-project.index', compact('items'));
    }

    /**
     * Display the specified resource.
     */
    public function show(FinalProject $final_project)
    {
        return view('user.final-project.view', ['item' => $final_project]);
    }

}
