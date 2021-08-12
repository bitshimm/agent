<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Theme;

class ThemesController extends Controller
{
    public function Themes()
    {
        $themes = Theme::all();
        return view(
            'dashboard/themes',
            compact('themes')
        );
    }
}
