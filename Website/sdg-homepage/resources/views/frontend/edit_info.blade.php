@extends('frontend.master')
@section('title')
Edit Information
@endsection
@section('content')

<style>
    .bg-white {
        background-color: #fff !important;
    }

    .mybg {
        display: none;
    }

    .profile-cover {
        display: none;
    }

    .myimage {
        padding: 20px 35px;
    }
</style>
<div class="py-4">
    <div class="container">
        <div class="row">
            <aside class="col col-xl-3 order-xl-1 col-lg-12 order-lg-1 col-12">
                <div class="box mb-3 shadow-sm border rounded bg-white profile-box text-center">
                    <div class="py-4 px-3 border-bottom">
                        @if($user->profile_photo == NULL)
                        <img src="{{asset('frontend')}}/img/1.png" width="105px" class="img-fluid mt-2 rounded-circle" alt="Responsive image" style="margin: 0px 30px;">
                        @else
                        <img src="{{asset('thumbnails/'. $user->profile_photo)}}" width="105px" class="img-fluid mt-2 rounded-circle" alt="Responsive image" style="margin: 0px 30px;">
                        @endif

                        <h5 class="font-weight-bold text-dark mb-1 mt-4">{{$user->name}}</h5>
                        <p class="mb-0 text-muted">{{$user->email}}</p>
                    </div>

                    <div class="overflow-hidden border-top">
                        <a class="font-weight-bold p-3 d-block" href="{{url('/')}}"> Back to Website </a>
                    </div>

                </div>
                <div class="box shadow-sm border rounded bg-white mb-3">
                    <div class="box-title border-bottom p-3">
                        <h6 class="m-0">Profile Information</h6>
                    </div>
                    <div class="box-body">
                        <div class="d-flex align-items-center osahan-post-header p-3 border-bottom people-list">
                            <div class="font-weight-bold">
                                <div class="text-truncate"><a href="{{url('dashboard', Auth::user()->name)}}">Dashboard</a></div>
                            </div>
                        </div>
                        <div class="d-flex align-items-center osahan-post-header p-3 border-bottom people-list">
                            <div class="font-weight-bold">
                                <div class="text-truncate"><a href="{{url('profile', Auth::user()->email)}}">Profile</a></div>
                            </div>
                        </div>
                        <div class="d-flex align-items-center osahan-post-header p-3 border-bottom people-list">
                            <div class="font-weight-bold">
                                <div class="text-truncate"><a href="{{url('edit-info', Auth::user()->email)}}">Edit Profile Information</a></div>
                            </div>
                        </div>
                        <div class="d-flex align-items-center osahan-post-header p-3 border-bottom people-list">
                            <div class="font-weight-bold">
                                <div class="text-truncate"><a href="{{url('add-orgs')}}">Add Organizations</a></div>
                            </div>
                        </div>
                        <div class="d-flex align-items-center osahan-post-header p-3 border-bottom people-list">
                            <div class="font-weight-bold">
                                <div class="text-truncate"><a href="{{url('view-orgs')}}">View Organizations</a></div>
                            </div>
                        </div>
                    </div>
                </div>

            </aside>
            <main class="col col-xl-6 order-xl-2 col-lg-12 order-lg-1 col-md-12 col-sm-12 col-12 mynav">

                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade active show" id="home" role="tabpanel" aria-labelledby="home-tab">

                        <div class="box shadow-sm border rounded mb-3" style="background-color: #fff;">
                            <div class="box-title border-bottom p-3">
                                <h6 class="m-0">Overview of {{$user->name}}</h6>
                            </div>
                            <div class="box-body">
                                <table class="table table-borderless mb-0">
                                    <form action="{{url('update-info')}}" method="post">
                                        @csrf
                                        <tbody>
                                            <input type="hidden" name="id" value="{{$user->id}}">
                                            <tr class="border-bottom">
                                                <th class="p-3">Name</th>
                                                <td class="p-3"><input type="text" name="name" value="{{$user->name}}" class="form-control"></td>
                                            </tr>
                                            <tr class="border-bottom">
                                                <th class="p-3">Email</th>
                                                <td class="p-3"><input type="email" name="email" value="{{$user->email}}" class="form-control"></td>
                                            </tr>
                                            <tr class="border-bottom">
                                                <th class="p-3">Phone</th>
                                                <td class="p-3"><input type="text" name="phone" value="{{$user->phone}}" class="form-control"></td>
                                            </tr>
                                            <tr class="border-bottom">
                                                <th class="p-3">Address</th>
                                                <td class="p-3"><input type="text" name="address" value="{{$user->address}}" class="form-control"></td>
                                            </tr>

                                        </tbody>
                                </table>
                                <style>
                                    .mybtnn {
                                        float: right;
                                        margin: 25px 0px;
                                    }
                                </style>
                                <button type="submit" class="btn btn-success mybtnn">Update Information</button>
                                </form>
                            </div>
                        </div>

                    </div>

                </div>
            </main>
            <aside class="col col-xl-3 order-xl-3 col-lg-12 order-lg-3 col-12">
                <div class="box shadow-sm border rounded bg-white mb-3">
                    <div class="box-title border-bottom p-3">
                        <h6 class="m-0">SDG Goals</h6>
                    </div>
                    <div class="box-body p-3">
                        @foreach($goals as $item)
                        <div class="d-flex align-items-center osahan-post-header mb-3 people-list">
                            <div class="dropdown-list-image mr-3">
                                <img src="{{asset('thumbnails/'.$item->image)}}" alt="">
                            </div>
                            <div class="font-weight-bold mr-2">
                                <div class="text-truncate">{{$item->title}}</div>
                                <div class="small text-gray-500">{{$item->goal_no}}
                                </div>
                            </div>
                            <span class="ml-auto"><a href="{{url('related-organizations', $item->slug)}}" class="btn btn-light btn-sm">View</a>
                            </span>
                        </div>
                        @endforeach
                    </div>
                </div>

            </aside>
        </div>
    </div>
</div>
@endsection