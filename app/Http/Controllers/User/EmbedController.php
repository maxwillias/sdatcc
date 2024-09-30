<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\FinalProject;

class EmbedController extends Controller
{
    public function __invoke(FinalProject $project){
        $path = storage_path('app/public/' . $project->arquivo_path);
        return response()->file($path);
    }
}
