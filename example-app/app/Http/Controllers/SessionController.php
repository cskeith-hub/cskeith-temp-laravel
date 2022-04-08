<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email'=>'required|email',
            'password'=>'required',
        ]);

        if(auth()->attempt($credentials)){
            return redirect('/')->with('success','Hey, you are now logged in');
        }

        throw ValidationException::withMessages([
            'email'=>'The email you used is invalid...',
            'password'=>'The password you used is invalid'
        ]);
    }

    public function register(Request $request)
    {
        $request->validate([
        'name'=>'required|max:50',
        'email'=>'email|required|unique:users,email|max:50',
        'password'=>'required|min:8',
        'confirm-password'=>'required|same:password'    
        ]);

        $user = new User;
        $user->create($credentials);
        $user->user_id =  ; // must still make the db & table colmn
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->is_admin = false;
        $user->save();

        auth()->login($user);
        return redirect('/')->with('success', 'Welcome! hope you will enjoy it!');
    }

    public function destroy()
    {
        auth()->logout();
        return redirect()->route('login'); // check for route
    }

    

}
