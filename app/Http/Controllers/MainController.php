<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NavPage;


class MainController extends Controller
{
    public function Main()
    {
        $navPage = NavPage::all();
       
        return view(
            'main',
            compact('navPage'));
    }
}
