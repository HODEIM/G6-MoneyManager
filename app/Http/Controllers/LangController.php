<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LangController extends Controller
{
    public function swap($lang){
        // Almacenar el lenguaje en la session
        session()->put('locale', $lang);
        return redirect()->back();
    }
}
