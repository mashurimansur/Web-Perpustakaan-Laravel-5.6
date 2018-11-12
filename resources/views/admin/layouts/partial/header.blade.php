<div class="main-content">
	<div class="row">
		<!-- Profile Info and Notifications -->
		<div class="col-md-6 col-sm-8 clearfix">
			<ul class="user-info pull-left pull-none-xsm">
				<li class="profile-info dropdown"><!-- add class "pull-right" if you want to place this from right -->
					
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<img src="{{ asset('uploaded/member') }}/{{ Auth::user()->image }}" alt="" class="img-circle" width="44" />
						{{ Auth::user()->name }}
					</a>
					
					<ul class="dropdown-menu">
						
						<!-- Reverse Caret -->
						<li class="caret"></li>
						
						<!-- Profile sub-links -->
						<li>
							<a href="{{ route('member_edit', ['id' => Auth::user()->id]) }}">
								<i class="entypo-user"></i>
								Edit Profile
							</a>
						</li>
					</ul>
				</li>
			</ul>
		</li>
	</ul>
</div>


<!-- Raw Links -->
<div class="col-md-6 col-sm-4 clearfix hidden-xs">
	<ul class="list-inline links-list pull-right">
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
</div>