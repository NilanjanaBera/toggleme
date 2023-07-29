<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class JobSeekerAppliedJobsController extends Controller
{
    public function index()
    {
        $user = Auth()->user();

        $jobs = $user->appliedJobs;

        return view("jobs.applied-jobs", ["jobs" => $jobs]);
    }
}
