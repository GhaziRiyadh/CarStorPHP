<?php
	include("./widgets/header.php");
    get_header("خطأ");
    print "<div class=\"error-page-area\">
        <div class=\"error-page-wrap\">
            <i class=\"notika-icon notika-close\"></i>
            <h2>خطاً <span class=\"counter\">404</span></h2>
            <p>المعذرة، الصفحة التي تبحث عنها قد تم ازالتها او انها لم تكن موجوة اصلاً. حاول تعديل رابط الوصول او عد الى الصفحة الرئيسية</p>
            <a href=\"index.php\" class=\"btn\">الرشيسية</a>
            <a href=\"#\" class=\"btn error-btn-mg\">تبليغ بالمشكلة</a>
        </div>
    </div>";
	include("./widgets/js.php");
?>