@extends('backend.admin_master')
@section('page_title','Product Unit List')
@section('admin_content')
<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <strong class="card-title">Product Unit List Table</strong>
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
                    <th width="70%">Name</th>
                    <th width="20%">Action</th>
                </tr>
                </thead>
                <tbody>
                <?php $i=0;?>
                @foreach($unit_list as $unit)
                    <?php $i++;?>
                <tr>
                    <td>{{$i}}</td>

                    <td>{{$unit->name}}</td>
                    <td>
                        <a class="btn btn-primary" href="{{url('/edit-unit/'.$unit->id)}}"><i class="fa fa-edit"></i>Edit</a>
                        <a class="btn btn-danger" href="{{url('/delete-unit/'.$unit->id)}}"><i class="fa fa-trash-o"></i>Delete </a>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
