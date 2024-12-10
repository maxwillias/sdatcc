<?php

namespace App\Http\Controllers\Filters;

use Closure;
use Illuminate\Http\Request;

final readonly class ByIssn
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
                $this->request->get('issn'),
                fn ($query) => $query->where('issn', 'LIKE','%' . $this->request->issn . '%')
            );
    }
}
