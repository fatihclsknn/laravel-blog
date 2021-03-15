<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        $categories=Category::all();
        return view('front.about',compact('categories'));
    }
}
