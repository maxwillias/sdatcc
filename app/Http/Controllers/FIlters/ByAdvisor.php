<?php

namespace App\Http\Controllers\FIlters;

use Closure;
use Illuminate\Http\Request;

final readonly class ByAdvisor
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
                $this->request->get('orientador'),
                fn ($query) => $query->where('orientador', $this->request->orientador)
            );
    }
}
