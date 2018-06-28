@extends('backend.admin_master')
@section('page_title','Answer Update')
@section('admin_content')

    <div class="col-lg-12">
        <div class="card">
            <div class="card-header"><strong>Answer Update Form</strong>
                <small>
                    <p class="text-center  alert-success">{{Session::get('message_success')}}</p>
                    <p class="text-center  alert-danger">{{Session::get('message_error')}}</p>
                </small>
            </div>
            <form  action="{{ route('faqAnsUpdate', $faq_ans->id ) }}" method="post"> @csrf
                <input type="hidden" name="ans_by" value="{{ Auth::id() }}">
                <input type="hidden" name="question_id" value="{{$faq_ans->question_id}}">
                <div class="card-body card-block">
                    <div class="form-group">
                        <label for="company" class=" form-control-label">Question</label>
                        <div style="background:#F0F8FF; height:100px" class="form-control">{{$faq_ans->question}}</div>
                    </div>
                    <div class="form-group">
                        <label for="company" class=" form-control-label">Answer</label>
                        <textarea name="answer" rows="5" value="{{$faq_ans->answer}}" cols="40">{{$faq_ans->answer}}</textarea>
                        @if ($errors->has('answer'))
                            <div class="error">{{ $errors->first('answer') }}</div>
                        @endif
                    </div>

                    <button type="submit" class="btn btn-dark btn-lg btn-block">Update Answer</button>
                </div>
            </form>
        </div>
    </div>

@endsection