@extends('layouts.frontend.app')
@section('content')
    <section class="top-section-area section-gap">
        <div class="container">
            <div class="row justify-content-center align-items-center d-flex">
                <div class="col-lg-8">
                    <div id="imaginary_container">
                        <form action="" method="get">
                        <div class="input-group stylish-input-group">
                            <input type="text" class="form-control" name="search" value="{{$search?? "0"}}"  placeholder="Addictionwhen gambling" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Addictionwhen gambling '" required="">
                            <span class="input-group-addon">
                                        <button type="submit">
                                            <span class="lnr lnr-magnifier"></span>
                                        </button>
                                    </span>
                        </div>
                        </form>
                    </div>
                    <p class="mt-20 text-center text-white">{{$posts->count() ?? "0"}} Result Found for {{$search}}</p>
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
                                                    {!! Str::limit('$post->body') !!}
                                                </p>
                                                <p class="footer pt-20">
                                                    <i class="fa fa-heart-o" aria-hidden="true"></i>
                                                    <a href="#"> {{$post->userLike->count()}} Likes</a>
                                                    <i class="ml-20 fa fa-eye" aria-hidden="true"></i>
                                                    <a href="#"> {{$post->view_count}} Views</a>
                                                    <i class="ml-20 fa fa-comment" aria-hidden="true"></i>
                                                    <a href="#"> {{$post->userLike->count()}} Comments</a>
                                                </p>
                                            </div>
                                        </div>
                                    @endforeach
                                    <div class="justify-content-center d-flex">
                                        {{$posts->appends(Request::all())->links()}}
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
