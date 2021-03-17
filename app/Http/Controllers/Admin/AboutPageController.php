<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\About;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AboutPageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $abouts = About::all();
        return  view('admin.about.index',compact('abouts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.about.index');
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
            'title' => 'required|min:3|max:20',
            'slug' => 'required|min:3|max:20',

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
                $image->move(public_path('uploads/about'), $fileName);
            }

        }

        $about=About::create([
            'title'=>Str::title($request->title),
            'slug'=>Str::slug($request->slug),
            'content'=>$request->contents,
            'image' => 'uploads/about/'. $fileName,
        ]);
        toastr()->info('YAZI BAŞARIYLA OLUSTURULDU!', 'Başarılı');

        return redirect()->route('aboutpage.index');
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
        $about=About::findOrFail($id);
        return  view('admin.about.update',compact('about'));

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
            'slug' => 'required|min:3|max:20',
            'contents' =>'required|string',

        ]);

        $about = About::findOrFail($id);
        $about->title=$request->title;
        $about->slug=Str::slug($request->slug);
        $about->content=$request->contents;

        if (request()->hasFile('image')) {

            $this->validate(request(), [
                'image' => 'mimes:jpg,png,svg,jpeg|max:4096'
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
                $image->move(public_path('uploads/about'), $fileName);
            }
            $about->image='uploads/about/'.$fileName;

        }

        $about->save();
        toastr()->info('SAYFA BAŞARIYLA GÜNCELLENDİ!', 'Başarılı');
        return redirect()->route('aboutpage.index');

    }



    public function status(Request $request)
    {

        $about = About::findOrFail($request->id);
        $about->status=$request->statu =="true" ? 1 : 0;
        $about->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */





    public function destroy($id)
    {
        $about = About::findOrFail($id);
        $about->delete();
        toastr()->info('YAZİ BAŞARIYLA SİLİNDİ!', 'Başarılı');
        return redirect()->route('aboutpage.index');
    }
}
