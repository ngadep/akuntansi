<?php

namespace Akuntansi\Http\Middleware;

use Closure;

class CompanySession
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $collection = $request->user()->companies;

        if (! $request->session()->has('perusahaan_aktif')) {
            $request->session()->put('perusahaan_aktif',$collection->first()->id);
        }

        return $next($request);
    }
}
