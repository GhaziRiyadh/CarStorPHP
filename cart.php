<!DOCTYPE html>
<html lang="zxx">

<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Pustok - Book Store HTML Template</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Use Minified Plugins Version For Fast Page Load -->
	<link rel="stylesheet" type="text/css" media="screen" href="css/plugins.css" />
	<link rel="stylesheet" type="text/css" media="screen" href="css/main.css" />
	<link rel="stylesheet" type="text/css" media="screen" href="css/font.css" />
	<link rel="shortcut icon" type="image/x-icon" href="image/favicon.ico">
</head>

<body>
	<div class="site-wrapper" id="top">
		<div class="site-header header-2 mb--20 d-none d-lg-block" dir="rtl">
			<div class="header-middle pt--10 pb--10">
				<div class="container">
					<div class="row align-items-center">
						<div class="col-lg-3">
							<a href="index.php" class="site-brand">
								<img src="image/logo.png" alt="">
							</a>
						</div>
						<div class="col-lg-5">
							<form action="php/search.php" class="header-search-block">
								<input type="text" name="search" list="search-lg"
									placeholder="Search entire store here">
								<button>
									<i class="fa fa-search" aria-hidden="true"></i>
								</button>
								<datalist id="search-lg">

								</datalist>
							</form>
						</div>
						<div class="col-lg-4">
							<div class="main-navigation flex-lg-right">
								<div class="cart-widget">
									<div class="login-block">
										<a href="login-register.html" class="font-weight-bold">
											<bdo dir="rtl">تسجيل الدخول</bdo>
										</a> <br>
										<span><bdo dir="rtl">او</bdo></span>
										<a href="login-register.html">
											<bdo dir="rtl">إنشاء حساب</bdo>
										</a>
									</div>
									<!-- <div class="cart-block">
		                                                <div class="cart-total">
		                                                    <span class="text-number">
		                                                        1
		                                                    </span>
		                                                    <span class="text-item">
		                                                        Shopping Cart
		                                                    </span>
		                                                    <span class="price">
		                                                        $0.00
		                                                        <i class="fas fa-chevron-down"></i>
		                                                    </span>
		                                                </div>
		                                                <div class="cart-dropdown-block">
		                                                    <div class=" single-cart-block ">
		                                                        <div class="cart-product">
		                                                            <a href="product-details.html" class="image">
		                                                                <img src="image/products/cart-product-1.jpg" alt="">
		                                                            </a>
		                                                            <div class="content">
		                                                                <h3 class="title"><a href="product-details.html">Kodak PIXPRO
		                                                                        Astro Zoom AZ421 16 MP</a>
		                                                                </h3>
		                                                                <p class="price"><span class="qty">1 ×</span> $87.34</p>
		                                                                <button class="cross-btn"><i class="fas fa-times"></i></button>
		                                                            </div>
		                                                        </div>
		                                                    </div>
		                                                    <div class=" single-cart-block ">
		                                                        <div class="btn-block">
		                                                            <a href="cart.html" class="btn">View Cart <i
		                                                                    class="fas fa-chevron-right"></i></a>
		                                                            <a href="checkout.html" class="btn btn--primary">Check Out <i
		                                                                    class="fas fa-chevron-right"></i></a>
		                                                        </div>
		                                                    </div>
		                                                </div>
		                                            </div> -->
								</div>
								<!-- @include('menu.htm') -->
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="header-bottom bg-primary">
				<div class="container">
					<div class="row align-items-center" dir="rtl">
						<!-- <div class="col-lg-3">
		                                    <nav class="category-nav white-nav  text-right" dir="rtl">
		                                        <div class="text-right">
		                                            <a href="javascript:void(0)" class="category-trigger text-right"><i
		                                                    class="fa fa-bars"></i>
		        
		                                            </a>
		                                            <ul class="category-menu">
		                                                <li class="cat-item has-children">
		                                                    <a href="#">Arts & Photography</a>
		                                                    <ul class="sub-menu">
		                                                        <li><a href="#">Bags & Cases</a></li>
		                                                        <li><a href="#">Binoculars & Scopes</a></li>
		                                                        <li><a href="#">Digital Cameras</a></li>
		                                                        <li><a href="#">Film Photography</a></li>
		                                                        <li><a href="#">Lighting & Studio</a></li>
		                                                    </ul>
		                                                </li>
		                                                <li class="cat-item has-children mega-menu"><a href="#">Biographies</a>
		                                                    <ul class="sub-menu">
		                                                        <li class="single-block">
		                                                            <h3 class="title">WHEEL SIMULATORS</h3>
		                                                            <ul>
		                                                                <li><a href="#">Bags & Cases</a></li>
		                                                                <li><a href="#">Binoculars & Scopes</a></li>
		                                                                <li><a href="#">Digital Cameras</a></li>
		                                                                <li><a href="#">Film Photography</a></li>
		                                                                <li><a href="#">Lighting & Studio</a></li>
		                                                            </ul>
		                                                        </li>
		                                                        <li class="single-block">
		                                                            <h3 class="title">WHEEL SIMULATORS</h3>
		                                                            <ul>
		                                                                <li><a href="#">Bags & Cases</a></li>
		                                                                <li><a href="#">Binoculars & Scopes</a></li>
		                                                                <li><a href="#">Digital Cameras</a></li>
		                                                                <li><a href="#">Film Photography</a></li>
		                                                                <li><a href="#">Lighting & Studio</a></li>
		                                                            </ul>
		                                                        </li>
		                                                        <li class="single-block">
		                                                            <h3 class="title">WHEEL SIMULATORS</h3>
		                                                            <ul>
		                                                                <li><a href="#">Bags & Cases</a></li>
		                                                                <li><a href="#">Binoculars & Scopes</a></li>
		                                                                <li><a href="#">Digital Cameras</a></li>
		                                                                <li><a href="#">Film Photography</a></li>
		                                                                <li><a href="#">Lighting & Studio</a></li>
		                                                            </ul>
		                                                        </li>
		                                                        <li class="single-block">
		                                                            <h3 class="title">WHEEL SIMULATORS</h3>
		                                                            <ul>
		                                                                <li><a href="#">Bags & Cases</a></li>
		                                                                <li><a href="#">Binoculars & Scopes</a></li>
		                                                                <li><a href="#">Digital Cameras</a></li>
		                                                                <li><a href="#">Film Photography</a></li>
		                                                                <li><a href="#">Lighting & Studio</a></li>
		                                                            </ul>
		                                                        </li>
		                                                    </ul>
		                                                </li>
		                                                <li class="cat-item has-children"><a href="#">Business & Money</a>
		                                                    <ul class="sub-menu">
		                                                        <li><a href="">Brake Tools</a></li>
		                                                        <li><a href="">Driveshafts</a></li>
		                                                        <li><a href="">Emergency Brake</a></li>
		                                                        <li><a href="">Spools</a></li>
		                                                    </ul>
		                                                </li>
		                                                <li class="cat-item has-children"><a href="#">Calendars</a>
		                                                    <ul class="sub-menu">
		                                                        <li><a href="">Brake Tools</a></li>
		                                                        <li><a href="">Driveshafts</a></li>
		                                                        <li><a href="">Emergency Brake</a></li>
		                                                        <li><a href="">Spools</a></li>
		                                                    </ul>
		                                                </li>
		                                                <li class="cat-item has-children"><a href="#">Children's Books</a>
		                                                    <ul class="sub-menu">
		                                                        <li><a href="">Brake Tools</a></li>
		                                                        <li><a href="">Driveshafts</a></li>
		                                                        <li><a href="">Emergency Brake</a></li>
		                                                        <li><a href="">Spools</a></li>
		                                                    </ul>
		                                                </li>
		                                                <li class="cat-item has-children"><a href="#">Comics</a>
		                                                    <ul class="sub-menu">
		                                                        <li><a href="">Brake Tools</a></li>
		                                                        <li><a href="">Driveshafts</a></li>
		                                                        <li><a href="">Emergency Brake</a></li>
		                                                        <li><a href="">Spools</a></li>
		                                                    </ul>
		                                                </li>
		                                                <li class="cat-item"><a href="#">Perfomance Filters</a></li>
		                                                <li class="cat-item has-children"><a href="#">Cookbooks</a>
		                                                    <ul class="sub-menu">
		                                                        <li><a href="">Brake Tools</a></li>
		                                                        <li><a href="">Driveshafts</a></li>
		                                                        <li><a href="">Emergency Brake</a></li>
		                                                        <li><a href="">Spools</a></li>
		                                                    </ul>
		                                                </li>
		                                                <li class="cat-item "><a href="#">Accessories</a></li>
		                                                <li class="cat-item "><a href="#">Education</a></li>
		                                                <li class="cat-item hidden-menu-item"><a href="#">Indoor Living</a></li>
		                                                <li class="cat-item"><a href="#" class="js-expand-hidden-menu">More
		                                                        Categories</a></li>
		                                            </ul>
		                                        </div>
		                                    </nav>
		                                </div> -->
						<div class="col-lg-6">
							<div class="main-navigation flex-lg-right">
								<ul class="main-menu menu-right main-menu--white li-last-0">
									<li class="menu-item">
										<a href="javascript:void(0)">
											<i class="fa fa-home" aria-hidden="true"></i>
										</a>
									</li>
									<!-- Shop -->
									<li class="menu-item has-children mega-menu">
										<a href="javascript:void(0)">
											<i class="fa fa-shopping-bag" aria-hidden="true"></i>
											<i class="fas fa-chevron-down dropdown-arrow "></i></a>
										<ul class="sub-menu four-column text-right">
											<li class="cus-col-25">
												<h3 class="menu-title"><a href="javascript:void(0)">
														<bdo dir="rtl">الشركات</bdo>
													</a></h3>
												<ul class="mega-single-block">
													<li><a href="shop-grid.html">TOYOTA</a></li>
													<li><a href="shop-grid-left-sidebar.html">left Sidebar</a></li>
													<li><a href="shop-grid-right-sidebar.html">Right Sidebar</a></li>
												</ul>
											</li>
											<li class="cus-col-25">
												<h3 class="menu-title"> <a href="javascript:void(0)">Shop List</a></h3>
												<ul class="mega-single-block">
													<li><a href="shop-list.html">Fullwidth</a></li>
													<li><a href="shop-list-left-sidebar.html">left Sidebar</a></li>
													<li><a href="shop-list-right-sidebar.html">Right Sidebar</a></li>
												</ul>
											</li>
											<li class="cus-col-25">
												<h3 class="menu-title"> <a href="javascript:void(0)">Product Details
														1</a></h3>
												<ul class="mega-single-block">
													<li><a href="product-details.html">Product Details Page</a></li>
													<li><a href="product-details-affiliate.html">Product Details
															Affiliate</a></li>
													<li><a href="product-details-group.html">Product Details Group</a>
													</li>
													<li><a href="product-details-variable.html">Product Details
															Variables</a></li>
												</ul>
											</li>
											<li class="cus-col-25">
												<h3 class="menu-title"><a href="javascript:void(0)">Product Details
														2</a></h3>
												<ul class="mega-single-block">
													<li><a href="product-details-left-thumbnail.html">left Thumbnail</a>
													</li>
													<li><a href="product-details-right-thumbnail.html">Right
															Thumbnail</a></li>
													<li><a href="product-details-left-gallery.html">Left Gallery</a>
													</li>
													<li><a href="product-details-right-gallery.html">Right Gallery</a>
													</li>
												</ul>
											</li>
										</ul>
									</li>
									<!-- Pages -->
									<li class="menu-item has-children">
										<a href="javascript:void(0)">
											<bdo dir="rtl">صفحات</bdo>
											<i class="fas fa-chevron-down dropdown-arrow "></i></a>
										<ul class="sub-menu text-right">
											<li><a href="cart.html">السيارات المحجوزه</a></li>
											<li><a href="compare.html"><bdo dir="rtl">مقارنات</bdo></a></li>
											<li><a href="wishlist.html"><bdo dir="rtl">المفضلة</bdo></a></li>
											<li><a href="login-register.html"><bdo dir="rtl">تسجيل الدخول </bdo></a>
											</li>
											<li><a href="my-account.html">الصفحة الشخصية</a></li>
											<li><a href="faq.html"><bdo dir="rtl">الاسئلة الشائعة</bdo></a></li>
											<li><a href="contact-2.html"><bdo dir="rtl">للتواصل معنا</bdo></a></li>
										</ul>
									</li>
									<!-- Blog -->
									<li class="menu-item  mega-menu">
										<a href="blog-list-right-sidebar.html">Blog </a>

									</li>
									<li class="menu-item">
										<a href="contact.html"><bdo dir="rtl">للتواصل</bdo></a>
									</li>
								</ul>
							</div>
						</div>
						<div class="col-lg-6">
							<div class="header-phone color-white">
								<div class="icon">
									<i class="fas fa-headphones-alt"></i>
								</div>
								<div class="text">
									<p><bdo dir="rtl">للمساعدة</bdo></p>
									<p class="font-weight-bold number">
										<a href="tel:+967775286218">775286218</a>
									</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="site-mobile-menu">
			<header class="mobile-header d-block d-lg-none pt--10 pb-md--10">
				<div class="container">
					<div class="row align-items-sm-end align-items-center">
						<div class="col-md-4 col-7">
							<a href="index.php" class="site-brand">
								<img src="image/logo.png" alt="">
							</a>
						</div>
						<!-- <div class="col-md-5 order-3 order-md-2">
		                            <nav class="category-nav   ">
		                                <div>
		                                    <a href="javascript:void(0)" class="category-trigger"><i
		                                            class="fa fa-bars"></i>Browse
		                                        categories</a>
		                                    <ul class="category-menu">
		                                        <li class="cat-item has-children">
		                                            <a href="#">Arts & Photography</a>
		                                            <ul class="sub-menu">
		                                                <li><a href="#">Bags & Cases</a></li>
		                                                <li><a href="#">Binoculars & Scopes</a></li>
		                                                <li><a href="#">Digital Cameras</a></li>
		                                                <li><a href="#">Film Photography</a></li>
		                                                <li><a href="#">Lighting & Studio</a></li>
		                                            </ul>
		                                        </li>
		                                        <li class="cat-item has-children mega-menu"><a href="#">Biographies</a>
		                                            <ul class="sub-menu">
		                                                <li class="single-block">
		                                                    <h3 class="title">WHEEL SIMULATORS</h3>
		                                                    <ul>
		                                                        <li><a href="#">Bags & Cases</a></li>
		                                                        <li><a href="#">Binoculars & Scopes</a></li>
		                                                        <li><a href="#">Digital Cameras</a></li>
		                                                        <li><a href="#">Film Photography</a></li>
		                                                        <li><a href="#">Lighting & Studio</a></li>
		                                                    </ul>
		                                                </li>
		                                                <li class="single-block">
		                                                    <h3 class="title">WHEEL SIMULATORS</h3>
		                                                    <ul>
		                                                        <li><a href="#">Bags & Cases</a></li>
		                                                        <li><a href="#">Binoculars & Scopes</a></li>
		                                                        <li><a href="#">Digital Cameras</a></li>
		                                                        <li><a href="#">Film Photography</a></li>
		                                                        <li><a href="#">Lighting & Studio</a></li>
		                                                    </ul>
		                                                </li>
		                                                <li class="single-block">
		                                                    <h3 class="title">WHEEL SIMULATORS</h3>
		                                                    <ul>
		                                                        <li><a href="#">Bags & Cases</a></li>
		                                                        <li><a href="#">Binoculars & Scopes</a></li>
		                                                        <li><a href="#">Digital Cameras</a></li>
		                                                        <li><a href="#">Film Photography</a></li>
		                                                        <li><a href="#">Lighting & Studio</a></li>
		                                                    </ul>
		                                                </li>
		                                                <li class="single-block">
		                                                    <h3 class="title">WHEEL SIMULATORS</h3>
		                                                    <ul>
		                                                        <li><a href="#">Bags & Cases</a></li>
		                                                        <li><a href="#">Binoculars & Scopes</a></li>
		                                                        <li><a href="#">Digital Cameras</a></li>
		                                                        <li><a href="#">Film Photography</a></li>
		                                                        <li><a href="#">Lighting & Studio</a></li>
		                                                    </ul>
		                                                </li>
		                                            </ul>
		                                        </li>
		                                        <li class="cat-item has-children"><a href="#">Business & Money</a>
		                                            <ul class="sub-menu">
		                                                <li><a href="">Brake Tools</a></li>
		                                                <li><a href="">Driveshafts</a></li>
		                                                <li><a href="">Emergency Brake</a></li>
		                                                <li><a href="">Spools</a></li>
		                                            </ul>
		                                        </li>
		                                        <li class="cat-item has-children"><a href="#">Calendars</a>
		                                            <ul class="sub-menu">
		                                                <li><a href="">Brake Tools</a></li>
		                                                <li><a href="">Driveshafts</a></li>
		                                                <li><a href="">Emergency Brake</a></li>
		                                                <li><a href="">Spools</a></li>
		                                            </ul>
		                                        </li>
		                                        <li class="cat-item has-children"><a href="#">Children's Books</a>
		                                            <ul class="sub-menu">
		                                                <li><a href="">Brake Tools</a></li>
		                                                <li><a href="">Driveshafts</a></li>
		                                                <li><a href="">Emergency Brake</a></li>
		                                                <li><a href="">Spools</a></li>
		                                            </ul>
		                                        </li>
		                                        <li class="cat-item has-children"><a href="#">Comics</a>
		                                            <ul class="sub-menu">
		                                                <li><a href="">Brake Tools</a></li>
		                                                <li><a href="">Driveshafts</a></li>
		                                                <li><a href="">Emergency Brake</a></li>
		                                                <li><a href="">Spools</a></li>
		                                            </ul>
		                                        </li>
		                                        <li class="cat-item"><a href="#">Perfomance Filters</a></li>
		                                        <li class="cat-item has-children"><a href="#">Cookbooks</a>
		                                            <ul class="sub-menu">
		                                                <li><a href="">Brake Tools</a></li>
		                                                <li><a href="">Driveshafts</a></li>
		                                                <li><a href="">Emergency Brake</a></li>
		                                                <li><a href="">Spools</a></li>
		                                            </ul>
		                                        </li>
		                                        <li class="cat-item "><a href="#">Accessories</a></li>
		                                        <li class="cat-item "><a href="#">Education</a></li>
		                                        <li class="cat-item hidden-menu-item"><a href="#">Indoor Living</a></li>
		                                        <li class="cat-item"><a href="#" class="js-expand-hidden-menu">More
		                                                Categories</a></li>
		                                    </ul>
		                                </div>
		                            </nav>
		                        </div> -->
						<div class="col-md-3 col-5  order-md-3 text-right">
							<div class="mobile-header-btns header-top-widget">
								<ul class="header-links">
									<li class="sin-link">
										<a href="cart.html" class="cart-link link-icon"><i class="ion-bag"></i></a>
									</li>
									<li class="sin-link">
										<a href="javascript:" class="link-icon hamburgur-icon off-canvas-btn"><i
												class="ion-navicon"></i></a>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</header>
			<!--Off Canvas Navigation Start-->
			<aside class="off-canvas-wrapper">
				<div class="btn-close-off-canvas">
					<i class="ion-android-close"></i>
				</div>
				<div class="off-canvas-inner">
					<!-- search box start -->
					<div class="search-box offcanvas">
						<form>
							<input type="text" placeholder="Search Here">
							<button class="search-btn"><i class="ion-ios-search-strong"></i></button>
						</form>
					</div>
					<!-- search box end -->
					<!-- mobile menu start -->
					<div class="mobile-navigation">
						<!-- mobile menu navigation start -->
						<nav class="off-canvas-nav">
							<ul class="mobile-menu main-mobile-menu">
								<li class="menu-item">
									<a href="index.php">
										<i class="fa fa-home" aria-hidden="true"></i>
									</a>
								</li>
								<li class="menu-item">
									<a href="blog-details-right-sidebar.html">Blog</a>
								</li>
								<li class="menu-item">
									<a href="shop.html"><i class="fa fa-shopping-bag" aria-hidden="true"></i></a>

								</li>
								<li class="menu-item-has-children">
									<a href="#"><bdo dir="rtl">صفحات</bdo></a>
									<ul class="sub-menu text-right">
										<li><a href="cart.html">Cart</a></li>
										<li><a href="checkout.html">Checkout</a></li>
										<li><a href="compare.html">Compare</a></li>
										<li><a href="wishlist.html">Wishlist</a></li>
										<li><a href="login-register.html"><bdo dir="rtl">تسجيل الدخول </bdo></a></li>
										<li><a href="my-account.html">My Account</a></li>
										<li><a href="order-complete.html">Order Complete</a></li>
										<li><a href="faq.html"><bdo dir="rtl">الاسئلة الشائعة</bdo></a></li>
										<li><a href="contact-2.html">contact 02</a></li>
									</ul>
								</li>
								<li><a href="contact.html"><bdo dir="rtl">للتواصل</bdo></a></li>
							</ul>
						</nav>
						<!-- mobile menu navigation end -->
					</div>
					<!-- mobile menu end -->
					<!-- <nav class="off-canvas-nav">
		                        <ul class="mobile-menu menu-block-2">
		                            <li class="menu-item-has-children">
		                                <a href="#">Currency - USD $ <i class="fas fa-angle-down"></i></a>
		                                <ul class="sub-menu">
		                                    <li> <a href="cart.html">USD $</a></li>
		                                    <li> <a href="checkout.html">EUR €</a></li>
		                                </ul>
		                            </li>
		                            <li class="menu-item-has-children">
		                                <a href="#">Lang - Eng<i class="fas fa-angle-down"></i></a>
		                                <ul class="sub-menu">
		                                    <li>Eng</li>
		                                    <li>Ban</li>
		                                </ul>
		                            </li>
		                            <li class="menu-item-has-children">
		                                <a href="#">My Account <i class="fas fa-angle-down"></i></a>
		                                <ul class="sub-menu">
		                                    <li><a href="">My Account</a></li>
		                                    <li><a href="">Order History</a></li>
		                                    <li><a href="">Transactions</a></li>
		                                    <li><a href="">Downloads</a></li>
		                                </ul>
		                            </li>
		                        </ul>
		                    </nav> -->
					<div class="off-canvas-bottom">
						<div class="contact-list mb--10">
							<a href="tel:+967775286218" class="sin-contact"><i
									class="fas fa-mobile-alt"></i>775286218</a>
							<a href="mailto:" class="sin-contact"><i class="fas fa-envelope"></i>examle@handart.com</a>
						</div>
						<div class="off-canvas-social">
							<a href="#" class="single-icon"><i class="fab fa-facebook-f"></i></a>
							<a href="#" class="single-icon"><i class="fab fa-twitter"></i></a>
							<a href="#" class="single-icon"><i class="fas fa-rss"></i></a>
							<a href="#" class="single-icon"><i class="fab fa-youtube"></i></a>
							<a href="#" class="single-icon"><i class="fab fa-google-plus-g"></i></a>
							<a href="#" class="single-icon"><i class="fab fa-instagram"></i></a>
						</div>
					</div>
				</div>
			</aside>
			<!--Off Canvas Navigation End-->
		</div>
		<div class="sticky-init fixed-header common-sticky" style="background-color: #0c0175;" dir="rtl">
			<div class="container d-none d-lg-block">
				<div class="row align-items-center">
					<div class="col-lg-4">
						<a href="index.php" class="site-brand">
							<img src="image/logo.png" alt="">
						</a>
					</div>
					<div class="col-lg-8">
						<div class="main-navigation flex">
							<ul class="main-menu menu-right main-menu--white li-last-0">
								<li class="menu-item">
									<a href="javascript:void(0)">
										<i class="fa fa-home" aria-hidden="true"></i>
									</a>
								</li>
								<!-- Shop -->
								<li class="menu-item has-children mega-menu">
									<a href="javascript:void(0)">
										<i class="fa fa-shopping-bag" aria-hidden="true"></i>
										<i class="fas fa-chevron-down dropdown-arrow "></i></a>
									<ul class="sub-menu four-column text-right">
										<li class="cus-col-25">
											<h3 class="menu-title"><a href="javascript:void(0)">
													<bdo dir="rtl">الشركات</bdo>
												</a></h3>
											<ul class="mega-single-block">
												<li><a href="shop-grid.html">TOYOTA</a></li>
												<li><a href="shop-grid-left-sidebar.html">left Sidebar</a></li>
												<li><a href="shop-grid-right-sidebar.html">Right Sidebar</a></li>
											</ul>
										</li>
										<li class="cus-col-25">
											<h3 class="menu-title"> <a href="javascript:void(0)">Shop List</a></h3>
											<ul class="mega-single-block">
												<li><a href="shop-list.html">Fullwidth</a></li>
												<li><a href="shop-list-left-sidebar.html">left Sidebar</a></li>
												<li><a href="shop-list-right-sidebar.html">Right Sidebar</a></li>
											</ul>
										</li>
										<li class="cus-col-25">
											<h3 class="menu-title"> <a href="javascript:void(0)">Product Details
													1</a></h3>
											<ul class="mega-single-block">
												<li><a href="product-details.html">Product Details Page</a></li>
												<li><a href="product-details-affiliate.html">Product Details
														Affiliate</a></li>
												<li><a href="product-details-group.html">Product Details Group</a>
												</li>
												<li><a href="product-details-variable.html">Product Details
														Variables</a></li>
											</ul>
										</li>
										<li class="cus-col-25">
											<h3 class="menu-title"><a href="javascript:void(0)">Product Details
													2</a></h3>
											<ul class="mega-single-block">
												<li><a href="product-details-left-thumbnail.html">left Thumbnail</a>
												</li>
												<li><a href="product-details-right-thumbnail.html">Right
														Thumbnail</a></li>
												<li><a href="product-details-left-gallery.html">Left Gallery</a>
												</li>
												<li><a href="product-details-right-gallery.html">Right Gallery</a>
												</li>
											</ul>
										</li>
									</ul>
								</li>
								<!-- Pages -->
								<li class="menu-item has-children">
									<a href="javascript:void(0)">
										<bdo dir="rtl">صفحات</bdo>
										<i class="fas fa-chevron-down dropdown-arrow "></i></a>
									<ul class="sub-menu text-right">
										<li><a href="cart.html">السيارات المحجوزه</a></li>
										<li><a href="compare.html"><bdo dir="rtl">مقارنات</bdo></a></li>
										<li><a href="wishlist.html"><bdo dir="rtl">المفضلة</bdo></a></li>
										<li><a href="login-register.html"><bdo dir="rtl">تسجيل الدخول </bdo></a></li>
										<li><a href="my-account.html">الصفحة الشخصية</a></li>
										<li><a href="faq.html"><bdo dir="rtl">الاسئلة الشائعة</bdo></a></li>
										<li><a href="contact-2.html"><bdo dir="rtl">للتواصل معنا</bdo></a></li>
									</ul>
								</li>
								<!-- Blog -->
								<li class="menu-item  mega-menu">
									<a href="blog-list-right-sidebar.html">Blog </a>

								</li>
								<li class="menu-item">
									<a href="contact.html"><bdo dir="rtl">للتواصل</bdo></a>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<section class="breadcrumb-section" dir="rtl">
			<h2 class="sr-only">Site Breadcrumb</h2>
			<div class="container">
				<div class="breadcrumb-contents">
					<nav aria-label="breadcrumb">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="index.php"><bdo dir="rtl">الصفحة الرئيسة</bdo></a>
							</li>
							<li class="breadcrumb-item active"><bdo dir="rtl">السلة</bdo></li>
						</ol>
					</nav>
				</div>
			</div>
		</section>
		<!-- Cart Page Start -->
		<main class="cart-page-main-block inner-page-sec-padding-bottom">
			<div class="cart_area cart-area-padding  ">
				<div class="container">
					<div class="page-section-title">
						<h1>Shopping Cart</h1>
					</div>
					<div class="row">
						<div class="col-12">
							<form action="#" class="">
								<!-- Cart Table -->
								<div class="cart-table table-responsive mb--40">
									<table class="table">
										<!-- Head Row -->
										<thead>
											<tr>
												<th class="pro-remove"></th>
												<th class="pro-thumbnail">Image</th>
												<th class="pro-title">Product</th>
												<th class="pro-price">Price</th>
												<th class="pro-quantity">Quantity</th>
												<th class="pro-subtotal">Total</th>
											</tr>
										</thead>
										<tbody>
											<!-- Product Row -->
											<tr>
												<td class="pro-remove"><a href="#"><i class="far fa-trash-alt"></i></a>
												</td>
												<td class="pro-thumbnail"><a href="#"><img
															src="image/products/product-1.jpg" alt="Product"></a></td>
												<td class="pro-title"><a href="#">Rinosin Glasses</a></td>
												<td class="pro-price"><span>$395.00</span></td>
												<td class="pro-quantity">
													<div class="pro-qty">
														<div class="count-input-block">
															<input type="number" class="form-control text-center"
																value="1">
														</div>
													</div>
												</td>
												<td class="pro-subtotal"><span>$395.00</span></td>
											</tr>
											<!-- Product Row -->
											<tr>
												<td class="pro-remove"><a href="#"><i class="far fa-trash-alt"></i></a>
												</td>
												<td class="pro-thumbnail"><a href="#"><img
															src="image/products/product-2.jpg" alt="Product"></a></td>
												<td class="pro-title"><a href="#">Rinosin Glasses</a></td>
												<td class="pro-price"><span>$395.00</span></td>
												<td class="pro-quantity">
													<div class="pro-qty">
														<div class="count-input-block">
															<input type="number" class="form-control text-center"
																value="1">
														</div>
													</div>
												</td>
												<td class="pro-subtotal"><span>$395.00</span></td>
											</tr>
											<!-- Discount Row  -->
											<tr>
												<td colspan="6" class="actions">
													<div class="coupon-block">
														<div class="coupon-text">
															<label for="coupon_code">Coupon:</label>
															<input type="text" name="coupon_code" class="input-text"
																id="coupon_code" value="" placeholder="Coupon code">
														</div>
														<div class="coupon-btn">
															<input type="submit" class="btn btn-outlined"
																name="apply_coupon" value="Apply coupon">
														</div>
													</div>
													<div class="update-block text-right">
														<input type="submit" class="btn btn-outlined" name="update_cart"
															value="Update cart">
														<input type="hidden" id="_wpnonce" name="_wpnonce"
															value="05741b501f"><input type="hidden"
															name="_wp_http_referer" value="/petmark/cart/">
													</div>
												</td>
											</tr>
										</tbody>
									</table>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
			<div class="cart-section-2">
				<div class="container">
					<div class="row">
						<div class="col-lg-6 col-12 mb--30 mb-lg--0">
							<!-- slide Block 5 / Normal Slider -->
							<div class="cart-block-title">
								<h2>YOU MAY BE INTERESTED IN…</h2>
							</div>
							<div class="product-slider sb-slick-slider" data-slick-setting='{
							          "autoplay": true,
							          "autoplaySpeed": 8000,
							          "slidesToShow": 2
									  }' data-slick-responsive='[
                {"breakpoint":992, "settings": {"slidesToShow": 2} },
                {"breakpoint":768, "settings": {"slidesToShow": 3} },
                {"breakpoint":575, "settings": {"slidesToShow": 2} },
                {"breakpoint":480, "settings": {"slidesToShow": 1} },
                {"breakpoint":320, "settings": {"slidesToShow": 1} }
            ]'>
								<div class="single-slide">
									<div class="product-card">
										<div class="product-header">
											<span class="author">
												Lpple
											</span>
											<h3><a href="product-details.html">Revolutionize Your BOOK With These
													Easy-peasy Tips</a></h3>
										</div>
										<div class="product-card--body">
											<div class="card-image">
												<img src="image/products/product-10.jpg" alt="">
												<div class="hover-contents">
													<a href="product-details.html" class="hover-image">
														<img src="image/products/product-1.jpg" alt="">
													</a>
													<div class="hover-btns">
														<a href="cart.html" class="single-btn">
															<i class="fas fa-shopping-basket"></i>
														</a>
														<a href="wishlist.html" class="single-btn">
															<i class="fas fa-heart"></i>
														</a>
														<a href="compare.html" class="single-btn">
															<i class="fas fa-random"></i>
														</a>
														<a href="#" data-toggle="modal" data-target="#quickModal"
															class="single-btn">
															<i class="fas fa-eye"></i>
														</a>
													</div>
												</div>
											</div>
											<div class="price-block">
												<span class="price">£51.20</span>
												<del class="price-old">£51.20</del>
												<span class="price-discount">20%</span>
											</div>
										</div>
									</div>
								</div>
								<div class="single-slide">
									<div class="product-card">
										<div class="product-header">
											<span class="author">
												Jpple
											</span>
											<h3><a href="product-details.html">Turn Your BOOK Into High Machine</a></h3>
										</div>
										<div class="product-card--body">
											<div class="card-image">
												<img src="image/products/product-2.jpg" alt="">
												<div class="hover-contents">
													<a href="product-details.html" class="hover-image">
														<img src="image/products/product-1.jpg" alt="">
													</a>
													<div class="hover-btns">
														<a href="cart.html" class="single-btn">
															<i class="fas fa-shopping-basket"></i>
														</a>
														<a href="wishlist.html" class="single-btn">
															<i class="fas fa-heart"></i>
														</a>
														<a href="compare.html" class="single-btn">
															<i class="fas fa-random"></i>
														</a>
														<a href="#" data-toggle="modal" data-target="#quickModal"
															class="single-btn">
															<i class="fas fa-eye"></i>
														</a>
													</div>
												</div>
											</div>
											<div class="price-block">
												<span class="price">£51.20</span>
												<del class="price-old">£51.20</del>
												<span class="price-discount">20%</span>
											</div>
										</div>
									</div>
								</div>
								<div class="single-slide">
									<div class="product-card">
										<div class="product-header">
											<span class="author">
												Wpple
											</span>
											<h3><a href="product-details.html">3 Ways Create Better BOOK With</a></h3>
										</div>
										<div class="product-card--body">
											<div class="card-image">
												<img src="image/products/product-3.jpg" alt="">
												<div class="hover-contents">
													<a href="product-details.html" class="hover-image">
														<img src="image/products/product-2.jpg" alt="">
													</a>
													<div class="hover-btns">
														<a href="cart.html" class="single-btn">
															<i class="fas fa-shopping-basket"></i>
														</a>
														<a href="wishlist.html" class="single-btn">
															<i class="fas fa-heart"></i>
														</a>
														<a href="compare.html" class="single-btn">
															<i class="fas fa-random"></i>
														</a>
														<a href="#" data-toggle="modal" data-target="#quickModal"
															class="single-btn">
															<i class="fas fa-eye"></i>
														</a>
													</div>
												</div>
											</div>
											<div class="price-block">
												<span class="price">£51.20</span>
												<del class="price-old">£51.20</del>
												<span class="price-discount">20%</span>
											</div>
										</div>
									</div>
								</div>
								<div class="single-slide">
									<div class="product-card">
										<div class="product-header">
											<span class="author">
												Epple
											</span>
											<h3><a href="product-details.html">What You Can Learn From Bill Gates</a>
											</h3>
										</div>
										<div class="product-card--body">
											<div class="card-image">
												<img src="image/products/product-5.jpg" alt="">
												<div class="hover-contents">
													<a href="product-details.html" class="hover-image">
														<img src="image/products/product-4.jpg" alt="">
													</a>
													<div class="hover-btns">
														<a href="cart.html" class="single-btn">
															<i class="fas fa-shopping-basket"></i>
														</a>
														<a href="wishlist.html" class="single-btn">
															<i class="fas fa-heart"></i>
														</a>
														<a href="compare.html" class="single-btn">
															<i class="fas fa-random"></i>
														</a>
														<a href="#" data-toggle="modal" data-target="#quickModal"
															class="single-btn">
															<i class="fas fa-eye"></i>
														</a>
													</div>
												</div>
											</div>
											<div class="price-block">
												<span class="price">£51.20</span>
												<del class="price-old">£51.20</del>
												<span class="price-discount">20%</span>
											</div>
										</div>
									</div>
								</div>
								<div class="single-slide">
									<div class="product-card">
										<div class="product-header">
											<span class="author">
												Hpple
											</span>
											<h3><a href="product-details.html">Simple Things You To Save BOOK</a></h3>
										</div>
										<div class="product-card--body">
											<div class="card-image">
												<img src="image/products/product-6.jpg" alt="">
												<div class="hover-contents">
													<a href="product-details.html" class="hover-image">
														<img src="image/products/product-4.jpg" alt="">
													</a>
													<div class="hover-btns">
														<a href="cart.html" class="single-btn">
															<i class="fas fa-shopping-basket"></i>
														</a>
														<a href="wishlist.html" class="single-btn">
															<i class="fas fa-heart"></i>
														</a>
														<a href="compare.html" class="single-btn">
															<i class="fas fa-random"></i>
														</a>
														<a href="#" data-toggle="modal" data-target="#quickModal"
															class="single-btn">
															<i class="fas fa-eye"></i>
														</a>
													</div>
												</div>
											</div>
											<div class="price-block">
												<span class="price">£51.20</span>
												<del class="price-old">£51.20</del>
												<span class="price-discount">20%</span>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<!-- Cart Summary -->
						<div class="col-lg-6 col-12 d-flex">
							<div class="cart-summary">
								<div class="cart-summary-wrap">
									<h4><span>Cart Summary</span></h4>
									<p>Sub Total <span class="text-primary">$1250.00</span></p>
									<p>Shipping Cost <span class="text-primary">$00.00</span></p>
									<h2>Grand Total <span class="text-primary">$1250.00</span></h2>
								</div>
								<div class="cart-summary-button">
									<a href="checkout.html" class="checkout-btn c-btn btn--primary">Checkout</a>
									<button class="update-btn c-btn btn-outlined">Update Cart</button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</main>
		<!-- Cart Page End -->
	</div>
	<!--=================================
  Brands Slider
===================================== -->
	<section class="section-margin">
		<h2 class="sr-only">Brand Slider</h2>
		<div class="container">
			<div class="brand-slider sb-slick-slider border-top border-bottom" data-slick-setting='{
                                            "autoplay": true,
                                            "autoplaySpeed": 8000,
                                            "slidesToShow": 6
                                            }' data-slick-responsive='[
                {"breakpoint":992, "settings": {"slidesToShow": 4} },
                {"breakpoint":768, "settings": {"slidesToShow": 3} },
                {"breakpoint":575, "settings": {"slidesToShow": 3} },
                {"breakpoint":480, "settings": {"slidesToShow": 2} },
                {"breakpoint":320, "settings": {"slidesToShow": 1} }
            ]'>
				<div class="single-slide">
					<img src="image/others/brand-1.jpg" alt="">
				</div>
				<div class="single-slide">
					<img src="image/others/brand-2.jpg" alt="">
				</div>
				<div class="single-slide">
					<img src="image/others/brand-3.jpg" alt="">
				</div>
				<div class="single-slide">
					<img src="image/others/brand-4.jpg" alt="">
				</div>
				<div class="single-slide">
					<img src="image/others/brand-5.jpg" alt="">
				</div>
				<div class="single-slide">
					<img src="image/others/brand-6.jpg" alt="">
				</div>
				<div class="single-slide">
					<img src="image/others/brand-1.jpg" alt="">
				</div>
				<div class="single-slide">
					<img src="image/others/brand-2.jpg" alt="">
				</div>
			</div>
		</div>
	</section>
	<!--=================================
    Footer Area
===================================== -->
	<footer class="site-footer text-right" dir="rtl">
		<div class="container">
			<div class="row justify-content-between  section-padding">
				<div class=" col-xl-3 col-lg-4 col-sm-6">
					<div class="single-footer pb--40">
						<div class="brand-footer footer-title">
							<img src="image/logo--footer.png" alt="">
						</div>
						<div class="footer-contact">
							<p><span class="label"><bdo dir="rtl">العنوان</bdo>:</span>
								<span class="text"><bdo dir="rtl">شارع الستين, صنعاء,
										اليمن</bdo></span>
							</p>
							<p><span class="label">
									<i class="fa fa-phone" aria-hidden="true"></i>:</span>
								<span class="text"><a href="tel:+967775286218">775286218</a></span>
							</p>
							<p><span class="label">
									<i class="fas fa-envelope"></i>:</span>
								<span class="text"><a href="mailto:">suport@hastech.com</a></span>
							</p>
						</div>
					</div>
				</div>
				<div class=" col-xl-3 col-lg-2 col-sm-6">
					<div class="single-footer pb--40">
						<div class="footer-title">
							<h3>
								<bdo dir="rtl">السيارات الموجودة حسب الشركة</bdo>
							</h3>
						</div>
						<ul class="footer-list normal-list">
							<li class=" d-flex justify-content-between align-items-center">
								Cras justo odio
								<span class="badge bg-primary rounded-pill text-light fs-3">14</span>
							</li>
							<li class=" d-flex justify-content-between align-items-center">
								Dapibus ac facilisis in
								<span class="badge bg-primary rounded-pill text-light fs-3">2</span>
							</li>
							<li class=" d-flex justify-content-between align-items-center">
								Morbi leo risus
								<span class="badge bg-primary rounded-pill text-light fs-3">1</span>
							</li>
						</ul>
					</div>
				</div>
				<div class=" col-xl-3 col-lg-2 col-sm-6">
					<div class="single-footer pb--40">
						<div class="footer-title">
							<h3>
								<bdo dir="rtl">السيارات الموجودة حسب النوع</bdo>
							</h3>
						</div>
						<ul class="footer-list normal-list">
							<li class=" d-flex justify-content-between align-items-center">
								Cras justo odio
								<span class="badge bg-primary rounded-pill text-light fs-3">14</span>
							</li>
							<li class=" d-flex justify-content-between align-items-center">
								Dapibus ac facilisis in
								<span class="badge bg-primary rounded-pill text-light fs-3">2</span>
							</li>
							<li class=" d-flex justify-content-between align-items-center">
								Morbi leo risus
								<span class="badge bg-primary rounded-pill text-light fs-3">1</span>
							</li>
						</ul>
					</div>
				</div>
				<div class=" col-xl-3 col-lg-4 col-sm-6 ">
					<div class="footer-title">
						<h3><bdo dir="rtl">لمعرفة أخر السيارات المضافة</bdo></h3>
					</div>
					<div class="newsletter-form mb--30">
						<form action="./php/mail.php">
							<input type="email" class="form-control" placeholder="ادخل الايميل هنا">
							<button class="btn btn--primary w-100"><bdo dir="rtl">اشتراك</bdo></button>
						</form>
					</div>
					<div class="social-block">
						<h3 class="title"><bdo dir="rtl">وسائل التواصل</bdo></h3>
						<ul class="social-list list-inline">
							<li class="single-social facebook">
								<a href=""><i class="ion ion-social-facebook"></i></a>
							</li>
							<li class="single-social twitter">
								<a href=""><i class="ion ion-social-twitter"></i></a>
							</li>
							<li class="single-social google"><a href=""><i
										class="ion ion-social-googleplus-outline"></i></a></li>
							<li class="single-social youtube"><a href=""><i class="ion ion-social-youtube"></i></a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<div class="footer-bottom">
			<div class="container">

				<a href="#" class="payment-block">
					<img src="image/icon/payment.png" alt="">
				</a>
				<p class="copyright-text">Copyright © 2019 <a href="#" class="author">Riyadh Ghazi and Jamal Abd
						Alaziz</a>. All Right Reserved.
					<br>
					Design By Riyadh Ghazi and Jamal Abd Alaziz
				</p>
			</div>
		</div>
	</footer>
	<!-- Use Minified Plugins Version For Fast Page Load -->
	<script src="js/plugins.js"></script>
	<script src="js/ajax-mail.js"></script>
	<script src="js/custom.js"></script>
</body>

</html>