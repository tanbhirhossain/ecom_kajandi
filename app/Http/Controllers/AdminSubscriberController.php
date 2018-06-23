<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\EmailSubscriber;
use DB;
use input;
use App\Mail\SubscribersMail;
use Mail;

class AdminSubscriberController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth:admin');
      $this->middleware('admin');
  }
  public function subsList()
  {
    //$subs_lists = EmailSubscriber::All()->where('isDelete', Null);
    return view('backend.subscriber.subscriber_list');
  }

  public function deleteSubs($id)
  {
    $avp = DB::table('email_subscribers')
            ->where('id', $id)
            ->update([
              'isDelete' => 1,
            ]);
    return back()->with('message_success', 'Vendor Product Approved Succesfully');
  }

  public function sendNewsletter()
  {
    return view('backend.subscriber.send_newsletter');
  }

  public function sendMail(Request $request)
  {
    $subject = $request->input('subject');
    $messages = $request->input('messages');
    //$mail_to = $request->input('mail_to');
    $subscribers = EmailSubscriber::All();

      if (!empty($subscribers)) {
      foreach ($subscribers as $user) {
        Mail::send('backend.subscriber.mail_templates.newsletter', ['messages' => $messages, 'subject' => $subject],
        function ($message) use ($user, $subject){
            $message->subject($subject);
            $message->to($user['email']);
            $message->from('office@ecomkajandi.com');

        });
    }
    }
          return view('backend.subscriber.send_newsletter')->with('message_success', 'Email sent Succesfully');
  }

  public function showSingleMail($id)
  {
    $subscriber = EmailSubscriber::find($id);
    return view('backend.subscriber.send_single_email',compact('subscriber'));
  }

  public function sendSingleMail(Request $request)
  {
    $subject = $request->input('subject');
    $messages = $request->input('messages');
    $mail_to = $request->input('mail_to');
    //$subscribers = EmailSubscriber::All();


        Mail::send('backend.subscriber.mail_templates.newsletter', ['messages' => $messages, 'subject' => $subject],
        function ($message) use ($mail_to, $subject){
            $message->subject($subject);
            $message->to($mail_to);
            $message->from('office@ecomkajandi.com');


        });
        return back()->with('message_success', 'Email sent Succesfully');



  }

}
