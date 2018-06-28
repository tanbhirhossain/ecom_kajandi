@extends('backend.admin_master')
@section('page_title','Category')
@section('admin_content')
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header"><strong>Category Form</strong>
                <small>
                    <p class="text-center  alert-success">{{Session::get('message_success')}}</p>
                    <p class="text-center  alert-danger">{{Session::get('message_error')}}</p>
                </small>
            </div>
            {!! Form::open(['method'=>'POST','url'=>'save-blog-category','enctype'=>'multipart/form-data']) !!}
            <div class="card-body card-block">
                <div class="form-group">
                    <label for="company" class=" form-control-label">Add New Category</label>
                    <input type="text" id="company" name="name" placeholder="Enter Category Title" class="form-control">
                    @if ($errors->has('name'))
                        <div class="error">{{ $errors->first('name') }}</div>
                    @endif
                </div>
                <button type="submit" class="btn btn-dark btn-lg btn-block">Add</button>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection