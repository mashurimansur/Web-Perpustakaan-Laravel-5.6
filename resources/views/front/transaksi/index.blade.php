@extends('front.layouts.main')

@section('title', 'Transaksi')
	
@section('contents')
	<section class="breadcrumb">	
		<div class="container">
			<div class="row">
				<div class="col-sm-9">
					<h1>Buku yang sedang dipinjam</h1>	
				</div>
			</div>
		</div>
	</section>


	<!-- Blog -->
	<section class="blog">
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<div class="blog-posts">
						
						<!-- Blog Post -->	
						@forelse($transaksi as $t)				
							<div class="blog-post">	
								<div class="post-thumb">
									<a href="#">
										<img src="{{ asset('uploaded/buku') }}/{{ $t->buku->image }}" style="width: 300px; height: 350px" class="img-rounded" />
									</a>
								</div>
								
								<div class="post-details">
									<h3>
										<a href="#">{{ $t->buku->judul }}</a>
									</h3>
									<table class="table">
										<tr>
											<td>
												<div class="meta-info">
													<i class="entypo-comment"></i>
													Waktu Peminjaman
												</div>
											</td>
											<td>
												<div class="meta-info">
													<i class="entypo-calendar"></i> {{ $t->tgl_pinjam }}								
												</div>
											</td>
										</tr>
										<tr>
											<td>
												<div class="meta-info">
													<i class="entypo-comment"></i>
													Kategori Buku
												</div>
											</td>
											<td>
												<div class="meta-info">
													<i class="entypo-book"></i> {{ $t->buku->kategori->kategori }}								
												</div>
											</td>
										</tr>
										<tr>
											<td>
												<div class="meta-info">
													<i class="entypo-comment"></i>
													Pengarang
												</div>
											</td>
											<td>
												<div class="meta-info">
													<i class="entypo-user"></i> {{ $t->buku->pengarang }}								
												</div>
											</td>
										</tr>
										<tr>
											<td>
												<div class="meta-info">
													<i class="entypo-comment"></i>
													Penerbit
												</div>
											</td>
											<td>
												<div class="meta-info">
													<i class="entypo-book"></i> {{ $t->buku->penerbit }}								
												</div>
											</td>
										</tr>
										<tr>
											<td>
												<div class="meta-info">
													<i class="entypo-comment"></i>
													Tahun Terbit
												</div>
											</td>
											<td>
												<div class="meta-info">
													<i class="entypo-calendar"></i> {{ $t->buku->tahun }}								
												</div>
											</td>
										</tr>
									</table>
									
									<form action="{{ route('home_pengembalian') }}" method="POST">
										{{ csrf_field() }}
										<input type="hidden" name="id" value="{{ $t->id }}">
										<input type="hidden" name="id_buku" value="{{ $t->id_buku }}">
										<button class="btn btn-danger">Kembalikan</button>
									</form>
								</div>
							</div>
						@empty
							<p>Belum ada buku yang dipinjam</p>
						@endforelse
					</div>
				</div>
			</div>
		</div>
	</section>
@endsection