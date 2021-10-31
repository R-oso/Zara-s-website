<?php

namespace App\Http\Controllers;

use App\Models\Practice;
use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CreateController extends Controller
{
    public function index()
    {

        $practices = Practice::all();
        return view('posts.create', compact('practices'));

    }

    public function store(Request $req)
    {

        $req->validate([
            'image' => 'required',
            'title' => 'required',
            'description' => 'required',
            'practice_id' => 'required'
        ]);

        $image = $req->file('image')->storePublicly('images', 'public');

        //<!----To edit filename in database >!----
        //$image = str_replace('images/', '', $image);

        $project = new Project;
        $project->image = $image;
        $project->title = $req->title;
        $project->description = $req->description;
        $project->practice_id = $req->practice_id;
        $project->save();

        return redirect('/');
    }

    public function storePractice(Request $req)
    {

        $req->validate([
            'name' => 'required'
        ]);

        $practice = new Practice;
        $practice->name = $req->name;
        $practice->save();

        return redirect('/');
    }

}

