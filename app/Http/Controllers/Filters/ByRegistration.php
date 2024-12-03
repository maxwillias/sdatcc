<?php

namespace App\Http\Controllers\Filters;

use Closure;
use Illuminate\Http\Request;

final readonly class ByRegistration
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
                $this->request->get('matricula'),
                fn ($query) => $query->where('matricula', 'LIKE','%' . $this->request->matricula . '%')
            );
    }
}
