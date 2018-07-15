@extends('frontend.front_view.front_master')
@section('page-title','Company Profile')
@section('style')

@endsection

@section('main_content')

<form action="{{route('sendCompanySupMail')}}" method="post">@csrf

  <input type="hidden" name="mail_to" value="{{$seller->contactemail}}">
<div class="contact_suppliers_form container">
   <div class="cs_form">
     <div class="cs_form_header">
       <p>
         <i class="fa fa-user"> </i>  {{$seller->vendorname}}.
       </p>
     </div>
     <div class="form_header">
       <small>
           <p class="text-center  alert-success">{{Session::get('message_success')}}</p>
           <p class="text-center  alert-danger">{{Session::get('message_error')}}</p>
       </small>
       <label><span>*</span> Message:</label>
       <p class="mark">
           <i class="fa fa-clock-o"></i>  Enter product details such as color, size, materials etc. and other specification requirements to receive an accurate quote.
       </p>
     </div>
     <div class="form_editor">
       @if ($errors->has('messages'))
           <span class="invalid-feedback">
               <strong>{{ $errors->first('messages') }}</strong>
           </span>
       @endif
       <textarea name="messages" class="editor textarea"></textarea>

     </div>
     <div class="form_bottom">
      <!-- <div class="file_input">
         <input type="file" name="">
       </div>-->

       <label class="form_email"><span>*</span> Please enter email address:<br>
         @if ($errors->has('mail_from'))
             <span class="invalid-feedback">
                 <strong>{{ $errors->first('mail_from') }}</strong>
             </span>
         @endif
         <input name="mail_from" type="email" class="form_email_fd form-control"><br>

         <span class="email_bttm_txt">Please make sure email address is entered correctly.</span>
       </label>
       <br>
       <button type="submit" class="cs_submit_btn">Send Enquery</button>
       <br><br>
       <span class="cs_chkbx"><input type="checkbox" checked="auto" disabled> I agree with Alibaba.com's Terms of Use.</span>
     </div>
   </div>
 </div>
 </form>



@endsection
