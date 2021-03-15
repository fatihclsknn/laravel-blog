<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function index($slug)
    {
        $category =Category::whereSlug($slug)->firstOrFail();
        $data['category']=$category;
        $data['articles']=Article::where('category_id',$category->id)->
        orderBy('created_at','DESC')->
        get();
        $categories = Category::all();

        return view('front.category',$data,compact('category','categories'));
    }
}
