<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;

class CreateController extends Controller
{
    public function index() {

        return view('posts.create');
    }

    public function store(Request $req) {

        $req->validate([
            'image' => 'required',
            'title' => 'required',
            'description' => 'required'
        ]);

        $image = $req->file('image')->storePublicly('images', 'public');

        //<!----To edit filename in database >!----
        //$image = str_replace('images/', '', $image);

        $project = new Project;
        $project->image = $image;
        $project->title = $req->title;
        $project->description = $req->description;
        $project->save();

        return redirect('/');
    }

}

