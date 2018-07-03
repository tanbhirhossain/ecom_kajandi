@extends('backend.admin_master')
@section('page_title','Answer Question')
@section('admin_content')

<div class="col-lg-12">
    <div class="card">
        <div class="card-header"><strong>Answer Form</strong>
            <small>
                <p class="text-center  alert-success">{{Session::get('message_success')}}</p>
                <p class="text-center  alert-danger">{{Session::get('message_error')}}</p>
            </small>
        </div>
        <form  action="{{ route('postFaqAnswer') }}" method="post"> @csrf
          <input type="hidden" name="ans_by" value="{{ Auth::id() }}">
          <input type="hidden" name="question_id" value="{{$question->id}}">
        <div class="card-body card-block">
            <div class="form-group">
                <label for="company" class=" form-control-label">Question</label>

                <div style="background:#F0F8FF; height:100px" class="form-control">{{$question->question}}</div>

            </div>
            <div class="form-group">
                <label for="company" class=" form-control-label">Answer</label>
                <textarea name="answer" rows="5" cols="40"></textarea>
                @if ($errors->has('answer'))
                    <div class="error">{{ $errors->first('answer') }}</div>
                @endif
            </div>

            <button type="submit" class="btn btn-dark btn-lg btn-block">Add Answer</button>
        </div>
        </form>
    </div>
</div>

@endsection
