<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Concept;
use App\Models\Account;
use App\Models\Movement;

class MovementController extends Controller
{
    public function index($id)
    {
        $account = Account::where(['id' => $id])->first();
        $concepts = Concept::where('id_account', '=', $id)->get();
        $movements = Movement::where('id_account', '=', $id)->get();
        if ($account != null)
            return view('moneyManager.movements', ['account' => $account, 'concepts' => $concepts, 'movements' => $movements]);
        else
            return redirect("/accounts");
    }
    public function store(Request $request)
    {
        $request->validate([
            'tipo' => 'required',
            'importe' => 'required',
            'concepto' => 'required',
            'fecha' => 'required'
        ]);

        $todoOk = true;
        $id = $request->accountId;
        $importe = $request->importe;

        $importe = str_replace(",", ".", $importe);

        $importe = number_format(floatval($importe), 2);
        $importe = str_replace(",", "", $importe);
        $importe = doubleval($importe);
        if (!is_numeric($importe))
            $todoOk = false;

        if ($todoOk) {
            Movement::create([
                'type' => $request->tipo,
                'amount' => $importe,
                'description' => $request->descripcion,
                'date'  => $request->fecha,
                'user' => auth()->user()->name,
                'id_concept'  =>  $request->concepto,
                'id_account'  => $id
            ]);
        }
        return redirect('/account/' . $id);
    }

    public function destroy($id)
    {
        Movement::destroy($id);
        return redirect()->back();
    }
}
