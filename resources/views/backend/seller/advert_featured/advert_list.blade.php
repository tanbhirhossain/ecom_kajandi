@extends('backend.admin_master')
@section('page_title','Vendor/Seller Lists')
@section('admin_content')
<div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Data Table</strong>
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
                        <th width="17%">Vendor Name</th>
                        <th width="15%">Product Name</th>
                        <th>Advert Type</th>
                        <th>Ads Image</th>
                        <th>Pro Image</th>
                        <th>Price</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>


                            <?php $i=0;?>
@foreach($all_advert as $av)
                                <?php $i++;?>
                          <tr>
                            <td>{{$i}}</td>
                            <td>{{$av->vendorname}}</td>
                            <td>{{$av->pro_name}}</td>
                            <td>
                              <?php
                                  if ($av->ads_section == 1) {
                                      echo "Advert Section 1";
                                  }elseif ($av->ads_section == 2) {
                                      echo "Today Featured";
                                  }elseif ($av->ads_section == 3) {
                                      echo "Best of Tech";
                                  }elseif ($av->ads_section == 4) {
                                      echo "Advert Section 2";
                                  }else {
                                      echo "None";
                                  }
                                 ?>
                            </td>
                            <td><img src="{{asset($av->ads_image)}}" height="50" width="50" class="img-rounded center-block"></td>
                            <td><img src="{{asset($av->pro_image)}}" height="50" width="50" class="img-rounded center-block"></td>
                            <td>${{$av->unit_price}}</td>
                            <td>
                              <a class="btn btn-primary" href="{{route('editAdvert', $av->ads_id)}}"><i class="fa fa-edit"></i></a>
                              <a class="btn btn-danger" href="{{route('deleteAdvert', $av->ads_id)}}"><i class="fa fa-trash-o"></i></a>

                            </td>
                          </tr>
                        @endforeach
                    </tbody>
                  </table>
                        </div>
                    </div>
                </div>
@endsection
