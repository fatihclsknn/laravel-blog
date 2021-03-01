<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;

class SinglePostController extends Controller
{
    public function index($slug)
    {
        $articles =Article::whereSlug($slug)->firstOrFail();
        return view('front.singlePost',compact('articles'));
    }
}
