<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use function React\Promise\all;

class ArticlesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles=Article::all();
        return view('admin.articles.index',compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $categories= Category::all();
        return  view('admin.articles.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)

    {
        $request->validate([
            'title' => 'required|min:5|max:100',
            'slug' => 'required|unique:articles,slug',

        ]);


        if (request()->hasFile('image')) {

            $this->validate(request(), [
                'image' => 'required|mimes:jpg,png,svg,jpeg|max:4096'
            ]);

            $image = request()->file('image');
            // $image = request()->image;
            $originalName = $image->getClientOriginalName();
            // explode('.',$originalName);
            $extension = Str::of($originalName)->explode('.');
            $name = $extension->shift();
            $fileName = $name . '-' . time() . '.' . $image->extension();
            //  $fileName = $image->hashName();

            if ($image->isValid()) {
                // $image->move('uploads/products', $fileName);
                $image->move(public_path('uploads/article'), $fileName);
            }

        }

        $article=Article::create([
            'title'=>Str::title($request->title),
            'slug'=>Str::slug($request->slug),
            'category_id'=>$request->category,
            'content'=>$request->contents,
            'image' => 'uploads/article/'. $fileName,
            'author'=>$request->author


        ]);

      return redirect()->route('article.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)

    {
        $articles=Article::findOrFail($id);
        $categories= Category::all();

        return  view('admin.articles.update',compact('categories','articles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

      $article = Article::findOrFail($id);
      $article->title=$request->title;
        $article->slug=$request->slug;
        $article->category_id=$request->category;
        $article->author=$request->author;
        $article->content=$request->contents;
        $article->save();
        return redirect()->route('article.index');



    }

    public function status(Request $request)
    {

       $article = Article::findOrFail($request->id);
       $article->status=$request->statu =="true" ? 1 : 0;
       $article->save();
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $article = Article::findOrFail($id);
        $article->delete();
        return redirect()->route('article.index');
    }
}
