<div class="sidebar-menu">		
	<header class="logo-env">
		<!-- logo -->
		<div class="logo">
			<a href="index.html">
				<img src="{{ asset('assets') }}/admin/images/logo@2x.png" width="120" alt="" />
			</a>
		</div>
			
		<div class="sidebar-collapse">
			<a href="#" class="sidebar-collapse-icon with-animation"><!-- add class "with-animation" if you want sidebar to have animation during expanding/collapsing transition -->
				<i class="entypo-menu"></i>
			</a>
		</div>
		
		<div class="sidebar-mobile-menu visible-xs">
			<a href="#" class="with-animation"><!-- add class "with-animation" to support animation -->
				<i class="entypo-menu"></i>
			</a>
		</div>
	</header>
			
	<ul id="main-menu" class="">
		<li class="opened">
			<a href="index.html">
				<span>Menu</span>
			</a>
			<ul>
				<li {{ Request::is('admin') ? 'class=active' : '' }}>
					<a href="{{ route('dashboard') }}">
						<i class="entypo-gauge"></i>
						<span>Dashboard</span>
					</a>
				</li>
				@if(Auth::user()->id_role == 1)
				<li {{ Request::is('admin/buku*') ? 'class=active' : '' }}>
					<a href="{{ route('buku') }}">
						<i class="entypo-book"></i>
						<span>List Buku</span>
					</a>
				</li>
				@endif
				@if(Auth::user()->id_role == 1)
				<li {{ Request::is('admin/kategori*') ? 'class=active' : '' }}>
					<a href="{{ route('kategori') }}">
						<i class="entypo-book"></i>
						<span>List Kategori</span>
					</a>
				</li>
				@endif
				<li {{ Request::is('admin/transaksi*') ? 'class=active' : '' }}>
					<a href="{{ route('transaksi') }}">
						<i class="entypo-print"></i>
						<span>Transaksi</span>
					</a>
				</li>
				@if(Auth::user()->id_role == 1)
				<li {{ Request::is('admin/member*') ? 'class=active' : '' }}>
					<a href="{{ route('member') }}">
						<i class="entypo-user"></i>
						<span>Member</span>
					</a>
				</li>
				@endif
			</ul>
		</li>
	</ul>		
</div>