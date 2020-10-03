<div class="testmonial_area">

    <div class="testmonial_active owl-carousel">

        @foreach(\App\Testimonial::all() as $testimonial)

        <div class="single-testmonial overlay2" style="background: url({{ Voyager::image($testimonial->cover) }})">

            <div class="container">

                <div class="row">

                    <div class="col-xl-10 offset-xl-1">
                        <div class="testmonial_info text-center">
                            <div class="quote">
                                <i class="flaticon-straight-quotes"></i>
                            </div>
                            <p>{!! $testimonial->body !!}</p>
                            <div class="testmonial_author">
                                <h4>{{ $testimonial->author }}</h4>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

        @endforeach

    </div>
</div>
