<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUser;
use Illuminate\Http\Request;
use App\Models\User;

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
        User::create([
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
        return redirect('/accounts');
    }
    public function update(Request $request)
    {
        $request->validate([
            'avatar' => 'image',
            'name' => 'required',
            'surname' => 'required',
            'email' => 'required|regex:/[a-zA-Z0-9_\-\.\+]+\@[a-zA-Z0-9-]+\.[a-zA-Z]+/'
        ]);
        $user = User::find($request->id);
        if ($request->hasFile('avatar')) {
            $user->image = $request->file('avatar')->store('public');
        }
        if ($request->name != null)
            $user->name = $request->name;
        if ($request->surname != null)
            $user->surname = $request->surname;
        if ($request->password != null) {
            $request->validate([
                'password' => "same:password_confirmation|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/",
            ]);
            $user->password = password_hash($request->password, PASSWORD_DEFAULT);
        }
        $user->email = $request->email;
        if ($request->telephone != null)
            $user->telephone = $request->telephone;
        if ($request->address != null)
            $user->address = $request->address;
        
        
        $user->save();
        return redirect('/profile/edit');
    }
    public function lock()
    {
        $user = User::find(auth()->user()->id);
        $user->locked = true;
        $user->save();
        return redirect('/logoutControl');
    }
}
