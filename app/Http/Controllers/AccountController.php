<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Account;
use App\Models\User;


class AccountController extends Controller
{
    public function index()
    {
        $id_rol = auth()->user()->id_rol;
        $id = auth()->user()->id;
        $user = User::find($id);
        if ($id_rol == "2") {
            $accounts = $user->accounts;
            return view('moneyManager.accounts', ['accounts' => $accounts]);
        } else {
            return redirect("/admin");
        }
    }
    public function create()
    {
        return view('moneyManager.createAccount');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);
        $account = Account::create([
            'name' => $request->name,
            'description' => $request->description
        ]);
        $id = auth()->user()->id;
        $account->user()->attach($id, ['active' => '1', 'id_permission' => '1']);
        return redirect('/accounts');
    }
    public function invite($idAccount, $idUser)
    {
        $user = User::find($idUser);
        $user = $user->name;
        $account = Account::find($idAccount);
        return view('moneyManager.invite', ['account' => $account, 'user' => $user]);
    }
    public function acceptInvitation(Request $request)
    {
        $account = Account::find($request->id);
        $id = auth()->user()->id;
        $user = User::find($id);
        $nCuentas = $user->accounts->where('id', '=', $request->id);

        if (count($nCuentas) == 0) {
            $account->user()->attach($id, ['active' => '1', 'id_permission' => '2']);
            return redirect('/account/' . $request->id);
        } else
            return redirect()->back()->withErrors(['existes' => "Ya estás unido a la cuenta"]);
    }
    public function disatatchUser(Request $request)
    {
        $request->validate([
            'user' => 'required',
            'idAccount' => 'required',
        ]);
        $account = Account::find($request->idAccount);
        $account->user()->detach($request->user);
        return redirect()->back();
    }
    public function stats(Request $request)
    {
        $id = $request->accountID;
        $account = Account::find($id);
        return view('moneyManager.stats', ['account', $account]);
    }
    public function editView(Request $request)
    {
        $id = $request->accountID;
        $account = Account::find($id);
        return view('moneyManager.editAccount', ['account', $account]);
    }
    public function destroyView(Request $request)
    {
        $id = $request->accountID;
        Account::destroy($id);
        return redirect()->back();
    }
}
