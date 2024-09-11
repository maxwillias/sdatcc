<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\FinalProject;
use Illuminate\Support\Facades\Storage;

class DownloadController extends Controller
{
    public function __invoke(FinalProject $project){
        return Storage::disk('public')->download($project->arquivo_path, $project->arquivo_nome);
    }
}
