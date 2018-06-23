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
  public function subsList()
  {
    $subs_lists = EmailSubscriber::All()->where('isDelete', Null);
    return view('backend.subscriber.subscriber_list',compact('subs_lists'));
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
    $mail_to = $request->input('');
    $subscribers = EmailSubscriber::All();

      if (!empty($subscribers)) {
      foreach ($subscribers as $user) {
        Mail::send('backend.subscriber.mail_templates.newsletter', ['messages' => $messages, 'subject' => $subject],
        function ($message) use ($user, $subject){
            $message->subject($subject);
            $message->to($user['email']);
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

    Mail::send('backend.subscriber.mail_templates.newsletter', $mail_to, function($message) use ($mail_to, $subject) {
        $message->to($mail_to);
        $message->subject($subject);

    });

    return view('backend.subscriber.send_single_email')->with('message_success', 'Email sent Succesfully');
  }

}
