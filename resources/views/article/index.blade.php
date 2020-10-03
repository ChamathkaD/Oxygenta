@extends('layouts.app')

@section('content')

    <div class="bradcam_area breadcam_bg bradcam_overlay">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="bradcam_text">
                        <h3>Health Articles</h3>
                        <p><a href="{{ URL::to('/') }}">Home /</a> Health Articles</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="blog_area section-padding">

        <div class="container">

            <div class="row">

                @if($articles->count() != 0)
                    <div class="col-lg-8 mb-5 mb-lg-0">

                        <div class="blog_left_sidebar">

                            @foreach($articles as $var)

                                <article class="blog_item">
                                    <div class="blog_item_img">
                                        <img class="card-img rounded-0" src="{{ Voyager::image($var->cover) }}" alt="{{ $var->cover }}">
                                        <a href="#" class="blog_item_date">
                                            <h3>{{ $var->created_at->isoFormat('D') }}</h3>
                                            <p>{{ $var->created_at->isoFormat('MMM') }}</p>
                                        </a>
                                    </div>
                                    <div class="blog_details">
                                        <a class="d-inline-block" href="{{ route('article.show', [$var->id]) }}">
                                            <h2 class="blog-head" style="color: #2d2d2d;">{{ $var->title }}</h2>
                                        </a>
                                        <p>
                                            @if(strlen(strip_tags($var->body)) > 250)
                                                {{ str_limit(strip_tags($var->body), 250) }} <br> <br>
                                                <a href="{{ route('article.show', [$var->id]) }}" class="primary-button">Read More <i class="ti-arrow-circle-right ml-1 mr-1"></i></a>
                                            @else
                                                {{ str_limit(strip_tags($var->body)) }}
                                            @endif
                                        </p>
                                        <ul class="blog-info-link">
                                            <li><a href="#"><i class="ti-alarm-clock"></i> {{ $var->created_at->format('h:i A') }}</a></li>
                                            <li><a href="#"><i class="ti-calendar"></i> {{ $var->created_at->toDateString() }}</a></li>
                                        </ul>
                                    </div>
                                </article>

                            @endforeach

                            {{ $articles->links() }}

                        </div>

                    </div>

                    <div class="col-lg-4">
                        <div class="blog_right_sidebar">
                            @include('partials.news.recent')
                        </div>
                    </div>
                @else

                    <div class="col text-center">
                        <h1><i class="ti ti-face-sad"></i></h1>
                        <h4>There are no articles at that moment. Please check again later!</h4>
                    </div>

                @endif

            </div>

        </div>

    </section>

@endsection
