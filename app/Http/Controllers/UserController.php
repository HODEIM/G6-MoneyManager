<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUser;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function create(){
        return view('registerPage.register');
    }

    public function store(StoreUser $request){

        $request->validated();

        $password = hash('sha256', $request->get('passwordRegister'));
        User::create([
            'name' => $request->get('name'),
            'surname' => $request->get('surname'),
            'email' => $request->get('emailRegister'),
            'password' => $password,
            'telephone' => (int)$request->get('telephone'),
            'address' => $request->get('address'),
            'image' => '',
            'loqued' => false,
            'id_rol' => 2,
        ]);

        return redirect('/');

    }
}
