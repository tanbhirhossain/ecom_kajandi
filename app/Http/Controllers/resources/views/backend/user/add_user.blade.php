@extends('backend.admin_master')
@section('page_title','Add User')
@section('admin_content')
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header"><strong>User Form</strong>
                <small>
                    <p class="text-center  alert-success">{{Session::get('message_success')}}</p>
                    <p class="text-center  alert-danger">{{Session::get('message_error')}}</p>
                </small>
            </div>
            {!! Form::open(['method'=>'POST','url'=>'save-user','enctype'=>'multipart/form-data']) !!}
            <div class="card-body card-block">
                <div class="form-group">
                    <label for="company" class=" form-control-label">Add User Name</label>
                    <input type="text" id="company" name="name" placeholder="Enter User Name" class="form-control">
                    @if ($errors->has('name'))
                        <div class="error">{{ $errors->first('name') }}</div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="company" class=" form-control-label">Add User Login Email</label>
                    <input type="text" id="company" name="email" placeholder="Enter User LoginEmail" class="form-control">
                    @if ($errors->has('email'))
                        <div class="error">{{ $errors->first('email') }}</div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="company" class=" form-control-label">Add User Login Password</label>
                    <input type="password" id="company" name="password" placeholder="Enter User Login Password" class="form-control">
                    @if ($errors->has('password'))
                        <div class="error">{{ $errors->first('password') }}</div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="company" class=" form-control-label">Confirm Password</label>
                    <input type="password" id="company" name="password_confirmation" placeholder="Enter User Login Password" class="form-control">
                    @if ($errors->has('password_confirmation'))
                        <div class="error">{{ $errors->first('password_confirmation') }}</div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="SelectLm" class=" form-control-label">Add User Role</label>
                    <select name="user_role" id="SelectLm" class="form-control-sm form-control" required>
                        <option value="0">Select One</option>
                            <option value="1">Admin</option>
                            <option value="3">Moderator</option>
                            <option value="4">Editor</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-dark btn-lg btn-block">Add</button>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection
