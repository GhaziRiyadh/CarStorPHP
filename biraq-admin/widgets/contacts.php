<?php
function get_contacts()
{
    print "<!-- Contact area Start-->
        <div class=\"contact-area\">
                <div class=\"container\">
                    <div class=\"row\">";
    print "<a href=\"add_person.php\"><div class=\"col-lg-3 col-md-6 col-sm-6 col-xs-12\">
        <div class=\"contact-list\"><br/><br/><br/><br/><br/><br/><br/> 
            <div class=\"contact-win\">
                <div class=\"contact-img\">
                    <center><h1><i class=\"notika-icon notika-plus-symbol\"></i> </h1>
                    <h1>إضافة موظف/مسئول</h1></center>
                </div>
            </div>
            <div class=\"contact-ctn\">
                <div class=\"contact-ad-hd\">
                    <h1></h1>
                    <p class=\"ctn-ads\">@+</p>
                    <br/><br/><br/> <br/><br/><br/><br/>
                </div>
            </div>
        </div>
    </div></a><div class=\"row\">";
    require("./widgets/db.php");
    $query = "SELECT X.`fullname`, X.`photo`, X.`city`, X.`country`, X.`type`, X.`qualification`, W.`username`, Y.`email`, Z.`phone` 
        FROM `emp_info` W,`emp` X, `emp_email` Y, `emp_phone` Z 
        WHERE W.`ID`=X.`ID`=Y.`ID`=Z.`ID`
        ORDER BY X.`type`, X.`fullname`";
    $employee = mysqli_query($conn, $query);
    //$i = 1;
    while ($row = mysqli_fetch_assoc($employee)) {
        //$i++;
        $name = $row['fullname'];
        $photo = $row['photo'];
        $city = $row['city'];
        $country = $row['country'];
        $type = $row['type'];
        $email = $row['email'];
        $phone = $row['phone'];
        $qualification = $row['qualification'];
        $username = $row['username'];

        print "<div class=\"col-lg-3 col-md-6 col-sm-12 col-xs-12\">
            <div class=\"contact-list\">
                <div class=\"contact-win\">
                    <div class=\"contact-img\">";
        if ($photo != NULL) {
            print "<img src=\"widgets/$photo\" alt=\"\" />";
        } else {
            print "<img src=\"img/post/1.jpg\" alt=\"\" />";
        }
        print " </div>
                    <!--<div class=\"conct-sc-ic\">
                        <a class=\"btn\" href=\"#\"><i class=\"notika-icon notika-facebook\"></i></a>
                        <a class=\"btn\" href=\"#\"><i class=\"notika-icon notika-twitter\"></i></a>
                        <a class=\"btn\" href=\"#\"><i class=\"notika-icon notika-pinterest\"></i></a>
                    </div>-->
                </div>
                <div class=\"contact-ctn\">
                    <div class=\"contact-ad-hd\">
                        <h2>$name</h2>
                        <p class=\"ctn-ads\">@$username</p>
                    </div>
                    <p>$qualification</p>
                    <p>$city, <b>$country</b></p>
                    <div class=\"social-sn\">
                        <h2>Type:</h2>
                        <p>$type</p>
                    </div><br/>
                    <div class=\"social-sn\">
                        <a href='mailto:" . $email . "'><h2>Email:</h2>
                        <p>$email</p>
                    </div><br/>
                    <div class=\"social-sn\">
                        <a href='tel:" . $phone . "'><h2>Phone:</h2>
                        <p>$phone</p></a>
                    </div><br/>
                </div>
            </div>
        </div> ";
        //if ($i == 3) {
        //    $i = 0;
        //    print "</div><div class=\"row\">";
        //}
    }
    print "</div></div>
            </div>
        </div>";
    $conn->close();
}
