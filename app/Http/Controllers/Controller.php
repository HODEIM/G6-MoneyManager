<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function controlLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        /*
        $pass = hash('sha256', $request->get('password'));
        $user = User::where('email', '=', $request->get('email'))->where('password', '=', $pass)->first();
        if ($user != null) {
            request()->session()->regenerate();
            return redirect("/movements/$user->id");
        } else {
            return redirect('/');
        }
        */
        $credentials = request()->only('email', 'password');
        if (Auth::attempt($credentials)) {
            request()->session()->regenerate();
            return redirect("/movements");
        } else {
            return redirect("/");
        }
    }
}
