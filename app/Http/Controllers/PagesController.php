<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index()
    {
        return view('index')
        ->with('posts', Post::orderBy('updated_at', 'DESC')->get())
        ->with('tags', Tag::orderBy('updated_at', 'DESC')->get())
        ->with('categories', Category::orderBy('updated_at', 'DESC')->get());

    }
    public function search(Request $request)
    {
      $search = $request->get('search');
      $posts = Post::where('title', 'like', '%'.$search.'%')->paginate(5);
      return view('index',['posts' => $posts]); 
     
    }
}
