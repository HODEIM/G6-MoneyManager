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
    public function accounts($id)
    {
        $account = Account::where(['id' => $id])->first();
        if ($account != null)
            return view('moneyManager.movements', ['account' => $account]);
        else
            return redirect("/accounts");
    }
}
