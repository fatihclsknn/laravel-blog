<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function  index()
    {
        $categories =Category::all();
        $articles =Article::all();
        return view('admin.dashboard',compact('categories','articles'));
    }
}
