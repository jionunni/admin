@extends('layouts.backend.app')
@push('header')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha256-aAr2Zpq8MZ+YA/D6JtRD3xtrwpEz2IqOS+pWD/7XKIw=" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.css" integrity="sha512-xmGTNt20S0t62wHLmQec2DauG9T+owP9e6VU8GigI0anN7OXLip9i7IwEhelasml2osdxX71XcYm6BQunTQeQg==" crossorigin="anonymous" />
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha256-OFRAJNoaD8L3Br5lglV7VyLRf0itmoBzWUoM+Sji4/8=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.js" integrity="sha512-VvWznBcyBJK71YKEKDMpZ0pCVxjNuKwApp4zLF3ul+CiflQi6aIJR+aZCP/qWsoFBA28avL5T5HA+RE+zrGQYg==" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput-angular.min.js" integrity="sha512-KT0oYlhnDf0XQfjuCS/QIw4sjTHdkefv8rOJY5HHdNEZ6AmOh1DW/ZdSqpipe+2AEXym5D0khNu95Mtmw9VNKg==" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>

@endpush
@section('content')
    <div class="content mt-3">
        @error('name')
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Holy guacamole!</strong>{{ $message }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @enderror
        <div class="card">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        @if ($errors->any())
                            @foreach ($errors->all() as $error)
                                <div class="alert  alert-danger alert-dismissible fade show" role="alert">
                                    <span class="badge badge-pill badge-danger">Erorr</span> {{$error}}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                            @endforeach
                        @endif
                    </div>
                    <div class="col-10">
                        <div class="card-body card-block">
                            <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                                @csrf
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Post Title</label></div>
                                    <div class="col-12 col-md-9"><input type="text" id="text-input" name="title" placeholder="Text" class="form-control"></div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="select" class=" form-control-label">Select Category</label></div>
                                    <div class="col-12 col-md-9">
                                        <select name="category" id="select" class="form-control">
                                            @foreach($categories as $category)
                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="text-input" class=" form-control-label">Input Tags</label></div>
                                    <div class="col-12 col-md-6">
                                        <input type="text" data-role="tagsinput" name="tags" placeholder="Text" class="form-control">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label class=" form-control-label">Status</label></div>
                                    <div class="col col-md-9">
                                        <div class="form-check-inline form-check">
                                            <label for="inline-checkbox1" class="form-check-label p-2">
                                                <input type="checkbox" id="inline-checkbox1" name="status" value="1" class="form-check-input">Publish
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row form-group p-2">
                                    <div class="col col-md-3"><label for="file-input" class=" form-control-label">Post Image</label></div>
                                    <div class="col-12 col-md-9">
                                        <input id="file-input" name="image" value="select" type="file" class="form-control-file">

                                        <div class="alert">
                                            <img src="" alt="" id="image-previewer">
                                        </div>

                                    </div>


                                </div>
                                <div class="form-group">
                                    <label for="postal-code" class=" form-control-label">Description</label>
                                    <textarea name="body" id="summernote" rows="5" placeholder="Content..." class="form-control"></textarea>
                                </div>

                                <div>
                                    <button type="submit" class="btn btn-primary btn-sm">
                                        <i class="fa fa-dot-circle-o"></i> Submit
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $('#summernote').summernote({
            tabsize: 2,
            height: 300,

        });

        $(function () {
            $('#file-input').imoViewer({
                'preview': '#image-previewer',
                'minWidth': 400,
                'minHeight': 300
            })
        });
    </script>

@endsection
@push('footer')
    <script src="/path/to/cdn/jquery.slim.min.js"></script>
    <script src="/path/to/dist/imoViewer-min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
@endpush













