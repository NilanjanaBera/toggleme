<?php

namespace App\Http\Controllers\User;

use App\Models\AllJob;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class JobController extends Controller
{
    public function index()
    {

    }

    public function details($id)
    {
        $job = AllJob::findOrFail($id);

        $r1="";

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

        return view('jobs.details', compact('job'));
    }
    public function category_wise_job_details($id)
    {
        $cat = Category::findOrFail($id);
        $select_job = AllJob::where('job_category',$cat->category)->where("published", 1)->with(["user"])->get();
        foreach ($select_job as $job) {
            $job->company = $job->user->role->company;
        }
        return view('jobs.category_wise_job_details',compact('cat','select_job'));
    }
    public function job_details($id)
    {
        $job = AllJob::findOrFail($id);
        $cat=$job->job_category;
        // dd($cat);
        $recent_jobs = AllJob::orderBy('id', 'desc')->where("published", 1)->where('id','!=',$id)->where("job_category",$cat)->with(["user"])->get();


        foreach ($recent_jobs as $sjob) {
            $sjob->company = $sjob->user->role->company;
        }


        $job = AllJob::findOrFail($id);

        $r1="";

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

        return view('jobs.job_details', compact('job','recent_jobs'));
    }
}
