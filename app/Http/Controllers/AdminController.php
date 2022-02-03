<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Rol;

class AdminController extends Controller
{
    public static function esAdmin()
    {
        $user = auth()->user();
        if ($user->id_rol == 1)
            return true;
        else
            return false;
    }
    public function index()
    {
        if ($this->esAdmin()) {
            $users = User::where('id', '!=', auth()->user()->id)->get();
            return view('moneyManager.admin', ['users' => $users]);
        } else {
            return view('noPermissions');
        }
    }
    public function edit($id)
    {
        if ($this->esAdmin()) {
            $user = User::where("id", "=", $id)->first();
            $rols = Rol::get();
            return view('moneyManager.edit', ['user' => $user, 'rols' => $rols]);
        } else {
            return view('noPermissions');
        }
    }
    public function update(Request $request)
    {
        if ($this->esAdmin()) {
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
            $user->locked = request()->filled('locked');
            if ($request->rol != "null")
                $user->id_rol = $request->rol;
            $user->save();
            return redirect('/admin/' . $request->id . '/edit');
        } else {
            return view('noPermissions');
        }
    }
    public function destroy($id)
    {
        if ($this->esAdmin()) {
            User::destroy($id);
            return redirect('/admin');
        } else {
            return view('noPermissions');
        }
    }
}
