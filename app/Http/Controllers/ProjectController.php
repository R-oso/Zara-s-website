<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index() {

        //Collect product data
        $title = 'My very first title';
        $projects = Project::all();

        return view('projects/projects', compact('title','projects'));
    }

    public function details($id) {

        //Store id
        $projectDetails = Project::find($id);

        return view('projects/about', compact('projectDetails'));
    }
}
