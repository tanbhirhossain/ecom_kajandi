@extends('frontend.front_view.front_master')
@section('page-title','Company Profile')
@section('style')

@endsection

@section('main_content')
<div class="contact_suppliers_form container">
   <div class="cs_form">
     <div class="cs_form_header">
       <p>
         <i class="fa fa-user"> </i>  Adam xu Shenzhen Feijiada Technology Co., Ltd.
       </p>
     </div>
     <div class="form_header">
       <label><span>*</span> Message:</label>
       <p class="mark">
           <i class="fa fa-clock-o"></i>  Enter product details such as color, size, materials etc. and other specification requirements to receive an accurate quote.
       </p>
     </div>
     <div class="form_editor">
       <textarea class="editor textarea"></textarea>
     </div>
     <div class="form_bottom">
      <!-- <div class="file_input">
         <input type="file" name="">
       </div>-->
       <label class="form_email"><span>*</span> Please enter email address:<br>
         <input type="email" class="form_email_fd form-control"><br>
         <span class="email_bttm_txt">Please make sure email address is entered correctly.</span>
       </label>
       <br>
       <button class="cs_submit_btn">Send Enquery</button>
       <br><br>
       <span class="cs_chkbx"><input type="checkbox" checked="auto" disabled> I agree with Alibaba.com's Terms of Use.</span>
     </div>
   </div>
 </div>



@endsection
