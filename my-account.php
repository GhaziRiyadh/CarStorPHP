<?php

session_start();
if (isset($_SESSION['page_count'])) {
	$_SESSION['page_count'] += 1;
} else {
	$_SESSION['page_count'] = 1;
}
echo 'You are visitor number ' . $_SESSION['page_count'];
setcookie("biraq_cookie");
// end session;



// including files
include 'php/app.php';

$pdo = new dbPDO;
$pdo = $pdo->getPDO();
$clintemail = $_GET['Email'];
$nameclaintsql = 'SELECT FullName FROM user  WHERE email like :email';
$pdo->prepare($nameclaintsql, array(PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY));
$nameclaint = $pdo->execute(array(':email' => $clintemail));
$AllVinForClintWish = $pdo->prepare("SELECT car_vin FROM favorait WHERE clint_id LIKE " . $pdo->query("SELECT id FROM clint WHERE email LIKE " . $clintemail));
$AllWishCarForClint = $pdo->prepare("SELECT * FROM car WHERE vin LIKE " . $AllVinForClintWish);
?>

<!DOCTYPE html>
<html lang="ar">

<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title><?php echo "<?php echo $nameclaint ;?>"; ?></title>
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
								<img src="image/icon/logo.gif" height="100px" alt="">
							</a>
						</div>
						<div class="col-lg-5">
							<form action="php/app.php" class="header-search-block">
								<input type="search" name="search" list="search-lg" placeholder="البحث عن سيارة">
								<button type="submit" href="product" name="search_submit" value="search" class="btn">
									<i class="fa fa-search" aria-hidden="true"></i>
								</button>
								<datalist id="search-lg">
									<!-- <?php
											// foreach (SELECT('*', 'car')->fetch(PDO::FETCH_ASSOC) as $key => $value) :
											// 	foreach ($value as  $value2) :
											?>
									<option value="<?php// echo $value2; ?>"></option>
									<?php
									// 	endforeach;
									// endforeach; 
									?> -->
								</datalist>
							</form>
						</div>
					</div>
				</div>
			</div>
			<div class="header-bottom bg-primary">
				<div class="container">
					<div class="row align-items-center" dir="rtl">
						<div class="col-lg-6">
							<div class="main-navigation flex-lg-right">
								<ul class="main-menu menu-right main-menu--white li-last-0">
									<li class="menu-item">
										<a href="javascript:void(0)">
											<i class="fa fa-home" aria-hidden="true"></i>
										</a>
									</li>
									<!-- Shop -->
									<li class="menu-item has-children">
										<a href="javascript:void(0)">
											<i class="fa fa-shopping-bag" aria-hidden="true"></i>
											<i class="fas fa-chevron-down dropdown-arrow "></i>
										</a>
										<ul class="sub-menu text-right">
											<h3 class="menu-title">
												<a href="javascript:void(0)">
													<bdo dir="rtl">الشركات</bdo>
												</a>
											</h3>
											<ul class="mega-single-block">
												<li>
													<form action="product.php" method="post">
														<input type="hidden" name="TOYOTA" value="TOYOTA">
														<a type="submit" href="shop-grid.php">TOYOTA</a>
													</form>
												</li>
											</ul>
										</ul>
									</li>
									<li class="menu-item has-children">
										<a href="javascript:void(0)">
											<bdo dir="rtl">صفحات</bdo>
											<i class="fas fa-chevron-down dropdown-arrow "></i></a>
										<ul class="sub-menu text-right">
											<li><a href="cart.php">السيارات المحجوزه</a>
											</li>
											<li><a href="compare.php"><bdo dir="rtl">مقارنات</bdo></a>
											</li>
											<li><a href="wishlist.php"><bdo dir="rtl">المفضلة</bdo></a>
											</li>
											<li><a href="login-register.php"><bdo dir="rtl">تسجيل الدخول </bdo></a>
											</li>
											<li><a href="my-account.php">الصفحة الشخصية</a>
											</li>
											<li><a href="faq.php"><bdo dir="rtl">الاسئلة الشائعة</bdo></a>
											</li>
											<li><a href="contact.php"><bdo dir="rtl">للتواصل معنا</bdo></a>
											</li>
										</ul>
									</li>
									<!-- Blog -->
									<li class="menu-item  mega-menu">
										<a href="blog-list-right-sidebar.php">Blog </a>
									</li>
									<li class="menu-item">
										<a href="contact.php"><bdo dir="rtl">للتواصل</bdo></a>
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
									<p><bdo dir="rtl">للمساعدة</bdo>
									</p>
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
						<div class="col-md-3 col-5  order-md-3 text-right">
							<div class="mobile-header-btns header-top-widget">
								<ul class="header-links">
									<li class="sin-link">
										<a href="shop.php" class="cart-link link-icon"><i class="ion-bag"></i></a>
									</li>
									<li class="sin-link">
										<a href="javascript:" class="link-icon hamburgur-icon off-canvas-btn"><i class="ion-navicon"></i></a>
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
						<form action="php/app.php" class="header-search-block">
							<input type="search" name="search" list="search-lg" placeholder="البحث عن سيارة">
							<button type="submit" href="product" name="search_submit" value="search" class="btn">
								<i class="fa fa-search" aria-hidden="true"></i>
							</button>
							<datalist id="search-lg">
								<?php
								// foreach (SELECT('*', 'car')->fetch(PDO::FETCH_ASSOC) as $key => $value) :
								// 	foreach ($value as  $value2) :
								?>
								<option value="<?php// echo $value2; ?>"></option>
								<?php
								// 	endforeach;
								// endforeach; 
								?>
							</datalist>
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
									<a href="blog-details-right-sidebar.php">Blog</a>
								</li>
								<li class="menu-item">
									<a href="shop.php"><i class="fa fa-shopping-bag" aria-hidden="true"></i></a>
								</li>
								<li class="menu-item-has-children">
									<a href="#"><bdo dir="rtl">صفحات</bdo></a>
									<ul class="sub-menu text-right">
										<li><a href="cart.php">السيارات المحجوزه</a>
										</li>
										<li><a href="compare.php"><bdo dir="rtl">مقارنات</bdo></a>
										</li>
										<li><a href="wishlist.php"><bdo dir="rtl">المفضلة</bdo></a>
										</li>
										<li><a href="login-register.php"><bdo dir="rtl">تسجيل الدخول </bdo></a>
										</li>
										<li><a href="my-account.php">الصفحة الشخصية</a>
										</li>
										<li><a href="faq.php"><bdo dir="rtl">الاسئلة الشائعة</bdo></a>
										</li>
										<li><a href="contact.php"><bdo dir="rtl">للتواصل معنا</bdo></a>
										</li>
									</ul>
								</li>
								<li><a href="contact.php"><bdo dir="rtl">للتواصل</bdo></a>
								</li>
							</ul>
						</nav>
						<!-- mobile menu navigation end -->
					</div>
					<!-- mobile menu end -->
					<div class="off-canvas-bottom">
						<div class="contact-list mb--10">
							<a href="tel:+967775286218" class="sin-contact"><i class="fas fa-mobile-alt"></i>775286218</a>
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
										<i class="fas fa-chevron-down dropdown-arrow "></i>
									</a>
									<ul class="sub-menu  text-right">
										<li>
											<h3 class="menu-title"><a href="javascript:void(0)">
													<bdo dir="rtl">الشركات</bdo>
												</a></h3>
											<ul class="mega-single-block">
												<li>
													<form action="product.php" method="post">
														<input type="hidden" name="TOYOTA" value="TOYOTA">
														<a type="submit" href="shop-grid.php">TOYOTA</a>
													</form>
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
										<li><a href="cart.php">السيارات المحجوزه</a>
										</li>
										<li><a href="compare.php"><bdo dir="rtl">مقارنات</bdo></a>
										</li>
										<li><a href="wishlist.php"><bdo dir="rtl">المفضلة</bdo></a>
										</li>
										<li><a href="login-register.php"><bdo dir="rtl">تسجيل الدخول </bdo></a>
										</li>
										<li><a href="my-account.php">الصفحة الشخصية</a>
										</li>
										<li><a href="faq.php"><bdo dir="rtl">الاسئلة الشائعة</bdo></a>
										</li>
										<li><a href="contact-2.php"><bdo dir="rtl">للتواصل معنا</bdo></a>
										</li>
									</ul>
								</li>
								<!-- Blog -->
								<li class="menu-item  mega-menu">
									<a href="blog-list-right-sidebar.php">Blog </a>
								</li>
								<li class="menu-item">
									<a href="contact.php"><bdo dir="rtl">للتواصل</bdo></a>
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
							<li class="breadcrumb-item active"><bdo dir="rtl">حسابي</bdo></li>
						</ol>
					</nav>
				</div>
			</div>
		</section>

		<?php $profile_user = $_COOKIE['Email']; ?>
		<div class="page-section inner-page-sec-padding">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<div class="row" dir="rtl">
							<!-- My Account Tab Menu Start -->
							<div class="col-lg-3 col-12 ">
								<div class="myaccount-tab-menu nav" role="tablist">
									<a href="#download" data-toggle="tab" class=" text-right d-flex active">
										<bdo dir="rtl" class="ml-auto">المفضلة</bdo><i class="fas fa-heart mr-auto"></i></a>

									<a href="#address-edit" data-toggle="tab" class=" text-right d-flex">
										<bdo dir="rtl" class="ml-auto">العنوان</bdo><i class="fa fa-map-marker mr-auto"></i>
									</a>
									<a href="#account-info" data-toggle="tab" class=" text-right d-flex">
										<bdo dir="rtl" class="ml-auto">معلومات الشخص</bdo><i class="fa fa-user mr-auto"></i>
									</a>
									<a href="php/logout.php" class=" text-right d-flex">
										<bdo dir="rtl" class="ml-auto">تسجيل الخروج</bdo><i class="fas fa-sign-out-alt mr-auto"></i>
									</a>
								</div>
							</div>
							<!-- My Account Tab Menu End -->
							<!-- My Account Tab Content Start -->
							<div class="col-lg-9 col-12 mt--30 mt-lg--0">
								<div class="tab-content" id="myaccountContent">

									<!-- Single Tab Content End -->
									<!-- Single Tab Content Start -->
									<div class="tab-pane fade show active" id="download" role="tabpanel">
										<div class="myaccount-content">
											<h3><bdo dir="rtl">المفضلة</bdo></h3>
											<div class="cart_area inner-page-sec-padding-bottom">
												<div class="container">
													<div class="row">
														<div class="col-12">
															<!-- Cart Table -->
															<div class="cart-table table-responsive">
																<table class="table">
																	<thead>
																		<tr>
																			<th class="pro-thumbnail"><bdo dir="rtl">الصورة</bdo></th>
																			<th class="pro-title"><bdo dir="rtl">الماركة</bdo></th>
																			<th class="pro-price"><bdo dir="rtl">السعر</bdo></th>
																			<th class="pro-quantity"><bdo dir="rtl">النوع</bdo></th>
																			<th class="pro-subtotal"><bdo dir="rtl">تاريخ الاضافة</bdo></th>
																			<th class="pro-remove"><bdo dir="rtl">للحذف</bdo></th>
																		</tr>
																	</thead>
																	<tbody>
																		<?php foreach ($AllWishCarForClint as $key => $value) :
																		?>
																			<tr>
																				<td class="pro-thumbnail">
																					<form action="product.php" method="post">
																						<input type="hidden" name="send_vin_car" value="<?php echo $key['vin']; ?>">
																						<button type="submit">
																							<img src="image/products/product-1.jpg" alt="Product">
																						</button>
																					</form>
																				</td>
																				<td class="pro-title">
																					<form action="product.php" method="post">
																						<input type="hidden" name="send_vin_car" value="<?php echo $key['vin']; ?>">
																						<button type="submit">
																							<bdo dir="rtl"><?php echo $key['carName']; ?></bdo>
																						</button>
																					</form>
																				</td>
																				<td class="pro-price"><span>$<?php echo $key['price']; ?></span></td>
																				<td class="pro-quantity">
																					<div class="pro-qty">
																						<div class="count-input-block">
																							<bdo dir="rtl"><?php echo $key['type']; ?></bdo>
																						</div>
																					</div>
																				</td>
																				<td class="pro-subtotal">
																					<span>
																						<?php echo $key['add_data']; ?>
																					</span>
																				</td>
																				<td class="pro-remove">
																					<form action="php/app.php" method="post">
																						<input type="hidden" name="send_vin_car" value="<?php echo $key['vin']; ?>">
																						<input type="hidden" name="page_path" value="<?php echo $_SERVER['PHP_SELF']; ?>">
																						<button type="submit">
																							<i class="far fa-trash-alt"></i></a>
																						</button>
																					</form>
																				</td>
																			</tr>
																		<?php endforeach;
																		?>
																	</tbody>
																</table>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>

									<!-- Single Tab Content End -->
									<!-- Single Tab Content Start -->
									<div class="tab-pane fade" id="address-edit" role="tabpanel">
										<div class="myaccount-content">
											<h3>Billing Address</h3>
											<address>
												<p><strong>Alex Tuntuni</strong></p>
												<p>1355 Market St, Suite 900 <br>
													San Francisco, CA 94103</p>
												<p>Mobile: (123) 456-7890</p>
											</address>
											<a href="#" class="btn btn--primary"><i class="fa fa-edit"></i>Edit
												Address</a>
										</div>
									</div>

									<!-- Single Tab Content End -->
									<!-- Single Tab Content Start -->
									<div class="tab-pane fade" id="account-info" role="tabpanel">
										<div class="myaccount-content">
											<h3>Account Details</h3>
											<div class="account-details-form">
												<form action="#">
													<div class="row">
														<div class="col-lg-6 col-12  mb--30">
															<input id="first-name" placeholder="First Name" type="text">
														</div>
														<div class="col-lg-6 col-12  mb--30">
															<input id="last-name" placeholder="Last Name" type="text">
														</div>
														<div class="col-12  mb--30">
															<input id="display-name" placeholder="Display Name" type="text">
														</div>
														<div class="col-12  mb--30">
															<input id="email" placeholder="Email Address" type="email">
														</div>
														<div class="col-12  mb--30">
															<h4>Password change</h4>
														</div>
														<div class="col-12  mb--30">
															<input id="current-pwd" placeholder="Current Password" type="password">
														</div>
														<div class="col-lg-6 col-12  mb--30">
															<input id="new-pwd" placeholder="New Password" type="password">
														</div>
														<div class="col-lg-6 col-12  mb--30">
															<input id="confirm-pwd" placeholder="Confirm Password" type="password">
														</div>
														<div class="col-12">
															<button class="btn btn--primary">Save Changes</button>
														</div>
													</div>
												</form>
											</div>
										</div>
									</div>
									<!-- Single Tab Content End -->
								</div>
							</div>
							<!-- My Account Tab Content End -->
						</div>
					</div>
				</div>
			</div>
		</div>
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

	<!-- <section class="section-margin">
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
				<?php //$i = 0;
				// foreach (SELECT('*', "image") as $key => $value) : 
				?>
				<div class="single-slide">
					<img src="<?php //echo $key["image_" . $i]; 
								?>" alt="">
				</div>
				<?php //$i++;
				// endforeach; 
				?>
			</div>
		</div>
	</section> -->
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
								<?php //$companyName = SELECT("DISTINCT companyName", "car")->fetch(PDO::FETCH_ASSOC); 
								?>
								<span class="badge bg-primary rounded-pill text-light fs-3">
									<?php //echo SELECT('count(*)', "car", "where companyName like " . $companyName['companyName'][rand(0, $companyName->rowCount())] . " group by companyName "); 
									?>
								</span>
							</li>
							<li class=" d-flex justify-content-between align-items-center">
								HONDI
								<span class="badge bg-primary rounded-pill text-light fs-3">2</span>
							</li>
							<li class=" d-flex justify-content-between align-items-center">
								MORSEDAS
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
								<?php //$type = SELECT("DISTINCT type", "car")->fetch(PDO::FETCH_ASSOC); 
								?>
								<span class="badge bg-primary rounded-pill text-light fs-3">
									<?php //echo SELECT('count(*)', "car", "where type like " . $type['type'][rand(0, $companyName->rowCount())] . " group by companyName "); 
									?>
								</span>
							</li>
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
						<form action="php/mail.php">
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
							<li class="single-social google"><a href=""><i class="ion ion-social-googleplus-outline"></i></a>
							</li>
							<li class="single-social youtube"><a href=""><i class="ion ion-social-youtube"></i></a>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<div class="footer-bottom">
			<div class="container">
				<p class="copyright-text">Copyright © 2019 <a href="#" class="author">Riyadh Ghazi and Jamal Abd
						Alaziz</a>. All Right Reserved.
					<br> Design By Riyadh Ghazi and Jamal Abd Alaziz
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