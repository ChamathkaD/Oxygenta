@extends('layouts.app')

@section('content')

    <div class="bradcam_area breadcam_bg bradcam_overlay">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="bradcam_text">
                        <h3>{{ $item->title }}</h3>
                        <p><a href="{{ URL::to('/') }}">Home /</a> {{ $item->title }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="blog_area single-post-area section-padding">

        <div class="container">

            <div class="row">

                <div class="col-lg-8 posts-list">
                    <div class="single-post">
                        <div class="feature-img">
                            <img class="img-fluid" src="{{ Voyager::image($item->cover) }}" alt="{{$item->cover}}">
                        </div>
                        <div class="blog_details">
                            <h2 style="color: #2d2d2d;">{{ $item->title }}</h2>
                            <ul class="blog-info-link mt-3 mb-4">
                                <li><a href="#"><i class="ti-alarm-clock"></i> {{ $item->created_at->format('h:i A') }}</a></li>
                                <li><a href="#"><i class="ti-calendar"></i> {{ $item->created_at->toDateString() }}</a></li>
                            </ul>
                            {!! $item->body !!}
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">

                    <div class="blog_right_sidebar">
                        @include('partials.news.recent')
                    </div>

                </div>

            </div>

        </div>

    </section>

@endsection
