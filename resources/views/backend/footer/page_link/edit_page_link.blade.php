@extends('backend.admin_master')
@section('page_title','Update Footer Page Link')
@section('admin_content')
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header"><strong>Update Footer Page Link</strong>
                <small>
                    <p class="text-center  alert-success">{{Session::get('message_success')}}</p>
                    <p class="text-center  alert-danger">{{Session::get('message_error')}}</p>
                </small>
            </div>
            <?php

                $page_section = App\FooterPage::all();
              //  $check_row_num = App\FooterPage::All();

              $page_link = App\PageLink::
                          join('footer_pages', 'footer_pages.id', '=', 'section_id')
                        ->get();

            ?>

            <form class="" action="{{route('updateFPL', $data->id)}}" method="post">@csrf

              <input type="hidden" name="added_by" value="{{Auth::id()}}">
            <div class="card-body card-block">
                <div class="form-group">
                    <label for="company" class=" form-control-label">Select Section</label>
                    <select class="form-control" name="section_id">

                      <option selected value="{{$data->section_id}}">{{$data->section_name}}</option>
                      @foreach($page_section as $ps)
                      <option value="{{$ps->id}}">{{$ps->section_name}}</option>
                      @endforeach
                    </select>
                    @if ($errors->has('section_name'))
                        <div class="error">{{ $errors->first('section_name') }}</div>
                    @endif
                </div>

                <div class="form-group">
                  <label for="link_title" class="form-control-label">Link Title</label>
                  <input type="text" name="link_title" value="{{$data->link_title}}" class="form-control" placeholder="Link Title.....">
                  @if ($errors->has('link_title'))
                      <div class="error">{{ $errors->first('link_title') }}</div>
                  @endif
                </div>

                <div class="form-group">
                  <label for="link_url" class="form-control-label">Link URL</label>
                  <input type="text" name="link_url" value="{{$data->link_url}}" class="form-control" placeholder="Example: http://example.com">
                  @if ($errors->has('link_url'))
                      <div class="error">{{ $errors->first('link_url') }}</div>
                  @endif
                </div>


                <button type="submit" class="btn btn-dark btn-lg btn-block">Update</button>


            </div>
          </form>

        </div>

    </div>
@endsection
