@extends('frontend.master')

@section('title')
Overview of {{$org->org_name}}
@endsection

@section('content')
<style>
    .mynav {
        padding: 60px 0px;
    }
</style>
<div class="container">
    <main class="col col-xl-12 order-xl-2 col-lg-12 order-lg-1 col-md-12 col-sm-12 col-12 mynav">

        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade active show" id="home" role="tabpanel" aria-labelledby="home-tab">

                <div class="box shadow-sm border rounded mb-3" style="background-color: #fff;">
                    <div class="box-title border-bottom p-3">
                        <h6 class="m-0">Overview of {{$org->org_name }}</h6>
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
                </div>

            </div>

        </div>
    </main>
</div>
@endsection