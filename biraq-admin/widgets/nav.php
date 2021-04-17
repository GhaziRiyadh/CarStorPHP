<?php 
    function get_nav($active) {//active value
        print" <div class=\"header-top-area\">
            <div class=\"container\">
                <div class=\"row\">
                    <div class=\"col-lg-4 col-md-4 col-sm-12 col-xs-12\">
                        <div class=\"logo-area\">
                            <a href=\"#\"><img src=\"img/logo/logo.png\" alt=\"\" /></a>
                        </div>
                    </div>
                    <div class=\"col-lg-8 col-md-8 col-sm-12 col-xs-12\">
                        <div class=\"header-top-menu\">
                            <ul class=\"nav navbar-nav notika-top-nav\">
                                <li class=\"nav-item dropdown\">
                                    <a href=\"javascript:{}\" onClick=\"document.location.href='inbox.php'\" data-toggle=\"dropdown\" role=\"button\" aria-expanded=\"false\" class=\"nav-link dropdown-toggle\"><span><i class=\"notika-icon notika-mail\"></i></span></a>
                                </li>
                                <li class=\"nav-item\"><a href=\"logout.php\" role=\"button\" aria-expanded=\"false\" class=\"nav-link dropdown-toggle\"><span><i class=\"notika-icon notika-next\"></i></span><div class=\"spinner4 spinner-4\"></div><div class=\"ntd-ctn\"><span>3</span></div></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Header Top Area -->
        <!-- Mobile Menu start -->
        <div class=\"mobile-menu-area\">
            <div class=\"container\">
                <div class=\"row\">
                    <div class=\"col-lg-12 col-md-12 col-sm-12 col-xs-12\">
                        <div class=\"mobile-menu\">
                            <nav id=\"dropdown\">
                                <ul class=\"mobile-menu-nav\">
                                    <li><a data-toggle=\"collapse\" data-target=\"#Charts\" href=\"javascript:{}\" onClick=\"document.location.href='index.php'\">الرئيسية</a>
                                        <!--<ul class=\"collapse dropdown-header-top\">
                                            <li><a href=\"index.php\">الإدارة</a></li>
                                            <li><a href=\"analytics.php\">الإحصائيات</a></li>
                                        </ul>-->
                                    </li>
                                    <li><a data-toggle=\"collapse\" data-target=\"#demoevent\" href=\"javascrip:{}\" onClick=\"document.location.href='inbox.php'\">البريد</a>
                                    </li>
                                    <li><a data-toggle=\"collapse\" data-target=\"#Pagemob\" href=\"javascript:{}\" onClick=\"document.location.href='contact.php'\">الموظفين</a>
                                        <!--<ul id=\"Pagemob\" class=\"collapse dropdown-header-top\">
                                            <li><a href=\"contact.php\">تواصل</a>
                                            </li>
                                            <li><a href=\"invoice.php\">فواتير</a>
                                            </li>
                                        </ul>-->
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Mobile Menu end -->
        <!-- Main Menu area start-->
        <div class=\"main-menu-area mg-tb-40\">
            <div class=\"container\">
                <div class=\"row\">
                    <div class=\"col-lg-12 col-md-12 col-sm-12 col-xs-12\">
                        <ul class=\"nav nav-tabs notika-menu-wrap menu-it-icon-pro\">
                            <li class=\""; if ($active == 0) print "active"; print"\"><a data-toggle=\"tab\" href=\"javascript:{}\" onClick=\"document.location.href='index.php'\"><i class=\"notika-icon notika-house\"></i> الرئيسية</a>
                            </li>
                            <li class=\""; if ($active == 1) print "active"; print"\"><a data-toggle=\"tab\" href=\"javascript:{}\" onClick=\"document.location.href='inbox.php'\"><i class=\"notika-icon notika-mail\"></i> البريد</a>
                            </li>
                            <li class=\""; if ($active == 2) print "active"; print"\"><a data-toggle=\"tab\" href=\"javascript:{}\" onClick=\"document.location.href='contact.php'\"><i class=\"notika-icon notika-support\"></i> الموظفين</a>
                            </li>
                        </ul>
                        <div class=\"tab-content custom-menu-content\">
                            <!--<div id=\"Home\" class=\"tab-pane in active notika-tab-menu-bg animated flipInX\">
                                <ul class=\"notika-main-menu-dropdown\">
                                    <li><a href=\"index.php\">الإدارة</a>
                                    </li>
                                    <li><a href=\"analytics.php\">الاحصائيات</a>
                                    </li>
                                </ul>
                            </div>
                            <div id=\"Page\" class=\"tab-pane notika-tab-menu-bg animated flipInX\">
                                <ul class=\"notika-main-menu-dropdown\">
                                    <li><a href=\"contact.php\">تواصل</a>
                                    </li>
                                    <li><a href=\"invoice.php\">فاتورة</a>
                                    </li>
                                </ul>
                            </div>-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Main Menu area End-->";
    }
?>