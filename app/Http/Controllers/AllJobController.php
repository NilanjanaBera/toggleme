<?php

namespace App\Http\Controllers;

use DataTables;
use Carbon\Carbon;
use App\Models\Role;
use App\Models\State;
use App\Models\AllJob;
use App\Models\Company;
use App\Models\AllSkill;
use App\Models\Category;
use App\Models\JobSkill;
use Illuminate\Http\Request;
use App\Models\AllQualification;
use App\Models\JobQualification;
use Illuminate\Support\Facades\Validator;

class AllJobController extends Controller
{
    //


    public function savedJobs()
    {
        $user = Auth()->user();

        $saved_jobs = $user->savedJobs;

        return view("jobs.saved-jobs", ["saved_jobs" => $saved_jobs]);
    }

    public function appliedJobs()
    {
        $user = Auth()->user();
    }

    // Employer

    public function myIndex()
    {
        $user = Auth()->user();

        $jobs = AllJob::where("user_id", $user->id)->get();

        return view("employer.job.my-job", ["jobs" => $jobs]);
    }

    public function createJob()
    {
        $states = State::all();
        $category = Category::where('status', 'Active')->get();
        $all_qualifications = AllQualification::all();
        $all_skills = AllSkill::all();
        return view("employer.job.create", ["states" => $states, "category" => $category, "all_qualifications" => $all_qualifications, "all_skills" => $all_skills]);
    }

    // public function storeJob(Request $request)
    // {
    //     $user = Auth()->user();
    //     $validated = $request->validate([
    //         "job_name" => "required|string",
    //         "job_designation" => "required|string",
    //         "job_category" => "required|string",

    //         "job_type" => "required|string",
    //         "office_type" => "required|string",
    //         "information" => "nullable|string",
    //         "opening_date" => "required|date",
    //         "closing_date" => "required|date|after:opening_date",
    //         "location" => "required|string",
    //         "state" => "required|string",
    //         "salary_disclosed" => "required",
    //         "min_salary" => "required_if:salary_disclosed,==,yes|nullable|numeric",
    //         "max_salary" => "required_if:salary_disclosed,==,yes|nullable|numeric",
    //         "min_qualification" => "required|numeric",
    //         "min_experience" => "required|numeric|integer",
    //         "max_experience" => "nullable|numeric|integer",
    //         "qualifications" => "required",
    //         "skills" => "required",
    //         "publish_option" => "required"

    //     ]);
    //     // dd($request->all());
    //     $request["published"] = $request->publish_option;
    //     $request["user_id"] = $user->id;



    //     $job = AllJob::create($request->except(["qualifications", "skills"]));

    //     foreach ($request["qualifications"] as $qualification) {
    //         JobQualification::create([
    //             "all_qualification_id" => $qualification,
    //             "all_job_id" => $job->id,
    //         ]);
    //     }

    //     foreach ($request["skills"] as $skill) {
    //         JobSkill::create([
    //             "all_skill_id" => $skill,
    //             "all_job_id" => $job->id,
    //         ]);
    //     }
    // }
    public function cstoreJob(Request $request)
    {

        $user = Auth()->user();
        $validator = Validator::make(
            $request->all(),
            [
                "job_name" => "required|string",
                "job_designation" => "required|string",
                "job_category" => "required|string",
                "job_image" => "required|mimes:jpg,png,jpeg,gif,svg",
                "job_type" => "required|string",
                "office_type" => "required|string",
                "information" => "nullable|string",
                "opening_date" => "required|date",
                "closing_date" => "required|date|after:opening_date",
                "location" => "required|string",
                "state" => "required|string",
                "salary_disclosed" => "required",
                "min_salary" => "required_if:salary_disclosed,==,yes|nullable|numeric",
                "max_salary" => "required_if:salary_disclosed,==,yes|nullable|numeric",
                "min_qualification" => "required|numeric",
                "min_experience" => "required|numeric|integer",
                "max_experience" => "nullable|numeric|integer",
                "qualifications" => "required",
                "skills" => "required",
                "publish_option" => "required"

            ]
        );

        if ($validator->fails()) {
            return response()->json(['status' => 0, 'error' => $validator->errors()->toArray()]);
        } else {
            if ($request->hasFile('job_image')) {


                $image = $request->job_image;

                $imagename = $image->getClientOriginalName();
                $image->move('admin/upload/image/job_images/', $imagename);
                $image = $imagename;
                $request["image"] = $image;
            } else {
            }
            $request["published"] = $request->publish_option;
            $request["user_id"] = $user->id;
            $job = AllJob::create($request->except(["qualifications", "skills"]));

            foreach ($request["qualifications"] as $qualification) {
                JobQualification::create([
                    "all_qualification_id" => $qualification,
                    "all_job_id" => $job->id,
                ]);
            }

            foreach ($request["skills"] as $skill) {
                JobSkill::create([
                    "all_skill_id" => $skill,
                    "all_job_id" => $job->id,
                ]);
            }
            return response()->json([
                'status' => 1,

                'success' => 'Successfully sent your request'
            ]);
        }
    }

    public function myJobList()
    {
        $user = Auth()->user();
        $jobs = AllJob::where("user_id", $user->id)->orderBy("id", "desc")
            ->where("published", 1)
            ->with(["qualifications", "skills"])->get();


        return Datatables::of($jobs->sortByDesc("id"))
            ->editColumn("id", function ($row) {
                return "<a href='" . route("employer.job.details", $row["id"]) . "'>" . $row["id"] . "</a>";
            })
            ->editColumn("job_name", function ($row) {
                return "<a href='" . route("employer.job.details", $row["id"]) . "'>" . $row["job_name"] . "</a>";
            })
            ->editColumn("opening_date", function ($row) {
                $d1 = Carbon::parse($row["opening_date"])->format("d/m/Y");
                return $d1;
            })
            ->editColumn("closing_date", function ($row) {
                $d1 = Carbon::parse($row["closing_date"])->format("d/m/Y");
                return $d1;
            })
            ->editColumn("information", function ($row) {
                $r1 = substr($row["information"], 0, 100);
                return $r1;
            })
            ->editColumn("salary_disclosed", function ($row) {
                if ($row["salary_disclosed"] == "no") {
                    return "<span class='text-danger'>" . $row["salary_disclosed"] . "</span>";
                } else {
                    return "<span class='text-success'>" . $row["salary_disclosed"] . "</span>";
                }
            })
            ->editColumn("min_salary", function ($row) {
                if ($row["min_salary"] != null) {
                    return "₹" . $row["min_salary"];
                } else {
                    return "<span class='not-available'>Not Available</span>";
                }
            })
            ->editColumn("max_salary", function ($row) {
                if ($row["max_salary"] != null) {
                    return "₹" . $row["max_salary"];
                } else {
                    return "<span class='not-available'>Not Available</span>";
                }
            })
            ->editColumn("min_qualification", function ($row) {
                $r1 = "";
                switch ($row["min_qualification"]) {
                    case '1':
                        $r1 = "10";
                        break;
                    case '2':
                        $r1 = "10+2";
                        break;
                    case '3':
                        $r1 = "Graduation";
                        break;

                    default:
                        $r1 = "<span class='not-available'> Not Available </span>";
                        break;
                }

                return $r1;
            })
            ->editColumn("qualifications", function ($row) {
                $q1 = "";
                foreach ($row["qualifications"] as  $qualification) {
                    $q1 = $q1 . $qualification->details->qualification_name . ", ";
                }
                return substr(trim($q1), 0, -1);
            })
            ->editColumn("skills", function ($row) {
                $s1 = "";

                foreach ($row["skills"] as $skill) {
                    $s1 = $s1 . $skill->details->skill_name . ", ";
                }
                return substr(trim($s1), 0, -1);
            })
            ->editColumn("created_at", function ($row) {
                return Carbon::parse($row["created_at"])->format("d/m/Y h:ia");
            })
            ->rawColumns(["id", "opening_date", "closing_date", "information", "salary_disclosed", "min_salary", "max_salary", "qualifications", "job_name", "created_at"])
            ->make(true);
    }

    public function details($id)
    {
        $job = AllJob::findOrFail($id);

        $r1 = "";

        switch ($job["min_qualification"]) {
            case '1':
                $r1 = "10";
                break;
            case '2':
                $r1 = "10+2";
                break;
            case '3':
                $r1 = "Graduation";
                break;

            default:
                $r1 = "<span class='not-available'> Not Available </span>";
                break;
        }

        $job["min_qualification"] = $r1;


        return view("employer.job.details", ["job" => $job, "qualifications" => $job->qualification, "skills" => $job->skills]);
    }

    public function draft()
    {
        return view("employer.job.draft");
    }

    public function draftList()
    {
        $user = Auth()->user();
        $jobs = AllJob::where("user_id", $user->id)->where("published", 0)->with(["qualifications", "skills"])->orderBy("id", "desc")->get();


        return Datatables::of($jobs)
            ->editColumn("id", function ($row) {
                return "<a href='" . route("employer.job.details", $row["id"]) . "'>" . $row["id"] . "</a>";
            })
            ->editColumn("opening_date", function ($row) {
                $d1 = Carbon::parse($row["opening_date"])->format("d/m/Y");
                return $d1;
            })
            ->editColumn("closing_date", function ($row) {
                $d1 = Carbon::parse($row["closing_date"])->format("d/m/Y");
                return $d1;
            })
            ->editColumn("information", function ($row) {
                $r1 = substr($row["information"], 0, 100);
                return $r1;
            })
            ->editColumn("salary_disclosed", function ($row) {
                if ($row["salary_disclosed"] == "no") {
                    return "<span class='text-danger'>" . $row["salary_disclosed"] . "</span>";
                } else {
                    return "<span class='text-success'>" . $row["salary_disclosed"] . "</span>";
                }
            })
            ->editColumn("min_salary", function ($row) {
                if ($row["min_salary"] != null) {
                    return "₹" . $row["min_salary"];
                } else {
                    return "<span class='not-available'>Not Available</span>";
                }
            })
            ->editColumn("max_salary", function ($row) {
                if ($row["max_salary"] != null) {
                    return "₹" . $row["max_salary"];
                } else {
                    return "<span class='not-available'>Not Available</span>";
                }
            })
            ->editColumn("min_qualification", function ($row) {
                $r1 = "";
                switch ($row["min_qualification"]) {
                    case '1':
                        $r1 = "10";
                        break;
                    case '2':
                        $r1 = "10+2";
                        break;
                    case '3':
                        $r1 = "Graduation";
                        break;

                    default:
                        $r1 = "<span class='not-available'> Not Available </span>";
                        break;
                }

                return $r1;
            })
            ->editColumn("qualifications", function ($row) {
                $q1 = "";
                foreach ($row["qualifications"] as  $qualification) {
                    $q1 = $q1 . $qualification->details->qualification_name . ", ";
                }
                return substr(trim($q1), 0, -1);
            })
            ->editColumn("skills", function ($row) {
                $s1 = "";

                foreach ($row["skills"] as $skill) {
                    $s1 = $s1 . $skill->details->skill_name . ", ";
                }
                return substr(trim($s1), 0, -1);
            })
            ->editColumn("created_at", function ($row) {
                return Carbon::parse($row["created_at"])->format("d/m/Y h:ia");
            })
            ->rawColumns(["id", "opening_date", "closing_date", "information", "salary_disclosed", "min_salary", "max_salary", "qualifications", "created_at"])
            ->make(true);
    }

    public function jobEdit($id)
    {
        $states = State::all();
        $category = Category::where('status', 'Active')->get();
        $job = AllJob::findOrFail($id);
        $qualifications = $job->qualifications;
        $j_q = [];
        foreach ($qualifications as $qualification) {
            $j_q[] = ["id" => $qualification->all_qualification_id, "text" => $qualification->details->qualification_name];
        }

        $skills = $job->skills;
        $j_s = [];
        foreach ($skills as $skill) {
            $j_s[] = ["id" => $skill->all_skill_id, "text" => $skill->details->skill_name];
        }

        return view("employer.job.edit", ["states" => $states, "category" => $category, "job" => $job, "qualifications" => $j_q, "skills" => $j_s]);
    }

    public function jobUpdate($id, Request $request)
    {


        //Update Job code
        $user = Auth()->user();
        $validator = Validator::make(
            $request->all(),
            [
                "job_name" => "required|string",
                "job_designation" => "required|string",
                "job_category" => "required|string",
                "job_image" => "mimes:jpg,png,jpeg,gif,svg",
                "job_type" => "required|string",
                "office_type" => "required|string",
                "information" => "nullable|string",
                "opening_date" => "required|date",
                "closing_date" => "required|date|after:opening_date",
                "location" => "required|string",
                "state" => "required|string",
                "salary_disclosed" => "required",
                "min_salary" => "required_if:salary_disclosed,==,yes|nullable|numeric",
                "max_salary" => "required_if:salary_disclosed,==,yes|nullable|numeric",
                "min_qualification" => "required|numeric",
                "min_experience" => "required|numeric|integer",
                "max_experience" => "nullable|numeric|integer",
                "qualifications" => "required",
                "skills" => "required",
                "publish_option" => "required"

            ]
        );

        if ($validator->fails()) {
            return response()->json(['status' => 0, 'error' => $validator->errors()->toArray()]);
        } else {

            $job = AllJob::findOrFail($id);
            // Update image code
            if ($request->hasFile('job_image')) {
                if (isset($job->image) ) {
                    $destination = "admin/upload/image/job_images/" . $job->image;


                    if (file_exists($destination)) {
                        unlink($destination);                  // delete old image from folder
                    }
                }


                $image = $request->job_image;

                $imagename = $image->getClientOriginalName();
                $image->move('admin/upload/image/job_images/', $imagename);
                $image = $imagename;
                $request["image"] = $image;
            }

            $job->update($request->except(["qualification", "skills", "publish_option"]));

            $job->qualifications()->delete();
            $job->skills()->delete();

            foreach ($request["qualifications"] as $qualification) {
                JobQualification::create([
                    "all_qualification_id" => $qualification,
                    "all_job_id" => $job->id,
                ]);
            }

            foreach ($request["skills"] as $skill) {
                JobSkill::create([
                    "all_skill_id" => $skill,
                    "all_job_id" => $job->id,
                ]);
            }
            return response()->json([
                'status' => 1,
                'id'=>$job->id,
                'success' => 'Successfully update your request'
            ]);
        }
    }
}
