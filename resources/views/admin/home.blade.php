@extends('layouts.backend.app')

@section('content')
    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>Dashboard</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li class="active">Dashboard</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="content mt-3">
        <div class="col-xl-3 col-lg-6">
            <div class="card">
                <div class="card-body">
                    <div class="stat-widget-one">
                        <div class="stat-icon dib"><i class="ti-book text-success border-success"></i></div>
                        <div class="stat-content dib">
                            <div class="stat-text">Total Post</div>
                            <div class="stat-digit">{{$post->count()}}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6">
            <div class="card">
                <div class="card-body">
                    <div class="stat-widget-one">
                        <div class="stat-icon dib"><i class="ti-user text-warning border-warning"></i></div>
                        <div class="stat-content dib">
                            <div class="stat-text">User</div>
                            <div class="stat-digit">{{$post->count()}}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6">
            <div class="card">
                <div class="card-body">
                    <div class="stat-widget-one">
                        <div class="stat-icon dib"><i class="ti-comment text-primary border-primary"></i></div>
                        <div class="stat-content dib">
                            <div class="stat-text">Total Comment</div>
                            <div class="stat-digit">{{$comments->count()}}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6">
            <div class="card">
                <div class="card-body">
                    <div class="stat-widget-one">
                        <div class="stat-icon dib"><i class="ti-layout-grid2 text-warning border-warning"></i></div>
                        <div class="stat-content dib">
                            <div class="stat-text">Like</div>
                            <div class="stat-digit">{{$post->count()}}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-6">
            <div class="card">
                <div class="card-header">
                    <h4>World</h4>
                </div>
                <div class="Vector-map-js">
                    <div id="vmap" class="vmap" style="height: 265px;"></div>
                </div>
            </div>
            <!-- /# card -->
        </div>
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    <strong class="card-title">Basic Table</strong>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">SL</th>
                            <th scope="col">Comments</th>
                            <th scope="col">User Name</th>
                            <th scope="col">Post Title</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($comments as $key=>$comment)
                        <tr>
                            <th scope="row">{{$key+1}}</th>
                            <td>{{$comment->message}}</td>
                            <td>{{$comment->user->name}}</td>
                            <td>{{Str::limit($comment->post->title, 25)}}</td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div> <!-- .content -->
@endsection
