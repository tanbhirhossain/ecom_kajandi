@extends('backend.admin_master')
@section('page_title','Product UNit Edit')
@section('admin_content')
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header"><strong>Product Unit Update Form</strong>
                <small>
                    <p class="text-center  alert-success">{{Session::get('message_success')}}</p>
                    <p class="text-center  alert-danger">{{Session::get('message_error')}}</p>
                </small>
            </div>
            {!! Form::open(['method'=>'POST','url'=>'update-unit','enctype'=>'multipart/form-data']) !!}
            <div class="card-body card-block">
                <div class="form-group">
                    <label for="company" class=" form-control-label">Update Product Unit</label>
                    <input type="text" id="company" name="name" value="{{$unit_by_id->name}}" class="form-control">
                    <input type="hidden" value="{{$unit_by_id->id}}" name="id"/>
                    @if ($errors->has('name'))
                        <div class="error">{{ $errors->first('name') }}</div>
                    @endif
                </div>

                <button type="submit" class="btn btn-dark btn-lg btn-block">Update</button>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection
