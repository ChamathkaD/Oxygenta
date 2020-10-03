<div class="slider_area">

    <div class="slider_active owl-carousel">

        @foreach(\App\Slider::all() as $slider)

            <div class="single_slider  d-flex align-items-center" style="background: url({{ Voyager::image($slider->image) }})">

            <div class="container">

                <div class="row">

                    <div class="col-xl-12">
                        <div class="slider_text ">
                            <h3> <span>{{ $slider->heading1 }}</span> <br>
                                {{ $slider->heading2 }} </h3>
                            <p>{!! $slider->heading3 !!}</p>
                        </div>
                    </div>

                </div>

            </div>

        </div>

        @endforeach

    </div>
</div>
