@extends('backend.admin_master')
@section('page_title','Blog Post List List')
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
                        <th width="5%">SL</th>
                        <th width="20%">Title</th>
                        <th width="20%">Description</th>
                        <th width="20%">Category</th>
                        <th width="15%">Image</th>
                        <th width="20%">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $i=0;?>
                    @foreach($blog_list as $blog)
                        <?php $i++;?>
                        <tr>
                            <td>{{$i}}</td>
                            <td>{{$blog->name}}</td>
                            <td>{!! \Illuminate\Support\Str::words($blog->description, 10,'....')  !!}
                            </td>
                            <?php
                                $cat_name = DB::table('blog_categories')->get();
                            ?>

                            <td> @foreach($cat_name as $name)
                                @if($name->id==$blog->cat_id)
                                    {{$name->name}}
                            @endif
                                @endforeach
                            </td>
                            <td><img width="60" height="60" src="{{asset($blog->image)}}" alt="{{$blog->name}}"></td>
                            <td>
                                <a class="btn btn-primary" href="{{url('/edit-blog/'.$blog->id)}}"><i class="fa fa-edit"></i>Edit</a>
                                <a class="btn btn-danger" href="{{url('/delete-blog/'.$blog->id)}}"><i class="fa fa-trash-o"></i>Delete </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection