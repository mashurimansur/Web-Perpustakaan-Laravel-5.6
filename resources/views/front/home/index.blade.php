@extends('front.layouts.main')

@section('title', 'Home')
	
@section('contents')
	<!-- Main Slider -->
	<section class="slider-container" style="background-image: url({{ asset('assets') }}/front/images/slide-img-1-bg.png);">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="slides">
						<!-- Slide 1 -->
						<div class="slide">
						
							<div class="slide-content">
								<p>
									Buku adalah sahabat paling setia, rela mendampingi sepanjang waktu dan di manapun aku berada tanpa pernah memikirkan dirinya
								</p>
								<p>- Abdurrahman Faiz</p>
							</div>
							
							<div class="slide-image">
								
								<a href="#">
									<img src="{{ asset('assets') }}/front/images/shutterstock_85475239-1.jpg" class="img-responsive" />
								</a>
							</div>
							
						</div>
						
						<!-- Slide 2 -->
						<div class="slide" data-bg="{{ asset('assets') }}/front/images/slide-img-1-bg.png">
							
							<div class="slide-image">
								
								<a href="#">
									<img src="{{ asset('assets') }}/front/images/BERITA-B_004-IMG_0116-Copy-.jpg" class="img-responsive" />
								</a>
							</div>
						
							<div class="slide-content text-right">								
								<p>
									Buku itu seperti cermin, kalau yang berkaca padanya adalah seorang yang bodoh, engkau tak bisa berharap yang terpantul adalah seorang yang jenius.
								</p>
								<p>- JK. Rowling</p>
								
							</div>
							
						</div>
						
						<!-- Slide 3 -->
						<div class="slide">
						
							<div class="slide-content">
								<p>
									Membaca untuk mendapatkan segalanya.
								</p>
								<p>
									- KopiahPutih
								</p>
							</div>
							
							<div class="slide-image">
								
								<a href="#">
									<img src="{{ asset('assets') }}/front/images/perpus.jpg" class="img-responsive" />
								</a>
							</div>
							
						</div>
						
						<!-- Slider navigation -->
						<div class="slides-nextprev-nav">
							<a href="#" class="prev">
								<i class="entypo-left-open-mini"></i>
							</a>
							<a href="#" class="next">
								<i class="entypo-right-open-mini"></i>
							</a>
						</div>
					</div>
					
				</div>
				
			</div>
			
		</div>
		
	</section>
	<!-- Features Blocks -->
	<section class="features-blocks">
		
		<div class="container">
			<div class="row vspace"><!-- "vspace" class is added to distinct this row -->			
				<div class="col-sm-4">
					
					<div class="feature-block">
						<h3>
							<i class="entypo-clock"></i>
							Tidak dibatasi waktu
						</h3>
						
						<p>
							akses ke perpustakaan digital dapat dilakukan 24 jam dalam sehari, dapat diakses kapan saja, tanpa batas waktu, selama pengguna terhubung dengan internet;
						</p>
					</div>
					
				</div>
				
				<div class="col-sm-4">
					
					<div class="feature-block">
						<h3>
							<i class="entypo-gauge"></i>
							Penggunaan informasi lebih efisien
						</h3>
						
						<p>
							informasi yang ada dapat diakses oleh pengguna secara bersamaan dalam waktu yang sama dengan jumlah orang yang banyak;
						</p>
					</div>
					
				</div>
				
				<div class="col-sm-4">
					
					<div class="feature-block">
						<h3>
							<i class="entypo-rocket"></i>
							Pencarian Lebih Cepat
						</h3>
						
						<p>
							Pengguna cukup memasukkan kata kunci yang berkaitan dengan informasi yang sedang dicari, maka semua buku yang dimuat akan disesuaikan dengan informasi terkait.
						</p>
					</div>
					
				</div>
				
			</div>
			
			<!-- Separator -->		<div class="row">
				<div class="col-md-12">
					<hr />
				</div>
			</div>
			
		</div>
		
	</section>
	<!-- Portfolio -->
	<section class="portfolio-container">
		
		<div class="container">
			
			<div class="row" id="portfolio-items">
				@foreach($buku as $b)
					<div class="item col-sm-4 col-xs-6 filter-design">
						
						<div class="portfolio-item">
							<a href="{{ route('home_detailbuku', ['id' => $b->id]) }}" class="image">
								<img src="{{ asset('uploaded/buku') }}/{{ $b->image }}" class="img-rounded" style="width: 300px; height: 350px">
								<span class="hover-zoom"></span>
							</a>
							
							<h4>
								<a href="{{ route('home_detailbuku', ['id' => $b->id]) }}" class="name">{{ $b->judul }}</a>
							</h4>
							
							<div class="categories">
								<a href="{{ route('home_jenis', ['jenis_buku' => $b->jenis]) }}">{{ $b->jenis }}</a>
							</div>
						</div>
					</div>
				@endforeach	
			</div>		
		</div>
	</section>

	<!-- Testimonails -->
	<section class="testimonials-container">
		
		<div class="container">
			
			<div class="col-md-12">
				
				<div class="testimonials carousel slide" data-interval="8000">
				
					<div class="carousel-inner">
						
						<div class="item active">
						
							<blockquote>
								<p>
									Dunia adalah sebuah buku, dan mereka yang tidak melakukan perjalanan <br>
									hanya membaca sebuah halaman.
								</p>
								<small>
									<cite>Santo Agustinus</cite>
								</small>
							</blockquote>
							
						</div>
						
						<div class="item">
						
							<blockquote>
								<p>
									Membaca buku-buku yang baik berarti memberi <br>
									makanan rohani yang baik
								</p>
								<small>
									<cite>Buya Hamka</cite>
								</small>
							</blockquote>
							
						</div>
						
						<div class="item">
						
							<blockquote>
								<p>
									Jika kamu membaca buku orang yang orang lain baca, maka kamu <br>
									hanya bisa memikirkan apa yang orang lain pikir. 
								</p>
								<small>
									<cite>Norwegian Wood</cite>
								</small>
							</blockquote>
							
						</div>
					
					</div>
				
				</div>
				
			</div>
			
		</div>
		
	</section>
@endsection