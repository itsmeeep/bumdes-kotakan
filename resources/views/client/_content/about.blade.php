@extends('client.index')

@section('content')
<!-- featured section -->
<div class="feature-bg-about-1">
    <div class="container">
        <div class="row">
            <div class="col-lg-7">
                <div class="featured-text">
                    <h2 class="pb-1">Tentang <span class="orange-text">Kami</span></h2>
                    <h5 class="pb-3" style="line-height: 1.8 !important">BUMDes <span class="orange-text">Kotakan</span> dalam pembentukannya terdapat makna yang diharapkan akan mewakili tujuan dan harapan dari BUMDes <span class="orange-text">Kotakan</span></h5>
                    <br>
                    <div class="row">
                        <div class="col-lg-12 col-md-12 mb-4 mb-md-5">
                            <div class="list-box d-flex">
                                <div class="list-icon">
                                    <i class="fas fa-leaf"></i>
                                </div>
                                <div class="content" style="text-align: justify; text-justify: inter-word;">
                                    <h3>Makna Gambar Daun</h3>
                                    <p>Daun melambangkan kehidupan, pertumbuhan, dan keberlanjutan.</p>
                                    <p>Menggambarkan bahwa BUMDes Kotakan berorientasi pada pembangunan ekonomi desa yang ramah lingkungan dan berkelanjutan. Juga mencerminkan kemandirian desa yang tumbuh dari potensi alam dan masyarakatnya sendiri.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 mb-5 mb-md-5">
                            <div class="list-box d-flex">
                                <div class="list-icon">
                                    <i class="fas fa-list-ol"></i>
                                </div>
                                <div class="content">
                                    <h3>Makna Angka 3 (B)</h3>
                                    <p>Bentuk angka 3 diintegrasikan dalam huruf B melambangkan tiga pilar utama BUMDes, yaitu:</p>
                                    <br>
                                    <p>1. Ekonomi → Meningkatkan kesejahteraan masyarakat.</p>
                                    <p>2. Sosial → Memperkuat kebersamaan dan gotong royong.</p>
                                    <p>3. Lingkungan → Menjaga kelestarian alam desa.</p>
                                    <br>
                                    <p>Angka 3 juga bermakna kesinambungan antara masa lalu, masa kini, dan masa depan, menegaskan semangat untuk terus berkembang tanpa melupakan akar budaya desa.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end featured section -->

<!-- featured section -->
<div class="feature-bg-about-2">
    <div class="container">
        <div class="row">
            <div class="col-lg-5"></div>
            <div class="col-lg-7">
                <div class="featured-text">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 mb-4 mb-md-5">
                            <div class="list-box d-flex">
                                <div class="list-icon">
                                    <i class="fas fa-palette"></i>
                                </div>
                                <div class="content" style="text-align: justify; text-justify: inter-word;">
                                    <h3>Makna Warna-warna</h3>
                                    <p>1. Hijau → Alam, pertanian, dan kehidupan; mencerminkan potensi utama desa serta semangat ekologis.</p>
                                    <p>2. Biru → Kepercayaan, profesionalitas, dan keterbukaan dalam mengelola usaha desa.</p>
                                    <p>3. Merah → Semangat, keberanian, dan motivasi untuk maju membangun desa.</p>
                                    <p>4. Kuning/Oranye → Kreativitas, optimisme, dan keceriaan masyarakat desa.</p>
                                    <p>5. Ungu → Kemandirian, inovasi, dan kebijaksanaan dalam pengambilan keputusan.</p>
                                    <p>6. Hijau muda dan magenta → Kolaborasi dan harmoni antarwarga serta antarunit usaha BUMDes.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 mb-5 mb-md-5">
                            <div class="list-box d-flex">
                                <div class="list-icon">
                                    <i class="fas fa-circle-notch"></i>
                                </div>
                                <div class="content">
                                    <h3>Makna Bentuk Lingkaran Warna-warni</h3>
                                    <p>Melambangkan persatuan, kerja sama, dan sinergi antara seluruh elemen masyarakat desa.</p>
                                    <br>
                                    <p>Menunjukkan bahwa BUMDes menjadi pusat roda penggerak ekonomi desa yang berputar terus menerus tanpa henti, menuju kemajuan bersama.</p>
                                    <br>
                                    <br>
                                    <br>
                                    <br>
                                    <br>
                                    <br>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end featured section -->

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

<!-- team section -->
<div class="mt-150 mb-150">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 text-center">
                <div class="section-title">
                    <h3>Struktur <span class="orange-text">Organisasi</span></h3>
                </div>
            </div>
        </div>
        <div class="row" style="padding-bottom: 40px">
            @foreach($stucture_org as $org)
            <div class="col-lg-4 col-md-6">
                <div class="single-team-item">
                    <div class="team-bg team-bg-1" style="background-image: url({{ asset('') }}images/team/{{ $org->role_structure_picture }}) !important"></div>
                    <h4>{{ $org->role_structure_person }}<span>{{ $org->role_name }}</span></h4>
                    <ul class="social-link-team">
                        <li><a href="#" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                        <li><a href="#" target="_blank"><i class="fab fa-twitter"></i></a></li>
                        <li><a href="#" target="_blank"><i class="fab fa-instagram"></i></a></li>
                    </ul>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
<!-- end team section -->
@endsection