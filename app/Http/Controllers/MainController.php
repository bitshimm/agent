<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NavPage;
use App\Models\Gallery;
use App\Models\Contact;


class MainController extends Controller
{
    public function Main()
    {
        $navPage = NavPage::all();
        $gallery = Gallery::all();
        $contacts = Contact::all();
       
        return view(
            'main',
            compact('navPage', 'gallery', 'contacts'));
    }
}
