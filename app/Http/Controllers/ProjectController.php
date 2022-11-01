<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use App\Models\Project;
use App\Models\Practice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class ProjectController extends Controller
{
    public function index()
    {

        //Collect product data
        $projects = Project::all();
        $practices = Practice::all();

        return view('projects/projects', compact('projects', 'practices'));
    }

    public function details($id)
    {
        //Retrieve practice and project id's
        $projectDetails = Project::find($id);
        $practiceId = DB::table('projects')->where('id', '=', $id)->value('practice_id');

        //Retrieve correct practice name
        $projectPractice = DB::table('practices')->where('id', '=', $practiceId)->value('name');


        return view('projects/about', compact('projectDetails', 'projectPractice'));
    }

    public function search(Request $req) {

        $search = $req->get('search');

        $projects = DB::table('projects')->where('title', 'like', '%'.$search.'%')
            ->simplePaginate('10');

        return view('projects.projects', compact('projects', 'search'));
    }

    public function filter(Request $req, Practice $practice) {

        $filter = $req->get('practice_id');

        $projects = DB::table('projects')->where('practice_id', '=', $filter)
            ->simplePaginate('10');

        return view('projects.projects', compact('projects', 'filter'));
    }

    public function destroy($id) {

        $project = Project::find($id);
        $project->delete();

        return redirect('/home')->with('');
    }

    public function favorite(int $id) {

        $user_id = Auth::id();

        if (!Auth::check()){
            return redirect('/login');
        }

        if (DB::table('favorites')->where('project_id', '=', $id)->doesntExist() && DB::table('favorites')->where('user_id', '=', $user_id)->doesntExist()) {
            Auth::user()->favorites()->attach($id);
            $liked = 'You have favorited this post';
            return redirect()->route('about', ['id' => $id])->with('liked', $liked);

        } else {
            Auth::user()->favorites()->detach($id);
            $disliked = 'You have removed this project from your favorites list';
            return redirect()->route('about', ['id' => $id])->with('disliked', $disliked);
        }
    }
}
