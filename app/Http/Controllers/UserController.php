<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUser;
use Illuminate\Http\Request;
    use App\Models\User;
    use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public function create()
    {
        return view('registerPage.register');
    }

    public function store(StoreUser $request)
    {
        $request->validated();

        $password = password_hash($request->get('passwordRegister'),PASSWORD_DEFAULT);
        $user = User::create([
            'name' => $request->get('name'),
            'surname' => $request->get('surname'),
            'email' => $request->get('emailRegister'),
            'password' => $password,
            'telephone' => (int)$request->get('telephone'),
            'address' => $request->get('address'),
            'image' => '',
            'locked' => false,
            'id_rol' => 2,
        ]);
        Auth::login($user);
        return view('auth.verify');
        //return redirect('/accounts');
    }
}
