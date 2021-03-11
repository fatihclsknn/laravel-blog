<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

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
            'image' => 'uploads/products/' . $fileName,
            'author'=>$request->author


        ]);

        toastr()->success('Başarılı', 'Makele Başarıyla Oluşturuldu');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
