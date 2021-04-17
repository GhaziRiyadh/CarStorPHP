<?php
    function get_tns($traf, $sale) {
        print "<div class=\"notika-status-area\">
    <div class=\"container\">
        <div class=\"row\">
            <div class=\"col-lg-6 col-md-6 col-sm-6 col-xs-12\">
                <div class=\"wb-traffic-inner notika-shadow sm-res-mg-t-30 tb-res-mg-t-30\">
                    <div class=\"website-traffic-ctn\">
                        <h2><span class=\"counter\"> $traf </span></h2>
                        <p>اجمالي حركة الموقع </p>
                    </div>
                    <div class=\"sparkline-bar-stats1\"> $traf </div>
                </div>
            </div>
            <div class=\"col-lg-6 col-md-6 col-sm-6 col-xs-12\">
                <div class=\"wb-traffic-inner notika-shadow sm-res-mg-t-30 tb-res-mg-t-30 dk-res-mg-t-30\">
                    <div class=\"website-traffic-ctn\">
                        <h2><span class=\"counter\">$sale</span></h2>
                        <p>اجمالي المبيعات عبر الانترنت</p>
                    </div>
                    <div class=\"sparkline-bar-stats3\">  </div>
                </div>
            </div>
        </div>
    </div>
</div>";
    }
?>