<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use App\Models\Rol;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        $mail = User::where('email', '=', $request->get('email'))->first();
        if ($mail != null) {
            $credentials = request()->only('email', 'password');
            $remember = request()->filled('remember');
            if ($mail->locked == 1)
                return redirect("/locked");

            if (Auth::attempt($credentials, $remember)) {

                request()->session()->regenerate();
                return redirect("/accounts");
            } else {
                throw ValidationException::withMessages([
                    'validation' => __('error.password'),
                ]);
            }
        } else {
            throw ValidationException::withMessages([
                'validation' => __('error.email'),
            ]);
        }
    }
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect("/");
    }
    public function profile()
    {
        return view("moneyManager.profile");
    }
}
