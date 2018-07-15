@extends('seller.seller_master')
@section('page_title','Message List')
@section('seller_content')

    <section id="content_wrapper">

        <header id="topbar" class="alt">
            <div class="topbar-left">
                <ol class="breadcrumb">
                    <li class="breadcrumb-icon">
                        <a href="dashboard1.html">
                            <span class="fa fa-home"></span>
                        </a>
                    </li>
                    <li class="breadcrumb-active">
                        <a href="dashboard1.html">Dashboard</a>
                    </li>
                    <li class="breadcrumb-link">
                        <a href="index.html">Home</a>
                    </li>
                    <li class="breadcrumb-current-item">Message List</li>
                </ol>
            </div>
        </header>

        <section id="content" class="table-layout animated fadeIn">


            <div class="chute chute-center">


                <div class="row">
                    <div class="col-xs-12">
                        <div class="panel">
                            <div class="panel-heading">
                                <span class="panel-title hidden-xs"> Message List</span><br><br>


                            </div>
                            <div class="panel-body pn">
                                <div class="panel-menu p12 allcp-form theme-primary mtn">
                                    <small>
                                        <p class="text-center  alert-success">{{Session::get('message_success')}}</p>
                                        <p class="text-center  alert-danger">{{Session::get('message_error')}}</p>
                                    </small>
                                    <div class="row">

                                </div> <br>

                                <div class="table-responsive">

                                    <table id="dtListUsers" class="table allcp-form theme-warning tc-checkbox-1 fs13">
                                        <thead>
                                        <tr class="bg-light">

                                            <th class="">Id</th>
                                            <th class="">Customer Name</th>
                                            <th class="">Contact Number</th>
                                            <th class="">Product Name</th>
                                            <th class="">Product Qty</th>
                                            <th class="">Product Unit</th>
                                            <th class="">Message</th>
                                            <th class="">View</th>
                                            <th class="">Replay</th>
                                            <th class="">Delete</th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        @foreach($all_message as $msg)
                                            <?php $customer = \App\User::find($msg->customer_id);?>
                                            <tr>
                                                <td class="">{{$msg->id}}</td>
                                                <td class="">{{$customer->name}}</td>
                                                <td class="">{{$customer->phone}}</td>
                                                <td class="">{{$msg->product_title}}</td>
                                                <td class="">{{$msg->product_qty}}</td>
                                                <td class="">{{$msg->product_unit}}</td>
                                                <td>{!! \Illuminate\Support\Str::words($msg->user_message, 5,'....')  !!}</td>

                                                <td><a href="{{route('VendorMessageView',$msg->id)}}" target="_blank" class="btn btn-info pull-right">View</a></td>
                                                <td><a href="{{route('VendorMessageView',$msg->id)}}" target="_blank" class="btn btn-primary pull-right">Replay</a></td>
                                                <td><a href="{{route('VendorMessageDelete',$msg->id)}}" target="_blank" class="btn btn-danger pull-right">Delete</a></td>
                                            </tr>
                                        @endforeach


                                        </tbody>

                                    </table>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>


        </section>


    </section>



@endsection
