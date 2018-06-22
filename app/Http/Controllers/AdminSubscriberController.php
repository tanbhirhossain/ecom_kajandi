<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\EmailSubscriber;
use DB;
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
}
