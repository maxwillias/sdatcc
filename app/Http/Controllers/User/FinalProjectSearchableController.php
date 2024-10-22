<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\FinalProject;
use Illuminate\Http\Request;

class FinalProjectSearchableController extends Controller
{
    public function __invoke(Request $request)
    {
        $items = FinalProject::search($request->get('search'))->paginate(10);

        return view('user.final-project.index', compact('items'));
    }
}
