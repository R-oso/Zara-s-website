<?php

namespace App\Http\Controllers;

use App\Http\Requests\EditProfileRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use function React\Promise\all;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {

        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index() {

        return view('home');
    }

    public function edit() {

        $user_id = Auth::id();
        $favorites = DB::table('favorites')->where('user_id', '=', $user_id)->count();
        return view('edit_profile', compact('favorites'));
    }

    public function update(Request $req) {

        $req->validate([
            'name' => 'required',
            'email' => 'required'
        ]);

        $input = $req->except(['_token']);
        $id = Auth::user()->id;
        User::where('id','=', $id)->update($input);

        return redirect();
    }
}
