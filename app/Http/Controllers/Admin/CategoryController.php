<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use function React\Promise\all;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::simplePaginate(5);
        return view('admin.category.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return  view('admin.category.index');
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
            'title' => 'required|min:3|max:30|unique:categories,title',
            'slug' => 'required|min:3|max:30|unique:categories,slug',
        ]);
        $category =Category::create([
            'title'=>$request->title,
            'slug'=>Str::slug($request->slug),
        ]);
        toastr()->info('KATEGORİ BAŞARIYLA EKLENDİ!', 'Başarılı');
        return redirect()->route('category.index');

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
        $category =Category::findOrFail($id);
           return view('admin.category.update',compact('category'));
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
        $request->validate([
            'title' => 'required|min:3|max:20',
            'slug' => 'required|unique:articles,slug',

        ]);
        $category = Category::findOrFail($id);
        $category->title=$request->title;
        $category->slug=Str::slug($request->slug);
        $category->save();
        toastr()->info('KATEGORİ BAŞARIYLA GÜNCELLENDİ!', 'Başarılı');

        return redirect()->route('category.index');

    }

    public function status(Request $request)
    {
        $category = Category::findOrFail($request->id);
        $category->status=$request->statu =="true" ? 1 : 0;
        $category->save();
    }




    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category =Category::findOrFail($id);
        $category->delete();
        toastr()->info('KATEGORİ BAŞARIYLA SİLİNDİ!', 'Başarılı');

        return redirect()->route('category.index');
    }
}
