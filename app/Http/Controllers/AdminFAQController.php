<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Faquestion;
use App\Faqanswer;
use DB;

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

        return redirect()->route('pendingFaqList')->with('message_success', 'Answer Added Succesfully');
    }

}
