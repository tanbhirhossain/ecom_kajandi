@extends('backend.admin_master')
@section('page_title','Vendor Approved Product')
@section('admin_content')
<div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Vendor Approved Poduct</strong>
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
                        <th width="25%">Vendor Name</th>
                        <th width="20%">Product Name</th>
                        <th>Price</th>
                        <th>Unit</th>
                        <th>Image</th>
                        <th>Action</th>
                        <th>Block</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach($approved_pro as $av)
                          <tr>
                            <td>{{$av->vendorname}}</td>
                            <td>{{$av->pro_name}}</td>
                            <td>{{$av->unit_price}}</td>
                            <td>{{$av->stock_qty}}</td>
                            <td><img src="{{asset($av->pro_image)}}" height="60" width="60"></td>
                            <td>
                              <a class="btn btn-primary" href=""><i class="fa fa-edit"></i></a>
                              <a class="btn btn-danger" href=""><i class="fa fa-trash-o"></i></a>
                              <a class="btn btn-info" href="#"><i class="fa fa-info"></i></a>

                            </td>

                            <td>
                              <a class="btn btn-danger" href="{{route('blockVendorPro', $av->id)}}"><i class="fa fa-rss"></i>&nbsp; Block</a>
                            </td>
                          </tr>
                        @endforeach
                    </tbody>
                  </table>
                        </div>
                    </div>
                </div>
@endsection
