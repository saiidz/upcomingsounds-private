<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use BinshopsBlog\Models\BinshopsLanguage;
use BinshopsBlog\Models\BinshopsConfiguration;

class LoadLanguage
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $default_locale = BinshopsConfiguration::get('DEFAULT_LANGUAGE_LOCALE');
        $lang = BinshopsLanguage::where('locale', $default_locale)
            ->first();

        $request->attributes->add([
            'locale' => $lang->locale,
            'language_id' => $lang->id
        ]);

        return $next($request);
    }
}
