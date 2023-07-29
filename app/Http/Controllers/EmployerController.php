<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmployerController extends Controller
{
    public function dashboard()
    {   
        $user = Auth()->user();
        $companies = [];
        // if(count($user->roles))
        // {
        //     foreach($user->roles as $role)
        //     {
        //         $companies[] = $role->company;
        //     }
        // }
        if($user->role)
        {
            $company = $user->role->company;
        }


        return view("employer.dashboard", ["company" => $company, "role" => $user->role->role]);
    }

    public function myProfile()
    {
        $user = Auth()->user();

        $role = $user->role;
        $branch = $user->role->branch;
        $company = $user->role->company;

        return view("employer.my-profile", ["user" => $user, "role" => $role, "company" => $company, "branch" => $branch]);
    }
}
