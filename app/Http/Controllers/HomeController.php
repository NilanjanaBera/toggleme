<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\AllJob;
use App\Models\Company;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $categories = Category::orderBy('id', 'desc')->where("status", "Active")->get();

        $recent_jobs = AllJob::orderBy('id', 'desc')->where("published", 1)->limit(5)->with(["user"])->get();


        foreach ($recent_jobs as $job) {
            $job->company = $job->user->role->company;
        }

        $featured_jobs = AllJob::orderBy('id', 'desc')->where("featured", 1)->limit(5)->with(["user"])->get();

        foreach ($featured_jobs as $job) {
            $job->company = $job->user->role->company;
        }

        return view('home', ["recent_jobs" => $recent_jobs, "featured_jobs" => $featured_jobs, "categories" => $categories]);
    }
    public function auto_job_list(Request $request)
    {
        if($request->get('querry'))
        {
         $querry = $request->get('querry');
         $company = Company::where('company_name', 'like',  '%' . $querry . '%')->pluck('id')->toArray();

         $user = Role::whereIn('company_id', $company)->pluck('user_id')->toArray();
         $data = AllJob::where("published", 1)->with(["user"])
             ->where(function ($query) use ($user, $querry) {
                 $query->whereIn('user_id', $user)
                     ->orWhere('job_name', 'like',  '%' . $querry . '%')
                     ->orWhere('job_type', 'like',  '%' . $querry . '%');
             })

             ->get();
        //  $data = DB::table('apps_countries')
        //    ->where('country_name', 'LIKE', "%{$query}%")
        //    ->get();
         $output = '<ul class="dropdown-menu" style="display:block; position:relative">';
         $output .= '
         <li><a href="#">'.$data->user->role->company->company_name.'</a></li>
         ';
        //  foreach($data as $row)
        //  {
        //   $output .= '
        //   <li><a href="#">'.$row->user->role->company->company_name.'</a></li>
        //   ';
        //  }
         $output .= '</ul>';
         echo $output;

       }
    }
    public function job_list(Request $request)
    {
        $search_company = $request->get('company');
        $search_location = $request->get('location');
        if (!empty($search_company) && !empty($search_location)) {

            $company = Company::where('company_name', 'like',  '%' . $search_company . '%')->pluck('id')->toArray();

            $user = Role::whereIn('company_id', $company)->pluck('user_id')->toArray();
            $select_job = AllJob::where("published", 1)->with(["user"])

                ->where('location', 'like',  '%' . $search_location . '%')
                ->where(function ($query) use ($user, $search_company) {
                    $query->whereIn('user_id', $user)
                        ->orWhere('job_name', 'like',  '%' . $search_company . '%')
                        ->orWhere('job_type', 'like',  '%' . $search_company . '%');
                })

                ->paginate(3);
        } else if (!empty($search_company)) {

            $company = Company::where('company_name', 'like',  '%' . $search_company . '%')->pluck('id')->toArray();

            $user = Role::whereIn('company_id', $company)->pluck('user_id')->toArray();
            $select_job = AllJob::where("published", 1)->with(["user"])
                ->where(function ($query) use ($user, $search_company) {
                    $query->whereIn('user_id', $user)
                        ->orWhere('job_name', 'like',  '%' . $search_company . '%')
                        ->orWhere('job_type', 'like',  '%' . $search_company . '%');
                })

                ->paginate(3);


        } else if (!empty($search_location)) {
            $select_job = AllJob::where('location', 'like',  '%' . $search_location . '%')->where("published", 1)->with(["user"])->get();
        } else {
            $select_job = AllJob::where("published", 1)->with(["user"])->paginate(3);
            // dd($select_job);

        }
        foreach ($select_job as $job) {
            $job->company = $job->user->role->company;
        }
        return view('jobs.job_list', compact('select_job'));
    }
}
