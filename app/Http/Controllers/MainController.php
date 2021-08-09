<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NavPage;
use App\Models\Gallery;
use App\Models\Contact;
use App\Models\Logotype;
use App\Models\News;
use App\Models\Social;
use App\Models\AboutUs;

class MainController extends Controller
{
    public function Main()
    {
        $navPage = NavPage::all();
        $gallery = Gallery::all();
        $contacts = Contact::all();
        $news = News::all();
        $social = Social::all();
        $logotype = Logotype::all();
        $aboutUs = AboutUs::all();
       
        return view(
            'main',
            compact('navPage', 'gallery', 'contacts', 'news', 'social', 'logotype', 'aboutUs'));
    }
}
