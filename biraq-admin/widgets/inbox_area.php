<?php
    function get_inbox() {
        print "<!-- Inbox area Start-->
        <div class=\"inbox-area\">
            <div class=\"container\">
                <div class=\"row\">
                    <div class=\"col-lg-3 col-md-3 col-sm-3 col-xs-12\">
                        <div class=\"inbox-left-sd\">
                            <div class=\"inbox-status\">
                                <ul class=\"inbox-st-nav inbox-ft\">
                                    <li><a href=\"#\"><i class=\"notika-icon notika-mail\"></i> الوارد<span class=\"pull-right\">12</span></a></li>
                                    <li><a href=\"#\"><i class=\"notika-icon notika-sent\"></i> مرسل</a></li>
                                    <li><a href=\"#\"><i class=\"notika-icon notika-draft\"></i> المسودات</a></li>
                                    <li><a href=\"#\"><i class=\"notika-icon notika-trash\"></i> المهملات</a></li>
                                </ul>
                            </div>
                            <hr>
                            <div class=\"inbox-status\">
                                <ul class=\"inbox-st-nav inbox-nav-mg\">
                                    <li><a href=\"#\"><i class=\"notika-icon notika-settings\"></i> الاعدادات</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class=\"col-lg-9 col-md-9 col-sm-9 col-xs-12\">
                        <div class=\"inbox-text-list sm-res-mg-t-30\">
                            <div class=\"form-group\">
                                <div class=\"nk-int-st search-input search-overt\">
                                    <input type=\"text\" class=\"form-control\" placeholder=\"Search email...\" />
                                    <button class=\"btn search-ib\">Search</button>
                                </div>
                            </div>
                            <div class=\"table-responsive\">
                                <table class=\"table table-hover table-inbox\">
                                    <tbody>
                                        <tr class=\"unread\">
                                            <td class=\"\">
                                                <label><input type=\"checkbox\" checked=\"\" class=\"i-checks\"></label>
                                            </td>
                                            <td><a href=\"#\">Jeremy Massey</a></td>
                                            <td><a href=\"#\">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</a>
                                            </td>
                                            <td><i class=\"notika-icon notika-paperclip\"></i></td>
                                            <td class=\"text-right mail-date\">Tue, Nov 25</td>
                                        </tr>
                                        <tr class=\"active\">
                                            <td class=\"\">
                                                <label><input type=\"checkbox\" class=\"i-checks\"></label>
                                            </td>
                                            <td><a href=\"#\">Marshall Horne</a></td>
                                            <td><a href=\"#\">Praesent nec nisl sed neque ornare maximus at ac enim.</a>
                                            </td>
                                            <td></td>
                                            <td class=\"text-right mail-date\">Wed, Jan 13</td>
                                        </tr>
                                        <tr>
                                            <td class=\"\">
                                                <label><input type=\"checkbox\" class=\"i-checks\"></label>
                                            </td>
                                            <td><a href=\"#\">Grant Franco</a> <span class=\"label label-danger\">مستعجل</span></td>
                                            <td><a href=\"#\">Etiam maximus tellus a turpis tempor mollis.</a></td>
                                            <td></td>
                                            <td class=\"text-right mail-date\">Mon, Oct 19</td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div class=\"pagination-inbox\">
                                    <ul class=\"wizard-nav-ac\">
                                        <li><a class=\"btn\" href=\"#\"><i class=\"notika-icon notika-back\"></i></a></li>
                                        <li class=\"active\"><a class=\"btn\" href=\"#\">1</a></li>
                                        <li><a class=\"btn\" href=\"#\">2</a></li>
                                        <li><a class=\"btn\" href=\"#\">3</a></li>
                                        <li><a class=\"btn\" href=\"#\"><i class=\"notika-icon notika-next-pro\"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Inbox area End-->";
    }
?>