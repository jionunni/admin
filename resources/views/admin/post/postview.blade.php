@extends('layouts.backend.app')
@section('content')
    <div class="content mt-3">
        <div class="animated fadeIn">
            <div class="row">

                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="col">
                                <article>
                                    <img src="{{asset('storage/post/'.$post->image)}}" alt="" class="img-fluid mb30">
                                    <a class="post-content"><h3>{{$post->title}}</h3>
                                        <ul class="post-meta list-inline">
                                            <li class="list-inline-item">
                                                <i class="fa fa-user-circle-o"></i> <a href="#">{{$post->user->name}}</a></li>
                                            <li class="list-inline-item"> <i class="fa fa-calendar-o"></i>
                                                <a href="#">{{$post->created_at}}</a>
                                            </li>
                                            <h5>Tags: </h5>
                                            <div class="my-2">
                                                @if($post->tag)
                                                    @foreach($post->tag as $tag)
                                                        <a href="#" class="btn btn-outline-primary btn-flat btn-sm">{{$tag->name}}</a>
                                                    @endforeach
                                                @endif
                                            </div>
                                        </ul>
                                        <p>{!! $post->body !!}</p>
                                        <ul class="list-inline share-buttons">
                                            <li class="list-inline-item">Share Post:</li>
                                            <li class="list-inline-item">
                                                <a href="#" class="social-icon-sm si-dark si-colored-facebook si-gray-round">
                                                    <i class="fa fa-facebook"></i></a>
                                            </li>
                                            <li class="list-inline-item">
                                                <a href="#" class="social-icon-sm si-dark si-colored-twitter si-gray-round">
                                                    <i class="fa fa-twitter"></i></a>
                                            </li>
                                        </ul>
                                </article>
                                <a href="{{route('post_update',$post->id)}}" class="btn btn-primary btn-sm">Update</a>
                                <a type="button" href="{{route('post')}}" class="btn btn-secondary btn-sm">Close</a>
                        </div>
                    </div>
                </div>


            </div>
        </div><!-- .animated -->
    </div><!-- .content -->
@endsection












