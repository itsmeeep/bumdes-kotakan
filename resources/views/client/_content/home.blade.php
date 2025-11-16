@extends('client.index')

@section('content')
<!-- advertisement section -->
<div class="abt-section mb-100 mt-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-12">
                <div class="abt-bg">
                    <a href="https://www.youtube.com/watch?v=QyisDjuMY-I" class="video-play-btn popup-youtube"><i class="fas fa-play"></i></a>
                </div>
            </div>
            <div class="col-lg-6 col-md-12">
                <div class="abt-text">
                    <p class="top-sub">Tentang Kami</p>
                    <h2>We are <span class="orange-text">Desa Kotakan</span></h2>
                    <p>
                        Kemauan untuk mewujudkan kemandirian ekonomi desa melalui pengelolaan usaha yang partisipati, inovatif da berkelanjutan demi kesejahteraan masyarakat desa
                    </p>
                    <p>
                        keinginan kuat tersebut diiringi dengan mengembangkan pertanian dan peternakan yang produktif, mengelola potensi pariwisata desa, mendorong digitalisasi desa guna mempercepat layanan publik,
                        meningkatkan kapasitas SDM desa, menjalin kemitraan strategis dengan pemerintah, swasta, dan komunitas dan menjadi wadah ekonomi inklusif dan transparan yang mengutamakan partisipasi dan kebermanfaatan bagi seluruh warga desa
                    </p>
                    <a href="{{ route('client.vision') }}" class="boxed-btn mt-4">Visi dan Misi Kami</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end advertisement section -->

<!-- shop banner -->
<section class="shop-banner">
    <div class="container">
        <h3 style="text-shadow: -1px -1px 0 white, 1px -1px 0 white, -1px  1px 0 white, 1px  1px 0 white, -1px 0 0 white, 1px 0 0 white, 0 -1px 0 white, 0 1px 0 white;">
            Bersama Membangun <br> Kesejahteraan 
            <span class="white-text" style="text-shadow: none;">Desa</span>
        </h3>
        <div style="margin-top: 20px"></div>
        <a href="{{ route('client.news') }}" class="cart-btn cart-btn-new btn-lg">Info Terkini</a>
    </div>
</section>
<!-- end shop banner -->


<!-- cart banner section -->
<section class="cart-banner pt-100 pb-100">
    <div class="container">
        <div class="row clearfix">
            <!--Image Column-->
            <div class="image-column col-lg-6">
                <div class="image">
                    <div class="price-box">
                        <div class="inner-price">
                            <span class="price">
                            </span>
                        </div>
                    </div>
                    <img style="border-top-left-radius: 10px; border-bottom-right-radius: 10px;" src="{{ asset('') }}client/assets/img/banner/bumdes-kotakan-banner.png" alt="">
                </div>
            </div>
            <!--Content Column-->
            <div class="content-column col-lg-6">
                <h3><span class="orange-text">BUMDes</span> Kotakan</h3>
                <h4>Bangkit Bersama, Majukan Desa!</h4>
                <div class="text">BUMDes meningkatkan perekonomian desa dengan menjadi motor penggerak ekonomi lokal, mengelola potensi desa, meningkatkan Pendapatan Asli Desa (PADes), dan menyejahterakan masyarakat melalui berbagai usaha dan program pemberdayaan</div>
                <!--Countdown Timer-->
                <a href="{{ route('client.about') }}" class="cart-btn mt-3">Tentang Kami</a>
            </div>
        </div>
    </div>
</section>
<!-- end cart banner section -->

<!-- advertisement section -->
<div class="abt-section mt-150">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-12">
                <div class="abt-text">
                    <h2>Bujuk Nur <span class="orange-text">Kasian</span></h2>
                    <p>
                        Situs Makam Bujuk Nur Kasian merupakan pusat spiritual dan budaya masyarakat Desa Kotakan, yang menggabungkan nilai sejarah, religi, dan kearifan lokal. Melalui tradisi ziarah, masyarakat menjaga hubungan spiritual dengan Tuhan sekaligus melestarikan warisan leluhur dan potensi wisata religi Situbondo.
                    </p>
                    <a href="{{ route('client.about.bujuk') }}" class="boxed-btn mt-4">Pelajari Lebih Lanjut</a>
                </div>
            </div>
            <div class="col-lg-6 col-md-12">
                <div class="abt-bg"></div>
            </div>
        </div>
    </div>
</div>
<!-- end advertisement section -->

<!-- latest news -->
<div class="latest-news pt-150 pb-150">
    <div class="container">

        <div class="row">
            <div class="col-lg-8 offset-lg-2 text-center">
                <div class="section-title">	
                    <h3><span class="orange-text">Berita</span> Terbaru</h3>
                    <p>Temukan berita menarik dan info info menarik di daerah kita</p>
                </div>
            </div>
        </div>

        <div class="row">
            @foreach($latestNews as $nws)
                <div class="col-lg-4 col-md-6">
                    <div class="single-latest-news">
                        <a href="{{ route('client.news.details', ['id' => $nws->news_id]) }}">
                            <div class="latest-news-bg news-bg-1" style="background-image: url({{ asset('') }}images/news/{{ $nws->news_picture }}) !important"></div>
                        </a>
                        <div class="news-text-box">
                            <h3><a href="{{ route('client.news.details', ['id' => $nws->news_id]) }}">{{ ucwords($nws->news_title) }}</a></h3>
                            <p class="blog-meta">
                                <span class="author"><i class="fas fa-user"></i> {{ $nws->news_author }}</span>
                                <span class="date"><i class="fas fa-calendar"></i> {{ \Carbon\Carbon::parse($nws->news_created_date)->format('d F Y') }}</span>
                            </p>
                            <p class="excerpt">
                                {{ Str::substr(strip_tags($nws->news_description), 0, 100) }}
                            </p>
                            <a href="{{ route('client.news.details', ['id' => $nws->news_id]) }}" class="read-more-btn">Baca Selengkapnya <i class="fas fa-angle-right"></i></a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="row">
            <div class="col-lg-12 text-center">
                <a href="{{ route('client.news') }}" class="boxed-btn">Berita Selengkapnya</a>
            </div>
        </div>
    </div>
</div>
<!-- end latest news -->

<!-- logo carousel -->
<div class="logo-carousel-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="logo-carousel-inner">
                    <div class="single-logo-item" style="max-width: 150px !important">
                        <img src="{{ asset('') }}client/assets/img/partner/logo-universiats-abdurachman-saleh-1.png" alt="">
                    </div>
                    <div class="single-logo-item" style="max-width: 150px !important">
                        <img src="{{ asset('') }}client/assets/img/partner/logo-dikti.png" alt="">
                    </div>
                    <div class="single-logo-item" style="max-width: 150px !important">
                        <img src="{{ asset('') }}client/assets/img/partner/logo-stiesia-surabaya.png" alt="">
                    </div>
                    <div class="single-logo-item" style="max-width: 120px !important">
                        <img src="{{ asset('') }}client/assets/img/partner/logo-pemkab-situbondo.png" alt="">
                    </div>
                    <div class="single-logo-item" style="max-width: 120px !important">
                        <img src="{{ asset('') }}client/assets/img/partner/logo-pemprov-jatim.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end logo carousel -->
@endsection