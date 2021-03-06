@extends('backend.master')

@section('content')
<div class="content-page">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 col-lg-12">
                @if(session('success'))
                <div class="alert alert-success">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    {{session('success')}}.
                </div>
                @endif
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">Edit Goals</h4>
                        </div>

                    </div>
                    <div class="card-body">

                        <form action="{{url('update-category')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" value="{{$category->id}}">
                            <div class="form-group">
                                <label for="email">Title:</label>
                                <input type="text" name="title" id="title" class="form-control" value="{{$category->title}}">
                            </div>
                            <div class="form-group">
                                <label for="email">Slug:</label>
                                <input type="text" name="slug" id="slug" class="form-control" value="{{$category->slug}}">
                            </div>
                            <div class="form-group">
                                <label for="pwd">Goal No:</label>
                                <input type="text" class="form-control" name="goal_no" value="{{$category->goal_no}}">
                            </div>
                            <div class="form-group">
                                <label for="pwd">Preview Image:</label>
                                <img src="{{asset('thumbnails/'.$category->image)}}" width="120px" alt="">
                            </div>
                            <div class="form-group">
                                <label for="pwd">Change Image:</label>
                                <input type="file" name="image">
                            </div>
                            <br>
                            <button type="submit" class="btn btn-success mr-2">Update</button>
                            <a href="{{url('admin-dashboard')}}" class="btn bg-danger">Cancel</a>
                        </form>

                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection

@section('footer_js')
<script>
    $('#title').keyup(function() {
        $('#slug').val($(this).val().toLowerCase().split(',').join('').replace(/\s/g, "-"));
    });
</script>
@endsection