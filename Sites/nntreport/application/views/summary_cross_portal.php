<!doctype html>
<!--[if lt IE 7]>
<html class="ie6 oldie"> <![endif]-->
<!--[if IE 7]>
<html class="ie7 oldie"> <![endif]-->
<!--[if IE 8]>
<html class="ie8 oldie"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="">
<!--<![endif]-->
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>{site_title} :: {report_name}</title>


    <link href="<?php echo base_url()?>assets/css/main.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo base_url()?>assets/css/style-report.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo base_url()?>assets/css/flick/jquery-ui.min.css" rel="stylesheet" type="text/css"/>
    <link href="<?php echo base_url()?>assets/css/chosen.css" rel="stylesheet" type="text/css"/>
    <style>

        .report-box .header-report {
            width: 1300px;
            height: 52px;
            background: #D9D9D9;
        }

        .report-box .row-report {
            width: 1300px;
            height: 52px;
            background: #fff;
        }

        .report-box .header-report > div {
            float: left;
            text-align: center;
            line-height: 46px;
            height: 52px;
        }

        .report-box .header-report > div > span {
            color: #0808A7;
            display: inline-block;
            line-height: normal;
            vertical-align: middle;
            display: inline-block;
            font-size: 14px;
        }

        .report-box .header-report > div:first-child {
            width: 30px;
        }

        .report-box .header-report >  div:first-child +div {
            width: 50px;
        }

        .report-box .header-report > div:first-child + div + div {
            width: 100px;
        }

        .report-box .header-report > div:first-child + div + div + div {
            width: 80px;
        }

        .report-box .header-report > div:first-child + div + div + div +div {
            width: 80px;
        }

        .report-box .header-report > div:first-child + div + div + div +div +div {
            width: 80px;
        }

        .report-box .header-report > div:first-child + div + div + div +div +div+div {
            width: 80px;
        }

        .report-box .header-report > div:first-child + div + div + div +div +div+div+div {
            width: 80px;
        }

        .report-box .header-report > div:first-child + div + div + div +div +div+div+div+div {
            width: 80px;
        }

        .report-box .header-report > div:first-child + div + div + div +div +div+div+div+div+div {
            width: 80px;
        }

        .report-box .header-report > div:first-child + div + div + div +div +div+div+div+div+div+div {
            width: 80px;
        }

        .report-box .header-report > div:first-child + div + div + div +div +div+div+div+div+div+div+div {
            width: 80px;
        }

        .report-box .header-report > div:first-child + div + div + div +div +div+div+div+div+div+div+div+div {
            width: 80px;
        }

        .report-box .header-report > div:first-child + div + div + div +div +div+div+div+div+div+div+div+div+div {
            width: 80px;
        }

        .report-box .header-report > div:first-child + div + div + div +div +div+div+div+div+div+div+div+div+div+div {
            width: 80px;
        }

        .report-box .header-report > div:first-child + div + div + div +div +div+div+div+div+div+div+div+div+div+div+div {
            width: 80px;
        }

        .report-box .row-report > div {
            float: left;
            text-align: center;
            line-height: 48px;
            height: 52px;
        }

        .report-box .row-report > div:first-child {
            width: 30px;
        }

        .report-box .row-report > div:first-child + div {
            width: 50px;
        }

        .report-box .row-report > div:first-child + div + div {
            width: 100px;
        }

        .report-box .row-report > div:first-child + div + div + div {
            width: 80px;
        }

        .report-box .row-report > div:first-child + div + div + div + div {
            width: 80px;
        }

        .report-box .row-report > div:first-child + div + div + div + div + div {
            width: 80px;
        }

        .report-box .row-report > div:first-child + div + div + div + div + div + div {
            width: 80px;
        }

        .report-box .row-report > div:first-child + div + div + div + div + div + div + div {
            width: 80px;
        }

        .report-box .row-report > div:first-child + div + div + div + div + div + div + div +div {
            width: 80px;
        }

        .report-box .row-report > div:first-child + div + div + div + div + div + div + div +div + div {
            width: 80px;
        }

        .report-box .row-report > div:first-child + div + div + div + div + div + div + div +div + div+ div {
            width: 80px;
        }

        .report-box .row-report > div:first-child + div + div + div + div + div + div + div +div + div+ div+ div {
            width: 80px;
        }

        .report-box .row-report > div:first-child + div + div + div + div + div + div + div +div + div+ div+ div+ div {
            width: 80px;
        }

        .report-box .row-report > div:first-child + div + div + div + div + div + div + div +div + div+ div+ div+ div+ div {
            width: 80px;
        }

        .report-box .row-report > div:first-child + div + div + div + div + div + div + div +div + div+ div+ div+ div+ div+ div {
            width: 80px;
        }

        .report-box .row-report > div:first-child + div + div + div + div + div + div + div +div + div+ div+ div+ div+ div+ div+ div {
            width: 80px;
        }
    </style>

</head>

<body>

<div class="wapper">
<div class="header">
    <div class="navlink"><span class="clearfix"><p class="float_l">
                <a href="<?php echo base_url()?>index.php/main/index"><img src="<?php echo base_url()?>assets/img/house.png"/></a>
                {lbl_welcome} <span class="blue-txt">นายชื่อ นามสกุล |</span></p><a
                href="<?php echo base_url()?>index.php/authenticator/signout" class="blue-txt link-logout">{lbl_signout}</a></span>
    </div>
</div>
<div class="bor_bottom02"></div>

<div>
    <h2>{report_name}</h2>
</div>

<form action="<?php echo base_url()?>index.php/crossportal/search" id="formSearch" method="post">
    <div class="but_form03 clearfix">
        <div class="con_form02 float_l clearfix">
                    <span class=" float_r" style="margin-bottom:20px">
                        <img src="<?php echo base_url()?>assets/img/Layer_217.png" class="float_l"
                             style="margin-top:8px; margin-right:3px"/>
                            <input type="text" name="start_date" id="start_date"
                                   value="<?php echo $start_date?>" class="float_l"
                                   style="width:220px; height:30px; border:solid 1px #ccc"/>
                    </span>

            <p class="float_r">
                <?php echo $default_date?>
            </p>

            <div class="clear"></div>
                    <span class="select-menu float_r">
                        <span id="newsType_text">
                            <?php echo $default_select . $domain_news_category?>
                        </span>
                        <select name="newsType" id="newsType" onchange="return changeNewsType(this.value)">
                            <option class="newsType" value="0">
                                <?php echo $default_select . $domain_news_category?>
                            </option>
                            <?php
                            foreach ($newsType_list as $val) {
                                ?>
                                <option class="newsType" value="<?php echo $val->NT02_TypeID?>">
                                    <?php echo $val->NT02_TypeCode?> - <?php echo $val->NT02_TypeName?>
                                </option>
                            <?php }?>

                        </select>
                    </span>

            <p class="float_r">
                <?php echo $domain_news_category?>
            </p>

            <div class="clear"></div>
                    <span class="select-menu float_r">
                        <span id="department_text">
                            <?php echo $default_select . $domain_group?>
                        </span>
                        <select name="department" onchange="return changeDepartment(this.value)">
                            <option class="department" value="0">
                                <?php echo $default_select?><?php echo $domain_group?>
                            </option>
                            <?php
                            foreach ($parentDepartment_list as $val) {
                                ?>
                                <option class="department"
                                        value="<?php echo $val->SC07_DepartmentId?>">    <?php echo $val->SC07_DepartmentName?>
                                </option>
                            <?php }?>
                        </select>
                        </span>

            <p class="float_r">
                <?php echo $domain_group?>
            </p>

            <div class="clear"></div>
                    <span class="select-menu float_r">
                        <span id="region_text">
                            <?php echo $default_select . $domain_region?>
                        </span>
                            <select name="region" onchange="return changeRegion(this.value)">
                                <option class="region" value="0">
                                    <?php echo $default_select . $domain_region?>
                                </option>
                                <?php
                                foreach ($region_list as $val) {
                                    ?>
                                    <option class="region" value="<?php echo $val->CM05_RegionID?>">
                                        <?php echo $val->CM05_RegionName?>
                                    </option>
                                <?php }?>
                            </select>
                    </span>

            <p class="float_r">
                <?php echo $domain_region?>
            </p>

            <div class="clear"></div>
                <span class="float_r">
                    <!-- <span id="userId_text">{default_select}{domain_presenter}</span>   -->
                        <select id="userId" name="userId" style="width:220px;" class="chosen-select">
                            <option class="userId" value="0">
                                <?php echo $default_select . $domain_presenter?>
                            </option>
                            <?php
                            foreach ($user_list as $userVal) {
                                ?>
                                <option class="userId" value="<?php echo $userVal->UserID?>"
                                    <?php if ($userId == $userVal->UserID) {
                                    echo "selected";
                                }?>
                                    >
                                    <?php echo $userVal->Title?> <?php echo $userVal->FName?> <?php echo $userVal->LName?></option>
                            <?php }?>
                        </select>
                </span>

            <p class="float_r">
                <?php echo $domain_presenter?>
            </p>

            <div class="clear"></div>

        </div>
        <!--con_form02-->
        <div class="con_form03 float_l clearfix">
                <span class=" float_r" style="margin-bottom:20px">
                     <img src="<?php echo base_url()?>assets/img/Layer_217.png" class="float_l"
                          style="margin-top:8px; margin-right:3px"/>
                        <input type="text" name="end_date" id="end_date" value="<?php echo $end_date?>" class="float_l"
                               style="width:220px; height:30px; border:solid 1px #ccc"/>
                    </span>

            <p class="float_r"><?php echo $default_to?></p>

            <div class="clear"></div>
                <span class="select-menu float_r">
                	<span id="newsSubType_text">
                        <?php echo $default_select . $domain_sub_news_category?>
                    </span>
                	<select id="news_sub_type" name="news_sub_type">
                        <option class="newsSubType" value="0">
                            <?php echo $default_select . $domain_sub_news_category?>
                        </option>
                        <?php
                        foreach ($newsSubType as $val) {
                            ?>
                            <option class="newsSubType" value="<?php echo $val->NT03_SubTypeID?>">
                                <?php echo $val->NT03_SubTypeName?>
                            </option>
                        <?php }?>
                    </select>
                </span>

            <p class="float_r">
                <?php echo $domain_sub_news_category?>
            </p>

            <div class="clear"></div>
                    <span class="select-menu float_r">
                        <span id="subDepartment_text">
                            <?php echo $default_select . $domain_organize?>
                        </span>
                        <select name="sub_department" id="sub_department">
                            <option class="subDepartment" value="0">
                                <?php echo $default_select . $domain_organize?>
                            </option>
                            <?php
                            foreach ($subDepartment as $val) {
                                ?>
                                <option class="subDepartment" value="<?php echo $val->SC07_DepartmentId?>">
                                    <?php echo $val->SC07_DepartmentName?>
                                </option>
                            <?php }?>
                        </select>
                    </span>

            <p class="float_r"><?php echo $domain_organize?></p>

            <div class="clear"></div>
                    <span class="select-menu float_r">
                        <span id="province_text">
                            <?php echo $default_select . $domain_province?>
                        </span>
                        <select name="province" id="provinceId">
                            <option class="province" value="0">
                                <?php echo $default_select . $domain_province?>
                            </option>
                            <?php
                            foreach ($provinceList as $val) {
                                ?>
                                <option class="province" value="<?php echo $val->CM06_ProvinceID?>">
                                    <?php echo $val->CM06_ProvinceName?>
                                </option>
                            <?php }?>
                        </select>
                    </span>

            <p class="float_r"><?php echo $domain_province?></p>

            <div class="clear"></div>
        </div>
        <!--con_form03-->
        <div class="clear"></div>
        <div class="but_form">
            <input type="submit" name="logout" value="<?php echo $default_btn_report?>"/>
        </div>
        <input type="hidden" name="chartType" value="1" id="chartType"/>
    </div>
</form>


<!--but_form03-->

<div class="bor_bottom"></div>

<div class="export"><a href="#"><img src="<?php echo base_url()?>assets/img/export.png"></a></div>
<div class="contentOverflow">
    <ul class="report-box">
        <li class="header-report clearfix">
            <div><span></span></div>
            <div><span><?php echo $lbl_year?></span></div>
            <div><span><?php echo $lbl_month?></span></div>
            <div><span>{lbl_thainews}</span></div>
            <div><span>{lbl_sharing}</span></div>
            <div><span>{lbl_ios}</span></div>
            <div><span>{lbl_android}</span></div>
            <div><span>{lbl_blackberry}</span></div>
            <div><span>{lbl_win8}</span></div>
            <div><span>{lbl_smartTV}</span></div>
            <div><span>{lbl_facebook}</span></div>
            <div><span>{lbl_twitter}</span></div>
            <div><span>{lbl_email}</span></div>
            <div><span>{lbl_rss}</span></div>
            <div><span>จำนวนรวม/เดือน</span></div>
            <div><span>เฉลี่ยต่อวัน</span></div>

        </li>
        <?php foreach ($year_list as $val) {
            # code...
            $countRow = 0;
            ?>
            <li class="row-report clearfix">
                <div><span><?php echo $val->RowNumber?></span></div>
                <div><span><?php echo substr($val->yearDate,0,4)?></span></span></div>
                <div><span><?php echo $this->news_model->getMonthName(substr($val->yearDate,5,2))?></span></div>
                <div><span><?php // thaiNews
                        $thainews = $this->news_model
                            ->countNewsByDateAndPubTypeId($val->yearDate, "1");
                        echo number_format($thainews);
                        $countRow+= $thainews;
                        ?></span></div>
                <div><span>
                         <?php // sharenews
                        $sharenews = $this->news_model
                            ->countNewsByDateAndPubTypeId($val->yearDate, "11");
                        echo number_format($sharenews);
                        $countRow+= $sharenews;
                        ?></span>
                </span></div>
                <div><span>{0}</span></div>
                <div><span>{0}</span></div>
                <div><span>{0}</span></div>
                <div><span>{0}</span></div>
                <div><span>{0}</span></div>
                <div><span>
                <?php // Facebook
                        $facebookCount = $this->news_model
                            ->countNewsByDateAndPubTypeId($val->yearDate, "6");
                        echo number_format($facebookCount);
                        $countRow+=$facebookCount;
                        ?></span></div>
                <div><span>
                <?php // Twetter
                        $twetterCount = $this->news_model
                            ->countNewsByDateAndPubTypeId($val->yearDate, "13");
                        echo number_format($twetterCount);
                        $countRow+=$twetterCount;
                        ?></span></div>
                <div><span><?php // Email
                        $emailCount = $this->news_model
                            ->countNewsByDateAndPubTypeId($val->yearDate, "15");
                        echo number_format($emailCount);
                        $countRow+=$emailCount
                        ?></span></div>
                <div><span>{0}</span></div>
                <div><span><?php echo number_format($countRow)?></span></div>
                <div><span><?php echo $this->news_model->avgNewsPerDays(substr($val->yearDate,5,2),$countRow)?></span></div>
            </li>
        <?php }?>


        <li class="num_page clearfix">
            <div class="float_l"><span>{default_total}:{count_row} {default_list} ({total_page} {default_page})</span>
            </div>

            <div class="pagebtn float_r clearfix">
                <div><a href="{prev_page}"><img src="<?php echo base_url()?>assets/img/prew.png"></a></div>
                <div class="num_page02">
                            <span class="select-menu set_pagebtn float_r">  
                            <span>{current_page}</span>            
                            <select>
                                {page_url}
                                <option
                                {selected}>{value}</option>
                                {/page_url}
                            </select>
                            </span>
                </div>
                <div class="num100"><span> / {total_page}</span></div>
                <div><a href="{next_page}"><img src="<?php echo base_url()?>assets/img/next.png"></a></div>
                <div><a href="{last_page}"><img src="<?php echo base_url()?>assets/img/next2.png"></a></div>
            </div>
            <!--num_pages-->
        </li>
    </ul>
</div>
</div>
<!--wapper-->

</body>
<script src="<?php echo base_url()?>assets/js/jquery-1.8.3.min.js"></script>
<script src="<?php echo base_url()?>assets/js/jquery-ui.js"></script>
<script src="<?php echo base_url()?>assets/js/chosen.jquery.js" type="text/javascript"></script>
<script>
    var config = {
        '.chosen-select': {},
        '.chosen-select-deselect': {allow_single_deselect: true},
        '.chosen-select-no-single': {disable_search_threshold: 10},
        '.chosen-select-no-results': {no_results_text: 'Oops, nothing found!'},
        '.chosen-select-width': {width: "95%"}
    }
    for (var selector in config) {
        $(selector).chosen(config[selector]);
    }

    $(function () {
        $("li.row-report").each(function () {
            if (x % 2 == 0) {
                $(this).attr("style", "background-color:#ccc");
            }
            x++;
        });

        var monthNames = ["มกราคม", "กุมภาพันธ์", "มีนาคม", "เมษายน", "พฤษภาคม", "มิถุนายน", "กรกฎาคม", "สิงหาคม", "กันยายน", "ตุลาคม", "พฤศจิกายน", "ธันวาคม"];
        var dayNamesShort = ["อา.", "จ.", "อ.", "พ.", "พฤ.", "ศ.", "ส."]
        $("#start_date").datepicker({
            changeYear: true,
            changeMonth: true,
            dateFormat: "dd/mm/yy",
            monthNamesShort: monthNames,
            dayNamesMin: dayNamesShort,
            onSelect: function (selected) {
                $("#end_date").datepicker("option", "minDate", selected)
            }
        });
        $("#end_date").datepicker({
            changeYear: true,
            changeMonth: true,
            dateFormat: "dd/mm/yy",
            monthNamesShort: monthNames,
            dayNamesMin: dayNamesShort,
            onSelect: function (selected) {
                $("#start_date").datepicker("option", "maxDate", selected)
            }
        });
        $(".select-menu > select > option:eq(0)").attr("selected", "selected");
        $(".select-menu > select").live("change", function () {
            var selectmenu_txt = $(this).find("option:selected").text();
            $(this).prev("span").text(selectmenu_txt);

        });
        $(".newsType").each(function () {
            if ($(this).val() == '<?php echo $newsType?>') {
                $(this).attr('selected', 'selected');
                $("#newsType_text").text($(this).text());
            }
        });
        $(".newsSubType").each(function () {
            if ($(this).val() == "<?php echo $news_sub_type?>") {
                $(this).attr('selected', 'selected');
                $("#newsSubType_text").text($(this).text());
            }
        });
        $(".department").each(function () {
            if ($(this).val() == "<?php echo $department?>") {
                $(this).attr('selected', 'selected');
                $("#department_text").text($(this).text());
            }
        });
        $(".subDepartment").each(function () {
            if ($(this).val() == "<?php echo $sub_department?>") {
                $(this).attr('selected', 'selected');
                $("#subDepartment_text").text($(this).text());
            }
        });
        $(".region").each(function () {
            if ($(this).val() == "<?php echo $region?>") {
                $(this).attr('selected', 'selected');
                $("#region_text").text($(this).text());
            }
        });
        $(".province").each(function () {
            if ($(this).val() == "<?php echo $province?>") {
                $(this).attr('selected', 'selected');
                $("#province_text").text($(this).text());
            }
        });
        $(".userId").each(function () {
            if ($(this).val() == "<?php echo $userId?>") {
                $(this).attr('selected', 'selected');
                $("#userId_text").text($(this).text());
            }
        });
        var x = "<?php echo $row_per_page?>";
        var x = 1;


    });
    function changeNewsType(val) {

        $("#news_sub_type").prev("span").text("<?php echo $default_select.$domain_sub_news_category?>");
        $.ajax({
            type: "post",
            url: "<?php echo base_url()?>index.php/broadcast/ajaxNewssubtype/" + val,
            success: function (rs) {
                $("#news_sub_type").html(rs);
            }
        });

    }

    function changeDepartment(val) {
        $(".region").each(function () {
            if ($(this).val() == '0') {
                $(this).attr('selected', 'selected');
                $("#region_text").text($(this).text());
            }
        });
        $("#sub_department").prev("span").text("<?php echo $default_select.$domain_organize?>");
        $.ajax({
            type: "post",
            url: "<?php echo base_url()?>index.php/broadcast/ajaxDepartment/" + val,
            success: function (rs) {
                $("#sub_department").html(rs);
            }
        });

    }

    function changeRegion(val) {
        $(".department").each(function () {
            if ($(this).val() == '0') {
                $(this).attr('selected', 'selected');
                $("#department_text").text($(this).text());
            }
        });

        $("#provinceId").prev("span").text("<?php echo $default_select.$domain_province?>");
        $.ajax({
            type: "post",
            url: "<?php echo base_url()?>index.php/broadcast/ajaxRegion/" + val,
            success: function (rs) {
                $("#provinceId").html(rs);
            }
        });
    }
    function jump_page(val) {
        $("#formSearch").attr("action", "<?php echo $jump_url?>"+ val);
        $("#formSearch").submit();
    }
    function nextPage(val) {
        var nextpage = parseInt(val) + 1;
        if (<?php echo $total_page?>==val
    )
        {
            nextpage = val;
        }
        $("#formSearch").attr("action", "<?php echo base_url()?>index.php/broadcast/search/" + nextpage);
        $("#formSearch").submit();
    }
    function lastPage(val) {
        $("#formSearch").attr("action", "<?php echo base_url()?>index.php/broadcast/search/" + val);
        $("#formSearch").submit();
    }
    function prevPage(val) {
        var prevpage = parseInt(val) - 1;
        if (prevpage == 0) {
            prevpage = 1;
        }
        $("#formSearch").attr("action", "<?php echo base_url()?>index.php/broadcast/search/" + prevpage);
        $("#formSearch").submit();
    }
    function firstPage() {
        $("#formSearch").attr("action", "<?php echo base_url()?>index.php/broadcast/search/1");
        $("#formSearch").submit();
    }

    function _exports() {
        $("#dialog").dialog({
            modal: true,
            width: 350
        });
    }
    function exportExcel() {
        $("#formSearch").attr("action", "<?php echo base_url()?>index.php/broadcast/export_excel");
        $("#formSearch").submit();
    }
    function exportPdf() {
        $("#formSearch").attr("action", "<?php echo base_url()?>index.php/broadcast/export_pdf");
        $("#formSearch").submit();
    }

    function generateChart() {
        $("#formSearch").attr("action", "<?php echo base_url()?>index.php/broadcast/generateChart");
        $("#formSearch").submit();

    }

</script>
</html>
