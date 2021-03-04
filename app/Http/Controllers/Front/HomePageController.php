<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use Database\Seeders\ArticleSeeder;
use Illuminate\Http\Request;

class HomePageController extends Controller
{
    public function index()
    {
        $articles= Article::all();

        return view('front.homePage',compact('articles'));
    }
}
