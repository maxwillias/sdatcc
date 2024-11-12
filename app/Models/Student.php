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
        'curso_id',
    ];

    public function finalProject()
    {
        return $this->hasOne(FinalProject::class, 'aluno_id');
    }

    public function articles()
    {
        return $this->hasMany(Article::class, 'autor_id');
    }

    public function curso()
    {
        return $this->belongsTo(Course::class);
    }

    protected static function newFactory()
    {
        return StudentFactory::new();
    }

    protected static function booted()
    {
        static::deleting(function ($student) {
            $student->finalProject()->delete();
            $student->articles()->delete();
        });
    }
}
