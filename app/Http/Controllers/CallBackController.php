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
        Mail::to('itbshimm@gmail.com')->send(new CallBack($name, $phone));
        return redirect()->route('main')->with('success', 'Контакт добавлен');
    }
}
