<?php
    function get_contacts() {
        print "<!-- Contact area Start-->
        <div class=\"contact-area\">
                <div class=\"container\">
                    <div class=\"row\">";
                                
        require("./widgets/db.php");
        $query = "SELECT X.`ID`, X.`name`, X.`photo`, X.`city`, X.`type`, X.`qualificiation`, X.`username`, Y.`email`, Z.`phone` 
        FROM `emp` X, `emp_email` Y, `emp_phone` Z 
        WHERE X.`ID`=Y.`ID`=Z.`ID`
        ORDER BY X.`type`";
        $employee = mysqli_query($conn, $query);
        while($row = mysqli_fetch_array($employee))
        {
            $id = $row['ID'];
            $name = $row['name'];
            $photo = $row['photo'];
            $city = $row['city'];
            $type = $row['type'];
            $email = $row['email'];
            $phone = $row['phone'];
            $qualification = $row['qualificiation'];
            $username = $row['username'];
            
            print "<div class=\"col-lg-3 col-md-6 col-sm-6 col-xs-12\">
            <div class=\"contact-list\">
                <div class=\"contact-win\">
                    <div class=\"contact-img\">
                        <img src=\"img/post/1.jpg\" alt=\"\" />
                    </div>
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
                    <div class=\"social-sn\">
                        <h2>Type:</h2>
                        <p>$type</p>
                    </div><br/>
                    <div class=\"social-sn\">
                        <a href='mailto:" . $email ."'><h2>Email:</h2>
                        <p>$email</p>
                    </div><br/>
                    <div class=\"social-sn\">
                        <a href='tel:" . $phone ."'><h2>Phone:</h2>
                        <p>$phone</p></a>
                    </div><br/>
                </div>
            </div>
        </div> ";
        }
        print "</div>
            </div>
        </div>";
    }
?>