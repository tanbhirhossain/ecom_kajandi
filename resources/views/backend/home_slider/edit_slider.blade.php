@extends('backend.admin_master')
@section('page_title','Update Home Slider')
@section('admin_content')
    <?php
    ?>
    <div class="col-md-10 offset-1">
        <div class="card">
            <div class="card-header">
                <small>
                    <p class="text-center  alert-success">{{Session::get('message_success')}}</p>
                    <p class="text-center  alert-danger">{{Session::get('message_error')}}</p>
                </small>
            </div>
            <div class="card-header">
                <strong>Update Home Slider</strong>
            </div>
            <div class="card-body">
                <div class="card-body card-block">
                    <form action="{{route('updateSlider', $editslider->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="admin_id" value="{{Auth::id()}}">

                        <div class="form-group">
                            <label for="seller_id" class=" form-control-label">Select Vendor</label>
                            <select class="form-control" name="seller_id">
                              @if($editslider->seller_id !=null)
                                <option value="{{$editslider->user_id}}">{{$editslider->vendorname}}</option>
                              @else
                                <option value="">Select Vendor</option>

                              @endif

                            </select>
                            @if ($errors->has('seller_id'))
                                <div class="error">{{ $errors->first('seller_id') }}</div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="product_id" class=" form-control-label">Select Product</label>

                            <select class="form-control" name="product_id">
                              @if($editslider->product_id !=null)
                                <option value="{{$editslider->product_id}}">{{$editslider->pro_name}}</option>
                              @else
                                <option>Select Vendor For Loading Product</option>
                              @endif

                            </select>
                            @if ($errors->has('product_id'))
                                <div class="error">{{ $errors->first('product_id') }}</div>
                            @endif
                        </div>



                        <div class="row">
                            <div class="form-group col-md-12">
                                <label for="slider_title" class=" form-control-label">Slider Title</label>
                                <input type="text" style="height:39px;" value="{{$editslider->slider_title}}" class="form-control" name="slider_title" placeholder="Slider Title............" >
                                @if ($errors->has('slider_title'))
                                    <div class="error">{{ $errors->first('slider_title') }}</div>
                                @endif
                            </div>

                        </div>
                        <div class="row">
                            <div class="form-group col-md-12">
                                <label for="slider_description" class=" form-control-label">Slider description</label>
                                <input type="text" style="height:39px;" value="{{$editslider->slider_description}}" class="form-control" name="slider_description" placeholder="Slider description.........." >
                                @if ($errors->has('slider_description'))
                                    <div class="error">{{ $errors->first('slider_description') }}</div>
                                @endif
                            </div>

                        </div>

                        <div class="row">
                          <div class="form-group col-md-12">
                              <div class="photo">
                                <img src="{{asset($editslider->slider_image)}}" class="col-md-4 student-photo" id="showPhoto"  alt=""><br>

                                <input type="file" value="{{asset($editslider->slider_image)}}" class="form-control" name="slider_image" id="photo" accept="image/x-png,image/png,image/jpg,image/jpeg">
                                @if ($errors->has('slider_image'))
                                    <div class="error">{{ $errors->first('slider_image') }}</div>
                                @endif
                              </div>
                          </div>
                        </div>

                        <div class="form-group">
                            <button class="btn btn-success" type="submit">Submit</button>
                        </div>


                    </form>



                </div>
            </div>
        </div>
    </div>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>

    <script type="text/javascript">
        $("select[name='seller_id']").change(function(){
            var seller_id = $(this).val();
            var token = $("input[name='_token']").val();
            $.ajax({
                url: "<?php echo route('select-pro') ?>",
                method: 'POST',
                data: {seller_id:seller_id, _token:token},
                success: function(data) {
                    $("select[name='product_id'").html('');
                    $("select[name='product_id'").html(data.options);
                }
            });
        });
    </script>
    <script type="text/javascript">
        $('#photo').on('change',function(e){
            showFile(this,'#showPhoto');
        })
        //=============================================
        function showFile(fileInput,img,showName){
            if (fileInput.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e){
                    $(img).attr('src', e.target.result);
                }
                reader.readAsDataURL(fileInput.files[0]);
            }
            $(showName).text(fileInput.files[0].name)
        };
    </script>

@endsection
