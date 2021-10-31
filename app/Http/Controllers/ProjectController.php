<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProjectController extends Controller
{
    public function index()
    {

        //Collect product data
        $title = 'My very first title';
        $projects = Project::all();

        return view('projects/projects', compact('title', 'projects'))
            ->with('likes', Like::all());
    }

    public function details($id)
    {

        //Store id
        $projectDetails = Project::find($id);

        return view('projects/about', compact('projectDetails'));
    }

    public function search(Request $req) {

        $search = $req->get('search');
        $projects = DB::table('projects')->where('title', 'like', '%'.$search.'%')
            ->simplePaginate('3');

        return view('projects.projects', compact('projects', 'search'));
    }
}
