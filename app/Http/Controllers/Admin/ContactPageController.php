<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\ContactPage;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ContactPageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contacts=ContactPage::all();
        return view('admin.contact.index',compact('contacts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.contact.index');

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
                $image->move(public_path('uploads/contact'), $fileName);
            }

        }

        $contact=ContactPage::create([
            'title'=>Str::title($request->title),
            'slug'=>Str::slug($request->slug),
            'content'=>$request->contents,
            'image' => 'uploads/contact/'. $fileName,
        ]);
        toastr()->info('Sayfa başarı ile olusturldu', 'Başarılı');

        return redirect()->route('contact_pages.index');
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
        $contact=ContactPage::findOrFail($id);
        return  view('admin.contact.update',compact('contact'));
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

        $contact = ContactPage::findOrFail($id);
        $contact->title=$request->title;
        $contact->slug=Str::slug($request->slug);
        $contact->content=$request->contents;

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
                $image->move(public_path('uploads/contact'), $fileName);
            }
            $contact->image='uploads/contact/'.$fileName;

        }

        $contact->save();
        toastr()->info('SAYFA BAŞARIYLA GÜNCELLENDİ!', 'Başarılı');
        return redirect()->route('contact_pages.index');
    }


    public function status(Request $request)
    {

        $contact = ContactPage::findOrFail($request->id);
        $contact->status=$request->statu =="true" ? 1 : 0;
        $contact->save();
    }





    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $contact = ContactPage::findOrFail($id);
         $contact->delete();
        toastr()->info('YAZİ BAŞARIYLA SİLİNDİ!', 'Başarılı');
        return redirect()->route('contact_pages.index');
    }
}
