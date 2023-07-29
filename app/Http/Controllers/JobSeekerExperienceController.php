<?php

namespace App\Http\Controllers;

use App\Models\JobSeekerExperience;
use Illuminate\Http\Request;

class JobSeekerExperienceController extends Controller
{
    //

    public function edit()
    {
        $user = Auth()->user();
        $experiences = $user->experiences;
        return view("jobseeker.edit-profile.experience", ["experiences" => $experiences]);
    }

    public function update(Request $request)
    {
        $request->validate([
            "company_name" => "required|string",
            "designation" => "required|string",
            "start_date" => "required|date",
            "end_date" => "required|date",
            "annual_ctc" => "required|numeric"
        ]);

        $user = Auth()->user();
        JobSeekerExperience::create([
            "user_id" => $user->id,
            "company_name" => $request->company_name,
            "designation" => $request->designation,
            "annual_ctc" => $request->annual_ctc,
            "start_date" => $request->start_date,
            "end_date" => $request->end_date,
        ]);

        return back();
    }

    public function delete(Request $request)
    {
        $request->validate([
            "id" => "required|numeric"
        ]);

        $r1 = JobSeekerExperience::where("id", $request->id)->delete();

        return back();
    }
}
