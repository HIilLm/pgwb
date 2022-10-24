<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class LandingController extends Controller
{

    public function landing()
    {
       return view('frontend.profil', [
        "page" => "Profil"
       ]);
    }

    public function about()
    {
        return view('frontend.about', [
            "page" => "About"
           ]);
    }

    public function projects()
    {
        return view('frontend.projects', [
            "page" => "Projects",
            "projek" => Project::all()
           ]);
    }

    public function project($id)
    {
        return view('frontend.project',[
            "page" =>"Projects",
            "projek" => Project::find($id)
        ])
        ;

    }

    public function contact()
    {
        return view('frontend.contact', [
            "page" => "Contact"
           ]);
    }
}
