@extends('backend.admin_master')
@section('page_title','Vendor/Seller Lists')
@section('admin_content')
<div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Data Table</strong>
                        </div>
                        <div class="card-body">
                  <table id="bootstrap-data-table" class="table table-striped table-bordered">
                    <thead>
                      <tr>
                        <th width="25%">Name</th>
                        <th width="20%">Email</th>
                        <th>Vendor Type</th>
                        <th>Ratings</th>
                        <th>Action</th>
                        <th>Block</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach($all_vendor as $av)
                          <tr>
                            <td>{{$av->vendorname}}</td>
                            <td>{{$av->email}}</td>
                            <td>
                              <?php
                                if ($av->vendor_type == 1){
                                  echo "Retailer";
                                }elseif($av->vendor_type == 2) {
                                  echo "Distributor";
                                }elseif($av->vendor_type == 3) {
                                  echo "OEM";
                                }else{
                                  echo "None";
                                }
                               ?>
                            </td>
                            <td>
                              <?php
                                if ($av->ratings == 1){
                                  echo "Experts";
                                }elseif($av->ratings == 2) {
                                  echo "Professional";
                                }else {
                                  echo "Technicians";
                                }
                               ?>
                            </td>
                            <td>
                              <a class="btn btn-primary" href=""><i class="fa fa-edit"></i></a>
                              <a class="btn btn-danger" href=""><i class="fa fa-trash-o"></i></a>
                              <a class="btn btn-info" href="#"><i class="fa fa-info"></i></a>

                            </td>

                            <td>
                              <button type="button" class="btn btn-danger"><i class="fa fa-rss"></i>&nbsp; Block</button>
                            </td>
                          </tr>
                        @endforeach
                    </tbody>
                  </table>
                        </div>
                    </div>
                </div>
@endsection
