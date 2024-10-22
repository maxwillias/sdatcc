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
        'autor',
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

    public function toSearchableArray(): array
    {
        return [
            'autor' => $this->autor,
            'orientador' => $this->orientador,
            'data_publicacao' => $this->data_publicacao,
            'titulo' => $this->titulo,
        ];
    }

    protected static function newFactory()
    {
        return ArticleFactory::new();
    }
}
