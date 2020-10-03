<div class="expert_doctors_area">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="doctors_title mb-55">
                    <h3>Expert Doctors</h3>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12">
                <div class="expert_active owl-carousel">
                    @foreach(\App\Doctor::orderBy('id', 'desc')->get() as $doctor)
                        <div class="single_expert">
                        <div class="expert_thumb">
                            <img src="{{ Voyager::image($doctor->avatar) }}" alt="{{$doctor->avatar}}">
                        </div>
                        <div class="experts_name text-center">
                            <h3>{{$doctor->name}}</h3>
                            <span>{{$doctor->specialization}}</span>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
