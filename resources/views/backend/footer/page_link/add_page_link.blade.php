@extends('backend.admin_master')
@section('page_title','Add Footer Page Link')
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

              $page_link = App\PageLink::
                          join('footer_pages', 'footer_pages.id', '=', 'section_id')
                        ->select('page_links.*','footer_pages.section_name')
                        ->get();

            ?>

            <form class="" action="{{route('postFPL')}}" method="post">@csrf

              <input type="hidden" name="added_by" value="{{Auth::id()}}">
            <div class="card-body card-block">
                <div class="form-group">
                    <label for="company" class=" form-control-label">Select Section</label>
                    <select class="form-control" name="section_id">
                      <option selected value="">Section......</option>
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
                  <input type="text" name="link_title" class="form-control" placeholder="Link Title.....">
                  @if ($errors->has('link_title'))
                      <div class="error">{{ $errors->first('link_title') }}</div>
                  @endif
                </div>

                <div class="form-group">
                  <label for="link_url" class="form-control-label">Link URL</label>
                  <input type="text" name="link_url" class="form-control" placeholder="Example: http://example.com">
                  @if ($errors->has('link_url'))
                      <div class="error">{{ $errors->first('link_url') }}</div>
                  @endif
                </div>


                <button type="submit" class="btn btn-dark btn-lg btn-block">Add</button>


            </div>
          </form>

        </div>

        <div class="card">

            <div class="card-body">
                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th width="10%">SL</th>
                        <th width="">Section Name</th>
                        <th width="">Page Title</th>
                        <th width="">Page Link</th>
                        <th width="15%">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $i=0;?>
                    @foreach($page_link as $qa)
                        <?php $i++;?>
                        <tr>
                            <td>{{$i}}</td>
                            <td>{!! $qa->section_name !!}</td>
                            <td>{!! $qa->link_title !!}</td>
                            <td>{!! $qa->link_url !!}</td>
                            <td>
                                <a class="btn btn-primary" href="{{route('editFPL', $qa->id)}}"><i class="fa fa-edit"></i></a>
                                <a class="btn btn-danger" href="{{route('deleteFPL', $qa->id)}}"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
