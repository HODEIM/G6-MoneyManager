<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Account;

class AccountController extends Controller
{
    public function index()
    {
        $accounts = Account::all();
        $id = auth()->user()->id_rol;
        if ($id == "2") {
            return view('moneyManager.accounts', ['accounts' => $accounts]);
        } else {
            return view('moneyManager.admin', ['accounts' => $accounts]);
        }
    }
}
