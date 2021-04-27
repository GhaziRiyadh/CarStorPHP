<?php

require_once 'config.php';
/**
 * use this class for control the database
 */
class DBcontrol
{
	private $DB;
	function __construct()
	{
		$this->DB = new mysqli_connection;
		$this->DB = $this->DB->connect();
	}
	public function  SELECT($QUERY, $TABLE, $CONDATION = " ")
	{
		try {
			return $this->DB->query("SELECT {$QUERY}  FROM {$TABLE}  {$CONDATION}");
		} catch (mysqli_sql_exception $e) {
			die("ERROR: Could not connect. " . $e->getMessage() . "\n Erorr:on file:" . $e->getFile() . " on line " . $e->getLine());
		}
	}
}

class widget extends DBcontrol
{
	private $mysqli;
	private $query;
	private $self_path;
	/**
	 * index true to add sinin and sinout items
	 */
	function __construct(bool $with_sinin_and_sinup = false)
	{
		$this->without_sinin_sinup = $with_sinin_and_sinup;
		$this->mysqli = new mysqli_connection;
		$this->mysqli = $this->mysqli->connect();
		$this->self_path = $_SERVER['PHP_SELF'];
	}

	public function head($page_name)
	{
		echo "
			<head>
				<meta charset='utf-8' />
				<meta http-equiv='X-UA-Compatible' content='IE=edge'>
				<title>" . $page_name . "</title>
				<meta name='viewport' content='width=device-width, initial-scale=1'>
				<!-- Use Minified Plugins Version For Fast Page Load -->
				<link rel='stylesheet' type='text/css' media='screen' href='./css/plugins.css' />
				<link rel='stylesheet' type='text/css' media='screen' href='./css/main.css' />
				<link rel='stylesheet' type='text/css' media='screen' href='./css/font.css' />
				<link rel='shortcut icon' type='image\/x-icon' href='image\/icon\/logo.gif'>
				<script src='js/plugins.js'></script>
				<script src='js/ajax-mail.js'></script>
				<script src='js/custom.js'></script>
				<script>
					$(document).ready(function() {
						$('.slick-slide').attr('style', 'height: auto !important');
					});
				</script>
			</head>";
	}

	/**
	 * header function
	 */
	public function header($page_name, $page_path, $row = null, $row_email = null)
	{
		echo "	
			<div class='site-header header-2 mb--20 d-none d-lg-block'  dir='rtl'>
				<div class='header-middle pt--10 pb--10'>
					<div class='container'>
						<div class='row align-items-center'>
							<div class='col-lg-3'>
								<a href='index.php' class='site-brand'>
									<img src='image/icon/logo.gif' height='100px' alt=''>
								</a>
							</div>
							<div class='col-lg-5'>
								<form action='shop.php' class='header-search-block'>
									<input type='search' name='search' list='search-lg' placeholder='البحث عن سيارة'>
									<button type='submit' class='btn'>
										<i class='fa fa-search' aria-hidden='true'></i>
									</button>
									<datalist id='search-lg'>";
		$this->query = $this->mysqli->query("SELECT * FROM car ");
		while ($row_car_search = $this->query->fetch_assoc()) : echo "
										<option value=" . $row_car_search['companyName'] . "></option>
										<option value=" . $row_car_search['brand'] . "></option>
										<option value=" . $row_car_search['style'] . "></option>";
		endwhile;
		echo " 						</datalist>
								</form>
							</div>
							<div class='col-lg-4'>
								<div class='main-navigation flex-lg-right'>
									<div class='cart-widget'>
										<div class='login-block'>";
		if (!isset($_SESSION['email']) and !isset($_SESSION['pass'])) : echo "
											<a href='login-register.html' class='font-weight-bold'>
												<bdo dir='rtl'>تسجيل الدخول</bdo>
											</a> <br>
											<span><bdo dir='rtl'>او</bdo></span>
											<a href='login-register.html'>
												<bdo dir='rtl'>إنشاء حساب</bdo>
											</a>";
		else : echo "
											<a href='my-account.php?pagename=$page_name&pagepath=$page_path&clientId=" . $row['id'] . " '>
												<img src = '" . $row['photo'] . "' alt = '" . $row['fullname'] . "'/>
											</a>";
		endif;
		echo "							</div>
									</div>
								</div>					
							</div>
						</div>
					</div>
				</div>
			<div class='header-bottom bg-primary' style='background-color: #0c0175 !important;'>
				<div class='container'>
					<div class='row align-items-center' dir='rtl'>
						<div class='col-lg-6'>
							<div class='main-navigation flex-lg-right'>
								<ul class='main-menu menu-right main-menu--white li-last-0'>
									<li class='menu-item'>
										<a href='javascript:void(0)'>
											<i class='fa fa-home' aria-hidden='true'></i>
										</a>
								</li>
									<!-- Shop -->
									<li class='menu-item has-children'>
										<a href='javascript:void(0)'>
											<i class='fa fa-shopping-bag' aria-hidden='true'></i>
										</a>
										<ul class='sub-menu text-right'>
											<h3 class='menu-title'>
												<a href='javascript:void(0)'>
													<bdo dir='rtl'>الشركات</bdo>
												</a>
											</h3>
											<ul class='mega-single-block'>";
		$this->query = $this->mysqli->query("SELECT * FROM car");
		$i = 0;
		while ($row_cmp = $this->query->fetch_assoc()) : $com_n = $row_cmp['companyName'];
			echo "
												<li>
													<a class='single-btn' href='shop.php?company=$com_n&pagename=$page_name&pagepath=$page_path'>
														$com_n
													</a> 
												</li>";
			$i++;
			if ($i == 8) break;
		endwhile;
		echo "						</ul>
										</ul>
									</li>
									<li class='menu-item has-children'>
										<a href='javascript:void(0)'>
											<bdo dir='rtl'>صفحات</bdo>
											<i class='fas fa-chevron-down dropdown-arrow '></i>
										</a>
										<ul class='sub-menu text-right'>";
		if (!isset($_SESSION['email']) and !isset($_SESSION['pass'])) : echo "
											<li><a href='login-register.php?pagename=$page_name&pagepath=$page_path'><bdo dir='rtl'>تسجيل الدخول </bdo></a>
											</li>
											<li>";
		else : echo "
												<a class='single-btn' href='my-account.php?clintId='" . $row_email['userid'] . "'&?pagename=$page_name&pagepath=$page_path'>
													الصفحة الشخصية
												</a> ";
		endif;
		echo "						</li>
											<li><a href='contact.php?pagename=$page_name&pagepath=$page_path'><bdo dir='rtl'>للتواصل معنا</bdo></a>
											</li>
										</ul>
									</li>
									<li class='menu-item'>
										<a href='contact.php?pagename=$page_name&pagepath=$page_path'><bdo dir='rtl'>للتواصل</bdo></a>
									</li>
								</ul>
							</div>
						</div>
						<div class='col-lg-6'>
							<div class='header-phone color-white'>
								<div class='icon'>
									<i class='fas fa-headphones-alt'></i>
								</div>
								<div class='text'>
									<p><bdo dir='rtl'>للمساعدة</bdo>
									</p>
									<p class='font-weight-bold number'>
										<a href='tel:+967775286218'>775286218</a>
									</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class='site-mobile-menu'>
			<header class='mobile-header d-block d-lg-none pt--10 pb-md--10'>
				<div class='container'>
					<div class='row align-items-sm-end align-items-center'>
						<div class='col-md-4 col-7'>
							<a href='index.php' class='site-brand'>
								<img src='image/icon/logo.gif' height='100px' alt=''>
							</a>
						</div>
						<div class='col-md-3 col-5  order-md-3 text-right'>
							<div class='mobile-header-btns header-top-widget'>
								<ul class='header-links'>
									<li class='sin-link'>
										<a href='shop.php?pagename=$page_name&pagepath=$page_path' class='cart-link link-icon'><i class='ion-bag'></i></a>
									</li>
									<li class='sin-link'>
										<a href='javascript:' class='link-icon hamburgur-icon off-canvas-btn'><i class='ion-navicon'></i></a>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</header>
			<!--Off Canvas Navigation Start-->
			<aside class='off-canvas-wrapper'>
				<div class='btn-close-off-canvas'>
					<i class='ion-android-close'></i>
				</div>
				<div class='off-canvas-inner'>
					<!-- search box start -->
					<div class='search-box offcanvas'>
						<form action='shop.php' class='header-search-block'>
							<button type='submit' name='search_submit' value='search' class='btn'>
								<i class='fa fa-search' aria-hidden='true'></i>
							</button>
							<input type='search' name='search' list='search-lg' placeholder='البحث عن سيارة'>
							<datalist id='search-lg'>";
		$this->query = $this->mysqli->query("SELECT * FROM car ");
		while ($row_car_search = $this->query->fetch_assoc()) : echo "
								<option value=" . $row_car_search['companyName'] . "></option>
								<option value=" . $row_car_search['brand'] . "></option>
								<option value=" . $row_car_search['style'] . "></option>";
		endwhile;
		echo
		"
							</datalist>
						</form>
					</div>
					<!-- search box end -->
					<!-- mobile menu start -->
					<div class='mobile-navigation text-right'>
					<!-- mobile menu navigation start -->
						<nav class='off-canvas-nav'>
							<ul class='mobile-menu main-mobile-menu'>
								<li class='menu-item'>
									<a href='index.php'>
										<i class='fa fa-home' aria-hidden='true'></i>
									</a>
								</li>
								<li class='menu-item'>
									<a href='blog-details-right-sidebar.php'>Blog</a>
								</li>
								<li class='menu-item'>
									<a href='shop.php?pagename=$page_name&pagepath=$page_path''><i class='fa fa-shopping-bag' aria-hidden='true'></i></a>
								</li>
								<li class='menu-item-has-children'>
									<a href='#'><bdo dir='rtl'>صفحات</bdo></a>
									<ul class='sub-menu text-right'>";
		if (!isset($_SESSION['email']) and !isset($_SESSION['pass'])) : echo "
											<li><a href='login-register.php?pagename=$page_name&pagepath=$page_path'><bdo dir='rtl'>تسجيل الدخول </bdo></a>
											</li>
											<li>";
		else : echo "
												<a class='single-btn' href='my-account.php?clientId='" . $row_email['userid'] . "'&pagename=$page_name&pagepath=$page_path'>
													الصفحة الشخصية
												</a> ";
		endif;
		echo "								</li>
											<li><a href='contact.php?pagename=$page_name&pagepath=$page_path'><bdo dir='rtl'>للتواصل معنا</bdo></a>
											</li>
										</ul>
								</li>
								<li><a href='contact.php?pagename=$page_name&pagepath=$page_path'><bdo dir='rtl'>للتواصل</bdo></a>
								</li>
							</ul>
						</nav>
						<!-- mobile menu navigation end -->
					</div>
					<div class='login-block text-right'>";
		if (!isset($_SESSION['email']) and !isset($_SESSION['pass'])) : echo "
											<a href='login-register.html' class='font-weight-bold'>
												<bdo dir='rtl'>تسجيل الدخول</bdo>
											</a>
											<span><bdo dir='rtl'>او</bdo></span>
											<a href='login-register.html'>
												<bdo dir='rtl'>إنشاء حساب</bdo>
											</a>";
		else : echo "
											<a href='my-account.php?pagename=$page_name&pagepath=$page_path&clientId=" . $row['id'] . " '>
												<img src = '" . $row['photo'] . "' alt = '" . $row['fullname'] . "'/>
											</a>";
		endif;
		echo "							</div>
					<!-- mobile menu end -->
					<div class='off-canvas-bottom'>
						<div class='contact-list mb--10'>
							<a href='tel:+967775286218' class='sin-contact'><i class='fas fa-mobile-alt'></i>775286218</a>
							<a href='mailto:' class='sin-contact'><i class='fas fa-envelope'></i>examle@handart.com</a>
						</div>
						<div class='off-canvas-social'>
							<a href='#' class='single-icon'><i class='fab fa-facebook-f'></i></a>
							<a href='#' class='single-icon'><i class='fab fa-twitter'></i></a>
							<a href='#' class='single-icon'><i class='fas fa-rss'></i></a>
							<a href='#' class='single-icon'><i class='fab fa-youtube'></i></a>
							<a href='#' class='single-icon'><i class='fab fa-google-plus-g'></i></a>
							<a href='#' class='single-icon'><i class='fab fa-instagram'></i></a>
						</div>
					</div>
				</div>
			</aside>
			<!--Off Canvas Navigation End-->
		</div>
		<div class='sticky-init fixed-header common-sticky' style='background-color: #0c0175;' dir='rtl'>
			<div class='container d-none d-lg-block'>
				<div class='row align-items-center'>
					<div class='col-lg-4'>
						<a href='index.php' class='site-brand'>
							<img src='image/icon/logo.gif' height='100px' alt=''>
						</a>
					</div>
					<div class='col-lg-8'>
						<div class='main-navigation flex'>
							<ul class='main-menu menu-right main-menu--white li-last-0'>
								<li class='menu-item'>
									<a href='javascript:void(0)'>
										<i class='fa fa-home' aria-hidden='true'></i>
									</a>
								</li>
								<!-- Shop -->
								<li class='menu-item has-children'>
									<a href='javascript:void(0)'>
										<i class='fa fa-shopping-bag' aria-hidden='true'></i>
										<i class='fas fa-chevron-down dropdown-arrow '></i>
									</a>
									<ul class='sub-menu  text-right'>
										<li>
											<h3 class='menu-title'><a href='javascript:void(0)'>
													<bdo dir='rtl'>الشركات</bdo>
												</a>
											</h3>
											<ul class='mega-single-block'>";
		$this->query = $this->mysqli->query("SELECT * FROM car");
		$i = 0;
		while ($row_cmp = $this->query->fetch_assoc()) : $com_n = $row_cmp['companyName'];
			echo "
												<li>
													<a class='single-btn' href='shop.php?company=" . urldecode($com_n) . "&pagename=$page_name&pagepath=$page_path'>
														$com_n
													</a> 
												</li>";
			$i++;
			if ($i == 8) break;
		endwhile;
		echo
		"							</ul>
										</li>
									</ul>
								</li>
								<!-- Pages -->
								<li class='menu-item has-children'>
									<a href='javascript:void(0)'>
										<bdo dir='rtl'>صفحات</bdo>
										<i class='fas fa-chevron-down dropdown-arrow '></i>
									</a>
									<ul class='sub-menu text-right'>";
		if (!isset($_SESSION['email']) and !isset($_SESSION['pass'])) : echo "
											<li><a href='login-register.php'><bdo dir='rtl'>تسجيل الدخول </bdo></a>
											</li>
											<li>";
		else : echo "
												<a class='single-btn' href='my-account.php?clintId='" . $row_email['userid'] . "'&pagename=$page_name&pagepath=$page_path'>
													الصفحة الشخصية
												</a> ";
		endif;
		echo "						</li>
											<li><a href='contact.php?pagename=$page_name&pagepath=$page_path'><bdo dir='rtl'>للتواصل معنا</bdo></a>
											</li>
										</ul>
								</li>
								<li class='menu-item'>
									<a href='contact.php?pagename=$page_name&pagepath=$page_path'><bdo dir='rtl'>للتواصل</bdo></a>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>";
	}

	/**
	 * footer function
	 */
	public function Footer($page_name)
	{
		echo "
		<div class='container'>
			<div class='row justify-content-between  section-padding'>
				<div class=' col-xl-3 col-lg-4 col-sm-6'>
					<div class='single-footer pb--40'>
						<div class='brand-footer footer-title'>
							<img src='image/icon/logo.gif' height='100px' alt=''>
						</div>
						<div class='footer-contact'>
							<p><span class='label'><bdo dir='rtl'>العنوان</bdo>:</span>
								<span class='text'><bdo dir='rtl'>شارع الستين, صنعاء,
										اليمن</bdo></span>
							</p>
							<p><span class='label'>
								<i class='fa fa-phone' aria-hidden='true'></i>:</span>
								<span class='text'><a href='tel:+967775286218'>775286218</a></span>
							</p>
							<p><span class='label'>
								<i class='fas fa-envelope'></i>:</span>
								<span class='text'><a href='mailto:'>suport@hastech.com</a></span>
							</p>
						</div>
					</div>
				</div>
				<div class=' col-xl-3 col-lg-2 col-sm-6'>
					<div class='single-footer pb--40'>
						<div class='footer-title'>
							<h3>
								<bdo dir='rtl'>السيارات الموجودة حسب الشركة</bdo>
							</h3>
						</div>
						<ul class='footer-list normal-list'>";
		$i = 0;
		$this->query = $this->mysqli->query("SELECT DISTINCT * FROM car");
		while ($row = $this->query->fetch_assoc()) :
			if ($num_c = $this->mysqli->query("SELECT * FROM car WHERE companyName  LIKE '{$row['companyName']}' ")) {
				echo "			<li class=' d-flex justify-content-between align-items-center'>
								" . $row['companyName'] . "
								<span class='badge bg-primary rounded-pill text-light fs-3'>" . $num_c->num_rows . "</span>
							</li>";
			}
			$i++;
			if ($i == 5) break;
		endwhile;
		echo "
		</ul>
					</div>
					</div>
				<div class=' col-xl-3 col-lg-2 col-sm-6'>
				<div class='single-footer pb--40'>
						<div class='footer-title'>
						<h3>
								<bdo dir='rtl'>السيارات الموجودة حسب النوع</bdo>
								</h3>
								</div>
						<ul class='footer-list normal-list'>";
		$i = 0;
		$this->query = $this->mysqli->query("SELECT DISTINCT * FROM car");
		while ($row = $this->query->fetch_assoc()) :
			if ($num_b = $this->mysqli->query("SELECT * FROM car WHERE brand  LIKE '{$row['brand']}' ")) {
				echo "			<li class=' d-flex justify-content-between align-items-center'>
								" . $row['brand'] . "
								<span class='badge bg-primary rounded-pill text-light fs-3'>" . $num_b->num_rows . "</span>
							</li>";
			}
			$i++;
			if ($i == 5) break;
		endwhile;
		echo "
						</ul>
					</div>
				</div>
				<div class=' col-xl-3 col-lg-4 col-sm-6 '>
					<div class='footer-title'>
						<h3><bdo dir='rtl'>لمعرفة أخر السيارات المضافة</bdo></h3>
					</div>
					<div class='newsletter-form mb--30'>
						<form action='php/mail.php'>
							<input type='hidden' name='pagepath' value = '" . $_SERVER['PHP_SELF'] . "' />
							<input type='hidden' name='pagename' value = '$page_name' />
							<input type='email' class='form-control' placeholder='ادخل الايميل هنا'>
							<button class='btn btn--primary w-100'><bdo dir='rtl'>اشتراك</bdo></button>
						</form>
					</div>
					<div class='social-block'>
						<h3 class='title'><bdo dir='rtl'>وسائل التواصل</bdo></h3>
						<ul class='social-list list-inline' >
							<li class='single-social facebook 'style='padding:10px'>
								<a href=''><i class='ion ion-social-facebook'></i></a>
							</li>
							<li class='single-social twitter'style='padding:10px'>
								<a href=''><i class='ion ion-social-twitter'></i></a>
							</li>
							<li class='single-social google'style='padding:10px'><a href=''><i class='ion ion-social-googleplus-outline'></i></a>
							</li>
							<li class='single-social youtube'style='padding:10px'><a href=''><i class='ion ion-social-youtube'></i></a>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<div class='footer-bottom'>
			<div class='container'>
				<p class='copyright-text'>Copyright © 2021 <a href='#' class='author'>Riyadh Ghazi and Jamal Abd
						Alaziz</a>. All Right Reserved.
					<br> Design By Riyadh Ghazi and Jamal Abd Alaziz
				</p>
			</div>
		</div>";
	}
}
