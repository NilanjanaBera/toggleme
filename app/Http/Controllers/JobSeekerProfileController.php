<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\State;
use Illuminate\Http\Request;
use App\Models\JobSeekerAcademic;
use Illuminate\Support\Facades\Auth;

class JobSeekerProfileController extends Controller
{
    public function index()
    {
        $user = \Auth::user();
        $experience = "Fresher";
        if(count($user->experiences))
        {
            $experience = "Experienced";
        }

        return view("jobseeker.profile", ["user" => $user, "experience" => $experience]);
    }

    public function editBasicInfo(Request $request)
    {
        $user = Auth()->user();
        $states = State::all();
        if($user->profile)
        {
            $profile = $user->profile;
        }
        else
        {
            $profile = [];
        }
        return view("jobseeker.edit-profile.basic-info", ["user" => $user, "profile" => $profile, "states" => $states]);
    }

    public function updateBasicInfo(Request $request)
    {
        
        $request->validate([
            "first_name" => "required|string|min:2",
            "last_name" => "required|string|min:2",
            "email" => "required|email",
            "alternate_email" => "nullable|email",
            "phone" => "required|digits:10",
            "alternate_phone" => "nullable|digits:10",
            "gender" => "required|string",
            "dob" => "required|date",
            "street" => "required|string",
            "landmark" => "nullable|string",
            "area" => "nullable|string",
            "city" => "required|string",
            "state" => "required|string",
            "pin" => "required|digits:6"
        ]);

        $user = Auth()->user();
      
       
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->alternate_email = $request->alternate_email;
        $user->phone = $request->phone;
        $user->alternate_phone = $request->alternate_phone;
        $user->profile->dob = Carbon::parse($request->dob)->format("Y-m-d");
        $user->profile->gender = $request->gender;
        $user->profile->street = $request->street;
        $user->profile->landmark = $request->landmark;
        $user->profile->area = $request->area;
        $user->profile->city = $request->city;
        $user->profile->state = $request->state;
        $user->profile->pin = $request->pin;

        $data_saved = false;

        if($user->save() && $user->profile->save())
        {
            $data_saved = true;
        }
    
        if($data_saved)
        {
            return back()->with(["m1" => $data_saved, "message" => "Personal Information Updated Successfully"]);
        }    

    }

    public function editAcademics()
    {
        $user = Auth()->user();
        $academics = $user->academics;
        
        return view("jobseeker.edit-profile.academics", ["academics" => $academics]);
    }

    public function updateAcademics(Request $request)
    {
        $user = Auth()->user();
        $request->validate([
            "standard" => "required|string",
            "marks" => "required",
            "institute" => "required",
            "board" => "required"
        ]);

        JobSeekerAcademic::create([
            "user_id" => $user->id,
            "standard" => $request->standard,
            "marks" => $request->marks,
            "institute" => $request->institute,
            "board" => $request->board,
        ]);

        return back();
    }

    public function deleteAcademics(Request $request)
    {
        $r1 = JobSeekerAcademic::where("id", $request->id)->delete();

        return back();
    }
}
