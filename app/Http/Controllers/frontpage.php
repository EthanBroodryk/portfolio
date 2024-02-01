<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Admin;
use App\Models\Project;


class frontpage extends Controller
{
    //

    public function index()
    {
        $folder = '/home/ethan/Documents/portfoliosite/public/cv';
        $resume = scandir($folder);
        // dd('file',$file[2]);
        $projectImages  = Project::all();
        $carouselImages = Admin::all();
        return Inertia::render('Welcome', ['carouselImages' => $carouselImages,'projectImages'=> $projectImages,'resume'=>$resume[2]]);
    }

    

}
