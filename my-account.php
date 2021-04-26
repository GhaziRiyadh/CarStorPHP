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

$clintemail = $clientId = $page_name = $profile_user = '';
if (isset($_GET['clientId'])) {
	setcookie('clientId', $_GET['clientId'], time() + 3600);
}
if (isset($_COOKIE['clientId'])) {
	$clientId = $_COOKIE['clientId'];
	if ($clint_result = $datacontrol->query("SELECT * FROM client WHERE id = $clientId")) {
		while ($client_row = $clint_result->fetch_assoc()) {
			$page_name = $client_row['fullname'];
		}
	}
}

$page_path = htmlspecialchars($_SERVER['PHP_SELF']);

?>

<!DOCTYPE html>
<html lang="ar">

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

		<?php if (isset($_COOKIE['email']) and $_COOKIE['email']) $profile_user = $_COOKIE['Email']; ?>
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
																		<?php if (isset($_COOKIE['fivorate_car'])) :
																			foreach ($_COOKIE['fivorate_car'] as $key => $vin) :
																				if (
																					$fivorate_result = $datacontrol->query("SELECT * FROM car WHERE vin =$key ") and
																					$fivorate_result_dtl = $datacontrol->query("SELECT * FROM car_dtl WHERE vin = $key;") and
																					$fivorate_result_photo = $datacontrol->query("SELECT * FROM car_photos WHERE vin = $key;")
																				) :
																					while (
																						$fivorate_rows = $fivorate_result->fetch_assoc() and
																						!empty($fivorate_rows['vin']) and
																						$fivorate_rows_dtl = $fivorate_result_dtl->fetch_assoc() and
																						!empty($fivorate_rows_dtl['vin']) and
																						$fivorate_rows_photo = $fivorate_result_photo->fetch_assoc()  and
																						!empty($fivorate_rows_photo['photo'])
																					) :  ?>
																						<tr>
																							<td class="pro-thumbnail">
																								<a href="product.php?car=<?= $fivorate_rows['vin']; ?>&pagename=<?= $page_name . "&pagepath=" . $page_path; ?>">
																									<img src="<?= $fivorate_rows_photo['photo']; ?>" alt="<?= $fivorate_rows['brand']; ?> photo">
																								</a>
																							</td>
																							<td class="pro-title">
																								<a href="product.php?car=<?= $fivorate_rows['vin']; ?>&pagename=<?= $page_name . "&pagepath=" . $page_path; ?>" class="author">
																									<bdo dir="rtl"><?php echo $fivorate_rows['brand']; ?></bdo>
																								</a>
																							</td>
																							<td class="pro-price"><span>$<?php echo $fivorate_rows['price']; ?></span></td>
																							<td class="pro-quantity">
																								<div class="pro-qty">
																									<div class="count-input-block">
																										<bdo dir="rtl"><?php echo $fivorate_rows['style']; ?></bdo>
																									</div>
																								</div>
																							</td>
																							<td class="pro-subtotal">
																								<span>
																									<?php echo $add_date; ?>
																								</span>
																							</td>
																							<td class="pro-remove">
																								<?php if (isset($_GET['cookie_key']) and isset($_GET['car'])) {
																									setcookie('fivorate_car[' . $_GET['cookie_key'] . ']', null, +200000);
																								} ?>
																								<a href="<?= htmlspecialchars($_SERVER['PHP_SELF']); ?>?car=<?= $fivorate_rows['vin']; ?>&pagename=<?= $page_name . "&type=delete"; ?>">
																									<i class="far fa-trash-alt"></i>
																								</a>
																							</td>
																						</tr>
																		<?php endwhile;
																				endif;
																			endforeach;
																		endif; ?>
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
									<div class="tab-pane fade text-right" id="account-info" role="tabpanel">
										<div class="myaccount-content">
											<h3><bdo dir="rtl">تعديل البيانات</bdo></h3>
											<div class="account-details-form">
												<!-- end update data in database  -->
												<?php
												$fullname = addslashes(strip_tags($_POST['fullname']));
												$gender = $_POST['gender'];
												$city = $_POST['city'];
												$country = $_POST['country'];
												$photo = $_POST['newprofile'];
												if (isset($_POST['newprofile']) and isset($_POST['fullname']) and isset($_POST['email']) and isset($_POST['current-pwd'])) :
													$updateSQL = "	UPDATE
																		client
																	SET
																		fullname = '$fullname',
																		gender = '$gender',
																		city = '$city',
																		country = '$country',
																		photo = '$photo'
																	WHERE id = $clientId;";
													$updateSQL_email = "	UPDATE
																				client_email
																			SET
																				email = '" . $_POST['email'] . "',
																				password = '" . $_POST['current-pwd'] . "'
																			WHERE id = $clientId;";

													if ($update_result = $datacontrol->query($updateSQL) and $update_result_email = $datacontrol->query($updateSQL_email)) :
														echo "
															<div class='alert alert-success alert-dismissible fade show text-right' role='alert'>
																<strong><bdo dir='rtl'>تمت العملية بنجاح!</bdo></strong>
																<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
															</div>";
													else :
														echo '
															<div class="alert alert-warning alert-dismissible fade show" role="alert">
																<strong><bdo dir="rtl">حدث خطأ ما: !!</bdo></strong><bdo dir="rtl">من فضلك اعد المحاولة</bdo>
																<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
															</div>';
														echo "fullname = '" . $_POST['fullname'] . "<br>',
																gender = '" . $_POST['gender'] . "<br>',
																city = '" . $_POST['city'] . "<br>',
																country = '" . $_POST['country'] . "<br>',
																photo = '" . $_POST['newprofile'] . "<br>'
																email = '" . $_POST['email'] . "<br>',
																password = '" . $_POST['current-pwd'] . "<br>'";
													endif;
												endif;
												if ($clientId) :
													$update_sql_show = "SELECT * FROM client WHERE id = $clientId";
													$update_sql_show_email = "SELECT * FROM client_email WHERE userid = $clientId";
													if ($update_result_show = $datacontrol->query($update_sql_show) and $update_result_show_email = $datacontrol->query($update_sql_show_email)) :
														while ($update_result_show_row = $update_result_show->fetch_assoc() and $update_result_show_row_email = $update_result_show_email->fetch_assoc()) :
												?>
															<form action="<?= htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
																<div class="row">
																	<div class="col-lg-12 col-12  mb--30">
																		<label for="newProfile">
																			<img class="rounded mx-auto d-block" src="<?= $update_result_show_row['photo']; ?>" alt="">
																		</label>
																		<input type="file" name="newprofile" hidden id="newProfile" value="<?= $update_result_show_row['photo']; ?>">
																	</div>
																	<div class="col-12  mb--30 ">
																		<h6><bdo dir="rtl">الاسم</bdo></h6>
																		<input id="fullname" name="fullname" placeholder="الاسم" value="<?php echo $update_result_show_row['fullname']; ?>" type="text">
																	</div>
																	<div class="col-12 row  mb--30 ">
																		<div class="col-4">
																			<h6><bdo dir="rtl">المدينة</bdo></h6>
																			<input id="city" name="city" list="city_list" placeholder="المدينة" value="<?php echo $update_result_show_row['city']; ?>" type="text">
																			<datalist id="city_list">
																				<?php if ($city_op_result = $datacontrol->query("SELECT DISTINCT city FROM client")) :
																					while ($city_op_row = $city_op_result->fetch_assoc() and !empty($city_op_row['city'])) : ?>
																						<option value="<?php echo $city_op_row['city']; ?>"></option>
																				<?php endwhile;
																				endif; ?>
																			</datalist>
																		</div>
																		<div class="col-4">
																			<h6><bdo dir="rtl">الدولة</bdo></h6>
																			<input id="country" name="country" list="country_list" placeholder="الدولة" value="<?php echo $update_result_show_row['country']; ?>" type="text">
																			<datalist id="country_list">
																				<?php if ($country_op_result = $datacontrol->query("SELECT DISTINCT country FROM client")) :
																					while ($country_op_row = $country_op_result->fetch_assoc() and !empty($country_op_row['country'])) : ?>
																						<option value="<?php echo $country_op_row['country']; ?>"></option>
																				<?php endwhile;
																				endif; ?>
																			</datalist>
																		</div>
																		<div class="col-4">
																			<h6><bdo dir="rtl">الجنس</bdo></h6>
																			<input id="gender" name="gender" list="gender_list" placeholder="الجنس" value="<?php echo $update_result_show_row['gender']; ?>" type="text">
																			<datalist id="gender_list">
																				<option value="ذكر"></option>
																				<option value="انثى"></option>
																				<option value="عدم الافصاح"></option>
																			</datalist>
																		</div>
																	</div>
																	<div class="col-12  mb--30">
																		<h6><bdo dir="rtl">البريد الالكتروني</bdo></h6>
																		<input id="email" name="email" placeholder="البريد الالكتروني" value="<?php echo $update_result_show_row_email['email']; ?>" type="email">
																	</div>
																	<div class="col-12  mb--30">
																		<h4><bdo dir="rtl">تغيير كلمة المرور</bdo></h4>
																	</div>
																	<div class="col-12  mb--30">
																		<h6><bdo dir="rtl">كلمة المرور</bdo></h6>
																		<input id="current-pwd" name="current-pwd" placeholder="كلمة المرور الحالية" value="<?php echo $update_result_show_row_email['password']; ?>" type="text">
																		<small class="text-muted">
																			<bdo dir="rtl">يمكنك التعديل مباشرة على كلمة المرور</bdo>
																		</small>
																	</div>
																	<div class="col-12">
																		<button type="submit" class="btn btn--primary"><bdo dir="rtl">حفظ التتغييرات</bdo></button>
																	</div>
																</div>
															</form>
												<?php endwhile;
													endif;
												endif; ?>
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