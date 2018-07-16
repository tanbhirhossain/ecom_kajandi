@extends('backend.admin_master')
@section('page_title','Vendor/Seller Lists')
@section('admin_content')
<div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Home Slider List</strong>
                        </div>
                        <div class="card-body">
                          <div class="card-header">
                              <small>
                                  <p class="text-center  alert-success">{{Session::get('message_success')}}</p>
                                  <p class="text-center  alert-danger">{{Session::get('message_error')}}</p>
                              </small>
                          </div>
                  <table id="bootstrap-data-table" class="table table-striped table-bordered">
                    <thead>
                      <tr>
                        <th>Id</th>
                        <th width="">Vendor Name</th>
                        <th width="">Product Name</th>

                        <th>Slider Image</th>

                        <th>Title</th>
                        <th>description</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>


                            <?php $i=0;?>
@foreach($all_slider as $av)
                                <?php $i++;?>
                          <tr>
                            <td>{{$i}}</td>
                            <td>{{$av->vendorname}}</td>
                            <td>{{$av->pro_name}}</td>

                            <td><img src="{{asset($av->slider_image)}}" height="50" width="50" class="img-rounded center-block"></td>

                            <td>{{$av->slider_title}}</td>
                            <td>{{$av->slider_description}}</td>
                            <td width="15%">
                              <a class="btn btn-primary" href="{{route('editSlider', $av->id)}}"><i class="fa fa-edit"></i></a>
                              <a class="btn btn-danger" href="{{route('deleteSlider', $av->id)}}"><i class="fa fa-trash-o"></i></a>

                            </td>
                          </tr>
                        @endforeach
                    </tbody>
                  </table>
                        </div>
                    </div>
                </div>
@endsection
