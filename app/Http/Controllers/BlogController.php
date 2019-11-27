<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class BlogController extends Controller
{
    public function index()
    {
        $posts=Post::list();
        $viewData=[
            'list'=>$posts
        ];
        return view('blog.index',$viewData);
    }

   
}
