@extends('layouts.artikel') 

@section('title','Ngayurs')

@section('content')

<div class="container mt-4">
<div class="row">  
<div class="main-wrapper-first">
@if(Session::has('error'))
<div class="alert alert-warning alert-dismissible fade show wow shake" role="alert">
  <strong>{{ Session::get('error') }}</strong>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif
@if(Session::has('success'))
<div class="alert alert-success alert-dismissible fade show wow shake" role="alert">
  <strong>{{ Session::get('success') }}</strong>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif
    <section class="remarkable-area" id="Feature">
	<section class="mbr-section content6 cid-qv5zlioaYy" id="content6-1a" data-rv-view="5941">
    
     
    
    <div class="container">
        <div class="media-container-row">
                <div class="media-container-row">
                <h1 style="font-weight:bold; text-decoration:underline;" class="text-left mb-2">{{ $posts->judul }}</h1>
                    <div class="mbr-figure" style="width: 100%;">
                      <img src="{{URL::asset('fotoThumbnail/'.$posts->thumbnail) }}" style="width:100%; height:400px;" alt="Mobirise" title="" media-simple="true">  
                    </div>
                    <br>
                    <div class="media-content">
                        <div class="mbr-section-text">
                            <p class="mbr-text mb-0 mbr-fonts-style display-7 text-dark text-center">
                            {{ $posts->deskripsi }}
                            </p>
                        </div>
                </div>
            </div>
        </div>
    </div>
</section>
</section>
<section class="footer-widget-area"> 	
				<div class="container wow bounceInUp" data-wow-duration="2s">
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
					<div class="container wow bounceInUp" data-wow-duration="2s">
						<div class="footer-content d-flex justify-content-between align-items-center flex-wrap">
							<div class="logo">
								<a href="index.html"><img style="width:100px;height:50;" src="../img/Logo Nyayurs 2.png" alt=""></a>
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


            @endsection