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
                        <li class="active btn btn-sm " data-toggle="modal" data-target="#Userregister" href="#">Add User</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="content mt-3">
        <div class="card">
            <div class="card-body card-block">
                <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                    @csrf
                    <div class="row form-group">
                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Category Name</label></div>
                        <div class="col-12 col-md-9"><input type="text" id="text-input" value="{{$category->name}}" name="name" placeholder="Text" class="form-control"></div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3"><label for="textarea-input" class=" form-control-label">Description</label></div>
                        <div class="col-12 col-md-9"><textarea name="description" id="textarea-input" rows="5" placeholder="Content..." class="form-control">{{$category->description}}</textarea></div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3"><label for="file-input" class=" form-control-label">File input</label></div>
                        <div class="col-12 col-md-9"><input type="file" id="file-input" name="image" class="form-control-file"><br><img src="{{asset('storage/category/'.$category->image)}}" height="100px"></div>

                    </div>
                    <div>
                        <button type="submit" class="btn btn-primary btn-sm">
                            <i class="fa fa-dot-circle-o"></i>Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection












