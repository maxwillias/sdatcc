<?php

namespace App\Models;

use Database\Factories\TrabalhoFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Trabalho extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table =  'trabalhos';

    protected $fillable = [
        'aluno',
        'orientador',
        'data_publicacao',
        'titulo',
        'resumo',
        'status',
    ];

    protected $dates = [
        'data_publicacao'
    ];

    protected static function newFactory()
    {
        return TrabalhoFactory::new();
    }
}
