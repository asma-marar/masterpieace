	<!-- Header -->
	<header class="@yield('header-class')">
		<!-- Header desktop -->
		<div class="container-menu-desktop">

			@php
			$currentRoute = Route::currentRouteName();
		    @endphp
			<div class="wrap-menu-desktop">
				<nav class="limiter-menu-desktop container">
					
					<!-- Logo desktop -->		
					<a href="#" class="logo">
						<img src="{{ asset ('front-assets')}}/images/icons/1234.png" alt="IMG-LOGO" style="height: auto; width: 200px">
					</a>

					<!-- Menu desktop -->
					<div class="menu-desktop">
						<ul class="main-menu">
							<li class="{{ $currentRoute == 'home' ? 'active-menu' : '' }}">
								<a href="{{ route('home') }}">Home</a>
							</li>

							<li class="{{ $currentRoute == 'products' ? 'active-menu' : '' }}">
								<a href="{{ route('products') }}">Shop</a>
							</li>

							<li class="{{ $currentRoute == 'about-us' ? 'active-menu' : '' }}">
								<a href="{{ route('about-us') }}">About</a>
							</li>

							<li class="{{ $currentRoute == 'contact' ? 'active-menu' : '' }}">
								<a href="{{ route('contact') }}">Contact</a>
							</li>
						</ul>
					</div>	

					<!-- Icon header -->
					<div class="wrap-icon-header flex-w flex-r-m">
						{{-- <!-- Search Icon -->
						<div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 js-show-modal-search">
							<i class="zmdi zmdi-search"></i>
						</div> --}}
					
						<!-- Cart Icon -->
						<a href="{{ route('cart') }}" class="dis-block icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti" data-notify="{{ $cartCount }}">
							<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-cart" style="width: 24px; height: 24px; color: black;">
								<circle cx="9" cy="21" r="1"></circle>
								<circle cx="20" cy="21" r="1"></circle>
								<path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
							</svg>
						</a>

					
						<!-- Favorite Icon -->
						<a href="{{ route('wishlist') }}" class="dis-block icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti" data-notify="{{ $wishlistCount }}" data-wishlist-count>
							<i class="zmdi zmdi-favorite-outline"></i>
						</a>
						

						<a href="{{ route('user.profile') }}" class="dis-block icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11">
							<i class="zmdi zmdi-account"></i>
						</a>
						
					
						<!-- Authentication Links -->
						@guest('customer')
						<div class="d-flex justify-content-center" style="gap: 20px;">
							@if (Route::has('login'))
								<a href="{{ route('user.login') }}" class="flex-c-m stext-101 cl0 size-112 bg1 bor1 hov-btn1 p-lr-15 trans-04 m-b-10" style="width: 100px;">
									{{ __('Login') }}
								</a>
							@endif
					
							@if (Route::has('register'))
								<a href="{{ route('user.register') }}" class="flex-c-m stext-101 cl0 size-112 bg1 bor1 hov-btn1 p-lr-15 trans-04 m-b-10" style="width: 100px;">
									{{ __('Register') }}
								</a>
							@endif
						</div>
					@else
						<!-- User Dropdown -->
						<div class="dropdown">
							<a href="#" class="dis-block cl2 hov-cl1 trans-04 p-l-22 p-r-11 dropdown-toggle text-decoration-none d-flex align-items-center" id="navbarDropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i class="zmdi zmdi-account-circle" style="font-size: 20px; margin-right: 12px;"></i>
								<span>{{ Auth::guard('customer')->user()->name }}</span>
							</a>
							<div class="dropdown-menu dropdown-menu-end shadow-sm border-0 mt-2" aria-labelledby="navbarDropdown">
								<a href="{{ route('user.logout') }}" 
								   class="dropdown-item py-2"
								   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
									<i class="zmdi zmdi-power me-2"></i> {{ __('Logout') }}
								</a>
								<form id="logout-form" action="{{ route('user.logout') }}" method="POST" class="d-none">
									@csrf
								</form>
							</div>
						</div>
					@endguest
					
					
					
					</div>
					
				</nav>
			</div>	
		</div>

		<!-- Header Mobile -->
		<div class="wrap-header-mobile">
			<!-- Logo moblie -->		
			<div class="logo-mobile">
				<a href="index.html"><img src="{{ asset ('front-assets')}}/images/icons/1234.png" alt="IMG-LOGO"></a>
			</div>

			<!-- Icon header -->
			<div class="wrap-icon-header flex-w flex-r-m m-r-15">
						<a href="{{ route('cart') }}" class="dis-block icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti" data-notify="{{ $cartCount }}">
							<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-cart" style="width: 24px; height: 24px; color: black;">
								<circle cx="9" cy="21" r="1"></circle>
								<circle cx="20" cy="21" r="1"></circle>
								<path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
							</svg>
						</a>

						<!-- Favorite Icon -->
						<a href="{{ route('wishlist') }}" class="dis-block icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti" data-notify="{{ $wishlistCount }}" data-wishlist-count>
							<i class="zmdi zmdi-favorite-outline"></i>
						</a>

						<a href="{{ route('user.profile') }}" class="dis-block icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11">
							<i class="zmdi zmdi-account"></i>
						</a>


			</div>

			<!-- Button show menu -->
			<div class="btn-show-menu-mobile hamburger hamburger--squeeze">
				<span class="hamburger-box">
					<span class="hamburger-inner"></span>
				</span>
			</div>
		</div>


		<!-- Menu Mobile -->
		<div class="menu-mobile">

			<ul class="main-menu-m">
				<li  class="{{ $currentRoute == 'home' ? 'active-menu' : '' }}">
					<a href="{{ route('home') }}">Home</a>
				</li>

				<li  class="{{ $currentRoute == 'products' ? 'active-menu' : '' }}">
					<a href="{{ route('products') }}">Shop</a>
				</li>

				<li  class="{{ $currentRoute == 'about-us' ? 'active-menu' : '' }}">
					<a href="{{ route('about-us') }}">About</a>
				</li>

				<li  class="{{ $currentRoute == 'contact' ? 'active-menu' : '' }}">
					<a href="{{ route('contact') }}">Contact</a>
				</li>
			</ul>
		</div>

		<!-- Modal Search -->
		<div class="modal-search-header flex-c-m trans-04 js-hide-modal-search">
			<div class="container-search-header">
				<button class="flex-c-m btn-hide-modal-search trans-04 js-hide-modal-search">
					<img src="{{ asset ('front-assets')}}/images/icons/icon-close2.png" alt="CLOSE">
				</button>

				<form class="wrap-search-header flex-w p-l-15">
					<button class="flex-c-m trans-04">
						<i class="zmdi zmdi-search"></i>
					</button>
					<input class="plh3" type="text" name="search" placeholder="Search...">
				</form>
			</div>
		</div>
	</header>

