<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Seller;
use App\SellerProduct;
use Auth;
use App\User;
use Mail;


class VendorProfileController extends Controller
{
    public function showVendorProfile($id){
      $vendorProduct = SellerProduct::where('seller_id', $id)->get();
      $vendorProfile = Seller::where('user_id', $id)->first();
      return view('frontend.seller.profile.show_profile',compact('vendorProfile','vendorProduct'));
    }

    public function sendingContactMail(Request $request)
    {
        $request->validate([
            'messages' => 'required|max:8000|min:20',
        ]);

        $subject = "From Kajandi User";
        $messages = $request->messages;
        $mail_to = $request->mail_to;
        //$subscribers = EmailSubscriber::All();
        $mail_from = User::where('id', Auth::user()->id)->first();
         $m_from = $mail_from->email;


            Mail::send('backend.subscriber.mail_templates.newsletter', ['messages' => $messages, 'subject' => $subject],
            function ($message) use ($mail_to, $subject, $m_from){
                $message->subject($subject);
                $message->to($mail_to);
                $message->from($m_from);



            });

              return back()->with('message_success', 'Email sent Succesfully');


    }
}
