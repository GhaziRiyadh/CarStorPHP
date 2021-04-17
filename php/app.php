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
	private $without_sinin_sinup;
	private $mysqli;
	private $query;
	/**
	 * index true to add sinin and sinout items
	 */
	function __construct(bool $with_sinin_and_sinup = false)
	{
		$this->without_sinin_sinup = $with_sinin_and_sinup;
		$this->mysqli = new mysqli_connection;
		$this->mysqli = $this->mysqli->connect();
	}

	public function head($page_name)
	{
		print "
			<head>
				<meta charset='utf-8' />
				<meta http-equiv='X-UA-Compatible' content='IE=edge'>
				<title>" . $page_name . "</title>
				<meta name='viewport' content='width=device-width, initial-scale=1'>
				<!-- Use Minified Plugins Version For Fast Page Load -->
				<link rel='stylesheet' type='text/css' media='screen' href='css/plugins.css' />
				<link rel='stylesheet' type='text/css' media='screen' href='css/main.css' />
				<link rel='stylesheet' type='text/css' media='screen' href='css/font.css' />
				<link rel='shortcut icon' type='image\/x-icon' href='image\/icon\/logo.gif'>
			</head>";
	}

	/**
	 * header function
	 */
	public function header(bool $without_sinin_sinup = false)
	{
		if ($without_sinin_sinup) :
			print " <div class='site-header header-2 mb--20 d-none d-lg-block' dir='rtl'>
    				<div class='header-middle pt--10 pb--10'>
    					<div class='container'>
    						<div class='row align-items-center'>
    							<div class='col-lg-3'>
    								<a href='index.php' class='site-brand'>
    									<img src='image/icon/logo.gif' height='100px' alt=''>
    								</a>
    							</div>
    							<div class='col-lg-5'>
    								<form action='php/app.php' class='header-search-block'>
    									<input type='search' name='search' list='search-lg' placeholder='البحث عن سيارة'>
    									<button type='submit' class='btn'>
    										<i class='fa fa-search' aria-hidden='true'></i>
    									</button>
    									<datalist id='search-lg'>";
			$this->query = $this->mysqli->query("SELECT companyName,brand,style FROM car ");
			while ($row = $this->query->fetch_assoc()) : print "
				<option value=" . $row['companyName'] . "></option>
				<option value=" . $row['brand'] . "></option>
				<option value=" . $row['style'] . "></option>";
			endwhile;
			print " </datalist>
    								</form>
    							</div>
                  <div class='cart-widget '>
                      <div class='login-block '>";
			if (!isset($_COOKIE['email'])) : print "
				<form class='login-register.php' action='login-register.php' method='post'>
					<input type='hidden' name='send_page_path' value=" . $_SERVER['PHP_SELF'] . ">
					<a class='font-weight-bold' type='submit'>
						<bdo dir='rtl'>تسجيل الدخول</bdo>
					</a> <br>
					<span><bdo dir='rtl'>او</bdo></span>
					<a type='submit'>
						<bdo dir='rtl'>إنشاء حساب</bdo>
					</a>
				</form>";
			else : print "
				<form action='my-account.php' method='get'>
					<input type='hidden' name='send_user_email' value=" . htmlspecialchars($_COOKIE["email"]) . ">
					<button type='submit'>
						<img src=" . $this->mysqli->query("SELECT photo FROM client WHERE id LIKE " . $this->mysqli->query("SELECT userid FROM clint_email WHERE email LIKE " . htmlspecialchars($_COOKIE["email"]))) . " alt='صورة المستخدم'>
					</button>
				</form> ";
			endif;
			print "</div>
                  </div>
    						</div>
    					</div>
    				</div>
    				<div class='header-bottom bg-primary'>
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
    												<i class='fas fa-chevron-down dropdown-arrow '></i>
    											</a>
    											<ul class='sub-menu text-right'>
    												<h3 class='menu-title'>
    													<a href='javascript:void(0)'>
    														<bdo dir='rtl'>الشركات</bdo>
    													</a>
    												</h3>
    												<ul class='mega-single-block'>";
			$this->query = $this->mysqli->query("SELECT companyName FROM car");
			$i = 0;
			while ($row = $this->query->fetch_assoc()) : print "
				<li>
					<form action='product.php' method='post'>
						<input type='hidden' name=" . $row["companyName"] . " value=" . $row["companyName"] . ">
						<a type='submit' href='shop-grid.php'>" . $row["companyName"] . "</a>
					</form>
				</li>";
				$i++;
				if ($i == 10) break;
			endwhile;
			print "</ul>
    											</ul>
    										</li>
    										<li class='menu-item has-children'>
    											<a href='javascript:void(0)'>
    												<bdo dir='rtl'>صفحات</bdo>
    												<i class='fas fa-chevron-down dropdown-arrow '></i></a>
    											<ul class='sub-menu text-right'>
    												<li><a href='cart.php'>السيارات المحجوزه</a>
    												</li>
    												<li><a href='compare.php'><bdo dir='rtl'>مقارنات</bdo></a>
    												</li>
    												<li><a href='wishlist.php'><bdo dir='rtl'>المفضلة</bdo></a>
    												</li>
    												<li><a href='login-register.php'><bdo dir='rtl'>تسجيل الدخول </bdo></a>
    												</li>
    												<li>";
			if (isset($_COOKIE['email']) and $_COOKIE['email']) : print "
				<form  action='my-account.php' method='GET'>
					<input type='hidden' name='send_clint_email' value=" . $_COOKIE['email'] . ">
					<a type='submit'>الصفحة الشخصية</a>
				</form>";
			endif;
			print "
    												</li>
    												<li><a href='faq.php'><bdo dir='rtl'>الاسئلة الشائعة</bdo></a>
    												</li>
    												<li><a href='contact.php'><bdo dir='rtl'>للتواصل معنا</bdo></a>
    												</li>
    											</ul>
    										</li>
    										<!-- Blog -->
    										<li class='menu-item  mega-menu'>
    											<a href='blog-list-right-sidebar.php'>Blog </a>
    										</li>
    										<li class='menu-item'>
    											<a href='contact.php'><bdo dir='rtl'>للتواصل</bdo></a>
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
    								<img src='image/logo.png' alt=''>
    							</a>
    						</div>
    						<div class='col-md-3 col-5  order-md-3 text-right'>
    							<div class='mobile-header-btns header-top-widget'>
    								<ul class='header-links'>
    									<li class='sin-link'>
    										<a href='shop.php' class='cart-link link-icon'><i class='ion-bag'></i></a>
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
    						<form action='php/app.php' class='header-search-block'>
    							<input type='search' name='search' list='search-lg' placeholder='البحث عن سيارة'>
    							<button type='submit' href='product' name='search_submit' value='search' class='btn'>
    								<i class='fa fa-search' aria-hidden='true'></i>
    							</button>
    							<datalist id='search-lg'>";
			$this->query = $this->mysqli->query("SELECT companyName,brand,style FROM car ");
			while ($row = $this->query->fetch_assoc()) : print "
				<option value=" . $row['companyName'] . "></option>
				<option value=" . $row['brand'] . "></option>
				<option value=" . $row['style'] . "></option>";
			endwhile;
			print "
							</datalist>
    						</form>
    					</div>
    					<!-- search box end -->
    					<!-- mobile menu start -->
    					<div class='mobile-navigation'>
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
    									<a href='shop.php'><i class='fa fa-shopping-bag' aria-hidden='true'></i></a>
    								</li>
    								<li class='menu-item-has-children'>
    									<a href='#'><bdo dir='rtl'>صفحات</bdo></a>
    									<ul class='sub-menu text-right'>
    										<li><a href='cart.php'>السيارات المحجوزه</a>
    										</li>
    										<li><a href='compare.php'><bdo dir='rtl'>مقارنات</bdo></a>
    										</li>
    										<li><a href='wishlist.php'><bdo dir='rtl'>المفضلة</bdo></a>
    										</li>
    										<li><a href='login-register.php'><bdo dir='rtl'>تسجيل الدخول </bdo></a>
    										</li>
    										<li>";
			if (isset($_COOKIE['email']) and $_COOKIE['email']) : print "
												<form  action='my-account.php' method='GET'>
													<input type='hidden' name='send_clint_email' value=" . $_COOKIE['email'] . ">
													<a type='submit'>الصفحة الشخصية</a>
												</form>";
			endif;
			print "</li>
    										<li><a href='faq.php'><bdo dir='rtl'>الاسئلة الشائعة</bdo></a>
    										</li>
    										<li><a href='contact.php'><bdo dir='rtl'>للتواصل معنا</bdo></a>
    										</li>
    									</ul>
    								</li>
    								<li><a href='contact.php'><bdo dir='rtl'>للتواصل</bdo></a>
    								</li>
    							</ul>
    						</nav>
    						<!-- mobile menu navigation end -->
    					</div>
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
    							<img src='image/logo.png' alt=''>
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
    								<li class='menu-item has-children mega-menu'>
    									<a href='javascript:void(0)'>
    										<i class='fa fa-shopping-bag' aria-hidden='true'></i>
    										<i class='fas fa-chevron-down dropdown-arrow '></i>
    									</a>
    									<ul class='sub-menu  text-right'>
    										<li>
    											<h3 class='menu-title'><a href='javascript:void(0)'>
    													<bdo dir='rtl'>الشركات</bdo>
    												</a></h3>
    											<ul class='mega-single-block'>";
			$this->query = $this->mysqli->query("SELECT companyName FROM car");
			$i = 0;
			while ($row = $this->query->fetch_assoc()) : print "
													<li>
														<form action='product.php' method='post'>
															<input type='hidden' name=" . $row["companyName"] . " value=" . $row["companyName"] . ">
															<a type='submit' href='shop-grid.php'>" . $row["companyName"] . "</a>
														</form>
													</li>";
				$i++;
				if ($i == 10) break;
			endwhile;
			print "</ul>
    										</li>
    									</ul>
    								</li>
    								<!-- Pages -->
    								<li class='menu-item has-children'>
    									<a href='javascript:void(0)'>
    										<bdo dir='rtl'>صفحات</bdo>
    										<i class='fas fa-chevron-down dropdown-arrow '></i></a>
    									<ul class='sub-menu text-right'>
    										<li><a href='cart.php'>السيارات المحجوزه</a>
    										</li>
    										<li><a href='compare.php'><bdo dir='rtl'>مقارنات</bdo></a>
    										</li>
    										<li><a href='wishlist.php'><bdo dir='rtl'>المفضلة</bdo></a>
    										</li>
    										<li><a href='login-register.php'><bdo dir='rtl'>تسجيل الدخول </bdo></a>
    										</li>
    										<li>";
			if (isset($_COOKIE['email']) and $_COOKIE['email']) : print "
											<form  action='my-account.php' method='GET'>
												<input type='hidden' name='send_clint_email' value=" . $_COOKIE['email'] . ">
												<a type='submit'>الصفحة الشخصية</a>
											</form>";
			endif;
			print "	          </li>
    										<li><a href='faq.php'><bdo dir='rtl'>الاسئلة الشائعة</bdo></a>
    										</li>
    										<li><a href='contact-2.php'><bdo dir='rtl'>للتواصل معنا</bdo></a>
    										</li>
    									</ul>
    								</li>
    								<li class='menu-item'>
    									<a href='contact.php'><bdo dir='rtl'>للتواصل</bdo></a>
    								</li>
    							</ul>
    						</div>
    					</div>
    				</div>
    			</div>
    		</div>";
		else :
			print "<div class='site-wrapper' id='top'>
    	    <div class='site-header header-2 mb--20 d-none d-lg-block' dir='rtl'>
    				<div class='header-middle pt--10 pb--10'>
    					<div class='container'>
    						<div class='row align-items-center'>
    							<div class='col-lg-3'>
    								<a href='index.php' class='site-brand'>
    									<img src='image/icon/logo.gif' height='100px' alt=''>
    								</a>
    							</div>
    							<div class='col-lg-5'>
    								<form action='php/app.php' class='header-search-block'>
    									<input type='search' name='search' list='search-lg' placeholder='البحث عن سيارة'>
    									<button type='submit' class='btn'>
    										<i class='fa fa-search' aria-hidden='true'></i>
    									</button>
    									<datalist id='search-lg'>";
			$this->query = $this->mysqli->query("SELECT companyName,brand,style FROM car ");
			while ($row = $this->query->fetch_assoc()) : print "
												<option value=" . $row['companyName'] . "></option>
												<option value=" . $row['brand'] . "></option>
												<option value=" . $row['style'] . "></option>";
			endwhile;;
			print " 			</datalist>
    								</form>
    							</div>
                  <div class='cart-widget d-flex'>
                      <div class='login-block mr-auto'>s";
			print "				</div>
									</div>
    						</div>
    					</div>
    				</div>
    				<div class='header-bottom bg-primary'>
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
    												<i class='fas fa-chevron-down dropdown-arrow '></i>
    											</a>
    											<ul class='sub-menu text-right'>
    												<h3 class='menu-title'>
    													<a href='javascript:void(0)'>
    														<bdo dir='rtl'>الشركات</bdo>
    													</a>
    												</h3>
    												<ul class='mega-single-block'>";
			$this->query = $this->mysqli->query("SELECT companyName FROM car");
			$i = 0;
			while ($row = $this->query->fetch_assoc()) : print "
				<li>
					<form action='product.php' method='post'>
						<input type='hidden' name=" . $row["companyName"] . " value=" . $row["companyName"] . ">
						<a type='submit' href='shop-grid.php'>" . $row["companyName"] . "</a>
					</form>
				</li>";
				$i++;
				if ($i == 10) break;
			endwhile;
			print "							</ul>
    										</li>
    										<li class='menu-item has-children'>
    											<a href='javascript:void(0)'>
    												<bdo dir='rtl'>صفحات</bdo>
    												<i class='fas fa-chevron-down dropdown-arrow '></i></a>
    											<ul class='sub-menu text-right'>
    												<li><a href='cart.php'>السيارات المحجوزه</a>
    												</li>
    												<li><a href='compare.php'><bdo dir='rtl'>مقارنات</bdo></a>
    												</li>
    												<li><a href='wishlist.php'><bdo dir='rtl'>المفضلة</bdo></a>
    												</li>
    												<li><a href='login-register.php'><bdo dir='rtl'>تسجيل الدخول </bdo></a>
    												</li>
    												<li>";
			if (isset($_COOKIE['email']) and $_COOKIE['email']) : print "
															<form  action='my-account.php' method='GET'>
																<input type='hidden' name='send_clint_email' value=" . $_COOKIE['email'] . ">
																<a type='submit'>الصفحة الشخصية</a>
															</form>";
			endif;
			print " 							</li>
    												<li><a href='faq.php'><bdo dir='rtl'>الاسئلة الشائعة</bdo></a>
    												</li>
    												<li><a href='contact.php'><bdo dir='rtl'>للتواصل معنا</bdo></a>
    												</li>
    											</ul>
    										</li>
    										<li class='menu-item'>
    											<a href='contact.php'><bdo dir='rtl'>للتواصل</bdo></a>
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
    								<img src='image/logo.png' alt=''>
    							</a>
    						</div>
    						<div class='col-md-3 col-5  order-md-3 text-right'>
    							<div class='mobile-header-btns header-top-widget'>
    								<ul class='header-links'>
    									<li class='sin-link'>
    										<a href='shop.php' class='cart-link link-icon'><i class='ion-bag'></i></a>
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
    						<form action='php/app.php' class='header-search-block'>
    							<input type='search' name='search' list='search-lg' placeholder='البحث عن سيارة'>
    							<button type='submit' href='product' name='search_submit' value='search' class='btn'>
    								<i class='fa fa-search' aria-hidden='true'></i>
    							</button>
    							<datalist id='search-lg'>";
			$this->query = $this->mysqli->query("SELECT companyName,brand,style FROM car ");
			while ($row = $this->query->fetch_assoc()) :
				print " <option value=" . $row['companyName'] . "></option>
											<option value=" . $row['brand'] . "></option>
											<option value=" . $row['style'] . "></option>";
			endwhile;
			print "
							</datalist>
    						</form>
    					</div>
    					<!-- search box end -->
    					<!-- mobile menu start -->
    					<div class='mobile-navigation'>
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
    									<a href='shop.php'><i class='fa fa-shopping-bag' aria-hidden='true'></i></a>
    								</li>
    								<li class='menu-item-has-children'>
    									<a href='#'><bdo dir='rtl'>صفحات</bdo></a>
    									<ul class='sub-menu text-right'>
    										<li><a href='cart.php'>السيارات المحجوزه</a>
    										</li>
    										<li><a href='compare.php'><bdo dir='rtl'>مقارنات</bdo></a>
    										</li>
    										<li><a href='wishlist.php'><bdo dir='rtl'>المفضلة</bdo></a>
    										</li>
    										<li><a href='login-register.php'><bdo dir='rtl'>تسجيل الدخول </bdo></a>
    										</li>
    										<li>";
			if (isset($_COOKIE['email']) and $_COOKIE['email']) : print "
												<form  action='my-account.php' method='GET'>
													<input type='hidden' name='send_clint_email' value=" . $_COOKIE['email'] . ">
													<a type='submit'>الصفحة الشخصية</a>
												</form>";
			endif;
			print "						</li>
    										<li><a href='faq.php'><bdo dir='rtl'>الاسئلة الشائعة</bdo></a>
    										</li>
    										<li><a href='contact.php'><bdo dir='rtl'>للتواصل معنا</bdo></a>
    										</li>
    									</ul>
    								</li>
    								<li><a href='contact.php'><bdo dir='rtl'>للتواصل</bdo></a>
    								</li>
    								<li>";
			if (!isset($_COOKIE['email'])) :
				print " <form class='login-register.php' action='login-register.php' method='post'>
										  <input type='hidden' name='send_page_path' value=" . $_SERVER['PHP_SELF'] . ">
										  <a class=' font-weight-bold' type='submit'>
											  <bdo dir='rtl'>تسجيل الدخول</bdo>
										  </a> <br>
										  <span><bdo dir='rtl'>او</bdo></span>
										  <a type='submit'>
											  <bdo dir='rtl'>إنشاء حساب</bdo>
										  </a>
									  </form>";
			endif;
			echo "			</li>
    							</ul>
    						</nav>
    						<!-- mobile menu navigation end -->
    					</div>
						 <!-- mobile menu end -->
						<div class='off-canvas-bottom'>
						<div class='cart-widget '>
						<div class='login-block '>";
			if (!isset($_COOKIE['email'])) : print "
				  <form class='login-register.php' action='login-register.php' method='post'>
					  <input type='hidden' name='send_page_path' value=" . $_SERVER['PHP_SELF'] . ">
					  <a class=' font-weight-bold' type='submit'>
						  <bdo dir='rtl'>تسجيل الدخول</bdo>
					  </a> <br>
					  <span><bdo dir='rtl'>او</bdo></span>
					  <a type='submit'>
						  <bdo dir='rtl'>إنشاء حساب</bdo>
					  </a>
				  </form>";
			else : print "
				  <form action='my-account.php' method='get'>
					  <input type='hidden' name='send_user_email' value=" . htmlspecialchars($_COOKIE["email"]) . ">
					  <button type='submit'>
						  <img src=" . $this->mysqli->query("SELECT photo FROM client WHERE id LIKE " . $this->mysqli->query("SELECT userid FROM clint_email WHERE email LIKE " . htmlspecialchars($_COOKIE["email"]))) . " alt='صورة المستخدم'>
					  </button>
				  </form> </div> </div>";
			endif;
			print " 		<div class='contact-list mb--10'>
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
    							<img src='image/logo.png' alt=''>
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
    								<li class='menu-item has-children mega-menu'>
    									<a href='javascript:void(0)'>
    										<i class='fa fa-shopping-bag' aria-hidden='true'></i>
    										<i class='fas fa-chevron-down dropdown-arrow '></i>
    									</a>
    									<ul class='sub-menu  text-right'>
    										<li>
    											<h3 class='menu-title'><a href='javascript:void(0)'>
    													<bdo dir='rtl'>الشركات</bdo>
    												</a></h3>
    											<ul class='mega-single-block'>";
			$this->query = $this->mysqli->query("SELECT companyName FROM car");
			$i = 0;
			while ($row = $this->query->fetch_assoc()) : print "
													<li>
														<form action='product.php' method='post'>
															<input type='hidden' name=" . $row["companyName"] . " value=" . $row["companyName"] . ">
															<a type='submit' href='shop-grid.php'>" . $row["companyName"] . "</a>
														</form>
													</li>";
				$i++;
				if ($i == 10) break;
			endwhile;
			print "					</ul>
    										</li>
    									</ul>
    								</li>
    								<!-- Pages -->
    								<li class='menu-item has-children'>
    									<a href='javascript:void(0)'>
    										<bdo dir='rtl'>صفحات</bdo>
    										<i class='fas fa-chevron-down dropdown-arrow '></i></a>
    									<ul class='sub-menu text-right'>
    										<li><a href='cart.php'>السيارات المحجوزه</a>
    										</li>
    										<li><a href='compare.php'><bdo dir='rtl'>مقارنات</bdo></a>
    										</li>
    										<li><a href='wishlist.php'><bdo dir='rtl'>المفضلة</bdo></a>
    										</li>
    										<li><a href='login-register.php'><bdo dir='rtl'>تسجيل الدخول </bdo></a>
    										</li>
    										<li>";
			if (isset($_COOKIE['email']) and $_COOKIE['email']) : print "
											<form  action='my-account.php' method='GET'>
												<input type='hidden' name='send_clint_email' value=" . $_COOKIE['email'] . ">
												<a type='submit'>الصفحة الشخصية</a>
											</form>";
			endif;
			print " 					</li>
    										<li><a href='faq.php'><bdo dir='rtl'>الاسئلة الشائعة</bdo></a>
    										</li>
    										<li><a href='contact-2.php'><bdo dir='rtl'>للتواصل معنا</bdo></a>
    										</li>
    									</ul>
    								</li>
    								<!-- Blog -->
    								<li class='menu-item  mega-menu'>
    									<a href='blog-list-right-sidebar.php'>Blog </a>
    								</li>
    								<li class='menu-item'>
    									<a href='contact.php'><bdo dir='rtl'>للتواصل</bdo></a>
    								</li>
    							</ul>
    						</div>
    					</div>
    				</div>
    			</div>
    		</div>";
		endif;
	}

	/**
	 * footer function
	 */
	public function Footer()
	{
		print "<div class='container'>
			<div class='row justify-content-between  section-padding'>
				<div class=' col-xl-3 col-lg-4 col-sm-6'>
					<div class='single-footer pb--40'>
						<div class='brand-footer footer-title'>
							<img src='image/logo--footer.png' alt=''>
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
		while ($row = $this->mysqli->query("SELECT DISTINCT companyName FROM car")->fetch_assoc()) :
			echo "<li class=' d-flex justify-content-between align-items-center'>";
			echo $row['companyName'];
			print " <span class='badge bg-primary rounded-pill text-light fs-3'>";
			echo $this->mysqli->query("SELECT DISTINCT COUNT(*) FROM car WHERE companyName LIKE " . $row['companyName']);
			echo "</span>
							</li>";
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
		while ($row = $this->mysqli->query("SELECT DISTINCT style FROM car")->fetch_assoc()) :
			echo "<li class=' d-flex justify-content-between align-items-center'>";
			echo $row['style'];
			print " <span class='badge bg-primary rounded-pill text-light fs-3'>";
			echo $this->mysqli->query("SELECT DISTINCT COUNT(*) FROM car WHERE style LIKE " . $row['style']);
			echo "</span></li> ";
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
							<input type='email' class='form-control' placeholder='ادخل الايميل هنا'>
							<button class='btn btn--primary w-100'><bdo dir='rtl'>اشتراك</bdo></button>
						</form>
					</div>
					<div class='social-block'>
						<h3 class='title'><bdo dir='rtl'>وسائل التواصل</bdo></h3>
						<ul class='social-list list-inline'>
							<li class='single-social facebook'>
								<a href=''><i class='ion ion-social-facebook'></i></a>
							</li>
							<li class='single-social twitter'>
								<a href=''><i class='ion ion-social-twitter'></i></a>
							</li>
							<li class='single-social google'><a href=''><i class='ion ion-social-googleplus-outline'></i></a>
							</li>
							<li class='single-social youtube'><a href=''><i class='ion ion-social-youtube'></i></a>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<div class='footer-bottom'>
			<div class='container'>
				<p class='copyright-text'>Copyright © 2019 <a href='#' class='author'>Riyadh Ghazi and Jamal Abd
						Alaziz</a>. All Right Reserved.
					<br> Design By Riyadh Ghazi and Jamal Abd Alaziz
				</p>
			</div>
		</div>";
	}
	/**
	 * paramiter use true for small and false for normal
	 */
	public function card_car($vin, bool $type = false)
	{
		if (!$type) {
			$photo =  $this->mysqli->query("SELECT photo FROM car_photos WHERE vin LIKE " . $vin);
			print "
			<div class='single-slide'>
			<div class='product-card card-style-list'>
					<div class='card-image'>
						<img src='" . $photo . "' alt=''>
					</div>
					<div class='product-card--body'>
						<div class='product-header'>
							<a href='' class='author'>
							<form active = 'product.php'>
									<input type='hidden' value='" . $vin . "'/>
									<input type='submit' value = '" . $this->mysqli->query("SELECT brand FROM car WHERE vin LIKE " . $vin) . "'/>
							</form>
							</a>
							<h3>
								<form active = 'product.php'>
										<input type='hidden' value='" . $vin . "'/>
										<input type='submit' value = '" . $this->mysqli->query("SELECT detail FROM car_dtl WHERE vin LIKE " . $vin)  . "'/>
								</form>
							</h3>
		                  </div>
		                  <div class='price-block'>
		                      <span class='price'>$" . $this->mysqli->query("SELECT price FROM car WHERE vin LIKE " . $vin)  . "</span>
		                      <del class='price-old'>$" . $this->mysqli->query("SELECT price FROM car WHERE vin LIKE " . $vin)  . "</del>
		                      <span class='price-discount'>20%</span>
		                  </div>
		              </div>
		          </div>
		      </div>";
		} else {
			echo "<div class='single-slide'>
					<div class='product-card'>
							<div class='product-header'>
									<a href='' class='author'>
										<form active = 'product.php'>
									<input type='hidden' value='" . $vin . "'/>
									<input type='submit' value = '" . $this->mysqli->query("SELECT brand FROM car WHERE vin LIKE " . $vin) . "'/>
							</form>
									</a>
									<h3>
										<form active = 'product.php'>
											<input type='hidden' value='" . $vin . "'/>
											<input type='submit' value = '" . $this->mysqli->query("SELECT detail FROM car_dtl WHERE vin LIKE " . $vin)  . "'/>
										</form>
									</h3>
							</div>
							<div class='product-card--body'>
									<div class='card-image'>
											<img src='image/products/product-1.jpg' alt=''>
											<div class='hover-contents'>
													<a href='product-details.html' class='hover-image'>
															<img src='image/products/product-1.jpg' alt=''>
													</a>
													<div class='hover-btns pt-3' style= 'height:40% '>
														";
														if (isset($_COOKIE['fivorate']) and $_COOKIE['fivorate']) {
															echo"<a href='wishlist.html' class='single-btn'>
																	<i class='far fa-heart'></i>
															</a>";
														}else {
															echo "<i class='fas fa-heart'></i>"; 
														}
														echo "	<a href='cart.html' class='single-btn'>
																	<i class='fas fa-shopping-basket'></i>
															</a>
															<a href='compare.html' class='single-btn'>
																	<i class='fas fa-random'></i>
															</a>
															<form active = 'index.php'>
															<input type = 'hidden' value = '".$vin."'/>
															<a type='submit' data-toggle='modal' data-target='#quickModal' class='single-btn'>
																	<i class='fas fa-eye'></i>
															</a>
															</form>
													</div>
											</div>
									</div>
									<div class='price-block'>
										<span class='price'>$" . $this->mysqli->query("SELECT price FROM car WHERE vin LIKE " . $vin)  . "</span>
										<del class='price-old'>$" . $this->mysqli->query("SELECT price FROM car WHERE vin LIKE " . $vin)  . "</del>
										<span class='price-discount'>20%</span>
		                  			</div>
							</div>
					</div>
			</div>";
		}
	}
}






// class dbedit
// {
//
//     // use for search
//     function search($search_post)
//     {
//         if (!empty(trim($_POST[$search_post]))) {
//             $search = $this->SELECT('*', 'car', ' like %{$_POST['search']}%');
//             return $search;
//         }
//     }
//
//     // edit with rigister
//     function afterSininSinup(): bool
//     {
//         $virty = false;
//
//         return $virty;
//     }
// }




// this scope for delet wishlist items
// 1- resave the data
// $page_path = $_POST['page_path'];
// $send_vin_car = $POST['send_vin_car'];

// 2- delat from wishlist table