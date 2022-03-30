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
                        @if(session('success'))
                        <div class="alert alert-success">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            {{session('success')}}.
                        </div>
                        @endif
                        
                        <div class="box shadow-sm border rounded mb-3" style="background-color: #fff;">
                            <div class="box-title border-bottom p-3">
                                <h6 class="m-0">Edit Organization</h6>
                            </div>
                            <div class="box-body">
                                <table class="table table-borderless mb-0">
                                    <form action="{{url('update-org-info')}}" method="post">
                                        @csrf
                                        <tbody>
                                            <input type="hidden" name="id" value="{{$org->id}}">
                                            <tr class="border-bottom">
                                                <th class="p-3">Select Goal</th>
                                                <td>
                                                    <select name="goal_id" class="form-control">
                                                        <option value="{{$cat->id}}">{{$cat->title}}</option>
                                                        @foreach($goals as $item)
                                                        <option value="{{$item->id}}">{{$item->title}}</option>
                                                        @endforeach
                                                    </select>
                                                </td>
                                            </tr>
                                            <tr class="border-bottom">
                                                <th class="p-3">First Name</th>
                                                <td class="p-3"><input type="text" value="{{$org->first_name}}" name="first_name" class="form-control"></td>
                                            </tr>
                                            <tr class="border-bottom">
                                                <th class="p-3">Last Name</th>
                                                <td class="p-3"><input type="text" value="{{$org->last_name}}" name="last_name" class="form-control"></td>
                                            </tr>
                                            <tr class="border-bottom">
                                                <th class="p-3">Organization Name</th>
                                                <td class="p-3"><input type="text" value="{{$org->org_name}}" name="org_name" class="form-control"></td>
                                            </tr>
                                            <tr class="border-bottom">
                                                <th class="p-3">Organization Type</th>
                                                <td class="p-3"><input type="text" value="{{$org->org_type}}" name="org_type" class="form-control"></td>
                                            </tr>
                                            <tr class="border-bottom">
                                                <th class="p-3">Industry</th>
                                                <td class="p-3"><input type="text" value="{{$org->industry}}" name="industry" class="form-control"></td>
                                            </tr>
                                            <tr class="border-bottom">
                                                <th class="p-3">Solution Product</th>
                                                <td class="p-3"><input type="text" value="{{$org->solution_product}}" name="solution_product" class="form-control"></td>
                                            </tr>
                                            <tr class="border-bottom">
                                                <th class="p-3">Size of Team</th>
                                                <td class="p-3"><input type="text" value="{{$org->size_of_team}}" name="size_of_team" class="form-control"></td>
                                            </tr>
                                            <tr class="border-bottom">
                                                <th class="p-3">Website</th>
                                                <td class="p-3"><input type="text" value="{{$org->website}}" name="website" class="form-control"></td>
                                            </tr>
                                            <tr class="border-bottom">
                                                <th class="p-3">Goal Relevance</th>
                                                <td><textarea name="goal_relevance" class="form-control" cols="10" rows="5">{!! $org->goal_relevance !!}</textarea></td>
                                            </tr>
                                            <tr class="border-bottom">
                                                <th class="p-3">Target Relevance</th>
                                                <td><textarea name="target_relevance" class="form-control" cols="10" rows="5">{!! $org->target_relevance !!}</textarea></td>
                                            </tr>

                                            <tr class="border-bottom">
                                                <th class="p-3">Target Population</th>
                                                <td class="p-3"><input type="text" value="{{$org->target_population}}" name="target_population" class="form-control"></td>
                                            </tr>
                                            <tr class="border-bottom">
                                                <th class="p-3">Urban Rural</th>
                                                <td class="p-3"><input type="text" value="{{$org->urban_rural}}" name="urban_rural" class="form-control"></td>
                                            </tr>
                                            <tr class="border-bottom">
                                                <th class="p-3">Regions</th>
                                                <td class="p-3"><input type="text" value="{{$org->regions}}" name="regions" class="form-control"></td>
                                            </tr>
                                            <tr class="border-bottom">
                                                <th class="p-3">Country</th>
                                                <td class="p-3"><input type="text" value="{{$org->country}}" name="country" class="form-control"></td>
                                            </tr>
                                            <tr class="border-bottom">
                                                <th class="p-3">City</th>
                                                <td class="p-3"><input type="text" value="{{$org->city}}" name="city" class="form-control"></td>
                                            </tr>
                                            <tr class="border-bottom">
                                                <th class="p-3">Year of Establishment</th>
                                                <td class="p-3"><input type="text" value="{{$org->year_of_establishment}}" name="year_of_establishment" class="form-control"></td>
                                            </tr>
                                            <tr class="border-bottom">
                                                <th class="p-3">Additional Info</th>
                                                <td><textarea name="additional_info" class="form-control" cols="10" rows="5">{!! $org->additional_info !!}</textarea></td>
                                            </tr>
                                            <tr class="border-bottom">
                                                <th class="p-3">visuals</th>
                                                <td class="p-3"><input type="text" value="{{$org->visuals}}" name="visuals" class="form-control"></td>
                                            </tr>
                                            <tr class="border-bottom">
                                                <th class="p-3">Key Pain Point</th>
                                                <td class="p-3"><input type="text" value="{{$org->key_pain_point}}" name="key_pain_point" class="form-control"></td>
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
                                <a href="{{url('delete-org-info', $org->id)}}" class="btn btn-danger" style="margin: 20px 0px; float:left;">Delete</a>
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