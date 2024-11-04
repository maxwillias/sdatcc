<?php

namespace App\Http\Controllers\FIlters;

use Closure;
use Illuminate\Http\Request;

final readonly class ByAcronym
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
                $this->request->get('sigla'),
                fn ($query) => $query->where('sigla', 'LIKE','%' . $this->request->sigla . '%')
            );
    }
}
