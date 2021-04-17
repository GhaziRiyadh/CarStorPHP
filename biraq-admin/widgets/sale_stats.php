<?php
    function get_salestat($sale_stat, $view_count, $link_press, $traf) {
        print "<div class=\"sale-statistic-area\">
        <div class=\"container\">
            <div class=\"row\">
                <div class=\"col-lg-9 col-md-8 col-sm-7 col-xs-12\">
                    <div class=\"sale-statistic-inner notika-shadow mg-tb-30\">
                        <div class=\"curved-inner-pro\">
                            <div class=\"curved-ctn\">
                                <h2 style=\"text-align: right;\">احصائيات المبيعات</h2>
                                <p>معطل الى ان يتم اضافة خدمات الدفع</p>
                            </div>
                        </div>
                        <div id=\"curved-line-chart\" class=\"flot-chart-sts flot-chart\">$sale_stat</div>
                    </div>
                </div>
                <div class=\"col-lg-3 col-md-4 col-sm-5 col-xs-12\">
                    <div class=\"statistic-right-area notika-shadow mg-tb-30 sm-res-mg-t-0\">
                        <div class=\"past-day-statis\">
                            <h2>لآخر 30 يوم</h2>
                            <p>زوار موقعك خلال الشهر المنصرم</p>
                        </div>
                        <div class=\"dash-widget-visits\"></div>
                        <div class=\"past-statistic-an\">
                            <div class=\"past-statistic-ctn\">
                                <h3><span class=\"counter\">$view_count</span></h3>
                                <p>مشاهدة الصفخات</p>
                            </div>
                            <div class=\"past-statistic-graph\">
                                <div class=\"stats-bar\"></div>
                            </div>
                        </div>
                        <div class=\"past-statistic-an\">
                            <div class=\"past-statistic-ctn\">
                                <h3><span class=\"counter\">$link_press</span></h3>
                                <p>ضغطات الروابط</p>
                            </div>
                            <div class=\"past-statistic-graph\">
                                <div class=\"stats-line\"></div>
                            </div>
                        </div>
                        <div class=\"past-statistic-an\">
                            <div class=\"past-statistic-ctn\">
                                <h3><span class=\"counter\">$traf</span></h3>
                                <p>الزوار</p>
                            </div>
                            <div class=\"past-statistic-graph\">
                                <div class=\"stats-bar-2\"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>";
    }
?>