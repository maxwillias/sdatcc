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
        return $this->hasMany(FinalProject::class);
    }

    public function articles()
    {
        return $this->hasMany(Article::class);
    }

    public function curso()
    {
        return $this->belongsTo(Course::class);
    }

    protected static function newFactory()
    {
        return AdvisorFactory::new();
    }
}
