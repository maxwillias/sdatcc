<?php

namespace App\Http\Controllers\Filters;

use Closure;
use Illuminate\Http\Request;

final readonly class ByCourseName
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
                $this->request->get('curso_nome'),
                fn ($query) => $query->where('nome', 'LIKE','%' . $this->request->curso_nome . '%')
            );
    }
}
