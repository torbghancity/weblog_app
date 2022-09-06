<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Comment;
use App\Models\Category;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(User $user)
    {
        $post_user=User::latest()->find($user->id)->posts;
        return view('admin.index',compact('post_user','user'));
    }

    public function show(User $user , Post $post)
    {
        $comments=Post::latest()->find($post->id)->comments;
        $categories = Category::all();
        return view('admin.show',compact('post','comments','categories'));
    }
}
