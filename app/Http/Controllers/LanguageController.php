<?php

namespace App\Http\Controllers;

use App\Models\Language;
use Illuminate\Http\Request;

class LanguageController extends Controller
{
    public function index()
    {
        $languages = Language::all();
        return view('languages.index', compact('languages'));
    }

    public function show($id)
    {
        $language = Language::findOrFail($id);
        return view('languages.show', compact('language'));
    }

}
