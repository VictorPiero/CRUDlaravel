<?php

namespace App\Http\Controllers;

//use Dotenv\Exception\ValidationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use vendor\laravel\framework\src\Illuminate\Translation\lang;
// use Illuminate\Validation\ValidationException;
use Illuminate\Validation\ValidationException;

class AuthenticatedSessionController extends Controller
{
    //
    public function store(Request $request)
    {
       $credentials = $request->validate([
        'email'=>['required','string','email'],
        'password'=>['required','string'],
       ]);



       if( !Auth:: attempt($credentials,$request->boolean(('remember'))))
        {    
            throw ValidationException::withMessages([
                'email'=>__('auth.failed')
            
            ]);

            // Lo logramos
        }

        //Login exitoso

        $request -> session()->regenerate();
        return redirect()->intended()
        ->with('status','Ya iniciaste sesion');
        
    }

    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return to_route('login')->with('status','Cerraste session, hasta luego');
    }
}