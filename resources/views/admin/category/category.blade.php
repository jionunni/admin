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
                    <h1>Category</h1>
                     </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li><a class="btn btn-primary" href="{{route('category_create')}}"><i class="fa fa-plus"></i></a></li>
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
                                    <th>Description</th>
                                    <th>User</th>
                                    <th>Image</th>
                                    <th>Created At</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $i=$categories->perpage()*($categories->currentpage()-1);?>
                                @foreach($categories as $category)
                                    <tr>
                                        <td><?php $i++?> {{$i}}</td>
                                        <td>{{$category->name}}</td>
                                        <td>{{$category->description}}</td>
                                        <td>{{Auth::user()->name}}</td>
                                        <td>
                                            <div style="max-width:70px; max-height:70px; overflow:hidden">
                                                <img src="{{asset('storage/category/'.$category->image)}}" class="img-fluid" alt="">
                                            </div>
                                        </td>
                                        <td>{{$category->created_at}}</td>
                                        <td>
                                            <a href="{{route('delete',$category->id)}}" class="btn btn-danger btn-sm mr-1"><i class="fa fa-trash"></i></a>
                                            <a href="{{route('category_edit',$category->id)}}" class="btn btn-success btn-sm mr-1"><i class="fa fa-edit"></i></a>

                                        </td>
                                    </tr>
                                @endforeach

                                </tbody>
                            </table>
                        </div>
                        {{$categories->links('pagination::bootstrap-4')}}
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










