<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\View;

class LangTracker
{
    public function handle(Request $request, Closure $next): Response
    {
        $lang = $request->query('lang');
        if(empty($lang) || !isset($lang)){
            $lang = $request->session()->get('lang', config('app.locale'));
        } else {
            $request->session()->put('lang', $lang);
        }
        View::share('lang', $lang);
        return $next($request);
    }
}
