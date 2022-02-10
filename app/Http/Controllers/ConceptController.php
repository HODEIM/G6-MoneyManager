<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Concept;

class ConceptController extends Controller
{
    public function store(Request $request)
    {
        if ($request->conceptName != null) {
            Concept::create([
                'concept' => $request->conceptName,
                'id_account' => $request->accountId
            ]);
        }
        return redirect("/account/" . $request->accountId);
    }
}
