@extends('backend.master')

@section('can-list')
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
                            <h4 class="card-title">View Candidate List</h4>
                        </div>

                    </div>
                    <div class="card-body">
                        @if(session('delete'))
                        <div class="alert alert-danger">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            {{session('delete')}}.
                        </div>
                        @endif
                        @if(session('success'))
                        <div class="alert alert-success">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            {{session('success')}}.
                        </div>
                        @endif
                        <table class="table">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">SL</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Phone</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Role</th>
                                    <th scope="col">Change</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($candidate as $key => $item)
                                <tr>
                                    <th scope="row">{{ $candidate->firstItem() + $key }}</th>
                                    <td>{{$item->name ?? "N/A"}}</td>
                                    <td>{{$item->phone?? "N/A"}}</td>
                                    <td>{{$item->email?? "N/A"}}</td>

                                    <td>
                                        <form action="{{url('update-user-type')}}" method="post">
                                            @csrf
                                            <input type="hidden" name="id" value="{{$item->id}}">
                                            <select name="type" class="form-control">
                                                <option value="CAN">Candidate</option>
                                                <option value="ADM">Admin</option>
                                                <option value="EMP">Employee</option>
                                            </select>


                                    </td>
                                    <td> <button type="submit" class="btn btn-info">Update</button></td>

                                    </form>
                                    <td> <a href="{{url('delete-user', $item->id)}}" class="btn btn-danger">Delete</a></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{$candidate->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection