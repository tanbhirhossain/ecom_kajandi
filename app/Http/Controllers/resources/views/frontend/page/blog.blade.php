@extends('frontend.front_view.front_master')
@section('page-title','Blog Post')
@section('main_content')
<div class="container">
    <header class="page-header">
        <h1 class="page-title">Our Blog</h1>
    </header>
    <div class="row row-col-border" data-gutter="60">
        <div class="col-md-9">
            @foreach($blog_post as $blog)
            <article class="blog-post">
                <a href="{{route('blog-single',$blog->id)}}">
                    <img class="full-width img-rounded" height="300" src="{{asset($blog->image)}}" alt="Image Alternative text" title="Image Title" />
                </a>
                <h5 class="blog-post-title"><a href="{{route('blog-single',$blog->id)}}">{{$blog->name}}</a></h5>
                <p class="blog-post-caption">
                    {!! \Illuminate\Support\Str::words($blog->description, 20,'....')  !!}
                </p>
                <ul
                        class="blog-post-meta">
                    <li>in
                        <?php
                            $category = DB::table('blog_categories')->get();
                        ?>
                        @foreach($category as $cat)
                            @if($cat->id==$blog->cat_id)
                        <a href="{{route('post-by-cat',$cat->id)}}">
                            {{$cat->name}}
                        </a>
                            @endif
                            @endforeach
                    </li>
                    <?php
                      $dt = new DateTime($blog->created_at);
                      $post_date =  $dt->format('l d, Y');
                    ?>
                    <li>{{$post_date}}</li>

                </ul>
            </article>
            @endforeach

                <style>
                    .pagination > .active > span{
                        background-color:#CE3F51;
                        border-color: #CE3F51;
                    }
                </style>
                {{--{{ $all_products->count()}}--}}
                <span class="text-center"> {{ $blog_post->links() }}</span>
        </div>
        <div class="col-md-3">
            <aside>
                {!! Form::open(['url'=>'blog-search','method'=>'GET']) !!}
                <section class="blog-sidebar-section">
                    <h3 class="widget-title-sm">Search</h3>
                    <div class="row">
                        <div class="col-md-9">
                            <input class="form-control" type="text" name="key" onkeypress=""/>
                        </div>
                        <div class="col-md-3">
                            <button class="btn btn-success" type="submit">Search</button>
                        </div>
                    </div>

                </section>
                {!! Form::close() !!}
                <section class="blog-sidebar-section">
                    <h3 class="widget-title-sm">Recent Posts</h3>
                    <ul class="blog-sidebar-posts">
                        <?php
                            $recent_post = DB::table('blogs')->orderBy('id','desc')->get()->take(5);
                        ?>
                        @foreach($recent_post as $post)
                                <?php
                                $dt = new DateTime($post->created_at);
                                $post_date =  $dt->format('l d, Y');
                                ?>
                        <li>
                            <h5><a href="{{route('blog-single',$post->id)}}">{{$post->name}}</a></h5>
                            <p>{{$post_date}}</p>
                        </li>
                            @endforeach
                    </ul>
                </section>
            </aside>
        </div>
    </div>
    <div class="gap"></div>
</div>
@endsection
