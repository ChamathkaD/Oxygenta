<footer class="footer">
    <div class="footer_top">
        <div class="container">
            <div class="row">
                <div class="col-xl-4 col-md-6 col-lg-4">
                    <div class="footer_widget">
                        <div class="footer_logo">
                            <a href="{{ url('/') }}">
                                <h2 class="text-white text-uppercase">{{ config('app.name', 'Oxygenta') }}</h2>
                            </a>
                        </div>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab aliquid architecto autem deserunt distinctio doloribus eveniet inventore nemo, quasi qui quibusdam quidem! Amet deleniti earum expedita, molestiae sit soluta unde.
                        </p>
                    </div>
                </div>
                <div class="col-xl-4 col-md-6 col-lg-2 offset-xl-1">
                    <div class="footer_widget">
                        <h3 class="footer_title">
                            Useful Links
                        </h3>
                        <ul>
                            <li><a href="{{ route('articles') }}">Articles</a></li>
                            <li><a href="{{ route('doctors') }}">Doctors</a></li>
                            <li><a href="{{ route('about') }}">About</a></li>
                            <li><a href="{{ route('contact') }}">Contact</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6 col-lg-3">
                    <div class="footer_widget">
                        <h3 class="footer_title">
                            Address
                        </h3>
                        <p>
                            {{ setting('site.title') }}
                            <br>
                            {{setting('site.address')}}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="copy-right_text">
        <div class="container">
            <div class="footer_border"></div>
            <div class="row">
                <div class="col-xl-12">
                    <p class="copy_right text-center">
                        Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved.
                    </p>
                </div>
            </div>
        </div>
    </div>
</footer>
