<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LocaleController extends Controller
{
    public function setLocale($locale) {
        if (in_array($locale, config('app.locales'))) {
            session()->put('locale', $locale);
        }
        return back();
    }
}
