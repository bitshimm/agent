<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

use Illuminate\Http\Request;

class ChangePassword extends Controller
{
    public function changePassword()
    {
        $user = Auth::user();

        $password = $this->request->only([
            'current_password', 'new_password', 'new_password_confirmation'
        ]);

        $validator = Validator::make($password, [
            'current_password' => 'required|current_password_match',
            'new_password'     => 'required|min:6|confirmed',
        ]);

        if ( $validator->fails() )
            return back()
                ->withErrors($validator)
                ->withInput();


        $updated = $user->update([ 'password' => bcrypt($password['new_password']) ]);

        if($updated)
            return back()->with('success', 1);

        return back()->with('success', 0);
    }
}
