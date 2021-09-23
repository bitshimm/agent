<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class ProfileController extends Controller
{
    public function ProfileEdit($id)
    {
        $users = new User();
        return view('dashboard/profile',['users' => $users->find($id)]);
    }
    public function ProfileEditSubmit($id, Request $req){
        $users = User::find($id);
        $users->name = $req->input('name');
        $users->email = $req->input('email');
        $password = $req->input('password');
        if ($password) {
            $users->password = bcrypt($password);
        }
        $users->save();

        return redirect()->route('profileEdit', $id)->with('success', 'Профиль изменен');
    }
}
