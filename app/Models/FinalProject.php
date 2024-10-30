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
    ];

    protected $casts = [
        'data_publicacao' => 'datetime',
    ];

    public function toSearchableArray(): array
    {
        return [
            'aluno' => $this->aluno,
            'orientador' => $this->orientador,
            'data_publicacao' => $this->data_publicacao,
            'titulo' => $this->titulo,
        ];
    }

    protected static function newFactory()
    {
        return FinalProjectFactory::new();
    }
}
