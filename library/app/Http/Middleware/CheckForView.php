<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckForView
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);
        // dd($request->getMethod());
        $content = $response->getContent();
        // Cek apakah respons adalah tampilan
        if ($this->isViewResponse($response)) {
            if (empty($content) && strtolower($request->getMethod()) == 'get'){
                // Jika tidak ada page, kirim respons 404
                abort(404);
            }
        }

        return $response;
        // return $next($request);
    }

    protected function isViewResponse($response)
    {
        return $response instanceof \Illuminate\View\View ||
            ($response instanceof \Illuminate\Http\Response && $response->isSuccessful());
    }
}
