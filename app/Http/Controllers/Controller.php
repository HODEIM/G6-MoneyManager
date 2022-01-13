<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        /*
        $pass = hash('sha256', $request->get('password'));
        $user = User::where('email', '=', $request->get('email'))->where('password', '=', $pass)->first();
        if ($user != null) {
            return redirect("/accounts/$user->id");
        } else {
        return redirect('/');
        }
         */
        $credentials = request()->only('email', 'password');
        $remember = request()->filled('remember');
        if (Auth::attempt($credentials, $remember)) {
            request()->session()->regenerate();
            return redirect("/accounts");
        } else {

            throw ValidationException::withMessages([
                'email' => "Las credenciales no coinciden"
            ]);
            //return redirect("/");
        }
    }
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect("/");
    }
}
