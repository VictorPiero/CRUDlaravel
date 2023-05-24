<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Validation\Rules;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class RegisteredUserController extends Controller
{
    public function store(Request $request){
        $request->validate([
            'name' => ['required','string','max:255'],
            'email' =>  ['required','string','email','max:255','unique:users'],
            'password' =>  ['required','confirmed',Rules\Password::defaults()],
        ]);

        // $user = User::create([
        //     'name'=>$request->name,
        //     'email'=>$request->email,
        //     'password'=>bcrypt($request->password),
        //     //'password'=>Hash::make($request->password),
            
        // ]);

        User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>bcrypt($request->password),
            //'password'=>Hash::make($request->password),
            
        ]);

        // Automatico ingresa dps de crear
        // Auth::login($user);

        return to_route('login')->with('status','Su cuenta fue creada');



    }
    //
}
