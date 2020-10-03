<div class="our_department_area">

    <div class="container">

        <div class="row">
            <div class="col-xl-12">
                <div class="section_title text-center mb-55">
                    <h3>Our Recent Health Articles</h3>
                </div>
            </div>
        </div>

        <div class="row">

            @foreach($articles as $article)
                <div class="col-xl-4 col-md-6 col-lg-4">
                    <div class="single_department">
                        <div class="department_thumb">
                            <img src="{{ Voyager::image($article->cover) }}" alt="{{ $article->cover }}">
                        </div>
                        <div class="department_content">
                            <h3><a href="{{ route('article.show', [$article->id]) }}">{{ $article->title }}</a></h3>
                            <p>{{ str_limit(strip_tags($article->body), 50) }}</p>
                            <a href="{{ route('article.show', [$article->id]) }}" class="learn_more">Learn More</a>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>

    </div>

</div>
