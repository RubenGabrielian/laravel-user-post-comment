<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        return view('home');
    }

    public function users ()
    {
        $users = User::latest()->get();
        return view('Home.users', [
            'users' => $users
        ]);
    }

    public function posts ()
    {
        $posts = Post::latest()->with('comments')->get();
        return view('Home.posts',[
            'posts' => $posts
        ]);
    }

    public function myPosts ()
    {
        $posts = Post::where('user_id',Auth::user()->id)->get();
        return view('Home.my',[
            'posts' => $posts
        ]);
    }
    public function edit  ($id)
    {
        $post = Post::find($id);
        return view('Home.edit',[
            'post' => $post
        ]);
    }
}
