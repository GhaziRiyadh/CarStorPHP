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
include_once 'php/app.php';

$datacontrol = new mysqli_connection;
$datacontrol = $datacontrol->connect();

$viw = new widget();

if (isset($_GET['pagepath']) and isset($_GET['pagepath']) and $_GET['pagepath'] != $_SERVER['PHP_SELF']) {
	setcookie('prev_page_path', $_GET['pagepath'], time() + 36000);
	setcookie('prev_page_name', $_GET['pagename'], time() + 36000);
}

$clintemail = $car = $page_name = $profile_user = '';
if (isset($_GET['car'])) {
	setcookie('car', $_GET['car'], time() + 3600);
}
if (isset($_COOKIE['car'])) {
	$car = $_COOKIE['car'];
	if ($clint_result = $datacontrol->query("SELECT * FROM car WHERE vin = $car")) {
		while ($client_row = $clint_result->fetch_assoc()) {
			$page_name = $client_row['brand'];
		}
	}
}

$page_path = htmlspecialchars($_SERVER['PHP_SELF']);

?>
<!DOCTYPE html>
<html lang="ar">
meta

<?php $viw->head($page_name); ?>

<body>
	<div class="site-wrapper" id="top">
		<?php if (isset($_COOKIE['email']) and $_COOKIE['email']) {
			$email = $_COOKIE['email'];
			$stmt_client_ID = $datacontrol->query("SELECT * FROM client_email WHERE email = $email");
			$stmt_client = $datacontrol->query("SELECT * FROM client");
			while ($row_email = $stmt_client_ID->fetch_assoc() and $row_client = $stmt_client->fetch_assoc())
				$viw->header($page_name, $page_path, $row_client, $row_email);
		} else {
			$viw->header($page_name, $page_path);
		} ?>

		<section class="breadcrumb-section" dir="rtl">
			<h2 class="sr-only"></h2>
			<div class="container">
				<div class="breadcrumb-contents">
					<nav aria-label="breadcrumb">
						<ol class="breadcrumb">
							<li class="breadcrumb-item">
								<a href="<?php echo $_COOKIE['prev_page_path']; ?>">
									<bdo dir="rtl"><?php echo $_COOKIE['prev_page_name']; ?></bdo>
								</a>
							</li>
							<li class="breadcrumb-item active">
								<bdo dir="rtl"><?= $page_name; ?></bdo>
							</li>
						</ol>
					</nav>
				</div>
			</div>
		</section>
		<main class="inner-page-sec-padding-bottom">
			<div class="container">
				<div class="row  mb--60">
					<div class="col-lg-5 mb--30">
						<div class="row no-gutters">
							<div class="col-sm-9 mb--15 mb-sm--0">
								<!-- Product Details Slider Big Image-->
								<div class="product-details-slider sb-slick-slider arrow-type-two" data-slick-setting='{
                        "slidesToShow": 1,
                        "arrows": false,
                        "fade": true,
                        "draggable": false,
                        "swipe": false,
                        "asNavFor": ".product-slider-nav"
                        }'>
									<div class="single-slide">
										<img src="image/products/product-1.jpg" alt="">
									</div>
									<div class="single-slide">
										<img src="image/products/product-2.jpg" alt="">
									</div>
									<div class="single-slide">
										<img src="image/products/product-3.jpg" alt="">
									</div>
									<div class="single-slide">
										<img src="image/products/product-4.jpg" alt="">
									</div>
									<div class="single-slide">
										<img src="image/products/product-5.jpg" alt="">
									</div>
								</div>
							</div>
							<div class="col-sm-3 ">
								<!-- Product Details Slider Nav -->
								<div class="ml-sm--15 product-slider-nav sb-slick-slider arrow-type-two vertical-slider" data-slick-setting='{
                                "infinite":true,
                                  "autoplay": true,
                                  "autoplaySpeed": 8000,
                                  "slidesToShow": 3,
                                  "arrows": true,
                                  "prevArrow":{"buttonClass": "slick-prev","iconClass":"fa fa-chevron-left"},
                                  "nextArrow":{"buttonClass": "slick-next","iconClass":"fa fa-chevron-right"},
                                  "asNavFor": ".product-details-slider",
                                  "focusOnSelect": true,
                                  "vertical":true
                                  }' data-slick-responsive='[
                                {"breakpoint":991, "settings": {"slidesToShow": 3} },
                                {"breakpoint":768, "settings": {"slidesToShow": 3} },
                                {"breakpoint":575, "settings": 
                                {"slidesToShow": 3,
    
                                  "vertical":false
                                } 
                              }
                            ]'>
									<div class="single-slide">
										<img src="image/products/product-1.jpg" alt="">
									</div>
									<div class="single-slide">
										<img src="image/products/product-2.jpg" alt="">
									</div>
									<div class="single-slide">
										<img src="image/products/product-3.jpg" alt="">
									</div>
									<div class="single-slide">
										<img src="image/products/product-4.jpg" alt="">
									</div>
									<div class="single-slide">
										<img src="image/products/product-5.jpg" alt="">
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-7">
						<div class="product-details-info pr-lg--30 ">
							<p class="tag-block">Tags: <a href="#">Movado</a>, <a href="#">Omega</a></p>
							<h3 class="product-title">Beats EP Wired On-Ear Headphone-Black</h3>
							<ul class="list-unstyled">
								<li>Ex Tax: <span class="list-value"> £60.24</span></li>
								<li>Brands: <a href="#" class="list-value font-weight-bold"> Canon</a></li>
								<li>Product Code: <span class="list-value"> model1</span></li>
								<li>Reward Points: <span class="list-value"> 200</span></li>
								<li>Availability: <span class="list-value"> In Stock</span></li>
							</ul>
							<div class="price-block">
								<span class="price-new">£73.79</span>
								<del class="price-old">£91.86</del>
							</div>
							<div class="rating-widget">
								<div class="rating-block">
									<span class="fas fa-star star_on"></span>
									<span class="fas fa-star star_on"></span>
									<span class="fas fa-star star_on"></span>
									<span class="fas fa-star star_on"></span>
									<span class="fas fa-star "></span>
								</div>
								<div class="review-widget">
									<a href="">(1 Reviews)</a> <span>|</span>
									<a href="">Write a review</a>
								</div>
							</div>
							<article class="product-details-article">
								<h4 class="sr-only">Product Summery</h4>
								<p>Long printed dress with thin adjustable straps. V-neckline and wiring under the Dust
									with ruffles at the bottom of the
									dress.</p>
							</article>
							<div class="add-to-cart-row">
								<div class="count-input-block">
									<span class="widget-label">Qty</span>
									<input type="number" class="form-control text-center" value="1">
								</div>
								<div class="add-cart-btn">
									<a href="" class="btn btn-outlined--primary"><span class="plus-icon">+</span>Add to
										Cart</a>
								</div>
							</div>
							<div class="compare-wishlist-row">
								<a href="wishlist.html" class="add-link"><i class="fas fa-heart"></i>Add to Wish
									List</a>
								<a href="compare.html" class="add-link"><i class="fas fa-random"></i>Add to Compare</a>
							</div>
						</div>
					</div>
				</div>
				<div class="sb-custom-tab review-tab section-padding">
					<ul class="nav nav-tabs nav-style-2" id="myTab2" role="tablist">
						<li class="nav-item">
							<a class="nav-link active" id="tab1" data-toggle="tab" href="#tab-1" role="tab" aria-controls="tab-1" aria-selected="true">
								DESCRIPTION
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" id="tab2" data-toggle="tab" href="#tab-2" role="tab" aria-controls="tab-2" aria-selected="true">
								REVIEWS (1)
							</a>
						</li>
					</ul>
					<div class="tab-content space-db--20" id="myTabContent">
						<div class="tab-pane fade show active" id="tab-1" role="tabpanel" aria-labelledby="tab1">
							<div class="product-slider sb-slick-slider slider-border-single-row" data-slick-setting='{
                "autoplay": true,
                "autoplaySpeed": 8000,
                "slidesToShow": 4,
                "dots":true
            }' data-slick-responsive='[
                {"breakpoint":1200, "settings": {"slidesToShow": 4} },
                {"breakpoint":992, "settings": {"slidesToShow": 3} },
                {"breakpoint":768, "settings": {"slidesToShow": 2} },
                {"breakpoint":480, "settings": {"slidesToShow": 1} }
            ]'>
								<div class="single-slide">
									<div class="product-card">
										<div class="product-header">
											<a href="" class="author">
												Lpple
											</a>
											<h3><a href="product-details.html">Revolutionize Your BOOK With These Easy-peasy
													Tips</a></h3>
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
														<a href="#" data-toggle="modal" data-target="#quickModal" class="single-btn">
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
											<a href="" class="author">
												Jpple
											</a>
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
														<a href="#" data-toggle="modal" data-target="#quickModal" class="single-btn">
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
											<a href="" class="author">
												Wpple
											</a>
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
														<a href="#" data-toggle="modal" data-target="#quickModal" class="single-btn">
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
											<a href="" class="author">
												Epple
											</a>
											<h3><a href="product-details.html">What You Can Learn From Bill Gates</a></h3>
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
														<a href="#" data-toggle="modal" data-target="#quickModal" class="single-btn">
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
											<a href="" class="author">
												Hpple
											</a>
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
														<a href="#" data-toggle="modal" data-target="#quickModal" class="single-btn">
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
						<div class="tab-pane fade" id="tab-2" role="tabpanel" aria-labelledby="tab2">
							<div class="review-wrapper">
								<div class="product-slider sb-slick-slider slider-border-single-row" data-slick-setting='{
                "autoplay": true,
                "autoplaySpeed": 8000,
                "slidesToShow": 4,
                "dots":true
            }' data-slick-responsive='[
                {"breakpoint":1200, "settings": {"slidesToShow": 4} },
                {"breakpoint":992, "settings": {"slidesToShow": 3} },
                {"breakpoint":768, "settings": {"slidesToShow": 2} },
                {"breakpoint":480, "settings": {"slidesToShow": 1} }
            ]'>
									<div class="single-slide">
										<div class="product-card">
											<div class="product-header">
												<a href="" class="author">
													Lpple
												</a>
												<h3><a href="product-details.html">Revolutionize Your BOOK With These Easy-peasy
														Tips</a></h3>
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
															<a href="#" data-toggle="modal" data-target="#quickModal" class="single-btn">
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
												<a href="" class="author">
													Jpple
												</a>
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
															<a href="#" data-toggle="modal" data-target="#quickModal" class="single-btn">
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
												<a href="" class="author">
													Wpple
												</a>
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
															<a href="#" data-toggle="modal" data-target="#quickModal" class="single-btn">
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
												<a href="" class="author">
													Epple
												</a>
												<h3><a href="product-details.html">What You Can Learn From Bill Gates</a></h3>
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
															<a href="#" data-toggle="modal" data-target="#quickModal" class="single-btn">
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
												<a href="" class="author">
													Hpple
												</a>
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
															<a href="#" data-toggle="modal" data-target="#quickModal" class="single-btn">
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
						</div>
					</div>
				</div>
			</div>
			<!--=================================
    RELATED PRODUCTS BOOKS
===================================== -->
			<section class="">
				<div class="container">
					<div class="section-title section-title--bordered">
						<h2>RELATED PRODUCTS</h2>
					</div>
					<div class="product-slider sb-slick-slider slider-border-single-row" data-slick-setting='{
                "autoplay": true,
                "autoplaySpeed": 8000,
                "slidesToShow": 4,
                "dots":true
            }' data-slick-responsive='[
                {"breakpoint":1200, "settings": {"slidesToShow": 4} },
                {"breakpoint":992, "settings": {"slidesToShow": 3} },
                {"breakpoint":768, "settings": {"slidesToShow": 2} },
                {"breakpoint":480, "settings": {"slidesToShow": 1} }
            ]'>
						<div class="single-slide">
							<div class="product-card">
								<div class="product-header">
									<a href="" class="author">
										Lpple
									</a>
									<h3><a href="product-details.html">Revolutionize Your BOOK With These Easy-peasy
											Tips</a></h3>
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
												<a href="#" data-toggle="modal" data-target="#quickModal" class="single-btn">
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
									<a href="" class="author">
										Jpple
									</a>
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
												<a href="#" data-toggle="modal" data-target="#quickModal" class="single-btn">
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
									<a href="" class="author">
										Wpple
									</a>
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
												<a href="#" data-toggle="modal" data-target="#quickModal" class="single-btn">
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
									<a href="" class="author">
										Epple
									</a>
									<h3><a href="product-details.html">What You Can Learn From Bill Gates</a></h3>
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
												<a href="#" data-toggle="modal" data-target="#quickModal" class="single-btn">
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
									<a href="" class="author">
										Hpple
									</a>
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
												<a href="#" data-toggle="modal" data-target="#quickModal" class="single-btn">
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
			</section>
			<!-- Modal -->
			<div class="modal fade modal-quick-view" id="quickModal" tabindex="-1" role="dialog" aria-labelledby="quickModal" aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<button type="button" class="close modal-close-btn ml-auto" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
						<div class="product-details-modal">
							<div class="row">
								<div class="col-lg-5">
									<!-- Product Details Slider Big Image-->
									<div class="product-details-slider sb-slick-slider arrow-type-two" data-slick-setting='{
              "slidesToShow": 1,
              "arrows": false,
              "fade": true,
              "draggable": false,
              "swipe": false,
              "asNavFor": ".product-slider-nav"
              }'>
										<div class="single-slide">
											<img src="image/products/product-details-1.jpg" alt="">
										</div>
										<div class="single-slide">
											<img src="image/products/product-details-2.jpg" alt="">
										</div>
										<div class="single-slide">
											<img src="image/products/product-details-3.jpg" alt="">
										</div>
										<div class="single-slide">
											<img src="image/products/product-details-4.jpg" alt="">
										</div>
										<div class="single-slide">
											<img src="image/products/product-details-5.jpg" alt="">
										</div>
									</div>
									<!-- Product Details Slider Nav -->
									<div class="mt--30 product-slider-nav sb-slick-slider arrow-type-two" data-slick-setting='{
            "infinite":true,
              "autoplay": true,
              "autoplaySpeed": 8000,
              "slidesToShow": 4,
              "arrows": true,
              "prevArrow":{"buttonClass": "slick-prev","iconClass":"fa fa-chevron-left"},
              "nextArrow":{"buttonClass": "slick-next","iconClass":"fa fa-chevron-right"},
              "asNavFor": ".product-details-slider",
              "focusOnSelect": true
              }'>
										<div class="single-slide">
											<img src="image/products/product-details-1.jpg" alt="">
										</div>
										<div class="single-slide">
											<img src="image/products/product-details-2.jpg" alt="">
										</div>
										<div class="single-slide">
											<img src="image/products/product-details-3.jpg" alt="">
										</div>
										<div class="single-slide">
											<img src="image/products/product-details-4.jpg" alt="">
										</div>
										<div class="single-slide">
											<img src="image/products/product-details-5.jpg" alt="">
										</div>
									</div>
								</div>
								<div class="col-lg-7 mt--30 mt-lg--30">
									<div class="product-details-info pl-lg--30 ">
										<p class="tag-block">Tags: <a href="#">Movado</a>, <a href="#">Omega</a></p>
										<h3 class="product-title">Beats EP Wired On-Ear Headphone-Black</h3>
										<ul class="list-unstyled">
											<li>Ex Tax: <span class="list-value"> £60.24</span></li>
											<li>Brands: <a href="#" class="list-value font-weight-bold"> Canon</a></li>
											<li>Product Code: <span class="list-value"> model1</span></li>
											<li>Reward Points: <span class="list-value"> 200</span></li>
											<li>Availability: <span class="list-value"> In Stock</span></li>
										</ul>
										<div class="price-block">
											<span class="price-new">£73.79</span>
											<del class="price-old">£91.86</del>
										</div>
										<div class="rating-widget">
											<div class="rating-block">
												<span class="fas fa-star star_on"></span>
												<span class="fas fa-star star_on"></span>
												<span class="fas fa-star star_on"></span>
												<span class="fas fa-star star_on"></span>
												<span class="fas fa-star "></span>
											</div>
											<div class="review-widget">
												<a href="">(1 Reviews)</a> <span>|</span>
												<a href="">Write a review</a>
											</div>
										</div>
										<article class="product-details-article">
											<h4 class="sr-only">Product Summery</h4>
											<p>Long printed dress with thin adjustable straps. V-neckline and wiring
												under the Dust with ruffles at the bottom
												of the
												dress.</p>
										</article>
										<div class="add-to-cart-row">
											<div class="count-input-block">
												<span class="widget-label">Qty</span>
												<input type="number" class="form-control text-center" value="1">
											</div>
											<div class="add-cart-btn">
												<a href="" class="btn btn-outlined--primary"><span class="plus-icon">+</span>Add to Cart</a>
											</div>
										</div>
										<div class="compare-wishlist-row">
											<a href="" class="add-link"><i class="fas fa-heart"></i>Add to Wish List</a>
											<a href="" class="add-link"><i class="fas fa-random"></i>Add to Compare</a>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="modal-footer">
							<div class="widget-social-share">
								<span class="widget-label">Share:</span>
								<div class="modal-social-share">
									<a href="#" class="single-icon"><i class="fab fa-facebook-f"></i></a>
									<a href="#" class="single-icon"><i class="fab fa-twitter"></i></a>
									<a href="#" class="single-icon"><i class="fab fa-youtube"></i></a>
									<a href="#" class="single-icon"><i class="fab fa-google-plus-g"></i></a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</main>
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
				<?php $i = 0;
				$stmt_photo_car = $datacontrol->query("SELECT * FROM car_photos ;");
				while (
					$row_photo = $stmt_photo_car->fetch_assoc()  and
					!empty($row_photo['photo'])
				) : $i++;
					if ($i > 12) break; ?>
					<div class="single-slide">
						<a href="product.php?car=<?php echo $row_photo['vin'] . "&pagename=$page_name"; ?>"><img height="20%" src="<?php echo $row_photo['photo']; ?>" alt=""></a>
					</div>
				<?php endwhile; ?>
			</div>
		</div>
	</section>
	<!--=================================
    Footer Area
===================================== -->
	<footer class='site-footer text-right' dir='rtl'>
		<?php $viw->Footer($page_name); ?>
	</footer>
</body>

</html>