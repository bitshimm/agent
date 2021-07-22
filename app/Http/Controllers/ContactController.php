<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    public function Contacts()
    {
        $contact = Contact::all();
        return view(
            'dashboard/contacts',
            compact('contact')
        );
    }

    public function ContactAdd()
    {
        $contact = Contact::all();
        $contact = new Contact();
        return view('dashboard/add/contactAdd', compact('contact'));
    }

    public function ContactAddSubmit(Request $req)
    {
        $contact = new Contact();
        $contact->icon = $req->input('icon');
        $contact->value = $req->input('value');

        $contact->save();

        return redirect()->route('contacts')->with('success', 'Контакт добавлен');
    }

    public function ContactEdit($id)
    {
        $contact = new Contact();
        return view('dashboard/edit/contactEdit', ['contact' => $contact->find($id)]);
    }

    public function ContactEditSubmit($id, Request $req)
    {
        $contact = Contact::find($id);
        $contact->value = $req->input('value');

        $contact->save();

        return redirect()->route('contacts', $id)->with('success', 'Контакт изменен');
    }

    public function ContactDeleteSubmit($id)
    {
        Contact::find($id)->delete();
        return redirect()->route('contacts')->with('success', 'Контакт удален');
    }
}
