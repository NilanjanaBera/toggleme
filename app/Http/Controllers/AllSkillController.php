<?php

namespace App\Http\Controllers;

use App\Models\AllSkill;
use Illuminate\Http\Request;

class AllSkillController extends Controller
{
    public function index(Request $request)
    {
        $term = trim($request->q["term"]);
        if($term == "")
        {
            $skills = AllSkill::all()->select(["id", "skill_name as text"])->limit(10);
        }
        $skills = AllSkill::where("skill_name", "like", "%$term%")->select(["id", "skill_name as text"])->limit(10)->get();

        return response()->json($skills);
    }
}
