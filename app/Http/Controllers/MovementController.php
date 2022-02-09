<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Concept;
use App\Models\Account;
use App\Models\Movement;
use Illuminate\Support\Facades\DB;

class MovementController extends Controller
{
    public function index($id)
    {
        $account = Account::where(['id' => $id])->first();
        $concepts = Concept::where('id_account', '=', $id)->get();
        $movements = Movement::where('id_account', '=', $id)->get();
        $usuarios = $account->user;
        //    $usuarios = DB::select('select id_user from movements where id_account = :id group by user', ['id' => $id]);

        $gastosUsuario = DB::select('select * from movements where id_account = :id and type = "Gasto"', ['id' => $id]);
        $ingresosUsuario = DB::select('select * from movements where id_account = :id and type = "Ingreso"', ['id' => $id]);

        $gastos = DB::select('select sum(amount) as amount from movements where id_account = :id and type = "Gasto"', ['id' => $id]);
        $ingresos = DB::select('select sum(amount) as amount from movements where id_account = :id and type = "Ingreso"', ['id' => $id]);
        $mediaCuenta = $ingresos[0]->amount - $gastos[0]->amount;

        if ($account != null) {
            if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')
                $url = "https://";
            else
                $url = "http://";
            $url .= $_SERVER['HTTP_HOST'];
            $url .= $_SERVER['REQUEST_URI'];
            $url .= "/invite/" . auth()->user()->id;
            return view('moneyManager.movements', ['account' => $account, 'concepts' => $concepts, 'movements' => $movements, 'url' => $url, 'usuarios' => $usuarios, 'ingresosUsuario' => $ingresosUsuario, 'gastosUsuario' => $gastosUsuario, 'mediaCuenta' => $mediaCuenta]);
        } else
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
        if ($importe < 0)
            $importe = 0 - $importe;

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

    public function show($movementId)
    {
        $movement = Movement::find($movementId);
        return response()->json($movement, 200);
    }
    public function update(Request $request,Movement $movement)
    {
        $movement->update($request->all());
        return response()->json($movement, 200);
    }
    public function destroy($id)
    {
        Movement::destroy($id);
        return redirect()->back();
    }
}
