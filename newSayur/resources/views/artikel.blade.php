@extends('layouts.app') 

@section('title','Ngayurs')

@section('content')
<style>

section{
    padding: 100px 0;
}

.details-card {
	background: #ecf0f1;
}

.card-content {
	background: #ffffff;
	border: 4px;
	box-shadow: 0 2px 5px 0 rgba(0,0,0,.16), 0 2px 10px 0 rgba(0,0,0,.12);
}

.card-img {
	position: relative;
	overflow: hidden;
	border-radius: 0;
	z-index: 1;
}

.card-img img {
	width: 100%;
	height: auto;
	display: block;
}

.card-img span {
	position: absolute;
    top: 15%;
    left: 12%;
    background: #1ABC9C;
    padding: 6px;
    color: #fff;
    font-size: 12px;
    border-radius: 4px;
    -webkit-border-radius: 4px;
    -moz-border-radius: 4px;
    -ms-border-radius: 4px;
    -o-border-radius: 4px;
    transform: translate(-50%,-50%);
}
.card-img span h4{
        font-size: 12px;
        margin:0;
        padding:10px 5px;
         line-height: 0;
}
.card-desc {
	padding: 1.25rem;
}

.card-desc h3 {
	color: #000000;
    font-weight: 600;
    font-size: 1.5em;
    line-height: 1.3em;
    margin-top: 0;
    margin-bottom: 5px;
    padding: 0;
}

.card-desc p {
	color: #747373;
    font-size: 14px;
	font-weight: 400;
	font-size: 1em;
	line-height: 1.5;
	margin: 0px;
	margin-bottom: 20px;
	padding: 0;
	font-family: 'Raleway', sans-serif;
}
.btn-card{
	background-color: #1ABC9C;
	color: #fff;
	box-shadow: 0 2px 5px 0 rgba(0,0,0,.16), 0 2px 10px 0 rgba(0,0,0,.12);
    padding: .84rem 2.14rem;
    font-size: .81rem;
    -webkit-transition: color .15s ease-in-out,background-color .15s ease-in-out,border-color .15s ease-in-out,-webkit-box-shadow .15s ease-in-out;
    transition: color .15s ease-in-out,background-color .15s ease-in-out,border-color .15s ease-in-out,-webkit-box-shadow .15s ease-in-out;
    -o-transition: color .15s ease-in-out,background-color .15s ease-in-out,border-color .15s ease-in-out,box-shadow .15s ease-in-out;
    transition: color .15s ease-in-out,background-color .15s ease-in-out,border-color .15s ease-in-out,box-shadow .15s ease-in-out;
    transition: color .15s ease-in-out,background-color .15s ease-in-out,border-color .15s ease-in-out,box-shadow .15s ease-in-out,-webkit-box-shadow .15s ease-in-out;
    margin: 0;
    border: 0;
    -webkit-border-radius: .125rem;
    border-radius: .125rem;
    cursor: pointer;
    text-transform: uppercase;
    white-space: normal;
    word-wrap: break-word;
    color: #fff;
}
.btn-card:hover {
    background: orange;
}
a {
    text-decoration: none;
    color: #000;
    font-size:12px;
    padding:10px;
}
span{
    margin-left:10px;
}
</style>
<br>
<br>
<br>
<div class="container mt-4">
<div class="row">  
<div class="main-wrapper-first">
<section class="remarkable-area" id="Feature">
    <h1 class="text-center wow fadeIn mb-3" data-wow-duration="1s" data-wow-delay="1s">Artikel</h1>
    <div class="container">
    <div class="row">
        @foreach($posts as $posts)
            <div class="col-md-4 mb-3">
                <div class="card-content wow bounceInUp">
                    <div class="card-img">
                        <img src="{{URL::asset('fotoThumbnail/'.$posts->thumbnail) }}" alt="" style="width:100%; height:200px;">
                    </div>
                    <div class="card-desc">
                        <h3>{{$posts->judul}}</h3>
            		@if (strlen(strip_tags($posts->deskripsi)) > 100)
                        <p>{{ str_limit(strip_tags($posts->deskripsi), 100) }}
                        <a href="readartikel/{{ $posts->artikel_id }}">Baca Selengkapnya</a>
                        </p>
                    @endif
                    <div class="row">
                    <span class="badge badge-info text-white">By : {{ $posts->penulis }}</span>
                    <span class="badge badge-light float-right">{{$posts->created_at->format('Y-m-d')}}</span>
                    </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
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
            @endsection