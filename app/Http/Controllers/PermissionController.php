<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class PermissionController extends Controller
{
    public function update(Request $request)
    {
        $request->validate([
            'usuario' => 'required',
            'permission' => 'required'
        ]);
        $user = User::find($request->usuario);
        $user->accounts()->updateExistingPivot($request->idAccount, ['active' => '1', 'id_permission' => $request->permission], false);
        return redirect()->back();
    }
}
