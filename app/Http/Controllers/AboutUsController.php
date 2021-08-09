<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AboutUs;

class AboutUsController extends Controller
{
    public function AboutUs()
    {
        $aboutUs = AboutUs::all();
        return view(
            'dashboard/aboutUs',
            compact('aboutUs')
        );
    }

    public function AboutUsAdd()
    {
        $aboutUs = AboutUs::all();
        $aboutUs = new AboutUs();
        return view('dashboard/add/aboutUsAdd', compact('aboutUs'));
    }

    public function AboutUsAddSubmit(Request $req)
    {
        $aboutUs = new AboutUs();
        $aboutUs->title = $req->input('title');
        $aboutUs->short_desc = $req->input('short_desc');
        $aboutUs->description = $req->input('description');

        $aboutUs->save();

        return redirect()->route('aboutUs')->with('success', 'О нас добавлено');
    }

    public function AboutUsEdit($id)
    {
        $aboutUs = new AboutUs();
        return view('dashboard/edit/aboutUsEdit', ['aboutUs' => $aboutUs->find($id)]);
    }

    public function AboutUsEditSubmit($id, Request $req)
    {
        $aboutUs = AboutUs::find($id);
        $aboutUs->title = $req->input('title');
        $aboutUs->short_desc = $req->input('short_desc');
        $aboutUs->description = $req->input('description');

        $aboutUs->save();

        return redirect()->route('aboutUs', $id)->with('success', 'О нас изменено');
    }

    public function AboutUsDeleteSubmit($id)
    {
        AboutUs::find($id)->delete();
        return redirect()->route('aboutUs')->with('success', 'О нас удалено');
    }
}
