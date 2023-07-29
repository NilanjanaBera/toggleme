<?php

namespace App\Http\Controllers;

use App\Models\AllQualification;
use Illuminate\Http\Request;

class AllQualificationController extends Controller
{
    public function index(Request $request)
    {
        $term = trim($request->q["term"]);
        if($term == "")
        {
            $qualifications = AllQualification::all()->select(["id", "qualification_name as text"])->limit(10);
        }
        $qualifications = AllQualification::where("qualification_name", "like", "%$term%")->select(["id", "qualification_name as text"])->limit(10)->get();

        return response()->json($qualifications);
    }
}
