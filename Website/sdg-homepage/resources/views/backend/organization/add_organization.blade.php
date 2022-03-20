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
                            <h4 class="card-title">Add Organizations</h4>
                        </div>

                    </div>
                    <div class="card-body">

                        <form action="{{url('post-organization')}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="email">Select Goal No:</label>
                                <select name="goal_id" class="form-control">
                                    <option value="">Select</option>
                                    @foreach($category as $item)
                                    <option value="{{$item->id}}">{{$item->goal_no}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="email">First Name:</label>
                                <input type="text" name="first_name" id="first_name" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="email">Last Name:</label>
                                <input type="text" name="last_name" id="last_name" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="email">Organization Name:</label>
                                <input type="text" name="org_name" id="org_name" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="email">Organization Type:</label>
                                <input type="text" name="org_type" id="org_type" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="email">Industry:</label>
                                <input type="text" name="industry" id="industry" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="email">Solution Product/Services:</label>
                                <input type="text" name="solution_product" id="solution_product" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="email">Size of Team:</label>
                                <input type="text" name="size_of_team" id="size_of_team" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="email">Website:</label>
                                <input type="url" name="website" id="website" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="email">SDG Goal Relevance:</label>
                                <textarea name="goal_relevance" class="form-control" id="goal_relevance"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="email">SDG Target Relevance:</label>
                                <textarea name="target_relevance" class="form-control" id="target_relevance"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="email">Target population:</label>
                                <input type="text" name="target_population" id="target_population" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="email">Urban VS Rural:</label>
                                <input type="text" name="urban_rural" id="urban_rural" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="email">Regions:</label>
                                <input type="text" name="regions" id="regions" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="email">Country:</label>
                                <input type="text" name="country" id="country" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="email">City:</label>
                                <input type="text" name="city" id="city" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="email">Year Of Establishment:</label>
                                <input type="text" name="year_of_establishment" id="year_of_establishment" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="email">Additional Info/Comments:</label>
                                <textarea name="additional_info" class="form-control" id="additional_info"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="email">Visuals:</label>
                                <input type="text" name="visuals" id="visuals" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="email">Key Pain Point:</label>
                                <textarea name="key_pain_point" class="form-control" id="key_pain_point"></textarea>
                            </div>

                            <br>
                            <button type="submit" class="btn btn-primary mr-2">Submit</button>
                            <a href="{{url('admin-dashboard')}}" class="btn bg-danger">Cancel</a>
                        </form>

                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection