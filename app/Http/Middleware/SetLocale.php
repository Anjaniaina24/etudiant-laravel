<?php
// app/Http/Middleware/SetLocale.php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Cookie;

class SetLocale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // Récupérer la langue depuis le cookie, sinon utiliser la langue par défaut
        $locale = Cookie::get('lang', config('app.locale', 'fr'));
        
        // Définir la langue de l'application
        App::setLocale($locale);
        
        return $next($request);
    }
}