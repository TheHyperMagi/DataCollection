@extends('frontend.master')
@section('title')
Overview of {{$org->org_name}}
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
</style>
<div class="py-4">
    <div class="container">
        <div class="row">
            <style>
                .myimage {
                    padding: 20px 35px;
                }
            </style>
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
                                <h6 class="m-0">Overview of {{$org->org_name}}</h6>
                            </div>
                            <div class="box-body">
                                <table class="table table-borderless mb-0">
                                    <tbody>
                                        <tr class="border-bottom">
                                            <th class="p-3">First Name</th>
                                            <td class="p-3">{{$org->first_name ?? "N/A"}}</td>
                                        </tr>
                                        <tr class="border-bottom">
                                            <th class="p-3">Last Name</th>
                                            <td class="p-3">{{$org->last_name ?? "N/A"}}</td>
                                        </tr>
                                        <tr class="border-bottom">
                                            <th class="p-3">Organization</th>
                                            <td class="p-3">{{$org->org_name ?? "N/A"}}</td>
                                        </tr>
                                        <tr class="border-bottom">
                                            <th class="p-3">Organization Type</th>
                                            <td class="p-3">{{$org->org_type ?? "N/A"}}</td>
                                        </tr>
                                        <tr class="border-bottom">
                                            <th class="p-3">Industry</th>
                                            <td class="p-3">{{$org->industry ?? "N/A"}}</td>
                                        </tr>
                                        <tr class="border-bottom">
                                            <th class="p-3">Solution Product</th>
                                            <td class="p-3">{{$org->solution_product ?? "N/A"}}</td>
                                        </tr>
                                        <tr class="border-bottom">
                                            <th class="p-3">Size Of Team</th>
                                            <td class="p-3">{{$org->size_of_team ?? "N/A"}}</td>
                                        </tr>
                                        <tr class="border-bottom">
                                            <th class="p-3">Website</th>
                                            <td class="p-3"><a href="{{$org->website}}">{{$org->website ?? "N/A"}}</a></td>
                                        </tr>
                                        <tr class="border-bottom">
                                            <th class="p-3">Goal Relevance</th>
                                            <td class="p-3">{{$org->goal_relevance ?? "N/A"}}</td>
                                        </tr>
                                        <tr class="border-bottom">
                                            <th class="p-3">Target Relevance</th>
                                            <td class="p-3">{{$org->target_relevance ?? "N/A"}}</td>
                                        </tr>
                                        <tr class="border-bottom">
                                            <th class="p-3">Target Population</th>
                                            <td class="p-3">{{$org->target_population ?? "N/A"}}</td>
                                        </tr>
                                        <tr class="border-bottom">
                                            <th class="p-3">Urban VS Rural</th>
                                            <td class="p-3">{{$org->urban_rural ?? "N/A"}}</td>
                                        </tr>
                                        <tr class="border-bottom">
                                            <th class="p-3">Regions</th>
                                            <td class="p-3">{{$org->regions ?? "N/A"}}</td>
                                        </tr>
                                        <tr class="border-bottom">
                                            <th class="p-3">Country</th>
                                            <td class="p-3">{{$org->country ?? "N/A"}}</td>
                                        </tr>
                                        <tr class="border-bottom">
                                            <th class="p-3">City</th>
                                            <td class="p-3">{{$org->city ?? "N/A"}}</td>
                                        </tr>
                                        <tr class="border-bottom">
                                            <th class="p-3">Year Of Establishment</th>
                                            <td class="p-3">{{$org->year_of_establishment ?? "N/A"}}</td>
                                        </tr>
                                        <tr class="border-bottom">
                                            <th class="p-3">Additional Info</th>
                                            <td class="p-3">{{$org->additional_info ?? "N/A"}}</td>
                                        </tr>
                                        <tr class="border-bottom">
                                            <th class="p-3">Visuals</th>
                                            <td class="p-3">{{$org->visuals ?? "N/A"}}</td>
                                        </tr>
                                        <tr class="border-bottom">
                                            <th class="p-3">Key Pain Point</th>
                                            <td class="p-3">{{$org->key_pain_point ?? "N/A"}}</td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                            <br>
                            <a href="{{url('edit-org-info', $org->org_name)}}" class="btn btn-primary" style="float: right; margin: -5px 15px;">Edit Information</a>
                            <br><br>
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