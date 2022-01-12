<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class LangController extends Controller
{
    public function change($lang)
    {
        if (!in_array($lang, ['en', 'es', 'eu'])) {
            return redirect()->back();;
        }
        App::setLocale($lang);
        session()->put('locale', $lang);
        return redirect()->back();
    }
}
