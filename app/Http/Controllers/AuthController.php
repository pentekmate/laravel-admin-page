<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

        $credentials = $request->only('email','password');


        if(Auth::attempt($credentials)){
            $request->session()->regenerate();
            return redirect()->intended('/'); 

        }
        else{
            return redirect()->back()->withErrors([
                'credentials' => 'Invalid credentials, please try again.',
            ])->withInput();
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
