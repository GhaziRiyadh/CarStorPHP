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

$page_name = "بيرق للسيارات";
$page_path = htmlspecialchars($_SERVER['PHP_SELF']);

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
        <!--=================================
        Hero Area
        ===================================== -->
        <section class="hero-area hero-slider-2">
            <div class="container">
                <div class="row align-items-lg-center">
                    <div class="col-lg-8">
                        <div class="  sb-slick-slider" data-slick-setting='{
                                                                "autoplay": true,
                                                                "autoplaySpeed": 8000,
                                                                "slidesToShow": 1,
                                                                "dots":true
                                                                }'>
                            <?php $I = 0;
                            $sql_car = "SELECT * FROM car;";
                            $stmt_car = $datacontrol->query($sql_car);
                            while (
                                $row = $stmt_car->fetch_assoc() and
                                !empty($row['vin']) and
                                $row_dtl = $datacontrol->query("SELECT * FROM car_dtl WHERE vin = {$row['vin']};")->fetch_assoc() and
                                !empty($row_dtl['vin']) and
                                $row_photo = $datacontrol->query("SELECT * FROM car_photos WHERE vin = {$row['vin']};")->fetch_assoc() and
                                !empty($row_photo['photo'])
                            ) : $I++;
                                // echo $row_photo['photo'];
                                if ($I > 6) break; ?>
                                <div class=" single-slide bg-image bg-position-left bg-position-lg-center" data-bg="<?php echo $row_photo['photo']; ?>">
                                    <div class="home-content text-left text-md-center pl--30 pl-md--0">
                                        <div class="row" dir="rtl">
                                            <div class="col-lg-7 col-xl-5 col-md-6 col-sm-6">
                                                <span class=" title-small"><?php echo $row['companyName']; ?></span>
                                                <h2><bdo dir="rtl"></bdo><?php echo $row['brand']; ?></h2>
                                                <p>
                                                    <bdo dir="rtl"><?php echo $row_dtl['detail']; ?></bdo>
                                                </p>
                                                <a href="product.php?car=<?= $row['vin']; ?>&pagename=<?= $page_name; ?>&pagepath=<?= $page_path; ?>" class="btn btn-outlined--primary">
                                                    <bdo dir="rtl">لمزيد من المعلومات</bdo>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endwhile;  ?>
                        </div>
                    </div>
                    <div class="col-lg-4 mt--30 mt-lg--0">
                        <div class="sb-slick-slider hero-products-group-slider product-border-reset" data-slick-setting='{
                                            "autoplay": true,
                                            "autoplaySpeed": 8000,
                                            "slidesToShow": 1,
                                            "rows":2
                                        }' data-slick-responsive='[
                                            {"breakpoint":992, "settings": {"slidesToShow": 2,"rows":2} },
                                            {"breakpoint":768, "settings": {"slidesToShow": 1} },
                                         {"breakpoint":490, "settings": {"slidesToShow": 1} }
                                    ]'>
                            <?php
                            $stmt_car = $datacontrol->query($sql_car);
                            while (
                                $row = $stmt_car->fetch_assoc() and
                                !empty($row['vin']) and
                                $row_dtl = $datacontrol->query("SELECT * FROM car_dtl WHERE vin = {$row['vin']};")->fetch_assoc() and
                                !empty($row_dtl['vin']) and
                                $row_photo = $datacontrol->query("SELECT * FROM car_photos WHERE vin = {$row['vin']};")->fetch_assoc()  and
                                !empty($row_photo['photo'])
                            ) : $I++;
                                if ($I > 12) break; ?>
                                <div class="single-slide">
                                    <div class="product-card card-style-list">
                                        <div class="card-image">
                                            <a href="product.php?car=<?= $row['vin']; ?>&pagename=<?= $page_name; ?>&pagepath=<?= $page_path; ?>">
                                                <img src="<?php echo $row_photo['photo']; ?>" alt="">
                                            </a>
                                        </div>
                                        <div class="product-card--body">
                                            <div class="product-header">
                                                <a href="product.php?car=<?= $row['vin']; ?>&pagename=<?= $page_name; ?>&pagepath=<?= $page_path; ?>" class="author">
                                                    <?php echo $row['brand']; ?>
                                                </a>
                                                <h3>
                                                    <a href="product.php?car=<?= $row['vin']; ?>&pagename=<?= $page_name; ?>&pagepath=<?= $page_path; ?>">
                                                        <?php print($row_dtl['detail']); ?>
                                                    </a>
                                                </h3>
                                            </div>
                                            <div class="price-block">
                                                <span class="price">$<?php echo  $row['price']; ?></span>
                                                <del class="price-old">$<?php echo $row['price']; ?></del>
                                                <span class="price-discount">20%</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endwhile; ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--=================================
        Home Features Section
        ===================================== -->
        <section class="mb--30" dir="rtl">
            <div class="container">
                <div class="row">
                    <div class="col-xl-3 col-md-6 mt--30">
                        <div class="feature-box h-100">
                            <div class="icon ml--15">
                                <i class="fas fa-shipping-fast"></i>
                            </div>
                            <div class="text">
                                <h5><bdo dir="rtl">توصيل الى جميع المحافظات</bdo></h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6 mt--30">
                        <div class="feature-box h-100 ">
                            <div class="icon ml--15">
                                <i class="fas fa-redo-alt"></i>
                            </div>
                            <div class="text">
                                <h5><bdo dir="rtl">الصيانة</bdo></h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6 mt--30">
                        <div class="feature-box h-100 ">
                            <div class="icon ml--15">
                                <i class="fas fa-piggy-bank"></i>
                            </div>
                            <div class="text">
                                <h5>Cash On Delivery</h5>
                                <p></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6 mt--30">
                        <div class="feature-box h-100 ">
                            <div class="icon ml--15">
                                <i class="fas fa-life-ring"></i>
                            </div>
                            <div class="text">
                                <h5><bdo dir="rtl">للمساعدة والدعم </bdo></h5>
                                <p><bdo dir="rtl">اتصل بـ</bdo> : <a href="tel:+967775286218">775286218</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--=================================
        Promotion Section One
        ===================================== -->
        <section class="section-margin">
            <h2 class="sr-only">Promotion Section</h2>
            <div class="container">
                <div class="row space-db--30">
                    <?php $I = 0;
                    $stmt_photo_car = $datacontrol->query("SELECT * FROM car_photos ;");
                    while (
                        $row_photo = $stmt_photo_car->fetch_assoc() and
                        !empty($row_photo['photo'])
                    ) : $I++;
                        if ($I > 2) break; ?>
                        <a href="product.php?car=<?= $row['vin']; ?>&pagename=<?= $page_name; ?>&pagepath=<?= $page_path; ?>" class="col-lg-6 mb--30 ">
                            <img style="height: 180px ;" src="<?php echo $row_photo['photo']; ?>">
                        </a>
                    <?php endwhile; ?>
                </div>
            </div>
        </section>
        <!--=================================
        Home Slider Tab
        ===================================== -->
        <section class="section-padding">
            <h2 class="sr-only">Home Tab Slider Section</h2>
            <div class="container">
                <div class="sb-custom-tab">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="shop-tab" data-toggle="tab" href="#shop" role="tab" aria-controls="shop" aria-selected="true">
                                <bdo dir="rtl">آخر السيارات اضافه</bdo>
                            </a>
                            <span class="arrow-icon"></span>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="men-tab" data-toggle="tab" href="#men" role="tab" aria-controls="men" aria-selected="true">
                                <bdo dir="rtl">سيارات موديل </bdo>
                                2010 <bdo dir="rtl">الى </bdo>
                                2019
                            </a>
                            <span class="arrow-icon"></span>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="woman-tab" data-toggle="tab" href="#woman" role="tab" aria-controls="woman" aria-selected="false">
                                <bdo dir="rtl">سيارات موديل </bdo>
                                2009 <bdo dir="rtl">وما قبل</bdo>

                            </a>
                            <span class="arrow-icon"></span>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent" style="height: 350px !important;">
                        <div class="tab-pane active" id="shop" role="tabpanel" aria-labelledby="shop-tab">
                            <div class="product-slider multiple-row  slider-border-multiple-row  sb-slick-slider" data-slick-setting='{
                            "autoplay": true,
                            "autoplaySpeed": 8000,
                            "slidesToShow": 5,
                            "rows":1,
                            "dots":true }' data-slick-responsive='[
                            {"breakpoint":1200, "settings": {"slidesToShow": 3} },
                            {"breakpoint":768, "settings": {"slidesToShow": 2} },
                            {"breakpoint":480, "settings": {"slidesToShow": 1} },
                            {"breakpoint":320, "settings": {"slidesToShow": 1} } ]'>
                                <?php $I = 0;
                                $stmt_car = $datacontrol->query("SELECT * FROM car GROUP BY add_date;");
                                while (
                                    $row = $stmt_car->fetch_assoc() and
                                    !empty($row['vin']) and
                                    $row_dtl = $datacontrol->query("SELECT * FROM car_dtl WHERE vin = {$row['vin']};")->fetch_assoc() and
                                    !empty($row_dtl['vin']) and
                                    $row_photo = $datacontrol->query("SELECT * FROM car_photos WHERE vin = {$row['vin']};")->fetch_assoc()  and
                                    !empty($row_photo['photo'])
                                ) : $I++;
                                    if ($I > 24) break; ?>
                                    <div class="single-slide">
                                        <div class="product-card">
                                            <div class="product-header">
                                                <a href="product.php?car=<?= $row['vin']; ?>&pagename=<?= $page_name; ?>&pagepath=<?= $page_path; ?>" class="author">
                                                    <?php echo $row['brand']; ?>
                                                </a>
                                                <h3>
                                                    <a href="product.php?car=<?= $row['vin']; ?>&pagename=<?= $page_name; ?>&pagepath=<?= $page_path; ?>">
                                                        <?php echo $row_dtl['detail']; ?>
                                                    </a>
                                                </h3>
                                            </div>
                                            <div class="product-card--body">
                                                <div class="card-image">
                                                    <a href="product.php?car=<?= $row['vin']; ?>&pagename=<?= $page_name; ?>&pagepath=<?= $page_path; ?>">
                                                        <img src="<?php echo $row_photo['photo']; ?>" alt="">
                                                    </a>
                                                    <div class="hover-contents">
                                                        <div class="hover-btns" style="padding: 7px;">
                                                            <a href="wishlist.html" class="single-btn">
                                                                <i class="fas fa-heart"></i>
                                                            </a>
                                                            <a class="single-btn" href="product.php?car=<?= $row['vin']; ?>&pagename=<?= $page_name; ?>&pagepath=<?= $page_path; ?>">
                                                                <i class="fas fa-eye"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="price-block">
                                                    <span class="price">$<?php echo $row['price']; ?></span>
                                                    <del class="price-old">$<?php echo $row['price']; ?></del>
                                                    <span class="price-discount">20%</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endwhile; ?>
                            </div>
                        </div>
                        <div class="tab-pane" id="men" role="tabpanel" aria-labelledby="men-tab">
                            <div class=" product-slider multiple-row slider-border-multiple-row sb-slick-slider" data-slick-setting='{
                                        "autoplay": true,
                                        "autoplaySpeed": 8000,
                                        "slidesToShow": 5,
                                        "rows":1,
                                        "dots":true
                                    }' data-slick-responsive='[
                                        {"breakpoint":1200, "settings": {"slidesToShow": 3} },
                                        {"breakpoint":768, "settings": {"slidesToShow": 2} },
                                        {"breakpoint":480, "settings": {"slidesToShow": 1} },
                                        {"breakpoint":320, "settings": {"slidesToShow": 1} }
                                    ]'>
                                <?php $I = 0;
                                $stmt_car = $datacontrol->query("SELECT * FROM car WHERE model BETWEEN '2010' AND '2019';");
                                while (
                                    $row = $stmt_car->fetch_assoc() and
                                    !empty($row['vin']) and
                                    $row_dtl = $datacontrol->query("SELECT * FROM car_dtl WHERE vin = {$row['vin']};")->fetch_assoc() and
                                    !empty($row_dtl['vin']) and
                                    $row_photo = $datacontrol->query("SELECT * FROM car_photos WHERE vin = {$row['vin']};")->fetch_assoc()  and
                                    !empty($row_photo['photo'])
                                ) : $I++;
                                    if ($I > 24) break; ?>
                                    <div class="single-slide">
                                        <div class="product-card">
                                            <div class="product-header">
                                                <a href="product.php?car=<?= $row['vin']; ?>&pagename=<?= $page_name; ?>&pagepath=<?= $page_path; ?>" class="author">
                                                    <?php echo $row['brand']; ?>
                                                </a>
                                                <h3>
                                                    <a href="product.php?car=<?= $row['vin']; ?>&pagename=<?= $page_name; ?>&pagepath=<?= $page_path; ?>">
                                                        <?php echo $row_dtl['detail']; ?>
                                                    </a>
                                                </h3>
                                            </div>
                                            <div class="product-card--body">
                                                <div class="card-image">
                                                    <a href="product.php?car=<?= $row['vin']; ?>&pagename=<?= $page_name; ?>&pagepath=<?= $page_path; ?>">
                                                        <img src="<?php echo $row_photo['photo']; ?>" alt="">
                                                    </a>
                                                    <div class="hover-contents">
                                                        <div class="hover-btns" style="padding: 7px;">
                                                            <a href="wishlist.html" class="single-btn">
                                                                <i class="fas fa-heart"></i>
                                                            </a>
                                                            <a class="single-btn" href="product.php?car=<?= $row['vin']; ?>&pagename=<?= $page_name; ?>&pagepath=<?= $page_path; ?>">
                                                                <i class="fas fa-eye"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="price-block">
                                                    <span class="price">$<?php echo $row['price']; ?></span>
                                                    <del class="price-old">$<?php echo $row['price']; ?></del>
                                                    <span class="price-discount">20%</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endwhile; ?>
                            </div>
                        </div>
                        <div class="tab-pane" id="woman" role="tabpanel" aria-labelledby="woman-tab">
                            <div class="product-slider multiple-row  slider-border-multiple-row  sb-slick-slider" data-slick-setting='{
                                        "autoplay": true,
                                        "autoplaySpeed": 8000,
                                        "slidesToShow": 5,
                                        "rows":1,
                                        "dots":true
                                    }' data-slick-responsive='[
                                        {"breakpoint":1200, "settings": {"slidesToShow": 3} },
                                        {"breakpoint":768, "settings": {"slidesToShow": 2} },
                                        {"breakpoint":480, "settings": {"slidesToShow": 1} },
                                        {"breakpoint":320, "settings": {"slidesToShow": 1} }
                                    ]'>
                                <?php $I = 0;
                                $stmt_car = $datacontrol->query("SELECT * FROM car WHERE model < '2010'");
                                while (
                                    $row = $stmt_car->fetch_assoc() and
                                    !empty($row['vin']) and
                                    $row_dtl = $datacontrol->query("SELECT * FROM car_dtl WHERE vin = {$row['vin']};")->fetch_assoc() and
                                    !empty($row_dtl['vin']) and
                                    $row_photo = $datacontrol->query("SELECT * FROM car_photos WHERE vin = {$row['vin']};")->fetch_assoc()  and
                                    !empty($row_photo['photo'])
                                ) : $I++;
                                    if ($I > 24) break; ?>
                                    <div class="single-slide">
                                        <div class="product-card">
                                            <div class="product-header">
                                                <a href="product.php?car=<?= $row['vin']; ?>&pagename=<?= $page_name; ?>&pagepath=<?= $page_path; ?>" class="author">
                                                    <?php echo $row['brand']; ?>
                                                </a>
                                                <h3>
                                                    <a href="product.php?car=<?= $row['vin']; ?>&pagename=<?= $page_name; ?>&pagepath=<?= $page_path; ?>">
                                                        <?php echo $row_dtl['detail']; ?>
                                                    </a>
                                                </h3>
                                            </div>
                                            <div class="product-card--body">
                                                <div class="card-image">
                                                    <a href="product.php?car=<?= $row['vin']; ?>&pagename=<?= $page_name; ?>&pagepath=<?= $page_path; ?>">
                                                        <img src="<?php echo $row_photo['photo']; ?>" alt="">
                                                    </a>
                                                    <div class="hover-contents">
                                                        <div class="hover-btns" style="padding: 7px;">
                                                            <a href="wishlist.html" class="single-btn">
                                                                <i class="fas fa-heart"></i>
                                                            </a>
                                                            <a class="single-btn" href="product.php?car=<?= $row['vin']; ?>&pagename=<?= $page_name; ?>&pagepath=<?= $page_path; ?>">
                                                                <i class="fas fa-eye"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="price-block">
                                                    <span class="price">$<?php echo $row['price']; ?></span>
                                                    <del class="price-old">$<?php echo $row['price']; ?></del>
                                                    <span class="price-discount">20%</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endwhile; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--=================================
        CHILDREN’S BOOKS SECTION
        ===================================== -->
        <section class="section-margin">
            <div class="container">
                <div class="section-title section-title--bordered">
                    <h2><bdo dir="rtl">آخر الاصدار</bdo></h2>
                </div>
                <div class="product-slider product-list-slider slider-border-single-row sb-slick-slider" data-slick-setting='{
                                            "autoplay": true,
                                            "autoplaySpeed": 8000,
                                            "slidesToShow":3,
                                            "dots":true
                                        }' data-slick-responsive='[
                                            {"breakpoint":1200, "settings": {"slidesToShow": 2} },
                                            {"breakpoint":992, "settings": {"slidesToShow": 2} },
                                            {"breakpoint":575, "settings": {"slidesToShow": 1} },
                                            {"breakpoint":490, "settings": {"slidesToShow": 1} }
                                        ]'>
                    <?php $I = 0;
                    $stmt_car = $datacontrol->query("SELECT * FROM car ORDER BY model");
                    while (
                        $row = $stmt_car->fetch_assoc() and
                        !empty($row['vin']) and
                        $row_dtl = $datacontrol->query("SELECT * FROM car_dtl WHERE vin = {$row['vin']};")->fetch_assoc() and
                        !empty($row_dtl['vin']) and
                        $row_photo = $datacontrol->query("SELECT * FROM car_photos WHERE vin = {$row['vin']};")->fetch_assoc()  and
                        !empty($row_photo['photo'])
                    ) : $I++;
                        if ($I > 6) break; ?>
                        <div class="single-slide" style="height: 112px !important;">
                            <div class="product-card card-style-list">
                                <div class="card-image">
                                    <a href="product.php?car=<?php echo $row['vin']; ?>">
                                        <img src="<?php echo $row_photo['photo']; ?>" alt="">
                                    </a>
                                </div>
                                <div class="product-card--body">
                                    <div class="product-header">
                                        <a href="product.php?car=<?php echo $row['vin']; ?>" class="author">
                                            <?php echo $row['brand']; ?>
                                        </a>
                                        <h3>
                                            <a href="product.php?car=<?php echo $row['vin']; ?>">
                                                <?php print($row_dtl['detail']); ?>
                                            </a>
                                        </h3>
                                    </div>
                                    <div class="price-block">
                                        <span class="price">$<?php echo  $row['price']; ?></span>
                                        <del class="price-old">$<?php echo $row['price']; ?></del>
                                        <span class="price-discount">20%</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                </div>
            </div>
        </section>
        <!--=================================
        Footer
        ===================================== -->
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
                        <a href="product.php?car=<?php echo $row_photo['vin']; ?>"><img height="20%" src="<?php echo $row_photo['photo']; ?>" alt=""></a>
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