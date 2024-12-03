<?php

namespace App\Models;

use Database\Factories\ArticleFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Scout\Searchable;

class Article extends Model
{
    use HasFactory;
    use Searchable;
    use SoftDeletes;

    protected $table = 'Artigos';

    protected $fillable = [
        'autor_id',
        'orientador_id',
        'curso_id',
        'data_publicacao',
        'titulo',
        'publicado_em',
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

    public function autor()
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
        return ArticleFactory::new();
    }
}
