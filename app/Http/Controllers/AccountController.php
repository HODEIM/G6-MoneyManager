<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Account;


class AccountController extends Controller
{
    public function index()
    {
        $id = auth()->user()->id_rol;
        if ($id == "2") {
            $accounts = Account::all();
            return view('moneyManager.accounts', ['accounts' => $accounts]);
        } else {
            return redirect("/admin");
        }
    }
}
