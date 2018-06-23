<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Faquestion;

class GuestController extends Controller
{
  public function askQuestion()
  {
    $not_ans = Faquestion::all()->where('status', Null);
    return view('frontend.faq.faq_list',compact('not_ans'));
  }
}
