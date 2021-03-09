<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Mail\ContactMail\Admin;
use App\Models\Contact;
use http\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index(Request $request)
    {


      if($request->isMethod('post')){

           $request->validate([
               'cName'=>'required|min:2|max:30',
               'cEmail'=>'required|email|min:2|max:100',
               'subject'=>'required|min:2|max:100',
               'cMessage'=>'required|min:2|max:255',

           ]);

          $contact= Contact::create([
              'name'=>$request->cName,
              'email'=>$request->cEmail,
              'subject'=>$request->subject,
              'message'=>$request->cMessage,
          ]);
          return  redirect()->route('front.homePage');
      }
        return view('front.contact');
    }


}
