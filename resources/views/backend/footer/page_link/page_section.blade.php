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

            <form class="" action="{{route('postFPS')}}" method="post">@csrf

              <input type="hidden" name="added_by" value="{{Auth::id()}}">
            <div class="card-body card-block">
                <div class="form-group">
                    <label for="company" class=" form-control-label">Section Name</label>
                    <input type="text" id="section_name" name="section_name" class="form-control" placeholder="Section Name.........">
                    @if ($errors->has('section_name'))
                        <div class="error">{{ $errors->first('section_name') }}</div>
                    @endif
                </div>

                @if($page_section->count() < 5 && $page_section->count() > 0)
                <button type="submit" class="btn btn-dark btn-lg btn-block">Add</button>
                @else
                  <div  class="btn btn-dark btn-lg btn-block disabled">Section Limit 5 Please Edit or Delete data</div>
                @endif
            </div>
          </form>

        </div>

        <div class="card">

            <div class="card-body">
                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th width="10%">SL</th>
                        <th width="40%">Section Name</th>
                        <th width="35%">Updated Time</th>
                        <th width="15%">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $i=0;?>
                    @foreach($page_section as $qa)
                        <?php $i++;?>
                        <tr>
                            <td>{{$i}}</td>
                            <td>{!! $qa->section_name !!}</td>
                            <td>{!! $qa->updated_at !!}</td>
                            <td>
                                <a class="btn btn-primary" href="{{route('editFPS', $qa->id)}}"><i class="fa fa-edit"></i></a>
                                <a class="btn btn-danger" href="{{route('deleteFPS', $qa->id)}}"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
