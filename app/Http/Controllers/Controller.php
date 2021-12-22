<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function controlLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        $pass = hash('sha256', $request->get('password'));
        $user = User::where('email', '=', $request->get('email'))->where('password', '=', $pass)->get();
        if (count($user) > 0) {
            return view("viewStart", ['user' => $user]);
        } else {
            return redirect('/');
        }
    }
}
