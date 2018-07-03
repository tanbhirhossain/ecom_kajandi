@extends('frontend.front_view.front_master')
@section('page-title','Single Blog Post')
@section('main_content')
    <div class="container">
        <header class="page-header">
            <h1 class="page-title">The Weekend Reading List</h1>
        </header>
        <div class="row row-col-border" data-gutter="60">
            <div class="col-md-9">
                <article class="blog-post">
                    <a href="blog-post.html">
                        <img class="full-width img-rounded" src="{{asset($single_post->image)}}" alt="Image Alternative text" title="Image Title" />
                    </a>
                    <p class="blog-post-caption">{{$single_post->name}}</p>
                    <ul class="blog-post-meta">
                        <li>in
                            <?php
                            $category = DB::table('blog_categories')->get();
                            ?>
                            @foreach($category as $cat)
                                @if($cat->id==$single_post->cat_id)
                                    <a href="{{route('post-by-cat',$cat->id)}}">
                                        {{$cat->name}}
                                    </a>
                                @endif
                            @endforeach
                        </li>
                        </li>
                        <?php
                        $dt = new DateTime($single_post->created_at);
                        $post_date =  $dt->format('l d, Y');
                        ?>
                        <li>{{$post_date}}</li>

                    </ul>
                    <div class="blog-post-body">
                       <p>{!! $single_post->description !!}</p>
                    </div>
                </article>
                <hr />
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
    </div>
    @endsection