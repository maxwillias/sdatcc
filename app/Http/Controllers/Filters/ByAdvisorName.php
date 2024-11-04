<?php

namespace App\Http\Controllers\FIlters;

use Closure;
use Illuminate\Http\Request;

final readonly class ByAdvisorName
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
                $this->request->get('orientador_nome'),
                fn ($query) => $query->where('nome', 'LIKE','%' . $this->request->orientador_nome . '%')
            );
    }
}
