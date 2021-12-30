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
                            <h4 class="card-title">Edit Organizations</h4>
                        </div>

                    </div>
                    <div class="card-body">

                        <form action="{{url('update-organization')}}" method="POST">
                            @csrf
                            <input type="hidden" value="{{$org->id}}" name="id">
                            <div class="form-group">
                                <label for="email">Select Goal No:</label>
                                <select name="goal_id" class="form-control">
                                    <option value="{{$goal_id->id}}">{{$goal_id->goal_no}}</option>
                                    @foreach($category as $item)
                                    <option value="{{$item->id}}">{{$item->goal_no}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="email">First Name:</label>
                                <input type="text" value="{{$org->first_name}}" name="first_name" id="first_name" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="email">Last Name:</label>
                                <input type="text" value="{{$org->last_name}}" name="last_name" id="last_name" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="email">Organization Name:</label>
                                <input type="text" value="{{$org->org_name}}" name="org_name" id="org_name" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="email">Organization Type:</label>
                                <input type="text" value="{{$org->org_type}}" name="org_type" id="org_type" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="email">Industry:</label>
                                <input type="text" value="{{$org->industry}}" name="industry" id="industry" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="email">Solution Product/Services:</label>
                                <input type="text" value="{{$org->solution_product}}" name="solution_product" id="solution_product" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="email">Size of Team:</label>
                                <input type="text" value="{{$org->size_of_team}}" name="size_of_team" id="size_of_team" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="email">Website:</label>
                                <input type="url" value="{{$org->website}}" name="website" id="website" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="email">SDG Goal Relevance:</label>
                                <textarea name="goal_relevance" class="form-control" id="goal_relevance">{!!$org->goal_relevance!!}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="email">SDG Target Relevance:</label>
                                <textarea name="target_relevance" class="form-control" id="target_relevance">{!!$org->target_relevance!!}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="email">Target population:</label>
                                <input type="text" value="{{$org->target_population}}" name="target_population" id="target_population" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="email">Urban VS Rural:</label>
                                <input type="text" value="{{$org->urban_rural}}" name="urban_rural" id="urban_rural" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="email">Regions:</label>
                                <input type="text" value="{{$org->regions}}" name="regions" id="regions" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="email">Country:</label>
                                <input type="text" value="{{$org->country}}" name="country" id="country" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="email">City:</label>
                                <input type="text" value="{{$org->city}}" name="city" id="city" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="email">Year Of Establishment:</label>
                                <input type="text" value="{{$org->year_of_establishment}}" name="year_of_establishment" id="year_of_establishment" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="email">Additional Info/Comments:</label>
                                <textarea name="additional_info" class="form-control" id="additional_info">{!!$org->additional_info!!}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="email">Visuals:</label>
                                <input type="text" value="{{$org->visuals}}" name="visuals" id="visuals" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="email">Key Pain Point:</label>
                                <textarea name="key_pain_point" value="{{$org->key_pain_point}}" class="form-control" id="key_pain_point">{!!$org->key_pain_point!!}</textarea>
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