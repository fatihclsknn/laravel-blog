<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Category;
use App\Models\Page;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        $categories=Category::all();
        $about =About::whereStatus(1)->firstOrFail();
        return view('front.about',compact('categories','about'));
    }
}
