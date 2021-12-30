@extends('frontend.master')

@section('content')
    <div class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="row">
                        @foreach($goals as $item)
                        <div class="col-lg-3 col-md-3">
                            <div class="box shadow-sm rounded bg-white mb-3 blog-card border-0">
                                <a href="{{url('related-organizations', $item->slug)}}"><img class="card-img-top" src="{{asset('thumbnails/'.$item->image)}}" alt="Card image cap">

                                </a>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

