@extends('layouts.frontend.app')
@section('content')
    <section class="top-section-area section-gap">
        <div class="container">
            <div class="row justify-content-between align-items-center d-flex">
                <div class="col-lg-8 top-left">
                    <h1 class="text-white mb-20">All Post of Category 1</h1>
                    <ul>
                        <li>
                            <a href="index.html">Home</a
                            ><span class="lnr lnr-arrow-right"></span>
                        </li>
                        <li>
                            <a href="category.html"></a
                            ><span class="lnr lnr-arrow-right"></span>
                        </li>
                        <li><a href="single.html">Posts</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- End top-section Area -->

    <!-- Start post Area -->
    <div class="post-wrapper pt-100">
        <!-- Start post Area -->
        <section class="post-area">
            <div class="container">
                <div class="row justify-content-center d-flex">
                    <div class="col-lg-8">
                        <div class="top-posts pt-50">
                            <div class="container">
                                <div class="row justify-content-center">
                                    @foreach($posts as $post)
                                    <div class="single-posts col-lg-6 col-sm-6">
                                        <img class="img-fluid" src="{{asset('storage/post/'.$post->image)}}" alt="" />
                                        <div class="date mt-20 mb-20">10 Jan 2018</div>
                                        <div class="detail">
                                            <a href="{{route('singlepost', $post->slug)}}"><h4 class="pb-20">{{$post->title}}</h4></a>
                                            <p>

                                            </p>
                                            <p class="footer pt-20">
                                                <i class="fa fa-heart-o" aria-hidden="true"></i>
                                                <a href="#"> {{$post->userLike->count()}}</a> Likes
                                                <i class="ml-20 fa fa-eye" aria-hidden="true"></i>
                                                <a href="#"> {{$post->view_count}} Views</a>
                                                <i class="ml-20 fa fa-comment" aria-hidden="true"></i>
                                                <a href="#"> {{$post->message->count()}}</a>Comments
                                            </p>
                                        </div>
                                    </div>
                                    @endforeach
                                    <div class="justify-content-center d-flex">
                                        {!! $posts->links()!!}
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                   @include('layouts.frontend.partials.sideber')
                </div>
            </div>
        </section>
        <!-- End post Area -->
    </div>


@endsection
