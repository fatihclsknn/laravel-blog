<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;

class SinglePostController extends Controller
{
    public function index($slug)
    {
        $articles =Article::whereSlug($slug)->firstOrFail();
        $categories=Category::all();

        return view('front.singlePost',compact('articles','categories'));
    }
}
