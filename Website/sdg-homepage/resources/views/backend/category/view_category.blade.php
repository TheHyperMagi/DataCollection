@extends('backend.master')

@section('view-goal')
active
@endsection

@section('content')
<div class="content-page">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 col-lg-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h3 class="card-title">View Goals</h3>
                        </div>

                    </div>
                    <div class="card-body">

                        <table class="table">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">SL</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">Goal Number</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($category as $key => $item)
                                <tr>
                                    <th scope="row">{{ $category->firstItem() + $key }}</th>
                                    <td>{{$item->title}}</td>
                                    <td>{{$item->goal_no}}</td>
                                    <td><img src="{{asset('thumbnails/'.$item->image)}}" width="95px" alt="{{$item->title}}"></td>
                                    <td>
                                        <a href="{{url('edit-category', $item->slug)}}" class="btn bg-info">Edit</a>
                                        <!--a href="{{url('delete-category', $item->slug)}}" class="btn bg-danger">Delete</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{$category->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection