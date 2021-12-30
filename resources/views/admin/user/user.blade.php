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
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li class="active btn btn-sm " data-toggle="modal" data-target="#Userregister" href="#">Add User</li>
                    </ol>
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
                                    <th>Name</th>
                                    <th>User Id</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Udpade At</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $i=$users->perpage()*($users->currentpage()-1);?>
                                @foreach($users as $user)
                                <tr>
                                    <td><?php $i++?> {{$i}}</td>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->userid}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->role->name}}</td>
                                    <td>{{$user->updated_at}}</td>
                                    <td>
                                        <a href="{{route('userdelete', $user->id)}}" class="btn btn-danger btn-sm mr-1"><i class="fa fa-trash"></i></a>
                                        <a href="{{route('update-user',$user->id)}}" class="btn btn-success btn-sm mr-1"><i class="fa fa-edit"></i></a>

                                    </td>
                                </tr>
                                @endforeach

                                </tbody>
                            </table>
                        </div>
                        {{$users->links('pagination::bootstrap-4')}}
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










