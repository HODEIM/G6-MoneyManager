<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function create(){
        return view('registerPage.register');
    }

    public function store(Request $request){
        // $request->validate([
        //     'email' => 'required',
        //     'password' => 'required',
        // ]);
        User::create([
            'name' => $request->get('name'),
            'surname' => $request->get('surname'),
            'email' => $request->get('emailRegister'),
            'password' => $request->get('passwordRegister'),
            'telephone' => $request->get('telephone'),
            'address' => $request->get('address'),
            'image' => null,
            'locked' => false,
            'id_rol' => 2,
        ]);

        return redirect('/');

    }
}
