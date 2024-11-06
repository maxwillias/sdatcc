<?php

namespace App\Http\Controllers\Filters;

use Closure;
use Illuminate\Http\Request;

final readonly class ByStudentName
{
    public function __construct(
        protected Request $request
    ) {
        //
    }

    public function handle($builder, Closure $next)
    {
        return $next($builder)
            ->when(
                $this->request->get('aluno_nome'),
                fn ($query) => $query->where('nome', 'LIKE','%' . $this->request->aluno_nome . '%')
            );
    }
}
