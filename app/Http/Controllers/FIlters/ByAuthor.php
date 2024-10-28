<?php

namespace App\Http\Controllers\FIlters;

use Closure;
use Illuminate\Http\Request;

final readonly class ByAuthor
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
                $this->request->get('autor'),
                fn ($query) => $query->where('autor', $this->request->autor)
            );
    }
}
