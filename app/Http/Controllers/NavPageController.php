<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NavPage;

class NavPageController extends Controller
{
    public function Page()
    {
        $page = NavPage::all();
        return view(
            'dashboard/pages',
            compact('page')
        );
    }

    public function PageAdd()
    {
        $page = NavPage::all();
        $page = new NavPage();
        return view('dashboard/add/pageAdd', compact('page'));
    }

    public function PageAddSubmit(Request $req)
    {
        $page = new NavPage();
        $page->title = $req->input('title');
        $page->description = $req->input('description');

        $page->save();

        return redirect()->route('pages')->with('success', 'Страница добавлена');
    }

    public function PageEdit($id)
    {
        $page = new NavPage();
        return view('dashboard/edit/pageEdit', ['page' => $page->find($id)]);
    }

    public function PageEditSubmit($id, Request $req){
        $page = NavPage::find($id);
        $page->title = $req->input('title');
        $page->description = $req->input('description');

        $page->save();

        return redirect()->route('pages', $id)->with('success', 'Страница изменена');
    }

    public function PageDeleteSubmit($id){
        NavPage::find($id)->delete();
        return redirect()->route('pages')->with('success', 'Страница удалена');
    }
}
