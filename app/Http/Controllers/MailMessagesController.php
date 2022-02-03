<?php

namespace App\Http\Controllers;

use App\Mail\MailMessageReceived;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailMessagesController extends Controller
{
    public function store(Request $request)
    {
        $msg = $request->validate([
            'name' => 'required',
            'email' => 'required|email|regex:/[a-zA-Z0-9_\-\.\+]+\@[a-zA-Z0-9-]+\.[a-zA-Z]+/',
            'msg' => 'required|min:1',
        ], [
            'name.required' => 'Nombre requerido',
            'email.required' => 'mail requerido',
            'email.email' => 'email mal',
            'email.regex' => 'email mal formato',
            'msg.required' => 'mensaje requerido',
            'msg.min' => 'msg minimo 10 caracteres',
        ]);
        Mail::to('moneymanager.ad50@gmail.com')->queue(new MailMessageReceived($msg));
        return redirect()->back();
    }
}
