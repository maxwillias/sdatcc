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
        'aluno_id',
        'orientador_id',
        'curso_id',
        'data_publicacao',
        'titulo',
        'palavras_chave',
        'arquivo_nome',
        'arquivo_path',
    ];

    protected $casts = [
        'data_publicacao' => 'datetime',
    ];

    public function toSearchableArray(): array
    {
        return [
            'data_publicacao' => $this->data_publicacao,
            'titulo' => $this->titulo,
        ];
    }

    public function aluno()
    {
        return $this->belongsTo(Student::class);
    }

    public function curso()
    {
        return $this->belongsTo(Course::class);
    }

    public function orientador()
    {
        return $this->belongsTo(Advisor::class);
    }

    protected static function newFactory()
    {
        return FinalProjectFactory::new();
    }
}
