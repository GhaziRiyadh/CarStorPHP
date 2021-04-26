<?php

session_start();
if (isset($_SESSION['page_count'])) {
	$_SESSION['page_count'] += 1;
} else {
	$_SESSION['page_count'] = 1;
}
echo 'You are visitor number ' . $_SESSION['page_count'];
setcookie("biraq_cookie");
//end session;



//including files
require_once 'php/app.php';

$datacontrol = new mysqli_connection();
$datacontrol = $datacontrol->connect();

$viw = new widget;

?>


<!DOCTYPE html>
<html lang="ar">

<head>
	<?php $viw->head("تسجيل الدخول او إنشاء حساب", false);
	?>

<body>
	<div class="site-wrapper" id="top">
		<?php $viw->header(); ?>
		<section class="breadcrumb-section" dir="rtl">
			<h2 class="sr-only">Site Breadcrumb</h2>
			<div class="container">
				<div class="breadcrumb-contents">
					<nav aria-label="breadcrumb">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="index.php"><bdo dir="rtl"><?php echo $_POST['send_page_path']; ?></bdo></a>
							</li>
							<li class="breadcrumb-item active"><bdo dir="rtl">تسجيل الدخول او انشاء حساب</bdo></li>
						</ol>
					</nav>
				</div>
			</div>
		</section>
		<!--=============================================
    =            Login Register page content         =
    =============================================-->
		<main class="page-section inner-page-sec-padding-bottom text-right" dir="rtl">
			<div class="container">
				<div class="row ">
					<div class="col-sm-12 col-md-12 col-xs-12 col-lg-6 mb--30 mb-lg--0 ">
						<!-- Login Form s-->
						<form method="GET" action="php/register.php">
							<div class="login-form text-right" dir="rtl">
								<h4 class="login-title"><bdo dir="rtl">إنشاء حساب</bdo></h4>
								<div class="row ">
									<div class=" col-md-12 col-12 mb--15 d-flex">
										<label class="align-content-center m-auto" for="profile">
											<img id="userProfile" class="rounded-circle" height="50px" src="image/icon/user.png" alt="">
										</label>
										<input hidden type="file" id="profile" onclick="$('#userProfile').attr('src',$('#profile').val())" name="profile">
									</div>
									<div class=" col-md-12 col-12 mb--15">
										<label for=" name"><bdo dir="rtl">الاسم كامل</bdo></label>
										<input class="mb-0 form-control " type="text" id="name" name="fullName" placeholder="ادخل الاسم كامل" required>
									</div>
									<div class="col-12 mb--20">
										<label for="email"><bdo dir="rtl">البريد الاكتروني</bdo></label>
										<input class="mb-0 form-control " type="email" id="email" required name="Email" placeholder="البريد الاكتروني">
										<small class="invalid-feedback">
											<bdo dir="rtl"><?php echo $password_err; ?></bdo>
										</small>
									</div>
									<div class="col-lg-6 mb--20">
										<label for="password"><bdo dir="rtl">كلمة المرور</bdo></label>
										<input class="mb-0 form-control " type="password" id="password" required name="Password_logup" placeholder="كلمة المرور">
										<small class="invalid-feedback">
											<bdo dir="rtl"><?php echo $email_err; ?></bdo>
										</small>
									</div>
									<div class="col-lg-6 mb--20">
										<label for="password"><bdo dir="rtl">تأكيد كلمة المرورٍ</bdo></label>
										<input class="mb-0 form-control " type="password" id="repeat-password" name="confirm_password" required placeholder="تأكيد كلمة المرورٍ">
										<small class="invalid-feedback">
											<bdo dir="rtl"><?php echo $confirm_password_err; ?></bdo>
										</small>
									</div>
									<div class="col-lg-12 mb--20">
										<label for="phoneNumber"><bdo dir="rtl">رقم الجوال</bdo></label>
										<input class="mb-0 form-control " type="number" id="phoneNumber" required name="phoneNumber_logup" placeholder="رقم التلفون">
									</div>
									<div class="col-md-12">
										<button type="submit" class="btn btn-outlined">
											<bdo dir="rtl">إنشاء</bdo>
										</button>
									</div>
								</div>
							</div>
							<input type="hidden" name="send_path" value="<?= $_POST['send_page_path']; ?>">
							<input type="hidden" name="index_path" value="<?= $_SERVER['PHP_SELF']; ?>">
						</form>
					</div>
					<div class="col-sm-12 col-md-12 col-lg-6 col-xs-12">
						<form action="login-register.php" method="GET">
							<div class="login-form text-right" dir="rtl">
								<h4 class="login-title"><bdo dir="rtl">تسجيل الدخول</bdo></h4>
								<div class="row">
									<div class="col-md-12 col-12 mb--15">
										<label for="email"><bdo dir="rtl"></bdo></label>
										<input class="mb-0 form-control " name="email" type="email" id="email1" placeholder="البريد الاكتروني" required>
										<small class="text-muted">
											<bdo dir="rtl"><?php echo $username_err_login; ?></bdo>
										</small>
									</div>
									<div class="col-12 mb--20">
										<label for="password"><bdo dir="rtl"></bdo></label>
										<input class="mb-0 form-control " name="password_login" type="password" id="login-password" required placeholder="كلمة المرور">
										<small class="text-muted">
											<bdo dir="rtl"><?php echo $password_login_err_login; ?></bdo>
										</small>
									</div>
									<div class="col-md-12">
										<button type="submit" class="btn btn-outlined">تسجيل</button>
									</div>
								</div>
							</div>
							<input type="hidden" name="send_path" value="<?= $_POST['send_page_path']; ?>">
						</form>
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
				while ($row = $datacontrol->query("SELECT * FROM car_photos")->fetch_assoc()) : ?>
					<div class="single-slide">
						<img src="<?php if (!empty($row['photo'])) {
										echo $row['photo'];
										$i++;
									} ?>" alt="">
					</div>
				<?php if ($i == 12) break;
				endwhile; ?>
			</div>
		</div>
	</section>
	<!--=================================
    Footer Area
===================================== -->
	<?php $viw->Footer(); ?>
</body>

</html>