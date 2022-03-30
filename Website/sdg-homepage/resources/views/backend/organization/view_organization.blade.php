@extends('backend.master')

@section('view-org')
active
@endsection

@section('content')
<div class="content-page">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 col-lg-12">
                <div class="card">
                    <div class="card-header d-flex">
                        <div class="header-title">
                            <h4 class="card-title">View Organizations</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <style>
                            .table td,
                            .table th {
                                vertical-align: baseline;
                            }

                            .content-page {
                                overflow: scroll !important;
                            }
                        </style>
                        <table class="table">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">SL</th>
                                    <th scope="col">Goal No</th>
                                    <th scope="col">First Name</th>
                                    <th scope="col">Last Name</th>
                                    <th scope="col">Organization</th>
                                    <th scope="col">Org Type</th>
                                    <th scope="col">Industry</th>
                                    <th scope="col">Solution Product</th>
                                    <th scope="col">Size Of Team</th>
                                    <th scope="col">Website</th>
                                    <th scope="col">Goal Relevance</th>
                                    <th scope="col">Target Relevance</th>
                                    <th scope="col">Target Population</th>
                                    <th scope="col">Urban VS Rural</th>
                                    <th scope="col">Regions</th>
                                    <th scope="col">Country</th>
                                    <th scope="col">City</th>
                                    <th scope="col">Year Of Establishment</th>
                                    <th scope="col">Additional Info</th>
                                    <th scope="col">Visuals</th>
                                    <th scope="col">Key Pain Point</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($orgs as $key => $item)
                                <tr>
                                    <th scope="row">{{ $orgs->firstItem() + $key }}</th>
                                    <td>{{$goal_id->goal_no}}</td>
                                    <td>{{$item->first_name ?? "N/A"}}</td>
                                    <td>{{$item->last_name ?? "N/A"}}</td>
                                    <td>{{$item->org_name ?? "N/A"}}</td>
                                    <td>{{$item->org_type ?? "N/A"}}</td>
                                    <td>{{$item->industry ?? "N/A"}}</td>
                                    <td>{{$item->solution_product ?? "N/A"}}</td>
                                    <td>{{$item->size_of_team ?? "N/A"}}</td>
                                    <td>{{$item->website ?? "N/A"}}</td>
                                    <td>{{ \Illuminate\Support\Str::limit($item->goal_relevance, 20, $end='...') }}</td>
                                    <td>{{ \Illuminate\Support\Str::limit($item->target_relevance, 20, $end='...') }}</td>
                                    <td>{{$item->target_population ?? "N/A"}}</td>
                                    <td>{{$item->urban_rural ?? "N/A"}}</td>
                                    <td>{{$item->regions ?? "N/A"}}</td>
                                    <td>{{$item->country ?? "N/A"}}</td>
                                    <td>{{$item->city ?? "N/A"}}</td>
                                    <td>{{$item->year_of_establishment ?? "N/A"}}</td>
                                    <td>{{ \Illuminate\Support\Str::limit($item->additional_info, 20, $end='...') }}</td>
                                    <td>{{$item->visuals ?? "N/A"}}</td>
                                    <td>{{ \Illuminate\Support\Str::limit($item->key_pain_point, 20, $end='...') }}</td>
                                    <td>

                                        <a href="{{url('edit-organization', $item->id)}}" class="btn bg-info">Edit</a>
                                        <a href="{{url('delete-organization', $item->id)}}" class="btn bg-danger">Delete</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>

                </div>
                {{$orgs->links()}}
            </div>
        </div>
    </div>
</div>
@endsection