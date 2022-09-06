<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Comment;
use App\Models\Category;
use App\Models\Postslider;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {   
        //$comments = Post::find(1)->comments->where('status', 1);
        //dd($categories->firstWhere('id', 1)->title);

        $posts=Post::latest()->get();
        $categories = Category::all();
        $postsliders= Postslider::all();
        return view('index',compact('posts','categories','postsliders','request'));
    }

    public function show(Request $request,$id)
    {  
        $posts=Post::latest()->where('category_id',$id)->get();
        $categories = Category::all();
        return view('show',compact('posts','categories','request'));
    }

    public function search(Request $request)
    {
        
        $keyword = $request->get('search');
        
        $posts=Post::latest()->where('body','LIKE','%'.$keyword.'%')->get();
        $categories = Category::all();
        return view('search',compact('posts','categories','request'));
    }

    public function single(Request $request,$id)
    {
        $posts=Post::Where('id',$id)->get();
        $comments=Comment::latest()->where('post_id',$id)->get();
        $categories = Category::all();
        return view('single',compact('posts','categories','comments','request'));
    }

    public function store_comment(Request $request)
    {
        
        $request->validate([
            'name' => 'required',
            'comment' => 'required'
        ]);
        Comment::create([
            'name' => $request->name,
            'comment' => $request->comment,
            'post_id' => $request->post_id
        ]);
        return to_route('weblog.single', ['id' => $request->post_id]);
    }

}
