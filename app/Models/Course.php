<?php

namespace App\Models;

use Database\Factories\CourseFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Scout\Searchable;

class Course extends Model
{
    use HasFactory;
    use Searchable;
    use SoftDeletes;

    protected $table = 'Cursos';

    protected $fillable = [
        'nome',
        'sigla',
    ];

    public function advisors()
    {
        return $this->hasMany(Advisor::class);
    }

    public function students()
    {
        return $this->hasMany(Student::class);
    }

    protected static function newFactory()
    {
        return CourseFactory::new();
    }
}
