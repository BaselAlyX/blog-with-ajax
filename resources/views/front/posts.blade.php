
@extends('front.layouts.app')
@section('content')
 <!-- Page Header-->
 <header class="masthead" style="background-image: url('{{asset('front')}}/assets//img/home-bg.jpg')">
            <div class="container position-relative px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">
                        <div class="site-heading">
                            <h1>All Posts</h1>
                            <span class="subheading">Read More Learn More</span>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- Main Content-->
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    @foreach($posts as $post)
                    <!-- Post preview-->
                    <div class="post-preview">
                        <div class="cont-img">
                            <img src="{{$post->image()}}" width="100%" height="350" alt="">
                        </div>
                        <a href="#">
                            <h2 class="post-title">{{$post->title}}</h2>
                            <h3 class="post-subtitle">{{\Str::limit($post->body,200)}}</h3>
                        </a>
                        <p class="post-meta">
                            Posted by
                            <a href="#!">Basel, {{$post->category->name}}</a>
                            on{{$post->created_at->format('F d, Y')}}
                        </p>
                    </div>
                    <!-- Divider-->
                    
                    <hr class="my-4" />
                    @endforeach
                   
                    <!-- Pager-->
                    <div>
                        {{$posts->links()}}
                    </div>
                </div>
            </div>
        </div>
        @endsection
