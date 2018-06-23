@extends('backend.admin_master')
@section('page_title','Subscriber List')
@section('admin_content')
<div class="col-lg-12">
    <div class="card">
        <div class="card-header"><strong>Sending Email to {{$subscriber->email}}</strong>
            <small>
                <p class="text-center  alert-success">{{Session::get('message_success')}}</p>
                <p class="text-center  alert-danger">{{Session::get('message_error')}}</p>
            </small>
        </div>

            <div class="card-body card-block">
              <form class="" action="{{route('sendMail')}}" method="post">@csrf

                <input type="hidden" name="mail_to" value="{{$subscriber->email}}">
                <div class="form-group">
                    <label for="company" class=" form-control-label">Subject</label>
                    <input type="text" id="subject" name="subject" placeholder="Message Subject" class="form-control">

                </div>
                <div class="form-group">
                    <label for="company" class=" form-control-label">Message</label>
                    <textarea name="messages" class="form-control" rows="8" cols="80"></textarea>

                </div>

                <button type="submit" class="btn btn-dark btn-lg btn-block">Send</button>
              </form>
             </div>

    </div>
</div>
@endsection
