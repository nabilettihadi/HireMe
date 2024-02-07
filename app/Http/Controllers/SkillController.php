<?php

namespace App\Http\Controllers;

use App\Models\Skill;
use Illuminate\Http\Request;

class SkillController extends Controller
{
    public function index()
    {
        $skills = Skill::all();
        return view('skills.index', compact('skills'));
    }

    public function show($id)
    {
        $skill = Skill::findOrFail($id);
        return view('skills.show', compact('skill'));
    }


}