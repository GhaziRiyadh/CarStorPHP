
    <?php if (isset($_POST['con_name']) and isset($_POST['con_email']) and isset($_POST['con_message'])) {
        $name = $_POST['con_name'];
        $email = $_POST['con_email'];
        $massage = $_POST['con_message'];
        $tittel = $_POST['con_tittel'];

        $page_path = $_POST['pagepath'];
        $page_name = $_POST['pagename'];

        if (mail('support@gmail.com', $tittel, $massage)) {
            echo "
            <div class='d-flex justify-content-center align-items-center ' style='height:100vh'>
                <div class='spinner-box '>
                    <div class='circle-border'>
                        <div class='circle-core'></div>
                        <div class='alert alert-warning alert-dismissible fade show d-flex justify-content-center' role='alert' style='margin-top:40vh'>
                            <strong><bdo dir='rtl'>حدث خطأ ما: !!</bdo></strong><bdo dir='rtl'>من فضلك اعد المحاولة</bdo>
                            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                        </div>
                    </div>  
                </div>
            </div>
            <meta http-equiv = 'refresh' content = '3; url = $page_path' /> ";
        } else {
            echo "
            <div class='alert alert-warning alert-dismissible fade show d-flex justify-content-center' role='alert' style='margin-top:40vh'>
                <strong><bdo dir='rtl'>حدث خطأ ما: !!</bdo></strong><bdo dir='rtl'>من فضلك اعد المحاولة</bdo>
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>
            <meta http-equiv = 'refresh' content = '3; url = $page_path' />";
        }
    }
