<?php

namespace App\Models;

use Database\Factories\FinalProjectFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Scout\Searchable;

class FinalProject extends Model
{
    use HasFactory;
    use Searchable;
    use SoftDeletes;

    protected $table = 'TCCs';

    protected $fillable = [
        'aluno',
        'orientador',
        'data_publicacao',
        'titulo',
        'arquivo_nome',
        'arquivo_path',
        'resumo',
    ];

    protected $casts = [
        'data_publicacao' => 'datetime',
    ];

    protected static function newFactory()
    {
        return FinalProjectFactory::new();
    }
}
