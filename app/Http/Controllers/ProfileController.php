<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function ProfileEdit($id)
    {
        $users = new User();
        return view('dashboard/profile', ['users' => $users->find($id)]);
    }
    public function ProfileEditSubmit($id, Request $req)
    {
        $users = User::find($id);
        $users->name = $req->input('name');
        $users->email = $req->input('email');
        $password = $req->only([
            'current_password', 'new_password', 'new_password_confirmation'
        ]);
        $userpass = $users->password;
        if ($password['current_password']) {
            if (Hash::check($password['current_password'], $userpass)) {
                $users->password = bcrypt($password['new_password']);
            }else {
                return redirect()->route('profileEdit', $id)->with('error', 'Неверный пароль');
            }
        }
        $users->save();

        return redirect()->route('profileEdit', $id)->with('success', 'Профиль изменен');
    }
}
