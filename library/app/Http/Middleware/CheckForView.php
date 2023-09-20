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
        $content = $response->getContent();
        // Cek apakah respons adalah tampilan
        if ($this->isViewResponse($response) && !empty($content)) {
            return $response;
        }

        // Jika tidak, kirim respons 404
        abort(404);
        // return $next($request);
    }

    protected function isViewResponse($response)
    {
        return $response instanceof \Illuminate\View\View ||
            ($response instanceof \Illuminate\Http\Response && $response->isSuccessful());
    }
}
