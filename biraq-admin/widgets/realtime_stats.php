<?php
    function get_realtime_stats($visit_24h, $visit_30m) {
        print "<div class=\"realtime-statistic-area\">
        <div class=\"container\">
            <div class=\"row\">
                <div class=\"col-lg-4 col-md-6 col-sm-6 col-xs-12\">
                    <div class=\"realtime-wrap notika-shadow mg-t-30\">
                        <div class=\"realtime-ctn\">
                            <div class=\"realtime-title\">
                                <h2>الزيارات الفعلية</h2>
                            </div>
                        </div>
                        <div class=\"realtime-visitor-ctn\">
                            <div class=\"realtime-vst-sg\">
                                <h4><span class=\"counter\">$visit_24h</span></h4>
                                <p>زائر خلال آخر 24 ساعة</p>
                            </div>
                            <div class=\"realtime-vst-sg\">
                                <h4><span class=\"counter\">$visit_30m</span></h4>
                                <p>زائر خلال آخر 30 دقيقة</p>
                            </div>
                        </div>
                        <div class=\"realtime-map\">
                            <div class=\"vectorjsmarp\" id=\"world-map\"></div>
                        </div>
                    </div>
                </div>";
    }
?>