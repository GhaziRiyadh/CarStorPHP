<?php
    function get_mailstat($all, $replay, $done, $wait) {
        print "<div class=\"notika-email-post-area\">
        <div class=\"container\">
            <div class=\"row\">
                <div class=\"col-lg-4 col-md-6 col-sm-6 col-xs-12\">
                    <div class=\"email-statis-inner notika-shadow\">
                        <div class=\"email-ctn-round\">
                            <div class=\"email-rdn-hd\">
                                <h2>احصائيات البريد الالكتروني</h2>
                            </div>
                            <div class=\"email-statis-wrap\">
                                <div class=\"email-round-nock\">
                                    <input type=\"text\" class=\"knob\" value=\"0\" data-rel=\"$all\" data-linecap=\"round\" data-width=\"130\" data-bgcolor=\"#E4E4E4\" data-fgcolor=\"#0C59F2\" data-thickness=\".10\" data-readonly=\"true\">
                                </div>
                                <div class=\"email-ctn-nock\">
                                    <p>مجموع الرسائل المرسلة</p>
                                </div>
                            </div>
                            <div class=\"email-round-gp\">
                                <div class=\"email-round-pro\">
                                    <div class=\"email-signle-gp\">
                                        <input type=\"text\" class=\"knob\" value=\"0\" data-rel=\"$replay\" data-linecap=\"round\" data-width=\"90\" data-bgcolor=\"#E4E4E4\" data-fgcolor=\"#0C59F2\" data-thickness=\".10\" data-readonly=\"true\" disabled>
                                    </div>
                                    <div class=\"email-ctn-nock\">
                                        <p>معدل الردود</p>
                                    </div>
                                </div>
                                <div class=\"email-round-pro\">
                                    <div class=\"email-signle-gp\">
                                        <input type=\"text\" class=\"knob\" value=\"0\" data-rel=\"$done\" data-linecap=\"round\" data-width=\"90\" data-bgcolor=\"#E4E4E4\" data-fgcolor=\"#0C59F2\" data-thickness=\".10\" data-readonly=\"true\" disabled>
                                    </div>
                                    <div class=\"email-ctn-nock\">
                                        <p>تم تلبيتها</p>
                                    </div>
                                </div>
                                <div class=\"email-round-pro sm-res-ds-n lg-res-mg-bl\">
                                    <div class=\"email-signle-gp\">
                                        <input type=\"text\" class=\"knob\" value=\"0\" data-rel=\"$wait\" data-linecap=\"round\" data-width=\"90\" data-bgcolor=\"#E4E4E4\" data-fgcolor=\"#0C59F2\" data-thickness=\".10\" data-readonly=\"true\" disabled>
                                    </div>
                                    <div class=\"email-ctn-nock\">
                                        <p>قيد التنفيذ</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>";
    }
?>