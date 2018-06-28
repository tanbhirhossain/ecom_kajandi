@extends('backend.admin_master')
@section('page_title','Category List')
@section('admin_content')
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <strong class="card-title">Category List Table</strong>
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
                        <th width="60%">Name</th>
                        <th width="20%">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $i=0;?>
                    @foreach($category_list as $category)
                        <?php $i++;?>
                        <tr>
                            <td>{{$i}}</td>
                            <td>{{$category->name}}</td>
                            <td>
                                <a class="btn btn-primary" href="{{url('/edit-blog-category/'.$category->id)}}"><i class="fa fa-edit"></i>Edit</a>
                                <a class="btn btn-danger" href="{{url('/delete-blog-category/'.$category->id)}}"><i class="fa fa-trash-o"></i>Delete </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection