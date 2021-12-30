@extends('layouts.backend.app')
@push('header')
    <link rel="stylesheet" href="{{asset('vendors')}}/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="{{asset('vendors')}}/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css">
@endpush
@section('content')
    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>Dashboard</h1>
                </div>
            </div>
        </div>
    </div>
    <div class="content mt-3">
        <div class="animated fadeIn">
            <div class="row">

                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                <thead>

                                <tr>
                                    <th>SL</th>
                                    <th>Comments</th>
                                    <th>User</th>
                                    <th>Post Title</th>
                                    <th>Create</th>
                                    <th>Action</th>
                                </tr>

                                </thead>
                                <tbody>

                                @foreach($comments as $key=> $comment)
                                <tr>
                                    <td>{{$key++}}</td>
                                    <td>{{$comment->message}}</td>
                                    <td>{{$comment->user->name}} </td>
                                    <td><a href="{{route('singlepost', $comment->post->slug)}}">{{$comment->post->title}}</a></td>

                                    <td>{{$comment->created_at}}</td>
                                    <td>
                                        <a href="{{route('comments.Delete', $comment->id)}}" class="btn btn-danger btn-sm mr-1"><i class="fa fa-trash"></i></a>
                                    </td>

                                </tr>
                                @endforeach

                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>


            </div>
        </div><!-- .animated -->
    </div><!-- .content -->
@endsection

@push('footer')
    <script src="{{asset('vendors')}}/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="{{asset('vendors')}}/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="{{asset('vendors')}}/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="{{asset('vendors')}}/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
    <script src="{{asset('vendors')}}/jszip/dist/jszip.min.js"></script>
    <script src="{{asset('vendors')}}/pdfmake/build/pdfmake.min.js"></script>
    <script src="{{asset('vendors')}}/pdfmake/build/vfs_fonts.js"></script>
    <script src="{{asset('vendors')}}/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="{{asset('vendors')}}/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="{{asset('vendors')}}/datatables.net-buttons/js/buttons.colVis.min.js"></script>
    <script src="{{asset('assets')}}/js/init-scripts/data-table/datatables-init.js"></script>
@endpush










