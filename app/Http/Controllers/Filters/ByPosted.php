<?php

namespace App\Http\Controllers\Filters;

use Closure;
use Illuminate\Http\Request;

final readonly class ByPosted
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
                $this->request->get('publicado_em'),
                fn ($query) => $query->where('publicado_em', 'LIKE','%' . $this->request->publicado_em . '%')
            );
    }
}
