@extends('frontend.master')
@section('title')
Organizations
@endsection
@section('content')
<style>
    .mynav {
        padding: 60px 0px;
    }
</style>
<div class="container">
    <main class="col col-xl-12 order-xl-2 col-lg-12 order-lg-2 col-md-12 col-sm-12 col-12 mynav">
        <div class="box shadow-sm border rounded mb-3" style="background: #fff;">
            <div class="box-title border-bottom p-3">
                <h6 class="m-0">Organizations</h6>
            </div>
            @foreach($orgs as $item)
            <div class="box-body p-3 border-bottom">
                <div class="d-flex align-items-top job-item-header pb-2">
                    <div class="mr-2">
                        <h6 class="font-weight-bold text-dark mb-0"><a href="{{url('org-details', $item->org_name)}}" style="color: #000;">{{$item->org_name}}</a></h6>
                        <div class="text-truncate text-primary">{{$item->org_type}}</div>
                        <div class="small text-gray-500">{{$item->industry}}</div>
                    </div>

                </div>
                <p class="mb-0">{{ \Illuminate\Support\Str::limit($item->goal_relevance, 120, $end='...') }}</p>
            </div>
            @endforeach

            @foreach($user_posted as $item)
            <div class="box-body p-3 border-bottom">
                <div class="d-flex align-items-top job-item-header pb-2">
                    <div class="mr-2">
                        <h6 class="font-weight-bold text-dark mb-0"><a href="{{url('user-posted', $item->org_name)}}" style="color: #000;">{{$item->org_name}}</a></h6>
                        <div class="text-truncate text-primary">{{$item->org_type}}</div>
                        <div class="small text-gray-500">{{$item->industry}}</div>
                    </div>

                </div>
                <p class="mb-0">{{ \Illuminate\Support\Str::limit($item->goal_relevance, 120, $end='...') }}</p>
            </div>
            @endforeach
        </div>
    </main>
</div>
@endsection