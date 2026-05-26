<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Symfony\Component\HttpFoundation\Response;

class SetLocale
{
    public function handle(Request $request, Closure $next): Response
    {
        $supported = config('app.supported_locales', ['es', 'en']);

        if (auth()->check() && auth()->user()->lang) {
            $locale = auth()->user()->lang;
        } else {
            $browserLocale = substr($request->server('HTTP_ACCEPT_LANGUAGE', 'es'), 0, 2);
            $locale = in_array($browserLocale, $supported) ? $browserLocale : config('app.locale');
        }

        App::setLocale($locale);

        return $next($request);
    }
}
