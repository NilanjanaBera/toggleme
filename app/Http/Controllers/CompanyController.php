<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\State;
use App\Models\Company;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CompanyController extends Controller
{
    public function create()
    {
        $states = State::all();
        return view("company.create", ["states" => $states]);
    }

    public function store(Request $request)
    {
        $request->validate([
            "company_name" => "required|string|unique:companies,company_name",
            "phone" => "required|digits:10|unique:companies,phone",
            "email" => "required|email",
            "strength" => "required|numeric",
            "business_type" => "required|string",
            "street" => "required|string",
            "area" => "required|string",
            "city" => "required|string",
            "state" => "required|string",
            "role" => "required|string",
            "landmark" => "nullable|string",
            "pin" => "required|digits:6",
            "gst" => "nullable|unique:companies,gst",
            "cin" => "nullable|unique:companies,cin",
            
        ]);

        $company = Company::create($request->except(["role", "_token"]));

        if($company)
        {
            Role::create([
                "user_id" => auth()->user()->id,
                "company_id" => $company->id,
                "role" => $request->role
            ]);

            return redirect()->route("company.profile");
        }



    }

    public function profile()
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
        return view("employer.company.index", ["user" => $user, "company" => $company, "role" => $role, "states" => $states]);
    }

    public function edit($id)
    {
        $company = Company::findOrFail($id);
        $states = State::all();
        $user = Auth()->user();
        $roles = Role::where("user_id", $user->id)->get();
        $role = [];
        if(count($roles))
        {
            $role = $roles->first();
        }
        return view("company.edit", ["company" => $company, "states" => $states, "role"=> $role]);
    }

    public function employerCompanyEdit()
    {
        // $company = Company::findOrFail($id);
        $states = State::all();
        $user = Auth()->user();
        $roles = Role::where("user_id", $user->id)->get();
        $role = [];
        if(count($roles))
        {
            $role = $roles->first();
        }
        $company = $role->company;
        return view("employer.company.edit", ["company" => $company, "states" => $states, "role"=> $role]);
    }

    public function logoUpload (Request $request) {

        $request->validate([
            "logo" => "required|mimes:png,jpg,jpeg"
        ]);

        $file = $request->file('logo');
        if ($request->hasFile('logo')) {    
            $extension = $file->getClientOriginalExtension();
            $filename = Str::random(40) . '.' . $extension;
            $file->move(public_path('uploads'), $filename); // Move the file to the 'uploads' folder within 'public'

            $user = Auth()->user();
            $roles = Role::where("user_id", $user->id)->get();
            $role = [];
            if(count($roles))
            {
                $role = $roles->first();
            }
            // TODO:Delete Previous logo file
            $company = $role->company;
            if($company->logo != "")
            {
                $fileToDelete = public_path($company->logo);
                File::delete($fileToDelete);
            }

            $company->logo = "uploads/".$filename;
            $company->save();

            return response()->json(["message" => '1'], 200) ;
        }

        return response()->json(["message" => '0'], 402);        
        
    }

    public function update($id, Request $request)
    {
        $request->validate([
            "company_name" => "required|string|unique:companies,company_name,".$id,
            "phone" => "required|digits:10|unique:companies,phone,".$id,
            "email" => "required|email",
            "strength" => "required|numeric",
            "business_type" => "required|string",
            "street" => "required|string",
            "area" => "required|string",
            "city" => "required|string",
            "state" => "required|string",
            // "role" => "required|string",
            "landmark" => "nullable|string",
            "pin" => "required|digits:6",
            "gst" => "nullable|unique:companies,gst",
            "cin" => "nullable|unique:companies,cin",
            
        ]);

        $company = Company::findOrFail($id);
        $company->update($request->except(["_token", "role"]));

        $user = Auth()->user();
        $role = Role::where("user_id", $user->id)->where("company_id", $company->id)->first();
        // $role->role = $request->role;
        // $role->save();
        // return redirect()->route("company.profile");
        return back()->with(["message" => "Company Profile Successfully Updated"]);
    }
}
