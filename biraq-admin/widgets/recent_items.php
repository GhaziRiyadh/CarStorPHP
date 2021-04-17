<?php
    function get_recent_items() {
        require("./widgets/db.php");
        $query = "SELECT `vin`, `brand`, `model`, `price` FROM `car` ORDER BY `date` DESC LIMIT 5";
        $result = mysqli_query($conn, $query);
        print "<div class=\"col-lg-4 col-md-6 col-sm-6 col-xs-12\">
        <div class=\"recent-items-wp notika-shadow sm-res-mg-t-30\">
            <div class=\"rc-it-ltd\">
                <div class=\"recent-items-ctn\">
                    <div class=\"recent-items-title\">
                        <h2>آخر العناصر</h2>
                    </div>
                </div>
                <div class=\"recent-items-inn\">
                    <table class=\"table table-inner table-vmiddle\">
                        <thead>
                            <tr>
                                <th>رقم القعادة</th>
                                <th>الموديل</th>
                                <th style=\"width: 60px\">السعر</th>
                            </tr>
                        </thead>
                        <tbody>";
        while($row = mysqli_fetch_array($result)) {
            print "<tr>
                <td class=\"f-500 c-cyan\">" . $row['vin'] ."</td>
                <td>". $row['brand'] ." " . $row['model'] ."</td>
                <td class=\"f-500 c-cyan\">$". $row['price'] ."</td>
            </tr>";
        }
        print "</tbody>
                    </table>
                </div>
                <!--<div id=\"recent-items-chart\" class=\"flot-chart-items flot-chart vt-ct-it tb-rc-it-res\"></div>-->
                    
    <a href=\"add-car.php\">
        <div class=\"recent-post-flex rc-ps-vw\">
            <div class=\"recent-post-line rct-pt-mg\">
                <b>إضافة سيارة</pb>
            </div>
        </div>
    </a>     
            </div>
        </div>
    
    </div>
    </div>
    </div>
    </div>";
    }
?>