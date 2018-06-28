<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Faquestion;
use DB;

class GuestController extends Controller
{
  public function askQuestion()
  {
    $show_faq = Faquestion:://DB::table('faquestions')
               join('users', 'users.id', '=', 'user_id')
              ->join('faqanswers','faqanswers.question_id', '=', 'faquestions.id' )
              ->where('faquestions.status', 1)
              ->select('faquestions.question','users.name', 'faquestions.created_at as qs_time',
                      'faqanswers.answer','faqanswers.updated_at as ans_time')
              ->paginate('10');

    return view('frontend.faq.faq_list',compact('show_faq'));
  }
}
