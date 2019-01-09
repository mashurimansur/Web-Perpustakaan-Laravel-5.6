	<!-- Logo and Navigation -->
<div class="site-header-container container">

	<div class="row">
	
		<div class="col-md-12">
			
			<header class="site-header">
			
				<section class="site-logo">
				
					<a href="{{ route('home') }}">
						<img src="{{ asset('assets') }}/front/images/logo@2x.png" width="120" />
						<!-- <h1>Perpustakaan Normal</h1> -->
					</a>
					
				</section>
				
				<nav class="site-nav">
					
					<ul class="main-menu hidden-xs" id="main-menu">
						<li {{ Request::is('/') ? 'class=active' : '' }}>
							<a href="{{ route('home') }}">
								<span>Home</span>
							</a>
						</li>
						<li class="{{ $_SERVER['REQUEST_URI'] == '/list' ? 'active' : '' }}">
							<a href="{{ route('home_daftarbuku') }}">
								<span>Katalog Buku</span>
							</a>
						</li>
						<li {{ Request::is('/jenis*') ? 'class=active' : '' }}>
							<a href="#">
								<span>Jenis Buku</span>
							</a>
							
							<ul>
								@foreach($kategori as $k)
									<li {{ Request::is('/kategori/$k->kategori*') ? 'class=active' : '' }}>
										<a href="{{ route('home_jenis', ['jenis_buku' => $k->kategori]) }}">
											<span>{{ $k->kategori }} ({{ DB::table('buku')->where('id_kategori', $k->id)->count() }})</span>
										</a>
									</li>
								@endforeach
							</ul>
						</li>
						@if(Auth::check())
							@if (Auth::user()->id_role == 3)
								<li class="{{ $_SERVER['REQUEST_URI'] == '/transaksi' ? 'active' : '' }}">
									<a href="{{ route('home_transaksi') }}">
										<span>Buku yang di Pinjam</span>
									</a>
								</li>
							@endif
						@endif

						@if(!Auth::check())
							<li>
								<a href="{{ route('login') }}">
									<span>Login</span>
								</a>
							</li>
						@endif

						@if(Auth::check())
							<li>
								<a href="#">
									<span>{{ Auth::user()->name }}</span>
								</a>
								
								<ul>
									@if (Auth::user()->id_role == 3)
										<li>
											<a href="{{ route('home_setting') }}">
												<span>Setting</span>
											</a>
										</li>
									@endif
									<li>
										<a href="{{ route('logout') }}"
							                onclick="event.preventDefault();
							                         document.getElementById('logout-form').submit();">
							                Log Out <i class="entypo-logout right"></i>
							            </a>

							            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
							                {{ csrf_field() }}
							            </form>
									</li>
								</ul>
							</li>
						<li class="search">
							<a href=""></a>
							<img src="{{ asset('uploaded/member') }}/{{ Auth::user()->image }}" width="50px" class="img-circle" />
						</li>
						@endif
					</ul>
					
				
					<div class="visible-xs">
						
						<a href="#" class="menu-trigger">
							<i class="entypo-menu"></i>
						</a>
						
					</div>
				</nav>
				
			</header>
			
		</div>
		
	</div>
	
</div>