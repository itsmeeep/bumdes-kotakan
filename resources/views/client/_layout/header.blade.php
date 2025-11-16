<!-- header -->
<div class="top-header-area" id="sticker">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-sm-12 text-center">
                <div class="main-menu-wrap">
                    <!-- logo -->
                    <div class="site-logo">
                        <a href="{{ route('client.home') }}">
                            <img src="{{ asset('') }}client/assets/img/partner/bumdes-logo-long.png" alt="">
                        </a>
                    </div>
                    <!-- logo -->

                    <!-- menu start -->
                    <nav class="main-menu">
                        <ul>
                            <li><a href="{{ route('client.home') }}">Home</a></li>
                            <li><a href="{{ route('client.about') }}">Tentang Kami</a></li>
                            <li><a href="{{ route('client.vision') }}">Visi dan Misi</a></li>
                            <li><a>Berita</a>
                                <ul class="sub-menu">
                                    {!! Helper::headerLastestNews() !!}
                                    <li><a href="{{ route('client.news') }}"><i class="fas fa-chevron-circle-right"></i> Berita Selengkapnya</a></li>
                                </ul>
                            </li>
                            <li>
                                <div class="header-icons">
                                    <a class="shopping-cart" href="{{ route('admin.login') }}"><i class="fas fa-user-circle"></i></a>
                                </div>
                            </li>
                        </ul>
                    </nav>
                    <div class="mobile-menu"></div>
                    <!-- menu end -->
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end header -->

<!-- home page slider -->
<div class="homepage-slider">
    <!-- single home slider -->
    <div class="single-homepage-slider homepage-bg-1">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-lg-7 offset-lg-1 offset-xl-0">
                    <div class="hero-text">
                        <div class="hero-text-tablecell">
                            <p class="subtitle">Badan Usaha Milik Desa Kotakan</p>
                            <h1>Dari Desa, Oleh Desa, <span class="orange-text">Untuk Desa</span></h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- single home slider -->
    <div class="single-homepage-slider homepage-bg-2">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1 text-center">
                    <div class="hero-text">
                        <div class="hero-text-tablecell">
                            <p class="subtitle">Badan Usaha Milik Desa Kotakan</p>
                            <h1>Bersama Membangun <span class="orange-text">Kesejahteraan Desa</span></h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- single home slider -->
    <div class="single-homepage-slider homepage-bg-3">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1 text-right">
                    <div class="hero-text">
                        <div class="hero-text-tablecell">
                            <p class="subtitle">Badan Usaha Milik Desa Kotakan</p>
                            <h1>Inovasi <span class="orange-text">Desa</span>, Kesejahteraan <span class="orange-text">Bersama</span></h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end home page slider -->