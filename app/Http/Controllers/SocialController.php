<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Social;

class SocialController extends Controller
{
    public function Social()
    {
        $social = Social::all();
        return view(
            'dashboard/social',
            compact('social')
        );
    }

    public function SocialAdd()
    {
        $social = Social::all();
        $social = new Social();
        return view('dashboard/add/socialAdd', compact('social'));
    }

    public function SocialAddSubmit(Request $req)
    {
        $social = new Social();
        $social->social_icon = $req->input('social_icon');
        $social->link = $req->input('link');
        
        $social->save();

        return redirect()->route('social')->with('success', 'Ссылка добавлена');
    }

    public function SocialEdit($id)
    {
        $social = new Social();
        return view('dashboard/edit/socialEdit', ['social' => $social->find($id)]);
    }

    public function SocialEditSubmit($id, Request $req)
    {
        $social = Social::find($id);
        $social->link = $req->input('link');

        $social->save();

        return redirect()->route('social', $id)->with('success', 'Ссылка изменена');
    }

    public function SocialDeleteSubmit($id)
    {
        Social::find($id)->delete();
        return redirect()->route('social')->with('success', 'Ссылка удалена');
    }
}
