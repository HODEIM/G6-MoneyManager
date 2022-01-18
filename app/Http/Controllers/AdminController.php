<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

class AdminController extends Controller
{
    public function index()
    {
        $users = User::where('id', '!=', auth()->user()->id)->get();
        return view('moneyManager.admin', ['users' => $users]);
    }
    public function edit($id)
    {
        $user = User::where("id", "=", $id)->first();
        return view('moneyManager.edit', ['user' => $user]);
    }
    public function update(Request $request)
    {
        $request->validate([
            'email' => 'required'
        ]);
        $user = User::find($request->id);
        if ($request->name != null)
            $user->name = $request->name;
        if ($request->surname != null)
            $user->surname = $request->surname;
        if ($request->password != null) {
            $request->validate([
                'password' => "same:password_confirmation"
            ]);
            $user->password = password_hash($request->password, PASSWORD_DEFAULT);
        }
        $user->email = $request->email;
        if ($request->telephone != null)
            $user->telephone = $request->telephone;
        if ($request->address != null)
            $user->address = $request->address;
        $user->locked = request()->filled('locked');
        $user->save();
        return redirect('/admin/' . $request->id . '/edit');
    }
    public function destroy($id){
        User::destroy($id);
        return redirect('/admin');
    }
}
