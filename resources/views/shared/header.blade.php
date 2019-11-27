<header class="header1">
		<!-- Header desktop -->
		<div class="container-menu-header">
			<div class="topbar">
				<div class="topbar-social">
					<a href="#" class="topbar-social-item fa fa-facebook"></a>
					<a href="#" class="topbar-social-item fa fa-instagram"></a>
					<a href="#" class="topbar-social-item fa fa-pinterest-p"></a>
					<a href="#" class="topbar-social-item fa fa-snapchat-ghost"></a>
					<a href="#" class="topbar-social-item fa fa-youtube-play"></a>
				</div>

				<span class="topbar-child1">
					Miễn phí giao hàng
				</span>

				<div class="topbar-child2">
					<span class="topbar-email">
						fashe@example.com
					</span>
				</div>
			</div>

			<div class="wrap_header">
				<!-- Logo -->
				<a href="index.html" class="logo">
					<img src="{{asset('landing/images/icons/logo.png')}}" alt="IMG-LOGO">
				</a>

				<!-- Menu -->
				<div class="wrap_menu">
					<nav class="menu">
						<ul class="main_menu">
							<li>
								<a href="{{route('product')}}">Shop</a>
							</li>

							<li>
								<a href="{{route('blog.index')}}">Blog</a>
							</li>

							<li>
								<a href="{{route('about.index')}}">About</a>
							</li>

							<li>
								<a href="{{route('contact.index')}}">Contact</a>
							</li>
						</ul>
					</nav>
				</div>

				<!-- Header Icon -->
				<div class="header-icons">
					@if(!get_data_user('web'))
					<a href="{{route('get.login')}}" class="header-wrapicon1 dis-block">
						Đăng nhập
					</a>|
					<a href="{{route('get.register')}}" class="header-wrapicon1 dis-block">
						Đăng kí
					</a>
					@else
					<span class="header-wrapicon1 dis-block">
						{{get_data_user('web','name')}}
					</span>|
					<a href="{{route('get.logout')}}" class="header-wrapicon1 dis-block">
						Đăng xuất
					</a>
					@endif


					<span class="linedivide1"></span>

					<div class="header-wrapicon2" id="cart-content">
						<img src="{{asset('landing/images/icons/icon-header-02.png')}}" class="header-icon1 js-show-header-dropdown" alt="ICON">
						<span class="header-icons-noti">{{Cart::count()}}</span>

						<!-- Header cart noti -->
						<div class="header-cart header-dropdown">
							<ul class="header-cart-wrapitem">
								@if(Cart::count()>0)
									@foreach(Cart::content() as $item)
									<li class="header-cart-item">
									<div class="header-cart-item-img">
										<img src="{{parse_url_file($item->options->avatar)}}" alt="IMG">
									</div>

									<div class="header-cart-item-txt">
										<a href="#" class="header-cart-item-name">
											{{$item->name}}
										</a>

										<span class="header-cart-item-info">
											{{$item->qty}} x {{number_format($item->price ,0 ,'.' ,'.').' đ'}}
										</span>
									</div>
								</li>
									@endforeach
								@endif
							</ul>

							<div class="header-cart-total">
								{{Cart::subtotal()}}
							</div>

							<div class="header-cart-buttons">
								<div class="header-cart-wrapbtn">
									<!-- Button -->
									<a href="{{route('cart.index')}}" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
										View Cart
									</a>
								</div>

								<div class="header-cart-wrapbtn">
									<!-- Button -->
									<a href="#" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
										Check Out
									</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</header>