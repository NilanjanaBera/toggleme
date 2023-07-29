<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //

    public function employerRegister(Request $request)
    {
        // return $request->all();
        $request->validate([
            'first_name' => ['required', 'string', "min:2", 'max:255'],            
            "last_name" => ["required", "string", "max: 255"],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            "phone" => ["required", "digits:10", "unique:users,phone"],
            "whatsapp_number" => ["nullable", "digits:10"],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $whatsapp_number = "";

        

        if($request->has("whatsapp"))
        {
            $whatsapp_number = $request->phone;
            
        }
        else
        {
            $whatsapp_number = $request->whatsapp_number;            
        }

        

        $user = User::create([
            "first_name" => $request->first_name,
            "last_name" => $request->last_name,
            "email" => $request->email,
            "phone" => $request->phone,
            "whatsapp_number" => $whatsapp_number,
            "password" => Hash::make($request->password),
            "type" => "employer"
        ]);

        if($user)
        {
            Auth::attempt(["email" => $user->email, "password" => $request->password]);
            return redirect("/");
        }
        else
        {
            "user not created";
        }
    }
}
