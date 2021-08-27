<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Widget;

class WidgetController extends Controller
{
    public function Widget()
    {
        $widget = Widget::all();
        return view(
            'dashboard/widget',
            compact('widget')
        );
    }
    public function WidgetAddSubmit(Request $req)
    {
        $widget = new Widget();
        $widget->code = $req->input('code');
        
        $widget->save();

        return redirect()->route('widget')->with('success', 'Виджет добавлен');
    }
    public function WidgetDeleteSubmit($id)
    {
        Widget::find($id)->delete();
        return redirect()->route('widget')->with('success', 'Виджет удален');
    }
}
