<?php

namespace App\Http\Controllers;

use App\Mail\CallBack;
use App\Models\Meta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class CallBackController extends Controller
{
    public function CallBack(Request $req){
        $metaEmail = Meta::first();
        $name = $req->input('name');
        $phone = $req->input('phone');
        Mail::to($metaEmail->email)->send(new CallBack($name, $phone));
        return redirect()->route('main')->with('success', 'Контакт добавлен');
    }
}
