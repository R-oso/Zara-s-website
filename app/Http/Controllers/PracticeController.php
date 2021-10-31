<?php

namespace App\Http\Controllers;

use App\Models\Practice;
use Illuminate\Http\Request;

class PracticeController extends Controller
{
    public function index() {

        $practices = Practice::all();

        return view('posts.create_practice', compact('practices'));
    }
}
