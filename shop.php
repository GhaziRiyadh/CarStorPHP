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
require 'php/app.php';

$datacontrol = new mysqli_connection;
$datacontrol = $datacontrol->connect();
$viw = new widget;


$page_path = htmlspecialchars($_SERVER['PHP_SELF']);
$page_name = "المتجات";

if (isset($_GET['pagepath']) and isset($_GET['pagename']) and $_GET['pagepath'] != $_SERVER['PHP_SELF']) {
	setcookie('prev_page_path', $_GET['pagepath'], time() + 36000);
	setcookie('prev_page_name', $_GET['pagename'], time() + 36000);
}

if (isset($_GET['company'])) {
	$company = $_GET['company'];
} else
if (!isset($_GET['page']))
	header("location: " . $_COOKIE['prev_page_path']);

?>
<!DOCTYPE html>
<html lang="ar">

<?php $viw->head($page_name); ?>

<body style="font-family: arabicfont;">
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
				<div class="row">
					<div class="col-lg-9">
						<div class="shop-toolbar with-sidebar mb--30">
							<div class="align-items-center">
								<!-- Product View Mode -->
								<div class="product-view-mode text-right" dir="rtl">
									<a href="#" class="sorting-btn active" data-target="grid"><i class="fas fa-th"></i></a>
									<a href="#" class="sorting-btn" data-target="grid-four">
										<span class="grid-four-icon">
											<i class="fas fa-grip-vertical"></i><i class="fas fa-grip-vertical"></i>
										</span>
									</a>
									<a href="#" class="sorting-btn" data-target="list "><i class="fas fa-list"></i></a>
								</div>
							</div>
						</div>
						<div class="shop-toolbar d-none">
							<div class="row align-items-center">
								<div class="col-lg-2 col-md-2 col-sm-6">
									<!-- Product View Mode -->
									<div class="product-view-mode">
										<a href="#" class="sorting-btn active" data-target="grid"><i class="fas fa-th"></i></a>
										<a href="#" class="sorting-btn" data-target="grid-four">
											<span class="grid-four-icon">
												<i class="fas fa-grip-vertical"></i><i class="fas fa-grip-vertical"></i>
											</span>
										</a>
										<a href="#" class="sorting-btn" data-target="list "><i class="fas fa-list"></i></a>
									</div>
								</div>
							</div>
						</div>
						<div class="shop-product-wrap grid with-pagination row space-db--30 shop-border">
							<?php
							$getPage = null;
							// content page in header
							if (isset($_GET['page'])) $getPage = $_GET['page'];
							else $getPage = 0;
							$num_page = 9;
							$page_name = 'shop.php';

							// sum the result
							$sql_pagination = 'SELECT * FROM car';
							$get_row_num  = 0;
							if ($numdata = $datacontrol->query($sql_pagination) or die($datacontrol->error)) {
								$get_row_num = $numdata->num_rows;
							}
							// row for every page
							$len = intval($get_row_num / $num_page);

							// next button
							$next = intval($getPage + $num_page);

							// prev button
							$prev = intval($getPage - $num_page);

							$sql_show = "";
							if ($company) {
								$sql_show = "SELECT * FROM car WHERE companyName LIKE '%$company%' LIMIT $num_page OFFSET $getPage";
							} elseif (isset($_GET['search'])) {
								$search = $_GET['search'];
								$sql_show = "SELECT * FROM car WHERE companyName LIKE '%$search%' OR brand LIKE '%$search%' OR style LIKE '%$search%' LIMIT $num_page OFFSET $getPage";
							} else
								$sql_show = "SELECT * FROM car LIMIT $num_page OFFSET $getPage";

							if ($result_show = $datacontrol->query($sql_show)) :
								while (
									$row_show = $result_show->fetch_assoc() and
									!empty($row_show['vin']) and
									$row_dtl_show = $datacontrol->query("SELECT * FROM car_dtl WHERE vin = {$row_show['vin']};")->fetch_assoc() and
									!empty($row_dtl_show['detail']) and
									$row_photo_show = $datacontrol->query("SELECT * FROM car_photos WHERE vin = {$row_show['vin']};")->fetch_assoc()  and
									!empty($row_photo_show['photo'])
								) : ?>
									<div class="col-lg-4 col-sm-6">
										<div class="product-card">
											<div class="product-grid-content">
												<div class="product-header">
													<a href="product.php?car=<?= $row_show['vin']; ?>&pagename=<?= $page_name; ?>" class="author">
														<?= $row_show['brand']; ?>
													</a>
													<h3>
														<a href="product.php?car=<?= $row_show['vin']; ?>&pagename=<?= $page_name; ?>">
															<?php echo $row_dtl_show['detail']; ?>
														</a>
													</h3>
												</div>
												<div class="product-card--body">
													<div class="card-image">
														<img src="<?= $row_photo_show['photo']; ?>" alt="<?= $row_show['brand']; ?> photo">
														<div class="hover-contents">
															<a href="product.php?car=<?= $row_show['vin']; ?>&pagename=<?= $page_name; ?>" class="hover-image">
																<img src="<?= $row_photo_show['photo']; ?>" alt="<?= $row_show['brand']; ?> photo">
															</a>
															<div class="hover-btns" style="padding: 4%;">
																<a href="<?= htmlspecialchars($_SERVER['PHP_SELF']) ?>?car=<?= $row_show['vin']; ?>" class="single-btn">
																	<i class="fas fa-heart"></i>
																</a>
																<a href="product.php?car=<?= $row_show['vin']; ?>&pagename=<?= $page_name; ?>" class="single-btn">
																	<i class="fas fa-eye"></i>
																</a>
															</div>
														</div>
													</div>
													<div class="price-block">
														<span class="price">$<?= $row_show['price']; ?></span>
														<del class="price-old">$<?= $row_show['price']; ?></del>
														<span class="price-discount">20%</span>
													</div>
												</div>
											</div>
											<div class="product-list-content">
												<div class="card-image">
													<a href="product.php?car=<?= $row_show['vin']; ?>&pagename=<?= $page_name; ?>" class="hover-image">
														<img src="<?= $row_photo_show['photo']; ?>" alt="<?= $row_show['brand']; ?> photo">
													</a>
												</div>
												<div class="product-card--body">
													<div class="product-header">
														<a href="product.php?car=<?= $row_show['vin']; ?>&pagename=<?= $page_name; ?>" class="author">
															<?= $row_show['brand']; ?>
														</a>
														<h3>
															<a href="product.php?car=<?= $row_show['vin']; ?>&pagename=<?= $page_name; ?>" class="author">
																<?= $row_show['companyName']; ?>
															</a>
														</h3>
													</div>
													<article>
														<h2 class="sr-only">Card List Article</h2>
														<p>
															<a href="product.php?car=<?= $row_show['vin']; ?>&pagename=<?= $page_name; ?>">
																<?php echo $row_dtl_show['detail']; ?>
															</a>
														</p>
													</article>
													<div class="price-block">
														<span class="price">$<?= $row_show['price']; ?></span>
														<del class="price-old">$<?= $row_show['price']; ?></del>
														<span class="price-discount">20%</span>
													</div>
													<div class="btn-block">
														<a href="<?= htmlspecialchars($_SERVER['PHP_SELF']) ?>?car=<?= $row_show['vin']; ?>" class="card-link"><i class="fas fa-heart"></i>
															<bdo dir="rtl">اضافة الي المفضلة</bdo>
														</a>
														<a href="product.php?car=<?= $row_show['vin']; ?>&pagename=<?= $page_name; ?>" class="card-link"><i class="fas fa-random"></i>
															<bdo dir="rtl">للحجز</bdo>
														</a>
													</div>
												</div>
											</div>
										</div>
									</div>
							<?php endwhile;
							endif;
							?>
						</div>
						<!-- Pagination Block -->

						<div class="row pt--30">
							<div class="col-md-12">
								<div class="pagination-block">
									<ul class="pagination-btns flex-center text-right">
										<?php if ($getPage > 9) : ?>
											<li><a href="<?php echo $page_name . "?page=0"; ?>" class="single-btn prev-btn ">|<i class="zmdi zmdi-chevron-left"></i> </a></li>
											<li><a href="<?php echo $page_name . "?page=" . $prev; ?>" class="single-btn prev-btn" style="padding-top: 12px;"><i class="zmdi zmdi-chevron-left"></i> </a></li>
										<?php endif; ?>

										<?php $row_num = $get_row_num;
										for ($i = 0, $n = 0; $i < $row_num or $n < $row_num / $num_page; $i += $num_page, $n++) :
											if ($getPage >= $i and $getPage < $i + 9) : ?>
												<li class="active"><a href="<?php echo $page_name . "?page=" . $i; ?>" class="single-btn "><?php echo $n; ?></a></li>
											<?php else : ?>
												<li><a href="<?php echo $page_name . "?page=" . $i; ?>" class="single-btn  "><?php echo $n; ?></a></li>
										<?php endif;
										endfor; ?>

										<?php if ($getPage < $row_num - 1 and $getPage > 9) : ?>
											<li><a href="<?php echo $page_name . "?page=" . $next; ?>" class="single-btn next-btn" style="padding-top: 12px;"><i class="zmdi zmdi-chevron-right"></i></a></li>
											<li><a href="<?php echo $page_name . "?page=" . $row_num - 1; ?>" class="single-btn next-btn"><i class="zmdi zmdi-chevron-right"></i>|</a></li>
										<?php endif; ?>
									</ul>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-3  mt--40 mt-lg--0">
						<div class="inner-page-sidebar">

							<!-- Accordion -->
							<div class="single-block">
								<h3 class="sidebar-title"><bdo dir="rtl">فرز حسب الشركات</bdo></h3>
								<ul class="sidebar-menu--shop menu-type-2">
									<?php if ($filter_comp_result = $datacontrol->query("SELECT DISTINCT companyName FROM car")) :
										$filter_num_rows = $filter_comp_result->num_rows;
										while ($filter_comp_row = $filter_comp_result->fetch_assoc() and !empty($filter_comp_row['companyName'])) :
											if ($filter_num_rows = $datacontrol->query("SELECT DISTINCT companyName FROM car WHERE companyName LIKE '{$filter_comp_row['companyName']}'")) : ?>
												<li>
													<a href='<?php echo "shop.php?company=" . $filter_comp_row['companyName']; ?>'>
														<?php echo $filter_comp_row['companyName'] . '<span>(' . $filter_num_rows->num_rows . ')</span>'; ?>
													</a>
												</li>
									<?php endif;
										endwhile;
									endif; ?>
								</ul>
							</div>
							<!-- Size -->
							<div class="single-block">
								<h3 class="sidebar-title"><bdo dir="rtl">فرز حسب الموديل</bdo></h3>
								<ul class="sidebar-menu--shop menu-type-2">
									<?php if ($filter_model_result = $datacontrol->query("SELECT DISTINCT model FROM car")) :
										$filter_num_rows = $filter_model_result->num_rows;
										while ($filter_model_row = $filter_model_result->fetch_assoc() and !empty($filter_model_row['model'])) :
											if ($filter_num_rows = $datacontrol->query("SELECT DISTINCT model FROM car WHERE model LIKE '{$filter_model_row['model']}'")) : ?>
												<li>
													<a href='<?php echo "shop.php?model=" . $filter_model_row['model']; ?>'>
														<?php echo $filter_model_row['model'] . '<span>(' . $filter_num_rows->num_rows . ')</span>'; ?>
													</a>
												</li>
									<?php endif;
										endwhile;
									endif; ?>
								</ul>
							</div>
							<!-- Color -->
							<div class="single-block">
								<h3 class="sidebar-title"><bdo dir="rtl">فرز حسب اللون</bdo></h3>
								<ul class="sidebar-menu--shop menu-type-2">
									<?php if ($filter_color_result = $datacontrol->query("SELECT DISTINCT color FROM car")) :
										$filter_num_rows = $filter_color_result->num_rows;
										while ($filter_color_row = $filter_color_result->fetch_assoc() and !empty($filter_color_row['color'])) :
											if ($filter_num_rows = $datacontrol->query("SELECT DISTINCT color FROM car WHERE color LIKE '{$filter_color_row['color']}'")) : ?>
												<li>
													<a href='<?php echo "shop.php?color=" . $filter_color_row['color']; ?>'>
														<?php echo $filter_color_row['color'] . '<span>(' . $filter_num_rows->num_rows . ')</span>'; ?>
													</a>
												</li>
									<?php endif;
										endwhile;
									endif; ?>
								</ul>
							</div>
							<!-- Promotion Block -->
							<div class="single-block">
								<a href="" class="promo-image sidebar">
									<img src="image/icon/logo.gif" alt="">
								</a>
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