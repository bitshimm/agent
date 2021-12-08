<?php

namespace App\Http\Controllers;

use App\Mail\CallBack;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class CallBackController extends Controller
{
    public function CallBack(Request $req){
        $name = $req->input('name');
        $phone = $req->input('phone');
        Mail::send(new CallBack($name, $phone));
        return redirect()->back()->with('success', 'Контакт добавлен');
    }
}
