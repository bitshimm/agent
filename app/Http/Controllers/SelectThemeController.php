<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Theme;
use App\Models\SelectTheme;

class SelectThemeController extends Controller
{
    public function SelectThemeEdit($id)
    {
        $themes = Theme::all();
        $selectThemes = new SelectTheme();
        return view('dashboard/themes',['selectThemes' => $selectThemes->find($id)], compact('themes'));
    }
    public function SelectThemeEditSubmit($id, Request $req){
        $selectThemes = SelectTheme::find($id);
        $selectThemes->select_theme_name = $req->input('name');

        $selectThemes->save();

        return redirect()->route('selectThemeEdit', $id)->with('success', 'Тема изменена');
    }
}
