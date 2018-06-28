@extends('frontend.front_view.front_master')
@section('page-title',"Page")
@section('main_content')

    <div class="container">
        <div class="row text-center">
            <div class="col-md-12 col-sm-12">
             {!! $single_page->description !!}
                <?php
                    $images = explode('|',$single_page->image);
                ?>
                @foreach( $images as $image)
                    <img width="200" height="200" src="{{asset($image)}}" alt="" >
                    @endforeach
            </div>
        </div>
        <div class="gap"></div>
    </div>
    @endsection