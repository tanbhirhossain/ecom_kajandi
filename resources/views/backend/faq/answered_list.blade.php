@extends('backend.admin_master')
@section('page_title','Ansered Faq Question')
@section('admin_content')
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <strong class="card-title">FAQ Answered List</strong>
                <small>
                    <p class="text-center alert-success">{{Session::get('message_success')}}</p>
                    <p class="text-center  alert-danger">{{Session::get('message_error')}}</p>
                </small>
            </div>
            <div class="card-body">
                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th width="10%">SL</th>
                        <th width="40%">Question</th>
                        <th width="35%">Answer</th>
                        <th width="15%">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $i=0;?>
                    @foreach($answered_list as $qa)
                        <?php $i++;?>
                        <tr>
                            <td>{{$i}}</td>
                            <td>{!! $qa->question !!}</td>
                            <td>{!! $qa->answer !!}</td>
                            <td>
                                <a class="btn btn-primary" href="{{route('faqAnsEdit', $qa->fid)}}"><i class="fa fa-edit"></i></a>
                                <a class="btn btn-danger" href="{{route('faqPendingDelete', $qa->fid)}}"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection