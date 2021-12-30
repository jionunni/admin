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
                <form action="" method="post"  class="form-horizontal">
                    @csrf
                    <div class="row form-group">
                        <div class="col col-md-3"><label for="text-input" class=" form-control-label">Name</label></div>
                        <div class="col-12 col-md-9"><input type="text" id="text-input" value="{{$user->name}}" name="name" placeholder="Text" class="form-control"></div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3"><label for="email-input" class=" form-control-label">Email</label></div>
                        <div class="col-12 col-md-9"><input type="email" id="email-input" value="{{$user->email}}" name="email" placeholder="Enter Email" class="form-control"></div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3"><label for="select" class=" form-control-label">Select</label></div>
                        <div class="col-12 col-md-9">
                            <select name="role" id="select" class="form-control">
                                @foreach($roles as $role)
                                <option value="{{$role->id}} {{$user->role->id == $role->id ? 'selected': ''}}">{{$role->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>

                </form>
            </div>
    </div><!-- .content -->
@endsection












