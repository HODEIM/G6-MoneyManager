<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Account;

class AccountController extends Controller
{
    public function index($id) {
        $accounts = Account::all();
        return view('moneyManager.accounts', ['id' => $id, 'accounts' => $accounts]);
    }
}
