<?php

namespace App\Models;

use Database\Factories\AdvisorFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Scout\Searchable;

class Advisor extends Model
{
    use HasFactory;
    use Searchable;
    use SoftDeletes;

    protected $table = 'Orientadores';

    protected $fillable = [
        'nome',
        'curso_id',
    ];

    public function finalProjects()
    {
        return $this->hasMany(FinalProject::class, 'orientador_id');
    }

    public function articles()
    {
        return $this->hasMany(Article::class, 'orientador_id');
    }

    public function curso()
    {
        return $this->belongsTo(Course::class);
    }

    protected static function newFactory()
    {
        return AdvisorFactory::new();
    }

    protected static function booted()
    {
        static::deleting(function ($advisor) {
            $advisor->finalProjects()->delete();
            $advisor->articles()->delete();
        });
    }
}
