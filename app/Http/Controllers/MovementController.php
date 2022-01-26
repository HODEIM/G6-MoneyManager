<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Concept;
use App\Models\Account;

class MovementController extends Controller
{
    public function index($id)
    {
        $account = Account::where(['id' => $id])->first();
        $concepts = Concept::where('id_account', '=', $id)->get();
        if ($account != null)
            return view('moneyManager.movements', ['account' => $account, 'concepts' => $concepts]);
        else
            return redirect("/accounts");
    }
    public function store(Request $request)
    {
    }
}
