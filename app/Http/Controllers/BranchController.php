<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\State;
use App\Models\Branch;
use App\Models\Company;
use Illuminate\Http\Request;

class BranchController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth()->user();
        $roles = Role::where("user_id", $user->id)->get();
        $role = [];
        if(count($roles))
        {
            $role = $roles->first();
        }
        
        $states = State::all();
        
        $company = Company::findOrFail($role->company_id);
        return view("employer.branch.index", ["user" => $user, "company" => $company, "role" => $role, "states" => $states]);
    }

    public function edit($id, Request $request)
    {   
       $states = State::all();
       $branch = Branch::findOrFail($id);
               
       return view("employer.branch.edit", ["branch" => $branch, "states" => $states]);
    }

    public function store($id, Request $request)
    {
        $request->validate([
            "branch_name" => "required|string",
            "phone" => "required|digits:10",
            "description" => "nullable|string",
            "email" => "required|email",
            "street" => "required|string",
            "area" => "required|string",
            "city" => "required|string",
            "state" => "required|string",
            "landmark" => "required|string",
            "pin" => "required|digits:6"
        ]);

        $request["company_id"] = $id;

        Branch::create($request->except(["_token"]));

        return back();
    }

    public function joinBranch( Request $request)
    {
        $request->validate([
            "branch_id" => "required|numeric",
            "company_id" => "required|numeric"
        ]);

        $user = Auth()->user();

        $role = Role::where("user_id", $user->id)->where("company_id", $request->company_id)->first();
        $role->branch_id = $request->branch_id;
        $role->save();

        return response()->json(["message" => "success"], 200);
        


    }

    public function update($id, Request $request)
    {
        $request->validate([
            "branch_name" => "required|string",
            "phone" => "required|digits:10",
            "description" => "nullable|string",
            "email" => "required|email",
            "street" => "required|string",
            "area" => "required|string",
            "city" => "required|string",
            "state" => "required|string",
            "landmark" => "required|string",
            "pin" => "required|digits:6"
        ]);

        $branch = Branch::findOrFail($id);
        $updated = $branch->update($request->except("_token"));
        if($updated)
        {
            return back()->with(["message" => "Updated Successfully"]);
        }

        return back();
    }
}
