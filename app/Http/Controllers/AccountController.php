<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AccountController extends Controller
{
    public function index()
    {
        return view('account.index');
    }

    public function config()
    {
        return view('account.config');
    }

    public function update(Request $request)
    {   
        
        $id =\ Auth::user()->id;
        $validate = Validator::make($request->all(), [
            'username' => 'nullable|string|max:255|unique:users,username,'.$id,
            'email' => 'nullable|string|max:255|unique:users,email,'.$id,
            'new_password' => 'nullable|required_with:new_password_confirmation|string|min:8|confirmed',
            'password' => ['required', 'string', 'min:8'],
        ]);
        
        if ($validate->fails()) {
            return redirect()->route('account-config')
                        ->withErrors($validate->errors())
                        ->withInput();
        } else {
            if ( !Hash::check($request->input('password'), \Auth::user()->password) ) {
                $validate->errors()->add('password', 'Your current password is incorrect.');
                return redirect()->route('account-config')
                        ->withErrors($validate->errors())
                        ->withInput();
            }

            $user =\ Auth::user();

            if ($request->input('username') == null && $request->input('email') == null && $request->input('new_password') == null && $request->input('avatar') == $user->avatar) {
                return redirect()->route('account')->with('message', 'There were no changes made.');
            }

            if ($request->input('username') != null) {
                $user->username = $request->input('username');
            }
            if ($request->input('email') != null) {
                $user->email = $request->input('email');
            }
            if ($request->input('new_password') != null) {
                $user->password = Hash::make($request->input('new_password'));
            }
            if ($request->input('avatar') != null) {
                $user->avatar = $request->input('avatar');
            }
            
            $user->save();
            
            return redirect()->route('account')->with('message', 'User updated successfully.');
            }

        
    }
}
