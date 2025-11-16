@extends('client.index')

@section('content')
<!-- latest news -->
<div class="latest-news mt-150 mb-150">
    <div class="container">
        <div class="row">
            @foreach($news as $nws)
                <div class="col-lg-4 col-md-6">
                    <div class="single-latest-news">
                        <a href="{{ route('client.news.details', ['id' => $nws->news_id]) }}">
                            <div class="latest-news-bg news-bg-1" style="background-image: url({{ asset('') }}images/news/{{ $nws->news_picture }}) !important"></div>
                        </a>
                        <div class="news-text-box">
                            <h3><a href="single-news.html">{{ ucwords($nws->news_title) }}</a></h3>
                            <p class="blog-meta">
                                <span class="author"><i class="fas fa-user"></i> {{ $nws->news_author }}</span>
                                <span class="date"><i class="fas fa-calendar"></i> {{ \Carbon\Carbon::parse($nws->news_created_date)->format('d F Y') }}</span>
                            </p>
                            <p class="excerpt">
                                {{ Str::substr(strip_tags($nws->news_description), 0, 100) }}
                            </p>
                            <a href="{{ route('client.news.details', ['id' => $nws->news_id]) }}" class="read-more-btn">Selengkapnya <i class="fas fa-angle-right"></i></a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
<!-- end latest news -->
@endsection