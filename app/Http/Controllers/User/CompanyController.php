<?php

namespace App\Http\Controllers\User;

use App\Models\Company;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CompanyController extends Controller
{
    //

    public function details($id)
    {
        $company = Company::findOrFail($id);
        return view('jobseeker.company.details', ["company" => $company]);
    }
}
