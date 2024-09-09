<?php

namespace App\Http\Controllers;
use App\Models\Blogs;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

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
        $blogs=Blogs::where('archive',0)->where('user_id',Auth::id())->get();
        return view('blog.index',[
            'blogs'=> $blogs
        ]);
    }
}
