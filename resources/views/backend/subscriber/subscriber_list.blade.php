@extends('backend.admin_master')
@section('page_title','Subscriber List')
@section('admin_content')
<?php
$subs_lists = App\EmailSubscriber::All()->where('isDelete', Null);

 ?>
<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <strong class="card-title">Subscriber List</strong>
            <small>
                <p class="text-center alert-success">{{Session::get('message_success')}}</p>
                <p class="text-center  alert-danger">{{Session::get('message_error')}}</p>
            </small>
        </div>
        <div class="card-body">
            <table id="bootstrap-data-table" class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th width="">SL</th>
                    <th width="">Email</th>
                    <th width="">Action</th>
                    <th width="">Email</th>
                </tr>
                </thead>
                <tbody>
                <?php $i=0;?>
                @foreach($subs_lists as $sl)
                    <?php $i++;?>
                <tr>
                    <td>{{$i}}</td>
                    <td>{{$sl->email}}</td>
                    <td>

                        <a class="btn btn-danger" href="{{route('deleteSubs', $sl->id)}}"><i class="fa fa-trash-o"></i>Delete </a>
                    </td>
                    <td>

                        <a class="btn btn-success" href="{{route('showSingleMail', $sl->id)}}"><i class="fa fa-rss"></i>Send email </a>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
