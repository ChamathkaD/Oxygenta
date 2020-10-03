<aside class="single_sidebar_widget popular_post_widget">

    <h3 class="widget_title" style="color: #2d2d2d;">Recent Article</h3>

    @foreach($articles as $var)
        <div class="media post_item">
            <img src="{{ Voyager::image($var->cover) }}" alt="{{ $var->cover }}" width="80">
            <div class="media-body">
                <a href="{{ route('article.show', [$var->id]) }}">
                    <h3 style="color: #2d2d2d;">{{ $var->title }}</h3>
                </a>
                <p>{{ $var->created_at->toDayDateTimeString() }}</p>
            </div>
        </div>

    @endforeach

</aside>
