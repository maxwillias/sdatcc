<?php

namespace App\Http\Controllers\Filters;

use Closure;
use Illuminate\Http\Request;

final readonly class ByDate
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
                $this->request->get('inicial_data') && $this->request->get('final_data'),
                fn ($query) => $query
                    ->where('data_publicacao', '>=', $this->request->inicial_data)
                    ->where('data_publicacao', '<=', $this->request->final_data)
            );
    }
}
