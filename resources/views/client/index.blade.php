<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Responsive Bootstrap4 Shop Template, Created by Imran Hossain from https://imransdesign.com/">

	<!-- title -->
	<title>@if (isset($title)) {{ $title }} @endif</title>

	@include('client._layout.style')

</head>
<body>
	
	<!--PreLoader-->
    <div class="loader">
        <div class="loader-inner">
            <div class="circle"></div>
        </div>
    </div>
    <!--PreLoader Ends-->
	
	@include('client._layout.header')

	@yield('content')

	<!-- footer -->
	<div class="footer-area">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 col-md-6">
					<div class="footer-box about-widget">
						<h2 class="widget-title">Catatan Kami</h2>
						<p>
							Website ini merupakan hasil kegiatan Pengabdian kepada Masyarakat pendanaan Direktorat Penelitian dan Pengabdian kepada Masyarakat Kementerian Pendidikan Tinggi, Sains, dan Teknologi 
						</p>
						<p>
							<img class="partner-footer-logo" src="{{ asset('') }}client/assets/img/partner/logo-universiats-abdurachman-saleh-1.png" alt="">
							<img class="partner-footer-logo" src="{{ asset('') }}client/assets/img/partner/logo-stiesia-surabaya.png" alt="">
							<img class="partner-footer-logo" src="{{ asset('') }}client/assets/img/partner/logo-dikti.png" alt="">
						</p>
						<p>
							<b>339/C3/DT.05.00/PM-BATCH III/2025</b><br>
							<b>040/LL7/DT.05.00/PM-BATCH III/2025</b><br>
							<b>007/LP2M.UNARS.P/IX/2025</b>
						</p>
					</div>
				</div>
				<div class="col-lg-3 col-md-6">
					<div class="footer-box get-in-touch">
						<h2 class="widget-title">Hubungi Kami</h2>
						<ul>
							<li>Kantor Kepala Desa Kotakan</li>
							<li>Jl. Raya Bondowoso No.05, Kotakan Selatan, Kotakan, Kec. Situbondo, Kabupaten Situbondo, Jawa Timur 68313</li>
							<li>(0338) 65364</li>
						</ul>
					</div>
				</div>
				<div class="col-lg-3 col-md-6">
					<div class="footer-box pages">
						<h2 class="widget-title">Halaman</h2>
						<ul>
							<li><a href="{{ route('client.home') }}">Home</a></li>
							<li><a href="{{ route('client.about') }}">Tentang Kami</a></li>
							<li><a href="{{ route('client.vision') }}">Visi dan Misi</a></li>
							<li><a href="{{ route('client.news') }}">Berita</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end footer -->
	
	<!-- copyright -->
	<div class="copyright">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 col-md-12">
					<p>Rebuilded <a><b>2025</b></a>
					</p>
				</div>
				<div class="col-lg-6 text-right col-md-12">
					<div class="social-icons">
						<ul>
							<li><a href="#" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
							<li><a href="#" target="_blank"><i class="fab fa-twitter"></i></a></li>
							<li><a href="#" target="_blank"><i class="fab fa-instagram"></i></a></li>
							<li><a href="#" target="_blank"><i class="fab fa-linkedin"></i></a></li>
							<li><a href="#" target="_blank"><i class="fab fa-dribbble"></i></a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end copyright -->
	
	@include('client._layout.scripts')

</body>
</html>