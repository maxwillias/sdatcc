<?php

namespace App\Models;

use Database\Factories\StudentFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Scout\Searchable;

class Student extends Model
{
    use HasFactory;
    use Searchable;
    use SoftDeletes;

    protected $table = 'Alunos';

    protected $fillable = [
        'nome',
        'curso',
    ];

    protected static function newFactory()
    {
        return StudentFactory::new();
    }
}
