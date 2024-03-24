	<!-- Navbar Start -->
<header class="fixed-top bg-white">
	<nav class="navbar navbar-expand-lg navbar-light">
		<div class="container">
			<a href="{{route('homes')}}">
				<img src="{{ asset('assets/images/logo.png') }}" class="logo" alt="Logo">
			</a>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
				aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
				<i class="fa fa-bars" aria-hidden="true"></i>
			</button>

			<div class="collapse navbar-collapse flex-grow-0" id="navbarNavAltMarkup">
				<ul class="navbar-nav">
					<li class="{{ request()->is('/') ? 'active' : '' }} nav-item"><a href="{{route('homes')}}" class="nav-link">Home</a></li>
					<li class="{{ request()->is('about') ? 'active' : '' }} nav-item"><a href="{{route('about')}}" class="nav-link">About</a></li>
					<li class="{{ request()->is('events') || request()->is('event/*') ? 'active' : '' }} nav-item"><a href="{{route('event')}}" class="nav-link">Events</a></li>
					<li class="{{ request()->is('initiatives') || request()->is('initiatives/*') ? 'active' : '' }} nav-item"><a href="{{route('initiative')}}" class="nav-link">Works</a></li>
					<li class="{{ request()->is('current-members') || request()->is('previous-members') ? 'active' : '' }} nav-item nav-dropdown">
						<a class="nav-link">Members<i class="fa fa-angle-down ms-1"></i></a>
						<ul class="nav-dropdown-menu p-2 d-none d-lg-block">
							<li><a class="nav-dropdown-item mb-2 text-decoration-none"
									href="{{route('members')}}">Current Members</a></li>
							<li><a class="nav-dropdown-item mb-2 text-decoration-none"
									href="{{route('pre-member')}}">Previous Members</a></li>
						</ul>
					</li>
					<li class="{{ request()->is('gallery') || request()->is('gallery/*') ? 'active' : '' }} nav-item"><a href="{{route('fgallery')}}" class="nav-link">Gallery</a></li>
					<li class="{{ request()->is('blogs')|| request()->is('blogs/*') ? 'active' : '' }} nav-item"><a href="{{route('blog')}}" class="nav-link">Blog</a></li>
					<li class="{{ request()->is('contact') ? 'active' : '' }} nav-item"><a href="{{route('contact')}}" class="nav-link">Contact</a></li>
				</ul>
			</div>
		</div>
	</nav>
</header>