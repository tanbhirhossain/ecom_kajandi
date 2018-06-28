@extends('backend.admin_master')
@section('page_title','Blog Post')
@section('admin_content')
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header"><strong>Blog Post Form</strong>
                <small>
                    <p class="text-center  alert-success">{{Session::get('message_success')}}</p>
                    <p class="text-center  alert-danger">{{Session::get('message_error')}}</p>
                </small>
            </div>
            {!! Form::open(['method'=>'POST','url'=>'update-blog','enctype'=>'multipart/form-data']) !!}
            <div class="card-body card-block">
                <div class="form-group">
                    <label for="company" class=" form-control-label">Add Post Title</label>
                    <input type="text" id="company" name="name" value="{{$blog_by_id->name}}" class="form-control">
                    <input type="hidden"  name="id" value="{{$blog_by_id->id}}" >
                    @if ($errors->has('name'))
                        <div class="error">{{ $errors->first('name') }}</div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="SelectLm" class=" form-control-label">Add Category</label>
                    <select name="cat_id" id="SelectLm" class="form-control-sm form-control">
                        <?php
                        $all_post_category = DB::table('blog_categories')->get();
                        ?>
                        <option value="0">Select One</option>
                        @foreach($all_post_category as $category)
                            <option value="{{$category->id}}"
                            @if($category->id==$blog_by_id->cat_id)
                                selected
                                @endif

                            >{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="company" class=" form-control-label">Add Post Description</label>
                    <textarea id="" cols="30" name="description" rows="10" class="form-control">{{$blog_by_id->description}}</textarea>
                    @if ($errors->has('description'))
                        <div class="error">{{ $errors->first('description') }}</div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="fileupload" class=" form-control-label">Add Post Image</label>
                    <input type="file" id="fileupload" name="image" class="form-control">
                    <img src="{{asset($blog_by_id->image)}}" alt="{{$blog_by_id->name}}" width="100" height="100">
                    <div id="dvPreview">
                    </div>
                    @if ($errors->has('image'))
                        <div class="error">{{ $errors->first('image') }}</div>
                    @endif
                </div>
                <button type="submit" class="btn btn-dark btn-lg btn-block">Update</button>
            </div>
            {!! Form::close() !!}
        </div>
    </div>

    <script language="javascript" type="text/javascript">
        window.onload = function () {
            var fileUpload = document.getElementById("fileupload");
            fileUpload.onchange = function () {
                if (typeof (FileReader) != "undefined") {
                    var dvPreview = document.getElementById("dvPreview");
                    dvPreview.innerHTML = "";
                    var regex = /^([a-zA-Z0-9\s_\\.\-:])+(.jpg|.jpeg|.gif|.png|.bmp)$/;
                    for (var i = 0; i < fileUpload.files.length; i++) {
                        var file = fileUpload.files[i];
                        if (regex.test(file.name.toLowerCase())) {
                            var reader = new FileReader();
                            reader.onload = function (e) {
                                var img = document.createElement("IMG");
                                img.height = "100";
                                img.width = "100";
                                img.src = e.target.result;
                                dvPreview.appendChild(img);
                            }
                            reader.readAsDataURL(file);
                        } else {
                            alert(file.name + " is not a valid image file.");
                            dvPreview.innerHTML = "";
                            return false;
                        }
                    }
                } else {
                    alert("This browser does not support HTML5 FileReader.");
                }
            }
        };
    </script>

    <script language="javascript" type="text/javascript">
        $(function () {
            $("#fileupload").change(function () {
                if (typeof (FileReader) != "undefined") {
                    var dvPreview = $("#dvPreview");
                    dvPreview.html("");
                    var regex = /^([a-zA-Z0-9\s_\\.\-:])+(.jpg|.jpeg|.gif|.png|.bmp)$/;
                    $($(this)[0].files).each(function () {
                        var file = $(this);
                        if (regex.test(file[0].name.toLowerCase())) {
                            var reader = new FileReader();
                            reader.onload = function (e) {
                                var img = $("<img />");
                                img.attr("style", "height:100px;width: 100px");
                                img.attr("src", e.target.result);
                                dvPreview.append(img);
                            }
                            reader.readAsDataURL(file[0]);
                        } else {
                            alert(file[0].name + " is not a valid image file.");
                            dvPreview.html("");
                            return false;
                        }
                    });
                } else {
                    alert("This browser does not support HTML5 FileReader.");
                }
            });
        });
    </script>
@endsection