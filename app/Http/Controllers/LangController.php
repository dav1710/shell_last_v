<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\URL;
use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\App;

class LangController extends Controller
{
    public function hash(Request $request) {
        Session::put('hash', $request->input('hash'));
    }

    public function language($locale)
    {
        in_array($locale, ['am', 'en', 'ru']) ? Session::put('locale', $locale) : Session::put('locale', 'am');
        // dd(in_array($locale, ['am', 'en', 'ru']) );
        // in_array($locale, ['am', 'en', 'ru']) ? App::setLocale($locale) : Session::put('locale', 'am');

        // App::setLocale($locale);
        return Redirect::to(URL::previous() . Session::get('hash'));
    }
}
