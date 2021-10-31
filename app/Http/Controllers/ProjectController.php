<?php

namespace App\Http\Controllers;

use App\Models\Like;
use App\Models\Project;
use App\Models\Practice;
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

    public function details(Request $req, $id)
    {
        //Retrieve practice and project id's
        $projectDetails = Project::find($id);
        $projectPractice = Practice::find($id);

        return view('projects/about', compact('projectDetails', 'projectPractice'));
    }

    public function search(Request $req) {

        $search = $req->get('search');
        $projects = DB::table('projects')->where('title', 'like', '%'.$search.'%')
            ->simplePaginate('3');

        return view('projects.projects', compact('projects', 'search'));
    }
}
