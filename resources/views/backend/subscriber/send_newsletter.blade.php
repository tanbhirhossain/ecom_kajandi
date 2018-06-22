@extends('backend.admin_master')
@section('page_title','Subscriber List')
@section('admin_content')

<div class="col-lg-12">
    <div class="card">
        <div class="card-header"><strong>Sending Newsletter</strong>
            <small>
                <p class="text-center  alert-success">{{Session::get('message_success')}}</p>
                <p class="text-center  alert-danger">{{Session::get('message_error')}}</p>
            </small>
        </div>

            <div class="card-body card-block">

                <div class="form-group">
                    <label for="company" class=" form-control-label">Send To</label>
                    <input type="text" id="email" name="email" placeholder="Email Address" class="form-control">
                    @if ($errors->has('email'))
                        <div class="error">{{ $errors->first('name') }}</div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="company" class=" form-control-label">Message</label>
                    <textarea name="message" rows="8" cols="80"></textarea>
                    @if ($errors->has('message'))
                        <div class="error">{{ $errors->first('message') }}</div>
                    @endif
                </div>

                <button type="submit" class="btn btn-dark btn-lg btn-block">Send</button>
             </div>

    </div>
</div>

@endsection
