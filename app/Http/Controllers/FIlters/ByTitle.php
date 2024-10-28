<?php

namespace App\Http\Controllers\FIlters;

use Closure;
use Illuminate\Http\Request;

final readonly class ByTitle
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
                $this->request->get('titulo'),
                fn ($query) => $query->where('titulo', 'LIKE','%' . $this->request->titulo . '%')
            );
    }
}
