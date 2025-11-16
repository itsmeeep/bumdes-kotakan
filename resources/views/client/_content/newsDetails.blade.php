@extends('client.index')

@section('content')
<!-- single article section -->
<div class="mt-150 mb-150">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="single-article-section">
                    <div class="single-article-text">
                        <!-- <div class="single-artcile-bg-custom" style="background-image: url({{ asset('') }}images/news/{{ $news->news_picture }}) !important" ></div> -->
                        <img src="{{ asset('images/news/' . $news->news_picture) }}" alt="News Image" style="width: 100%; height: auto; display: block; border-radius: 5px; margin-bottom: 20px;">
                        <p class="blog-meta">
                            <span class="author"><i class="fas fa-user"></i> {{ $news->news_author }}</span>
                            <span class="date"><i class="fas fa-calendar"></i> {{ \Carbon\Carbon::parse($news->news_created_date)->format('d F Y') }}</span>
                        </p>
                        <h2>{{ $news->news_title }}</h2>
                        {!! $news->news_description !!}
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="sidebar-section">
                    <div class="recent-posts">
                        <h4>Berita Terbaru Posts</h4>
                        <ul>
                            @foreach ($latestNews as $ln)
                                <li>
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div style="
                                                width: 100%;
                                                position: relative;
                                                padding-top: 100%; /* 1:1 aspect ratio */
                                                overflow: hidden;
                                            ">
                                                <img src="{{ asset('images/news/' . $ln->news_picture) }}" alt="News Image" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; object-fit: cover; border-radius: 5px; margin-bottom: 20px;">
                                            </div>
                                        </div>
                                        <div class="col-md-7">
                                            <a href="{{ route('client.news.details', ['id' => $ln->news_id]) }}">
                                                <b>{{ ucwords($ln->news_title) }}</b>
                                                <p>
                                                    {{ Str::substr(strip_tags($ln->news_description), 0, 50) }}
                                                </p>
                                            </a>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end single article section -->
@endsection