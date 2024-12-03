<?php

namespace App\Http\Controllers\Filters;

use Closure;
use Illuminate\Http\Request;

final readonly class ByKeyWords
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
                $this->request->get('palavras_chave'),
                fn ($query) => $query->where('palavras_chave', 'LIKE','%' . $this->request->palavras_chave . '%')
            );
    }
}
