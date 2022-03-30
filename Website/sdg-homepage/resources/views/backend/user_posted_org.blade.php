@extends('backend.master')

@section('content')
<div class="content-page">
    <div class="container-fluid">
        <div class="row">

            <div class="col-sm-12">
                @if(session('success'))
                <div class="alert alert-success">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    {{session('success')}}.
                </div>
                @endif
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">View full Details</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <p>Admins can change the status of this post.</p>
                        <table class="table table-bordered table-striped">

                            <tbody>

                                <tr>
                                    <th class="text-nowrap text-left" scope="row">Status</th>
                                    <td>
                                        <form action="{{url('change-status')}}" method="post">
                                            @csrf
                                            <input type="hidden" name="id" value="{{$org->id}}">
                                            <select name="post_type" class="form-control">
                                                @if($org->post_type == 0)
                                                <option value="0">Pending</option>
                                                @else
                                                <option value="1">Approved</option>
                                                @endif
                                                <option value="0">Pending</option>
                                                <option value="1">Approve</option>
                                            </select><br>
                                            <button type="submit" class="btn btn-success">Update</button>
                                        </form>
                                    </td>
                                </tr>
                                <tr>
                                    <th class="text-nowrap text-left" scope="row">Posted by</th>
                                    <td>{{$org->user_id}}</td>
                                </tr>
                                <tr>
                                    <th class="text-nowrap text-left" scope="row">First Name</th>
                                    <td><code>{{$org->first_name ?? "N/A"}}</code></td>
                                </tr>
                                <tr>
                                    <th class="text-nowrap text-left" scope="row">Last Name</th>
                                    <td colspan="5" class="text-left">{{$org->last_name ?? "N/A"}}</td>
                                </tr>
                                <tr>
                                    <th class="text-nowrap text-left" scope="row">Organization</th>
                                    <td colspan="5" class="text-left">{{$org->org_name ?? "N/A"}}</td>
                                </tr>
                                <tr>
                                    <th class="text-nowrap text-left" scope="row">Organization Type</th>
                                    <td colspan="5" class="text-left">{{$org->org_type ?? "N/A"}}</td>
                                </tr>
                                <tr>
                                    <th class="text-nowrap text-left" scope="row">Industry</th>
                                    <td colspan="5" class="text-left">{{$org->industry ?? "N/A"}}</td>
                                </tr>
                                <tr>
                                    <th class="text-nowrap text-left" scope="row">Solution Product</th>
                                    <td colspan="5" class="text-left">{{$org->solution_product ?? "N/A"}}</td>
                                </tr>
                                <tr>
                                    <th class="text-nowrap text-left" scope="row">Size Of Team</th>
                                    <td colspan="5" class="text-left">{{$org->size_of_team ?? "N/A"}}</td>
                                </tr>
                                <tr>
                                    <th class="text-nowrap text-left" scope="row">Website</th>
                                    <td colspan="5" class="text-left">{{$org->website ?? "N/A"}}</td>
                                </tr>
                                <tr>
                                    <th class="text-nowrap text-left" scope="row">Goal Relevance</th>
                                    <td colspan="5" class="text-left">{{$org->goal_relevance ?? "N/A"}}</td>
                                </tr>
                                <tr>
                                    <th class="text-nowrap text-left" scope="row">Target Relevance</th>
                                    <td colspan="5" class="text-left">{{$org->target_relevance ?? "N/A"}}</td>
                                </tr>
                                <tr>
                                    <th class="text-nowrap text-left" scope="row">Target Population</th>
                                    <td colspan="5" class="text-left">{{$org->target_population ?? "N/A"}}</td>
                                </tr>
                                <tr>
                                    <th class="text-nowrap text-left" scope="row">Urban VS Rural</th>
                                    <td colspan="5" class="text-left">{{$org->urban_rural ?? "N/A"}}</td>
                                </tr>
                                <tr>
                                    <th class="text-nowrap text-left" scope="row">Regions</th>
                                    <td colspan="5" class="text-left">{{$org->regions ?? "N/A"}}</td>
                                </tr>
                                <tr>
                                    <th class="text-nowrap text-left" scope="row">Country</th>
                                    <td colspan="5" class="text-left">{{$org->country ?? "N/A"}}</td>
                                </tr>
                                <tr>
                                    <th class="text-nowrap text-left" scope="row">City</th>
                                    <td colspan="5" class="text-left">{{$org->city ?? "N/A"}}</td>
                                </tr>
                                <tr>
                                    <th class="text-nowrap text-left" scope="row">Year Of Establishment</th>
                                    <td colspan="5" class="text-left">{{$org->year_of_establishment ?? "N/A"}}</td>
                                </tr>
                                <tr>
                                    <th class="text-nowrap text-left" scope="row">Additional Info</th>
                                    <td colspan="5" class="text-left">{{$org->additional_info ?? "N/A"}}</td>
                                </tr>
                                <tr>
                                    <th class="text-nowrap text-left" scope="row">Visuals</th>
                                    <td colspan="5" class="text-left">{{$org->visuals ?? "N/A"}}</td>
                                </tr>
                                <tr>
                                    <th class="text-nowrap text-left" scope="row">Key Pain Point</th>
                                    <td colspan="5" class="text-left">{{$org->key_pain_point ?? "N/A"}}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                </div>
                <br>
                <a href="{{url('delete-posted-org', $org->id)}}" class="btn btn-danger" style="float: right; margin: -25px ​0px;">Decline this post</a>

                <a href="{{url('user-posted-orgs')}}" class="btn btn-info" style="float: right;margin-right: 12px;">Back</a>

            </div>
        </div>
    </div>
</div>
@endsection