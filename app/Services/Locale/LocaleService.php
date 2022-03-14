<?php

namespace App\Services\Locale;

use Closure;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;

class LocaleService {

    private $locale;

    public function __construct()
    {  
    }

    /**
     * Return translations for locale
     *
     * @param string $locale
     * @return array
     */
    private function translations($locale) {

        $file = resource_path("lang/$locale.json");

        if(!File::exists($file)) {
            return [];
        }
        return json_decode(File::get($file), true);

    }

    /**
     * Put locale to session & return translations.
     *
     * @param string $locale
     * @return array
     */
    public function getLocale($locale) {
        
        $locale = $locale ?? App::getLocale();

        if (!in_array($locale, config('app.available_locales'))) {
            abort(400);
        }

        Session::put('locale', $locale);

        return [
            'availableLocales' => config('app.available_locales'),
            'locale' => $locale,
            'fallbackLocale' => config('app.fallback_locale'),
            'translations' => $this->translations($locale)
        ];
    }

    /**
     * Post locale.
     *
     * @param string $locale
     * @return void
     */
    public function postLocale($locale) {
  
        if (!in_array($locale, config('app.available_locales'))) {
            abort(400);
        }
        App::setLocale($locale);
        Session::put('locale', $locale);
    }

    /**
     * Middleware
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        App::setLocale(Session::get('locale', config('app.locale')));
        return $next($request);
    }
}