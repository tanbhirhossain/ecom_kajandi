<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Faquestion;
use App\Faqanswer;
use DB;
use Mail;

class AdminFAQController extends Controller
{
    public function pendingFaqList()
    {
      $not_ans = Faquestion::all()->where('status', Null);
      return view('backend.faq.not_ans_list',compact('not_ans'));
    }

    public function answerFaq($id)
    {
      $question = Faquestion::find($id);
      return view('backend.faq.answer_form',compact('question'));
    }

    public function postFaqAnswer(Request $request)
    {
      $request->validate([
        'answer' => 'required|min:3|max:400',
      ]);

      $pa = new Faqanswer();
      $pa->question_id = $request->question_id;
      $pa->answer = $request->answer;
      $pa->ans_by = $request->ans_by;
      $pa->save();

      DB::table('faquestions')
          ->where('id', $request->question_id)
          ->update([
              'status' => 1
          ]);

          $user = Faquestion:://DB::table('faquestions')
                   join('users', 'users.id', '=', 'faquestions.user_id')
                  ->where('faquestions.id', $request->question_id)
                  ->first();

          $subject = 'Question Answered from Ecommerce Kajandi';
          $messages = 'Question:'. $user->question . 'Answer:'. $request->answer;
          $mail_to = $user->email;
          //$subscribers = EmailSubscriber::All();


              Mail::send('backend.subscriber.mail_templates.newsletter', ['messages' => $messages, 'subject' => $subject],
              function ($message) use ($mail_to, $subject){
                  $message->subject($subject);
                  $message->to($mail_to);
                  $message->from('office@ecomkajandi.com');
              });
        return redirect()->route('pendingFaqList')->with('message_success', 'Answer Added Succesfully');
    }

    public function faqPendingDelete($id)
    {
      $pl = Faquestion::find($id);
      $pl->delete();

      return back()->with('message_success', 'Answer Deleted Succesfully');
    }

    public function faqAnsweredList()
    {
      $answered_list = Faqanswer::
          join('faquestions', 'faquestions.id', '=', 'question_id')
          ->where('status', 1)
          ->select('faquestions.question','faqanswers.id as fid','faqanswers.answer')
          ->get();
      return view('backend.faq.answered_list',compact('answered_list'));
    }

    public function faqAnsEdit($id)
    {
      $faq_ans = Faqanswer::
                  join('faquestions','faquestions.id', '=', 'question_id')

                  ->find($id);
      return view('backend.faq.ans_edit',compact('faq_ans'));
    }

    public function faqAnsUpdate(Request $request,$id)
    {
      $request->validate([
        'answer' => 'required|min:3|max:400',
      ]);

      $pa = Faqanswer::find($id);
    //  $pa->question_id = $request->question_id;
      $pa->answer = $request->answer;
      $pa->ans_by = $request->ans_by;
      $pa->save();

      return back()->with('message_success', 'Answer Updated Succesfully');
    }

}
