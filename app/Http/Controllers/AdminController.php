<?php

namespace App\Http\Controllers;

use App\Models\User;

class AdminController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('moneyManager.admin', ['users' => $users]);

    }
    public function edit($id)
    {
        $user = User::where("id", "=", $id)->first();
        return view('moneyManager.edit', ['user' => $user]);
    }
}
