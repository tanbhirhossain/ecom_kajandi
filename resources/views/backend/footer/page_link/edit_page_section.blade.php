@extends('backend.admin_master')
@section('page_title','Footer Link Section')
@section('admin_content')
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header"><strong>Footer Page Link Section</strong>
                <small>
                    <p class="text-center  alert-success">{{Session::get('message_success')}}</p>
                    <p class="text-center  alert-danger">{{Session::get('message_error')}}</p>
                </small>
            </div>
            <?php

                $page_section = App\FooterPage::all();
              //  $check_row_num = App\FooterPage::All();
            ?>

            <form class="" action="{{route('updateFPS', $data->id)}}" method="post">@csrf

              <input type="hidden" name="added_by" value="{{Auth::id()}}">
            <div class="card-body card-block">
                <div class="form-group">
                    <label for="company" class=" form-control-label">Section Name</label>
                    <input type="text" id="section_name" name="section_name"  class="form-control" value="{{$data->section_name}}" placeholder="Section Name.........">
                    @if ($errors->has('section_name'))
                        <div class="error">{{ $errors->first('section_name') }}</div>
                    @endif
                </div>


                <button type="submit" class="btn btn-dark btn-lg btn-block">Update</button>

            </div>
          </form>

        </div>


    </div>
@endsection
