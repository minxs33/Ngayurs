@extends('layouts.app') 

@section('title','Ngayurs')

@section('content')
<div class="container mt-4">
<div class="row">  
<div class="main-wrapper-first">
			<div class="hero-area relative">
				<div class="banner-area">
					<div class="container">
						<div class="row height align-items-center">
							<div class="col-lg-7">
								<div class="banner-content">
								
									<h1 class="text-white text-uppercase mb-10">Susah mencari Tukang Sayur ?<br></h1>
									<p class="text-white mb-30">Anda dapat mencarinya disini, mempermudah pencarian Tukang Sayur di daerah rumah anda, cukup tekan tombol dibawah ini</p>
									<a href="{{ url('/maps') }}" class="primary-btn d-inline-flex align-items-center"><span class="mr-10">Mulai Mencari</span><span class="lnr lnr-arrow-right"></span></a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="main-wrapper">
			<!-- Start Feature Area -->
			<section class="featured-area" id="keunggulan">
				<div class="container">
					<div class="row justify-content-center">
						<div class="col-lg-6">
							<div class="section-title text-center">
								<h2 class="text-white">Kenapa harus disini ?</h2>
								<p class="text-white">Beberapa keunggulan dan perbedaan web Ngayurs dari web Tukang Sayur lain yang pernah anda lihat </p>
							</div>
						</div>
					</div> <br>
					<div class="row">
						<div class="col-md-4">
							<div class="single-feature">
								<div class="thumb" style="background: url(img/sayuran.jpg);"></div>
								<div class="desc text-center mt-30">
									<h4 class="text-white">Sayuran yang segar</h4>
									<p class="text-white">Mitra kami datang atau memastikan sayuran yang akan dijual oleh Tukang Sayur kami</p>
								
								</div>
							</div>
						</div>
						<div class="col-md-4">
							<div class="single-feature">
								<div class="thumb" style="background: url(img/kangyur.jpg);"></div>
								<div class="desc text-center mt-30">
									<h4 class="text-white">Memenuhi permintaan</h4>
									<p class="text-white">Anda dapat lihat cara hubungi Tukang Sayur kami dan meminta sayur yang belum ada untuk diperdagangkan</p>		
								</div>
							</div>
						</div>
						<div class="col-md-4">
							<div class="single-feature">
								<div class="thumb" style="background: url(img/baiksangad.jpg);"></div>
								<div class="desc text-center mt-30">
									<h4 class="text-white">Tukang Sayur yang ramah</h4>
									<p class="text-white">Mitra kami menyaring pendaftar Tukang sayur, anda juga dapat melaporkan Tukang Sayur yang berkelakuan tidak baik dengan cara menghubungi kami</p>
									
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
			<!-- End Feature Area -->
			<!-- Start Remarkable Wroks Area -->
			<section class="remarkable-area" id="Feature">
				<div class="container">
					<div class="row justify-content-center">
						<div class="col-lg-6">
							<div class="section-title text-center">
								<h2>Tata cara penggunaan</h2>
								<p>Berikut 3 langkah untuk menggunakan web Ngayurs</p>
							</div>
						</div>
					</div>
					<div class="single-remark">
						<div class="row no-gutters">
							<div class="col-lg-7 col-md-6">
								<div class="remark-thumb" style="background: url(img/1.png);"></div>
							</div>
							<div class="col-lg-5 col-md-6">
								<div class="remark-desc">
									<h4>Langkah Pertama</h4>
									<p>Klik tombol bseperti gambar disamping untuk ke halaman maps dari web Ngayurs</p>
								</div>
							</div>
						</div>
					</div>
					<div class="single-remark">
						<div class="row no-gutters">
							<div class="col-lg-7 col-md-6">
								<div class="remark-desc">
									<h4>Langah Kedua</h4>
									<p>Setelah anda menekan tombol tadi anda akan dibawa ke halaman baru seperti gambar disamping, anda juga dapat melihat data banyaknya Tukang Sayur dibagian kiri, dan anda juga dapat mencari Tukang Sayur di daerah lainnya dengan mengetik daerah yang ingin dilihat di kolom search</p>
								</div>
							</div>
							<div class="col-lg-5 col-md-6">
								<div class="remark-thumb" style="background: url(img/2.png);"></div>
							</div>
						</div>
					</div>
					<div class="single-remark">
						<div class="row no-gutters">
							<div class="col-lg-7 col-md-6">
								<div class="remark-thumb" style="background: url(img/3.png);"></div>
							</div>
							<div class="col-lg-5 col-md-6">
								<div class="remark-desc">
									<h4>Langkah Ketiga</h4>
									<p>Untuk mengetahui Tukang Sayur di daerah anda sekarang ini cukup menekan tombol di pojok kanan atas seperti gambar berikut</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
			<!-- End Remarkable Wroks Area -->
			<!-- Start Story Area -->
			<section class="story-area" id="gettingstarted">
				<div class="container">
					<div class="row align-items-center">
						<div class="col-lg-1">
						</div>
						<div class="col-lg-7">
							<div class="story-box">
								<h6 class="text-uppercase">Ingin bergabung sebagai Tukang Sayur Kami ?</h6>
								<p>Daftar sekarang juga ! tidak dipungut biaya pendaftaran, isi data diri anda, dan tunggu konfirmasi dari kami melalui email</p>
								<a href="/daftarpedagang" class="primary-btn d-inline-flex align-items-center"><span class="mr-10">Daftar di sini!</span><span class="lnr lnr-arrow-right"></span></a>
							</div>
						</div>
					</div>
				</div>
			</section>
			<!-- End Story Area -->


			<!-- Start Contact Form -->
			<!-- End Contact Form -->
			<!-- Start Footer Widget Area -->
			<section class="footer-widget-area"> 	
				<div class="container">
					<div class="row">
						<div class="col-md-4">
							<div class="single-widget">
								<div class="desc">
									<h6 class="title">Alamat</h6>
									<p>Jl Ngayurs No 88 RT:8 RW:8, Depok, Jawa Barat <br> Kelurahan Ngayurs kecamatan Uye</p>
								</div>
							</div>
						</div>
						<div class="col-md-4">
							<div class="single-widget">
								<div class="desc">
									<h6 class="title">Email</h6>
									<div class="contact">
										<a href="mailto:info@dataarc.com">ngayurs@gmail.com</a> <br>
										<a href="mailto:support@dataarc.com">ngayurssupport@gmail.com</a>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-4">
							<div class="single-widget">
								<div class="desc">
									<h6 class="title">Nomor Telepon</h6>
									<div class="contact">
										<a href="tel:1545">012 4562 982 3612</a> <br>
										<a href="tel:54512">012 6321 956 4587</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<footer>
					<div class="container">
						<div class="footer-content d-flex justify-content-between align-items-center flex-wrap">
							<div class="logo">
								<a href="index.html"><img style="width:100px;height:50;" src="img/Logo Nyayurs 2.png" alt=""></a>
							</div>
							<div class="copy-right-text">Copyright &copy; 2017  |  All rights reserved to <a href="#">Ngayurs</a> Diubah oleh Sleep Worker</a></div>
							<div class="footer-social">
								<a href="#"><i class="fa fa-facebook"></i></a>
								<a href="#"><i class="fa fa-twitter"></i></a>
								<a href="#"><i class="fa fa-dribbble"></i></a>
								<a href="#"><i class="fa fa-behance"></i></a>
							</div>
						</div>
					</div>
				</footer>
			</section>
			<!-- End Footer Widget Area -->

		</div>

		</div>
@endsection