<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class SetLocale
{
    public function handle(Request $request, Closure $next): Response
    {
        // Se obtienen los idiomas disponibles desde la configuración: config/app.php
        $supported = config('app.supported_locales', ['es', 'en']);

        // Se obtiene el idioma de respaldo de la configuración: config/app.php
        $default = config('app.locale', 'es');

        // Si el usuario está logueado se obtiene su idioma de la base de datos, en caso de no existir se almacena null
        $userLocale = Auth::user()?->lang;

        // Si existe la cookie 'locale' se obtiene el idioma almacenado, de lo contrario será null
        $cookieLocale = $request->cookie('locale');

        // Se obtiene el idioma configurado en el navegador, si el idioma no existe en $supported será null
        $browserLocale = $request->getPreferredLanguage($supported);

        // Se guarda el primer valor que no sea tratado como false
        $locale = $userLocale ?: $cookieLocale ?: $browserLocale ?: $default;

        // Si el $locale no está en $supported se configura con el idioma por defecto $default
        if (!in_array($locale, $supported, true)) {
            $locale = $default;
        }

        // Se configura Laravel con el idioma
        app()->setLocale($locale);

        // Se almacena la petición que se va a realizar para poder configurar en ella la cookie si fuera necesario
        $response = $next($request);

        // Si no había una preferencia previa guardada, se almacena en la cookie 'locale' el idioma configurado para próximas comprobaciones
        if (!$userLocale && !$cookieLocale) {
            $response->headers->setCookie(cookie('locale', $locale, 60 * 24 * 365));
        }

        return $response;
    }
}
