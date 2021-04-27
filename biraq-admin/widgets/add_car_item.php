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
                                    <i class=\"notika-icon notika-promos\">
</i>
                                </div>
                                <div class=\"breadcomb-ctn\">
                                    <h2>إضافة سيارة</h2>
                                    <p>إضافة سيارة الى قاعدة البيانات</p>
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
    <form action=\"./widgets/processlogin.php\" method=\"post\" enctype=\"multipart/form-data\">
        <div class=\"row\">
            <div class=\"col-lg-12 col-md-12 col-sm-12 col-xs-12\">
                <div class=\"view-mail-list sm-res-mg-t-30\">
                    <div class=\"cmp-int mg-t-20\">
                        <div class=\"row\">
                            <div class=\"col-lg-10 col-md-10 col-sm-10 col-xs-12\">
                                <div class=\"form-group\">
                                    <div class=\"nk-int-st cmp-int-in cmp-email-over\">
                                        <input type=\"text\" class=\"form-control\" placeholder=\"\" />
                                    </div>
                                </div>
                            </div>
                            <div class=\"col-lg-1 col-md-2 col-sm-2 col-xs-12\">
                                <div class=\"cmp-int-lb cmp-int-lb1 text-right\">
                                    <span>
<b> :رقم القعادة</b>
</span>
                                </div>
                            </div>
                        </div>
                        <div class=\"row\">
                            <div class=\"col-lg-3 col-md-3 col-sm-3 col-xs-12\">
                                <div class=\"nk-int-mk sl-dp-mn sm-res-mg-t-10\">
                                    <h2> :الماركة</h2>
                                </div>
                                <div class=\"bootstrap-select fm-cmp-mg\">
                                    <select name=\"brand\" class=\"selectpicker\" data-live-search=\"true\">
                                        <option disabled selected hidden>اختر</option>
                                        <option>Acura</option>
                                        <option>Alfa Romeo</option>
                                        <option>Audi</option>
                                        <option>BMW</option>
                                        <option>Bentley</option>
                                        <option>Buick</option>
                                        <option>Cadillac</option>
                                        <option>Chevrolet</option>
                                        <option>Chrysler</option>
                                        <option>Dodge</option>
                                        <option>Fiat</option>
                                        <option>Ford</option>
                                        <option>GMC</option>
                                        <option>Genesis</option>
                                        <option>Honda</option>
                                        <option>Hyundai</option>
                                        <option>Infiniti</option>
                                        <option>Jaguar</option>
                                        <option>Jeep</option>
                                        <option>Kia</option>
                                        <option>Land Rover</option>
                                        <option>Lexus</option>
                                        <option>Lincoln</option>
                                        <option>Lotus</option>
                                        <option>Maserati</option>
                                        <option>Mazda</option>
                                        <option>Mercedes-Benz</option>
                                        <option>Mercury</option>
                                        <option>Mini</option>
                                        <option>Mitsubishi</option>
                                        <option>Nikola</option>
                                        <option>Nissan</option>
                                        <option>Polestar</option>
                                        <option>Pontiac</option>
                                        <option>Porsche</option>
                                        <option>Ram</option>
                                        <option>Rivian</option>
                                        <option>Rolls-Royce</option>
                                        <option>Saab</option>
                                        <option>Saturn</option>
                                        <option>Scion</option>
                                        <option>Smart</option>
                                        <option>Subaru</option>
                                        <option>Suzuki</option>
                                        <option value\"Tesla\">Tesla</option>
                                        <option value=\"Toyota\">Toyota</option>
                                        <option value=\"Volkswagen\">Volkswagen</option>
                                        <option value=\"Volvo\">Volvo</option>
                                    </select>
                                </div>
                            </div>
                            <div class=\"col-lg-3 col-md-3 col-sm-6 col-xs-12\">
                                <div class=\"nk-int-mk sl-dp-mn sm-res-mg-t-10\">
                                    <h2> :الموديل</h2>
                                </div>
                                <div class=\"form-group float-lb floating-lb\">
                                    <div class=\"nk-int-st input-lm\">
                                        <input name=\"model\" type=\"text\" class=\"form-control\">
                                    </div>
                                </div>
                            </div>
                            <div class=\"col-lg-3 col-md-3 col-sm-3 col-xs-12\">
                                <div class=\"nk-int-mk sl-dp-mn sm-res-mg-t-10\">
                                    <h2> :النوع</h2>
                                </div>
                                <div class=\"bootstrap-select fm-cmp-mg\">
                                    <select name=\"style\" class=\"selectpicker\" data-live-search=\"true\">
                                        <option disabled selected hidden>اختر</option>
                                        <option value=\"Sedan\">Sedan</option>
                                        <option value=\"Coupe\">Coupe</option>
                                        <option value=\"Sport\">Sport</option>
                                        <option value=\"Wagon\">Wagon</option>
                                        <option value=\"Hatchback\">Hatchback</option>
                                        <option value=\"Convertible\">Convertible</option>
                                        <option value=\"SUV\">SUV</option>
                                        <option value=\"Mini Van\">Mini Van</option>
                                        <option value=\"PickUp\">PickUp</option>
                                        <option value=\"Micro\">Micro</option>                                                <option value=\"crossover\">كروس اوفر</option>
                                        <option value=\"Coupe-SUV\">Coupe-SUV</option>
                                        <option value=\"Off-Road\">Off-Road</option>
                                        <option value=\"MUV\">MUV</option>
                                        <option value=\"VAN\">VAN</option>
                                        <option value=\"Cabriolet\">Cabriolet</option>
                                        <option value=\"Roadster\">Roadster</option>
                                        <option value=\"Limousine\">Limousine</option>
                                        <option value=\"Muscle\">Muscle</option>
                                        <option value=\"Hyper\">Hyper</option>
                                        <option value=\"Bus\">Bus</option>
                                    </select>
                                </div>
                            </div>
                            <div class=\"col-lg-3 col-md-3 col-sm-3 col-xs-12\">
                                <div class=\"nk-int-mk sl-dp-mn sm-res-mg-t-10\">
                                    <h2> :اللون</h2>
                                </div>
                                <div class=\"bootstrap-select fm-cmp-mg\">
                                    <select name=\"color\" class=\"selectpicker\" data-live-search=\"true\">
                                        <option disabled selected hidden>اختر</option>
                                        <option value=\"Red\">احمر</option>
                                        <option value=\"Orange\">برتقالي</option>
                                        <option value=\"Yellow\">اصفر</option>
                                        <option value=\"Green\">اخضر</option>
                                        <option value=\"Blue\">ازرق</option>
                                        <option value=\"Purple\">بنفسجي</option>
                                        <option value=\"Pink\">وردي</option>
                                        <option value=\"Gray\">رمادي</option>
                                        <option value=\"Black\">اسود</option>
                                        <option value=\"White\">ابيض</option>
                                        <option value=\"Pearl\">بيج</option>
                                        <option value=\"Metal\">معدني</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <br/>
<div class=\"row\">
                            <div class=\"col-lg-3 col-md-3 col-sm-3 col-xs-12\">
                                <div class=\"nk-int-mk sl-dp-mn sm-res-mg-t-10\">
                                    <h2> :السليندر</h2>
                                </div>
                                <div class=\"bootstrap-select fm-cmp-mg\">
                                    <select name=\"cylinder\" class=\"selectpicker\" data-live-search=\"true\">
                                        <option disabled selected hidden>اختر</option>
                                        <option value=\"3\">3</option>
                                        <option value=\"4\">4</option>
                                        <option value=\"5\">5</option>
                                        <option value=\"6\">6</option>
                                        <option value=\"8\">8</option>
                                        <option value=\"12\">12</option>
                                        <option value=\"16\">16</option>
                                    </select>
                                </div>
                            </div>
                            <div class=\"col-lg-3 col-md-3 col-sm-3 col-xs-12\">
                                <div class=\"nk-int-mk sl-dp-mn sm-res-mg-t-10\">
                                    <h2> :الجير</h2>
                                </div>
                                <div class=\"bootstrap-select fm-cmp-mg\">
                                    <select name=\"gear\" class=\"selectpicker\" data-live-search=\"true\">
                                        <option disabled selected hidden>اختر</option>
                                        <option value=\"4\">4</option>
                                        <option value=\"5\">5</option>
                                        <option value=\"6\">6</option>
                                        <option value=\"7\">7</option>
                                    </select>
                                </div>
                            </div>
                            <div class=\"col-lg-3 col-md-3 col-sm-3 col-xs-12\">
                                <div class=\"nk-int-mk sl-dp-mn sm-res-mg-t-10\">
                                    <h2> :التعشيق</h2>
                                </div>
                                <div class=\"bootstrap-select fm-cmp-mg\">
                                    <select name=\"gear_type\" class=\"selectpicker\" data-live-search=\"true\">
                                        <option disabled selected hidden>اختر</option>
                                        <option value=\"AT\">ِAT</option>
                                        <option value=\"MT\">MT</option>
                                        <option value=\"AM\">AM</option>
                                        <option value=\"CVT\">CVT</option>
                                    </select>
                                </div>
                            </div>
                            <div class=\"col-lg-3 col-md-3 col-sm-3 col-xs-12\">
                                <div class=\"nk-int-mk sl-dp-mn sm-res-mg-t-10\">
                                    <h2> :السنة</h2>
                                </div>
                                <div class=\"bootstrap-select fm-cmp-mg\">
                                    <select name=\"year\" class=\"selectpicker\" data-live-search=\"true\">
                                        <option disabled selected hidden>اختر</option>
                                        <option value=\"1980\">1980</option>
                                        <option value=\"1981\">1981</option>
                                        <option value=\"1982\">1982</option>
                                        <option value=\"1983\">1983</option>
                                        <option value=\"1984\">1984</option>
                                        <option value=\"1985\">1985</option>
                                        <option value=\"1986\">1986</option>
                                        <option value=\"1987\">1987</option>
                                        <option value=\"1988\">1988</option>
                                        <option value=\"1989\">1989</option>
                                        <option value=\"1990\">1990</option>
                                        <option value=\"1991\">1991</option>
                                        <option value=\"1992\">1992</option>
                                        <option value=\"1993\">1993</option>
                                        <option value=\"1994\">1994</option>
                                        <option value=\"1995\">1995</option>
                                        <option value=\"1996\">1996</option>
                                        <option value=\"1997\">1997</option>
                                        <option value=\"1998\">1998</option>
                                        <option value=\"1999\">1999</option>
                                        <option value=\"2000\">2000</option>
                                        <option value=\"2001\">2001</option>
                                        <option value=\"2002\">2002</option>
                                        <option value=\"2003\">2003</option>
                                        <option value=\"2004\">2004</option>
                                        <option value=\"2005\">2005</option>
                                        <option value=\"2006\">2006</option>
                                        <option value=\"2007\">2007</option>
                                        <option value=\"2008\">2008</option>
                                        <option value=\"2009\">2009</option>
                                        <option value=\"2010\">2010</option>
                                        <option value=\"2011\">2011</option>
                                        <option value=\"2012\">2012</option>
                                        <option value=\"2013\">2013</option>
                                        <option value=\"2014\">2014</option>
                                        <option value=\"2015\">2015</option>
                                        <option value=\"2016\">2016</option>
                                        <option value=\"2017\">2017</option>
                                        <option value=\"2018\">2018</option>
                                        <option value=\"2019\">2019</option>
                                        <option value=\"2020\">2020</option>
                                        <option value=\"2021\">2021</option>
                                        <option value=\"2022\">2022</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <br/>
<div class=\"row\">
                            <div class=\"col-lg-3 col-md-3 col-sm-3 col-xs-12\">
                                <div class=\"nk-int-mk sl-dp-mn sm-res-mg-t-10\">
                                    <h2> :الوقود</h2>
                                </div>
                                <div class=\"bootstrap-select fm-cmp-mg\">
                                    <select name=\"fuel_type\" class=\"selectpicker\" data-live-search=\"true\">
                                        <option disabled selected hidden>اختر</option>
                                        <option value=\"1\">بنزين</option>
                                        <option value=\"2\">ديزل</option>
                                        <option value=\"3\">غاز</option>
                                        <option value=\"h1\">هايبرد-بنزين</option>
                                        <option value=\"h2\">هايبرد-ديزل</option>
                                        <option value=\"e\">كهرباء</option>
                                    </select>
                                </div>
                            </div>
                            <div class=\"col-lg-3 col-md-3 col-sm-3 col-xs-12\">
                                <div class=\"nk-int-mk sl-dp-mn sm-res-mg-t-10\">
                                    <h2> :القيادة</h2>
                                </div>
                                <div class=\"bootstrap-select fm-cmp-mg\">
                                    <select name=\"drivetype\" class=\"selectpicker\" data-live-search=\"true\">
                                        <option disabled selected hidden>اختر</option>
                                        <option value=\"FWD\">FWD</option>
                                        <option value=\"RWD\">RWD</option>
                                        <option value=\"AWD\">AWD</option>
                                        <option value=\"4WD\">4WD</option>
                                    </select>
                                </div>
                            </div>
                            <div class=\"col-lg-3 col-md-3 col-sm-3 col-xs-12\">
                                <div class=\"nk-int-mk sl-dp-mn sm-res-mg-t-10\">
                                    <h2> :المقاعد</h2>
                                </div>
                                <div class=\"bootstrap-select fm-cmp-mg\">
                                    <select name=\"seats_num\" class=\"selectpicker\" data-live-search=\"true\">
                                        <option disabled selected hidden>اختر</option>
                                        <option value=\"2\">2</option>
                                        <option value=\"4\">4</option>
                                        <option value=\"5\">5</option>
                                        <option value=\"7\">6</option>
                                        <option value=\"9\">6</option>
                                    </select>
                                </div>
                            </div>
                            <div class=\"col-lg-3 col-md-3 col-sm-3 col-xs-12\">
                                <div class=\"nk-int-mk sl-dp-mn sm-res-mg-t-10\">
                                    <h2> :الموقع</h2>
                                </div>
                                <div class=\"bootstrap-select fm-cmp-mg\">
                                    <select name\"p_id\" class=\"selectpicker\" data-live-search=\"true\">
                                        <option disabled selected hidden>اختر</option>
                                        <option value=\"1\">عدن</option>
                                        <option value=\"2\">شحن</option>
                                        <option value=\"3\">المكلا</option>
                                        <option value=\"4\">الحديدة</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                        <div class=\"cmp-int mg-t-20\">
                        <div class=\"row\">
                        <div class=\"col-lg-6 col-md-6 col-sm-12 col-xs-12\">
                            <div class=\"nk-int-mk sl-dp-mn sm-res-mg-t-10\">
                                <h2> :القيمة</h2>
                            </div>
                            <div class=\"form-group float-lb floating-lb\">
                                <div class=\"nk-int-st input-lm\">
                                    <input name=\"cost\" type=\"number\" class=\"form-control\">
                                </div>
                            </div>
                        </div>
                        <div class=\"col-lg-6 col-md-6 col-sm-12 col-xs-12\">
                            <div class=\"nk-int-mk sl-dp-mn sm-res-mg-t-10\">
                                <h2> :السعر</h2>
                            </div>
                            <div class=\"form-group float-lb floating-lb\">
                                <div class=\"nk-int-st input-lm\">
                                    <input name=\"price\" type=\"number\" class=\"form-control\">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class=\"row\">
                            <div class=\"col-lg-12 col-md-12 col-sm-12 col-xs-12\">
                                <div class=\"floating-numner\">
                                    <p><h4>مواصفات أخرى</h4></p>
                                </div>
                            </div>
                        </div>
                        <div class=\"row\">
                            <div class=\"col-lg-12 col-md-12 col-sm-12 col-xs-12\">
                                <div class=\"form-group\">
                                    <div class=\"nk-int-st\">
                                        <textarea name=\"dtl\" class=\"form-control auto-size\" rows=\"10\"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <div class=\"col-lg-6 col-md-6 col-sm-12 col-xs-12\">
                                <div class=\"nk-int-mk sl-dp-mn sm-res-mg-t-10\">
                                    <h2> :صور السيارة</h2>
                                </div>
                                <p>قم بإختيار جميع الصور التي تحتاجها</p>
                        <input type=\"file\" name=\"car_photos[]\" multiple=\"multiple\" accept=\".jpg, .jpeg, .jpe .jif, .jfif, .jfi, .png, .webp, .tiff, .tif\"/>
                    </div>
                    </div>
                    
                    <div class=\"vw-ml-action-ls text-right mg-t-20\">
                        <div class=\"btn-group ib-btn-gp active-hook nk-email-inbox\">
                        <div class=\"col-lg-6 col-md-6 col-sm-6 col-xs-3\">
                        <div class=\"breadcomb-report\">
                            <!-- a id=\"submit\" href=\"javascript:{}\" onClick=\"vs();\" class=\"btn btn-lg waves-effect\">
<i class=\"notika-icon notika-checked\"> حفظ </i>
</a -->
                            <button class=\"btn notika-btn-blue\">
                            <input type=\"submit\" value=\"إضافة سيارة\" class=\"btn notika-btn-blue\" name=\"create\">
                            </button>
                        </div>
                        </div>
                        </div>
                    </div>
        </div>
    </form>
    </div>
</div>
<!-- Compose email area End-->
        ";
}
