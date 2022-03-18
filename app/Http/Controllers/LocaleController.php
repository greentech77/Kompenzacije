<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\Locale\LocaleService;

class LocaleController extends Controller
{
    
    public function getLocale(LocaleService $localeService, $locale = null) 
    {
        return response($localeService->getLocale($locale));
    }

    public function postLocale(LocaleService $localeService, $locale = null) 
    {
        $localeService->postLocale($locale);
        return response('', 204);
    }
    
}
