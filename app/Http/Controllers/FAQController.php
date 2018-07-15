<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Faquestion;
use App\faqanswers;
use App\User;
use Mail;
use Auth;
use input;

class FAQController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');

    }

    public function postQuestion(Request $request)
    {
        $request->validate([
          'question' => 'required|min:3|max:400',
        ]);

        $pq = new Faquestion();
        $pq->question = $request->question;
        $pq->user_id = $request->user_id;
        $pq->save();

        return back()->with('message_success', 'Thanks for your Asking, we will reply you very soon');

    }

  



}
