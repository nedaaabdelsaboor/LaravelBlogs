<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Blogs;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct(){
        $this->middleware('auth');
    }
    public function index()
    {
        $blogs=Blogs::where('archive',0)->where('user_id',Auth::id())->get();
        return view('blog.index',[
            'blogs'=> $blogs
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('blog.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $img= $request->img;
        $img_new_name=time() . $img->getClientOriginalName();
        $img->move('img',$img_new_name);
        Blogs::create([
            'title'=> $request->title,
            'body'=> $request->body,
            'user_id'=> Auth::id(),
            'img'=> 'img/' . $img_new_name
        ]);
        return redirect()->route('index');
    }
    
    public function archive($id){
        $blog=Blogs::findOrFail($id);
        $blog->update([
            'archive'=> 1
        ]);
        return redirect()->back();
    }
    public function reweet($id){
        $blog=Blogs::findOrFail($id);
        $blog->update([
            'archive'=> 0
        ]);
        return redirect()->back();
    }
    public function trash(){
        $blog= Blogs::where('archive',1)->where('user_id',Auth::id())->get();
        return view('blog.archive',[
            'blogs'=>$blog
        ]);
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $blog=Blogs::findOrFail($id);
        return view('blog.edit',[
            'blog'=>$blog
        ]);
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $blog=Blogs::findOrFail($id);

        if($request->img){
            $img=$request->img;
            $img_new_name=time() . $img->getClientOriginalName();
            $img->move('img',$img_new_name);
            $blog->update([
                'title'=>$request->title,
                'body'=>$request->body,
                'img'=>'img/' . $img_new_name
            ]);
        }else{
            $blog->update([
                'title'=>$request->title,
                'body'=>$request->body,
            ]);
        }
        return redirect()->route('index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $blog=Blogs::findOrFail($id);
        $blog->delete();
        return redirect()->back();
    }
}
