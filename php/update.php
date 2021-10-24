<!DOCTYPE html>
<html lang="ar">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../css/plugins.css">
    <link rel="stylesheet" href="../css/spinner.css">

</head>

<body>
    <?php


    // including files
    include_once 'app.php';

    $datacontrol = new mysqli_connection;
    $datacontrol = $datacontrol->connect();

    $fullname = $gender = $city = $country = $photo = '';
    if (
        isset($_POST['fullname']) and
        isset($_POST['gender']) and
        isset($_POST['city']) and
        isset($_POST['country']) and
        isset($_POST['newprofile']) and
        isset($_POST['email']) and
        isset($_POST['current-pwd'])
    ) :
        $ufullname = $_POST['fullname'];
        $ugender = $_POST['gender'];
        $ucity = $_POST['city'];
        $ucountry = $_POST['country'];
        $uphoto = $_POST['newprofile'];
        $uemail = $_POST['email'];
        $upassword = $_POST['current-pwd'];

        // page info
        $page_path = $_POST['pagepath'];
        $page_name = $_POST['pagename'];
        $clientId = $_POST['clientId'];

        // sql for update data
        $updateSQL = "	UPDATE CLIENT c, client_email ce
                    SET
                        c.fullname = ?,
                        c.gender = ?,
                        c.city = ?,
                        c.country = ?,
                        c.photo = ?,
                        ce.email = ?,
                        ce.password = ?
                    WHERE
                        c.id = ? AND ce.userid = c.id;";
        // run update 
        if (
            $update_result_show = $datacontrol->prepare($updateSQL) and
            $update_result_show->bind_param('sssssssi', $ufullname, $ugender, $ucity, $ucountry, $uphoto, $uemail, $upassword, $clientId) and
            $update_result_show->execute()
        ) :
            echo "
            <div class='d-flex justify-content-center align-items-center ' style='height:100vh'>
                <div class='spinner-box '>
                    <div class='circle-border'>
                        <div class='circle-core'></div>
                    </div>  
                </div>
            </div>
            <meta http-equiv = 'refresh' content = '3; url = $page_path' /> ";
        else :
            echo "
            <div class='alert alert-warning alert-dismissible fade show d-flex justify-content-center' role='alert' style='margin-top:40vh'>
                <strong><bdo dir='rtl'>حدث خطأ ما: !!</bdo></strong><bdo dir='rtl'>من فضلك اعد المحاولة</bdo>
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>
            <meta http-equiv = 'refresh' content = '3; url = $page_path' />";
        endif;
    endif;
    ?>
</body>

</html>