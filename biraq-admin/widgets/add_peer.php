<?php
function add_car_item()
{
    print "
        <!-- Breadcomb area Start-->
<div class=\"breadcomb-area\">
    <div class=\"container\">
        <div class=\"row\">
            <div class=\"col-lg-12 col-md-12 col-sm-12 col-xs-12\">
                <div class=\"breadcomb-list\">
                    <div class=\"row\">
                        <div class=\"col-lg-6 col-md-6 col-sm-6 col-xs-12\">
                            <div class=\"breadcomb-wp\">
                                <div class=\"breadcomb-icon\">
                                    <i class=\"notika-icon notika-support\"></i>
                                </div>
                                <div class=\"breadcomb-ctn\">
                                    <h2>إضافة موظف/مسئول</h2>
                                    <p>إضافة موظف الى قاعدة البيانات</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Breadcomb area End-->
<!-- Compose email area Start-->
<div class=\"inbox-area\">
    <div class=\"container\">
    <form action=\"./widgets/processemployee.php\" id=\"addp\" method=\"post\" enctype=\"multipart/form-data\">
        <div class=\"row\">
            <div class=\"col-lg-12 col-md-12 col-sm-12 col-xs-12\">
                <div class=\"view-mail-list sm-res-mg-t-30\">
                    <div class=\"cmp-int mg-t-20\">
                        <div class=\"row\">
                            <div class=\"col-lg-3 col-md-3 col-sm-6 col-xs-12\">
                                <div class=\"nk-int-mk sl-dp-mn sm-res-mg-t-10\">
                                    <h2 id=\"pname\" style=\"color: black;\"> :*الاسم</h2>
                                </div>
                                <div class=\"form-group float-lb floating-lb\">
                                    <div class=\"nk-int-st input-lm\">
                                        <input name=\"fullname\" id=\"fullname\" required type=\"text\" class=\"form-control\">
                                    </div>
                                </div>
                            </div>
                            <div class=\"col-lg-3 col-md-3 col-sm-6 col-xs-12\">
                                <div class=\"nk-int-mk sl-dp-mn sm-res-mg-t-10\">
                                    <h2> :*رقم الهوية</h2>
                                </div>
                                <div class=\"form-group float-lb floating-lb\">
                                    <div class=\"nk-int-st input-lm\">
                                        <input name=\"SSN\" required type=\"number\" class=\"form-control\">
                                    </div>
                                </div>
                            </div>
                            <div class=\"col-lg-3 col-md-3 col-sm-6 col-xs-12\">
                                <div class=\"nk-int-mk sl-dp-mn sm-res-mg-t-10\">
                                    <h2> :*المؤهل</h2>
                                </div>
                                <div class=\"form-group float-lb floating-lb\">
                                    <div class=\"nk-int-st input-lm\">
                                        <input name=\"qualification\" required type=\"text\" class=\"form-control\">
                                    </div>
                                </div>
                            </div>
                            <div class=\"col-lg-3 col-md-3 col-sm-6 col-xs-12\">
                                <div class=\"nk-int-mk sl-dp-mn sm-res-mg-t-10\">
                                    <h2> :*اسم المستخدم</h2>
                                </div>
                                <div class=\"form-group float-lb floating-lb\">
                                    <div class=\"nk-int-st input-lm\">
                                        <input name=\"username\" required type=\"text\" class=\"form-control\">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class=\"row\">
                            <div class=\"col-lg-3 col-md-3 col-sm-6 col-xs-12\">
                                <div class=\"nk-int-mk sl-dp-mn sm-res-mg-t-10\">
                                    <h2> :*كلمة المرور</h2>
                                </div>
                                <div class=\"form-group float-lb floating-lb\">
                                    <div class=\"nk-int-st input-lm\">
                                        <input name=\"pass1\" new-password auto-complete=false required type=\"password\" class=\"form-control\">
                                    </div>
                                </div>
                            </div>
                            <div class=\"col-lg-3 col-md-3 col-sm-6 col-xs-12\">
                                <div class=\"nk-int-mk sl-dp-mn sm-res-mg-t-10\">
                                    <h2> :*إعادة كلمة المرور</h2>
                                </div>
                                <div class=\"form-group float-lb floating-lb\">
                                    <div class=\"nk-int-st input-lm\">
                                        <input name=\"pass2\" new-password auto-complete=false required type=\"password\" class=\"form-control\">
                                    </div>
                                </div>
                            </div>
                            <div class=\"col-lg-3 col-md-3 col-sm-6 col-xs-12\">
                                <div class=\"nk-int-mk sl-dp-mn sm-res-mg-t-10\">
                                    <h2> :*الجنس</h2>
                                </div>
                                <div class=\"bootstrap-select fm-cmp-mg\">
                                    <select name=\"gender\" class=\"selectpicker\" data-live-search=\"true\">
                                        <option disabled selected hidden>اختر</option>
                                        <option value=\"M\">ذكر</option>
                                        <option value=\"F\">أنثى</option>
                                    </select>
                                </div>
                            </div>
                            <div class=\"col-lg-3 col-md-3 col-sm-6 col-xs-12\">
                                <div class=\"nk-int-mk sl-dp-mn sm-res-mg-t-10\">
                                    <h2> :*الدولة</h2>
                                </div>
                                <div class=\"bootstrap-select fm-cmp-mg\">
                                    <select name=\"country\" class=\"selectpicker\" data-live-search=\"true\">
                                        <option disabled selected hidden>اختر</option>
                                        <option value=\"UNITED EMARATES\">الإمارات</option>
                                        <option value=\"CHINA\">الصين</option>
                                        <option value=\"GERMANY\">المانيا</option>
                                        <option value=\"UNITED KINGDOM\">المملكة لمتحدة</option>
                                        <option value=\"UNITED STATES\">الولايات المتحدة</option>
                                        <option value=\"JAPAN\">اليابان</option>
                                        <option value=\"YEMEN\">اليمن</option>
                                        <option value=\"TAIWAN\">تايوان</option>
                                        <option value=\"OMAN\">عمان</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <br/><div class=\"row\">
                            <div class=\"col-lg-3 col-md-3 col-sm-6 col-xs-12\">
                                <div class=\"nk-int-mk sl-dp-mn sm-res-mg-t-10\">
                                    <h2> :*المدينة</h2>
                                </div>
                                <div class=\"form-group float-lb floating-lb\">
                                    <div class=\"nk-int-st input-lm\">
                                        <input name=\"city\" type=\"text\" class=\"form-control\">
                                    </div>
                                </div>
                            </div>
                            <div class=\"col-lg-3 col-md-3 col-sm-6 col-xs-12\">
                                <div class=\"nk-int-mk sl-dp-mn sm-res-mg-t-10\">
                                    <h2> :*رقم الجوال</h2>
                                </div>
                                <div class=\"form-group float-lb floating-lb\">
                                    <div class=\"nk-int-st input-lm\">
                                        <input name=\"phone\" type=\"number\" class=\"form-control\">
                                    </div>
                                </div>
                            </div>
                            <div class=\"col-lg-3 col-md-3 col-sm-6 col-xs-12\">
                                <div class=\"nk-int-mk sl-dp-mn sm-res-mg-t-10\">
                                    <h2> :*البريد الالكتروني</h2>
                                </div>
                                <div class=\"form-group float-lb floating-lb\">
                                    <div class=\"nk-int-st input-lm\">
                                        <input required validate name=\"email\" type=\"email\" class=\"form-control\">
                                    </div>
                                </div>
                            </div>
                            <div class=\"col-lg-3 col-md-3 col-sm-3 col-xs-12\">
                                <div class=\"nk-int-mk sl-dp-mn sm-res-mg-t-10\">
                                    <h2> :*النوع</h2>
                                </div>
                                <div class=\"bootstrap-select fm-cmp-mg\">
                                    <select required name=\"type\" class=\"selectpicker\" data-live-search=\"true\">
                                        <option disabled selected hidden>اختر</option>
                                        <option value=\"Employee\">موظف</option>
                                        <option value=\"Admin\">مسئول</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    <div class=\"row\">
                    <div class=\"col-lg-3 col-md-3 col-sm-6 col-xs-12\">
                                <div class=\"nk-int-mk sl-dp-mn sm-res-mg-t-10\">
                                    <h2> :صورة الهوية</h2>
                                </div>
                                <p>قم بإختيار صورة واحدة فقط</p>
                        <input type=\"file\" name=\"ssn_photo\" multiple=\"false\" accept=\".jpg, .jpeg, .jpe .jif, .jfif, .jfi, .png, .webp, .tiff, .tif\"/>
                    </div>
                    <div class=\"col-lg-3 col-md-3 col-sm-6 col-xs-12\">
                                <div class=\"nk-int-mk sl-dp-mn sm-res-mg-t-10\">
                                    <h2> :صورة المستخدم</h2>
                                </div>
                                <p>قم بإختيار صورة واحدة فقط</p>
                        <input type=\"file\" name=\"photo\"  multiple=\"false\" accept=\".jpg, .jpeg, .jpe .jif, .jfif, .jfi, .png, .webp, .tiff, .tif\"/>
                    </div>
                    </div>
                    
                    <div class=\"vw-ml-action-ls text-right mg-t-20\">
                        <div class=\"btn-group ib-btn-gp active-hook nk-email-inbox\">
                        <div class=\"col-lg-6 col-md-6 col-sm-6 col-xs-3\">
                        <div class=\"breadcomb-report\">
                            <!-- a id=\"submit\" href=\"javascript:{}\" onClick=\"vs();\" class=\"btn btn-lg waves-effect\"><i class=\"notika-icon notika-checked\"> حفظ </i></a -->
                            <button class=\"btn notika-btn-blue\">
                            <input type=\"submit\" value=\"Create Employee/Admin\" class=\"btn notika-btn-blue\" name=\"create\">
                            </button>
                        </div>
                        </div>
                        </div>
                    </div></form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Compose email area End-->
        ";
    print "
        <script>
        function vs() {
            if (document.getElementsByName('fullname').value == \"\") {
                document.getElementsByName('fullname').style.color = 'crimson';
            }
            if (document.getElementsByName('SSN').value == \"\") {
                document.getElementsByName('SSN').style.color = 'crimson';
            }
            if (document.getElementsByName('qualification').value == \"\") {
                document.getElementsByName('qualification').style.color = 'crimson';
            }
            if (document.getElementsByName('username').value == \"\") {
                document.getElementsByName('username').style.color = 'crimson';
            }
            if (document.getElementsByName('pass1').value == \"\") {
                document.getElementsByName('pass1').style.color = 'crimson';
            }
            if (document.getElementsByName('pass2').value == \"\") {
                document.getElementsByName('pass2').style.color = 'crimson';
            }
            if (document.getElementsByName('email').value == \"\") {
                document.getElementsByName('email').style.color = 'crimson';
            }
            if (document.getElementsByName('city').value == \"\") {
                document.getElementsByName('city').style.color = 'crimson';
            }
            if (document.getElementsByName('phone').value == \"\") {
                document.getElementsByName('phone').style.color = 'crimson';
            }
            if (document.getElementsByName('gender').value == \"اختر\") {
                document.getElementsByName('gender').style.color = 'crimson';
            }
            if (document.getElementsByName('country').value == \"اختر\") {
                document.getElementsByName('country').style.color = 'crimson';
            }
            if (document.getElementsByName('type').value == \"اختر\") {
                document.getElementsByName('type').style.color = 'crimson';
            }
            if (document.getElementsByName('fullname').value != \"\"
                && document.getElementsByName('SSN').value != \"\"
                && document.getElementsByName('qualification').value != \"\"
                && document.getElementsByName('username').value != \"\"
                && document.getElementsByName('pass1').value != \"\"
                && document.getElementsByName('pass2').value != \"\"
                && document.getElementsByName('email').value != \"\"
                && document.getElementsByName('phone').value != \"\") {
                if (document.getElementsByName('pass2').value 
                    == document.getElementsByName('pass1').value) {
                    if (document.getElementsByName('gender').value != \"اختر\" 
                        && document.getElementsByName('country').value != \"اختر\" 
                        && document.getElementsByName('type').value != \"اختر\") {
                        document.getElementById('addp').submit();
                    }
                }
            }
        }
        </script>
        ";
}
