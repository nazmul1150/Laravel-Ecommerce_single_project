<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>@yield('title')</title>	
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('website/images/favicon.ico')}}">
	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,400italic,700,700italic,900,900italic&amp;subset=latin,latin-ext" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Open%20Sans:300,400,400italic,600,600italic,700,700italic&amp;subset=latin,latin-ext" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="{{asset('website/css/animate.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('website/css/font-awesome.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('website/css/bootstrap.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('website/css/owl.carousel.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('website/css/flexslider.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('website/css/chosen.min.css')}}">
	
	<link rel="stylesheet" type="text/css" href="{{asset('website/css/color-01.css')}}">

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/15.7.1/nouislider.min.css" integrity="sha512-qveKnGrvOChbSzAdtSs8p69eoLegyh+1hwOMbmpCViIwj7rn4oJjdmMvWOuyQlTOZgTlZA0N2PXA7iA8/2TUYA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

	<link rel="stylesheet" type="text/css" href="{{asset('website/css/style.css')}}">

	@livewireStyles
</head>
<body class="home-page home-01 ">

	<!-- mobile menu -->
    <div class="mercado-clone-wrap">
        <div class="mercado-panels-actions-wrap">
            <a class="mercado-close-btn mercado-close-panels" href="#">x</a>
        </div>
        <div class="mercado-panels"></div>
    </div>

	<!--header-->
	<header id="header" class="header header-style-1">
		<div class="container-fluid">
			<div class="row">
				<div class="topbar-menu-area">
					<div class="container">
						<div class="topbar-menu left-menu">
							<ul>
								<li class="menu-item" >
									<a title="Hotline: (+123) 456 789" href="#" ><span class="icon label-before fa fa-mobile"></span>Hotline: (+123) 456 789</a>
								</li>
							</ul>
						</div>
						<div class="topbar-menu right-menu">
							<ul>
						
								<li class="menu-item lang-menu menu-item-has-children parent">
									<a title="English" href="#"><span class="img label-before"><img src="{{asset('website')}}/images/lang-en.png" alt="lang-en"></span>English<i class="fa fa-angle-down" aria-hidden="true"></i></a>
									<ul class="submenu lang" >
										<li class="menu-item" ><a title="hungary" href="#"><span class="img label-before"><img src="{{asset('website')}}/images/lang-hun.png" alt="lang-hun"></span>Hungary</a></li>
										<li class="menu-item" ><a title="german" href="#"><span class="img label-before"><img src="{{asset('website')}}/images/lang-ger.png" alt="lang-ger" ></span>German</a></li>
										<li class="menu-item" ><a title="french" href="#"><span class="img label-before"><img src="{{asset('website')}}/images/lang-fra.png" alt="lang-fre"></span>French</a></li>
										<li class="menu-item" ><a title="canada" href="#"><span class="img label-before"><img src="{{asset('website')}}/images/lang-can.png" alt="lang-can"></span>Canada</a></li>
									</ul>
								</li>
								<li class="menu-item menu-item-has-children parent" >
									<a title="Dollar (USD)" href="#">Dollar (USD)<i class="fa fa-angle-down" aria-hidden="true"></i></a>
									<ul class="submenu curency" >
										<li class="menu-item" >
											<a title="Pound (GBP)" href="#">Pound (GBP)</a>
										</li>
										<li class="menu-item" >
											<a title="Euro (EUR)" href="#">Euro (EUR)</a>
										</li>
										<li class="menu-item" >
											<a title="Dollar (USD)" href="#">Dollar (USD)</a>
										</li>
									</ul>
								</li>
				
								@if(Route::has('login'))

								 @auth

								  @if(Auth::user()->utype === 'ADM')

								  <li class="menu-item menu-item-has-children parent" >
									<a title="My Acount" href="#">My Account {{Auth::user()->name}}<i class="fa fa-angle-down" aria-hidden="true"></i></a>
									<ul class="submenu curency" >
										<li class="menu-item" >
											<a title="Dashbord" href="{{route('admin.dashbord')}}">Admin Dashbord</a>
										</li>
										<li class="menu-item" >
											<a title="User Dashbord" href="{{route('user.dashbord')}}">User Dashbord</a>
										</li>
										<li class="menu-item" >
											<a title="Change password" href="{{route('user.changepassword')}}">Change Password</a>
										</li>
										<li class="menu-item" >
											<a title="logout" href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
										  </li>
										<form id="logout-form" method="POST" action="{{route('logout')}}">
											@csrf
										</form>
									</ul>
								  </li>

								  @else

								   <li class="menu-item menu-item-has-children parent" >
									<a title="My Acount" href="#">My Account {{Auth::user()->name}}<i class="fa fa-angle-down" aria-hidden="true"></i></a>
									<ul class="submenu curency" >
										<li class="menu-item" >
											<a title="Dashbord" href="{{route('user.dashbord')}}">Dashbord</a>
										</li>
										<li class="menu-item" >
											<a title="Change Password" href="{{route('user.changepassword')}}">Change Password</a>
										</li>
										<li class="menu-item" >
											<a title="logout" href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
										  </li>
										<form id="logout-form" method="POST" action="{{route('logout')}}">
											@csrf
										</form>
									</ul>
								   </li>

								  @endif

								 @else

								    <li class="menu-item" ><a title="Register or Login" href="{{route('login')}}">Login</a></li>
								    <li class="menu-item" ><a title="Register or Login" href="{{route('register')}}">Register</a></li>

								 @endif

								@endif
							</ul>
						</div>
					</div>
				</div>

				<div class="container">
					<div class="mid-section main-info-area">

						<div class="wrap-logo-top left-section">
							<a href="{{route('home')}}" class="link-to-home"><img src="{{asset('website')}}/images/logo-top-1.png" alt="mercado"></a>
						</div>

						@livewire('header-search-component')

						<div class="wrap-icon right-section">

							@livewire('wishlist-count-component')
							@livewire('cart-count-component')
							
							<div class="wrap-icon-section show-up-after-1024">
								<a href="#" class="mobile-navigation">
									<span></span>
									<span></span>
									<span></span>
								</a>
							</div>
						</div>

					</div>
				</div>

				<div class="nav-section header-sticky">
					<div class="header-nav-section">
						<div class="container">
							<ul class="nav menu-nav clone-main-menu" id="mercado_haead_menu" data-menuname="Sale Info" >
								<li class="menu-item"><a href="#" class="link-term">Weekly Featured</a><span class="nav-label hot-label">hot</span></li>
								<li class="menu-item"><a href="#" class="link-term">Hot Sale items</a><span class="nav-label hot-label">hot</span></li>
								<li class="menu-item"><a href="#" class="link-term">Top new items</a><span class="nav-label hot-label">hot</span></li>
								<li class="menu-item"><a href="#" class="link-term">Top Selling</a><span class="nav-label hot-label">hot</span></li>
								<li class="menu-item"><a href="#" class="link-term">Top rated items</a><span class="nav-label hot-label">hot</span></li>
							</ul>
						</div>
					</div>

					<div class="primary-nav-section">
						<div class="container">
							<ul class="nav primary clone-main-menu" id="mercado_main" data-menuname="Main menu" >
								<li class="menu-item home-icon">
									<a href="{{route('home')}}" class="link-term mercado-item-title"><i class="fa fa-home" aria-hidden="true"></i></a>
								</li>
								<li class="menu-item">
									<a href="about-us.html" class="link-term mercado-item-title">About Us</a>
								</li>
								<li class="menu-item">
									<a href="{{route('shop')}}" class="link-term mercado-item-title">Shop</a>
								</li>
								<li class="menu-item">
									<a href="{{route('product.cart')}}" class="link-term mercado-item-title">Cart</a>
								</li>
								<li class="menu-item">
									<a href="{{route('checkout')}}" class="link-term mercado-item-title">Checkout</a>
								</li>
								<li class="menu-item">
									<a href="{{route('contact')}}" class="link-term mercado-item-title">Contact Us</a>
								</li>																	
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</header>

	 {{ $slot }}

	@livewire('footer-component')
	
	<script src="{{asset('website/js/jquery-1.12.4.minb8ff.js?ver=1.12.4')}}"></script>
	<script src="{{asset('website/js/jquery-ui-1.12.4.minb8ff.js?ver=1.12.4')}}"></script>
	<script src="{{asset('website/js/bootstrap.min.js')}}"></script>
	<script src="{{asset('website/js/jquery.flexslider.js')}}"></script>
	<script src="{{asset('website/js/chosen.jquery.min.js')}}"></script>
	<script src="{{asset('website/js/owl.carousel.min.js')}}"></script>
	<script src="{{asset('website/js/jquery.countdown.min.js')}}"></script>
	<script src="{{asset('website/js/jquery.sticky.js')}}"></script>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/15.7.1/nouislider.min.js" integrity="sha512-UOJe4paV6hYWBnS0c9GnIRH8PLm2nFK22uhfAvsTIqd3uwnWsVri1OPn5fJYdLtGY3wB11LGHJ4yPU1WFJeBYQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

	<script src="{{asset('website/js/functions.js')}}"></script>
	@livewireScripts

	@stack('scripts')
	
</body>
</html>