<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{

    public function create()
    {
      
        return view('Auth.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'email'=> 'required|email',
            'password'=>'required'
        ]);
        $remember=$request->input('remember');
        $credentials = $request->only('email','password');
        
      

        if(Auth::attempt($credentials,$remember)){
            $request->session()->regenerate();
            $user=Auth::user();
            if ($user->isAdmin) {
                return redirect()->route('users.index'); // Admin felhasználó esetén
            }

            return redirect()->route('posts.index'); // Nem admin felhasználó esetén
        } else {
            return redirect()->back()->withErrors([
                'email' => 'Invalid credentials, please try again.',
            ])->withInput();
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        Auth::logout(); 
        $request->session()->invalidate(); 
        $request->session()->regenerateToken(); 

        return redirect()->route('login'); // Visszairányít a bejelentkezési oldalra
    }
}
