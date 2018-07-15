@extends('seller.seller_master')
@section('page_title','View Message')
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
                    <li class="breadcrumb-current-item">View List</li>
                </ol>
            </div>
        </header>

        <section id="content" class="table-layout animated fadeIn">


            <div class="chute chute-center">


                <div class="row">
                    <div class="col-xs-12">
                        <div class="panel">
                            <div class="panel-heading">
                                <span class="panel-title hidden-xs"> View Message</span><br><br>


                            </div>
                            <div class="panel-body pn">
                                <div class="">
                                    <small>
                                        <p class="text-center  alert-success">{{Session::get('message_success')}}</p>
                                        <p class="text-center  alert-danger">{{Session::get('message_error')}}</p>
                                    </small>
                                    <div class="row">

                                    </div> <br>
                                    <?php $user = \App\User::find($msg->customer_id);?>
                                    <div class="col-md-12" style="border: 2px solid crimson;padding: 10px">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="name">Customer Name: </label>
                                                    <input type="text" readonly class="form-control" name="name" id="name"
                                                           value="{{$user->name}}">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label for="name">Product Name: </label>
                                                    <input type="text" readonly class="form-control" name="name" id="name"
                                                           value="{{$msg->product_title}}">
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label for="name">Product Unit: </label>
                                                    <input type="text" readonly class="form-control" name="name" id="name"
                                                           value="{{$msg->product_unit}}">
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="form-group">
                                                    <label for="name">Product Qty: </label>
                                                    <input type="text" readonly class="form-control" name="name" id="name"
                                                           value="{{$msg->product_qty}}">
                                                </div>
                                            </div>
                                        </div>
                                        <form action="{{route('VendorMessageReplay')}}" method="post" role="form">
                                            <div class="form-group">
                                                <label for="name">Customer Email: </label>
                                                <input type="text" readonly class="form-control" name="email" id="name"
                                                      value="{{$user->email}}">
                                            </div>
                                            <div class="form-group">
                                                <label for="msg">Customer Message: </label>
                                                <textarea class="form-control textarea" readonly name="" id="" cols="30" rows="10">{{$msg->user_message}}</textarea>
                                            </div>
                                            @csrf
                                            <div class="form-group">
                                                <label for="msg">Subject </label>
                                                <input type="text"  class="form-control" name="subject" id="name" placeholder="Enter Subject">
                                            </div>
                                            <div class="form-group">
                                                <label for="msg">Replay Message Box: </label>
                                                <textarea class="form-control textarea" name="message" id="" cols="30" rows="10">Write Your Replay Here...</textarea>
                                            </div>

                                            <button type="submit" class="btn btn-success pull-right">Click For Replay</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>


        </section>


    </section>



@endsection
