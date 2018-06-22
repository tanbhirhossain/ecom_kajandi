<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\EmailSubscriber;

class EmailSubscriberController extends Controller
{
    public function saveEmail(Request $request)
    {
      $request->validate([
         'email' => 'required|string|email|max:255|unique:email_subscribers'

     ]);

     $subs = new EmailSubscriber();
     $subs->email = $request->email;
     $subs->save();

     return back()->with('message_success', 'Succesfully Subscribed');
     //return dd($subs);

    }

    
}
