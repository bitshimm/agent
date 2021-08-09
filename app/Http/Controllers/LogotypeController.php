<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Logotype;

class LogotypeController extends Controller
{
    public function Logotype()
    {
        $logotype = Logotype::all();
        return view(
            'dashboard/logotype',
            compact('logotype')
        );
    }
    public function LogotypeDeleteSubmit($id)
    {
        Logotype::find($id)->delete();
        return redirect()->route('logotype')->with('success', 'Логотип удален');
    }
    public function LogotypeAddSubmit(Request $req)
    {
        $logotype = new Logotype();
        $logotype->path_to_file = $req->file('image')->storePublicly('uploads', 'public');
        $logotype->title = $req->input('title');
        
        $logotype->save();

        return redirect()->route('logotype')->with('success', 'Логотип добавлен');
    }
}
