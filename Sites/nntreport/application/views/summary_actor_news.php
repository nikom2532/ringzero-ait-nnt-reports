
<!doctype html>
<!--[if lt IE 7]> <html class="ie6 oldie"> <![endif]-->
<!--[if IE 7]>    <html class="ie7 oldie"> <![endif]-->
<!--[if IE 8]>    <html class="ie8 oldie"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="">
<!--<![endif]-->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>{site_title} :: {report_name}</title>


<link href="<?php echo base_url()?>assets/css/main.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url()?>assets/css/style-report.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url()?>assets/css/flick/jquery-ui.min.css" rel="stylesheet" type="text/css"/>

</head>

<body>
	
    <div class="wapper">
    	<div class="header">
        	<div class="navlink"><span class="clearfix"><p class="float_l">
        <a href="<?php echo base_url()?>index.php/main/index"><img src="<?php echo base_url()?>assets/img/house.png"/></a>&nbsp;   {lbl_welcome}
             <span class="blue-txt">นายชื่อ นามสกุล |</span></p><a href="<?php echo base_url()?>index.php/authenticator/signout" class="blue-txt link-logout">{lbl_signout}</a></span></div>
        </div>
        <div class="bor_bottom02"></div>
        
        <div>
        	<h2>{report_name}</h2>
        </div>
        
        <form action="<?php echo base_url()?>index.php/placenews/search" id="formSearch"method="post">
            
            <div class="but_form03 clearfix">
                <div class="con_form02 float_l clearfix">                              
                     <span class=" float_r" style="margin-bottom:20px"> 
                     <img src="<?php echo base_url()?>assets/img/Layer_217.png" class="float_l" style="margin-top:8px; margin-right:3px" />
                        <input type="text" id="start_date" name="startDate" class="float_l" style="width:220px; height:30px; border:solid 1px #ccc;  "/>           
                    </span>
                    <p class="float_r"><?php echo $default_date?></p>
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
                            
                </div>  <!--con_form02-->
                <div class="con_form03 float_l clearfix">
                <span class=" float_r" style="margin-bottom:20px"> 
                     <img src="<?php echo base_url()?>assets/img/Layer_217.png" class="float_l" style="margin-top:8px; margin-right:3px" />
                        <input type="text" name="end_date" id="end_date" class="float_l" style="width:220px; height:30px; border:solid 1px #ccc"/>           
                    </span>
                    <p class="float_r"><?php echo $default_to?></p>
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
                
                
                </div>  <!--con_form03-->
                <div class="clear"></div>
                
                
                    <div class="but_form">              
                        <input type="submit" name="logout" value="<?php echo $default_btn_report?>" />               
                    </div>
                           
            </div>    
        </form>
        
        
        	<!--but_form03-->
        
        <div class="bor_bottom"></div>
        
        <div class="export"><a href="#"><img src="<?php echo base_url()?>assets/img/export.png"></a></div>
        
        <ul class="report-box report-box02">
			<li class="header-report set-font01 clearfix">
            	<div><span></span></div>
				<div><span>{lbl_date}</span></div>
    			<div><span>{lbl_region}</span></div>
    			<div><span>{lbl_province}</span></div>
    			<div><span>{lbl_actor_news}</span></div>
    			<div><span>{lbl_qty}</span></div>
			</li>
            {result_array}
            <li class="row-report clearfix">
            	<div><span>{no}</span></div>
				<div><span>{news_date}</span></div>
    			<div><span>{region}</span></div>
    			<div><span>{province}</span></div>
    			<div><span>{actor_news}</span></div>
    			<div><span>{qty}</span></div>    			
			</li>
            {/result_array}
            
            <li class="num_page clearfix">
                <div class="float_l"><span>{default_total}:{count_row} {default_list} ({total_page} {default_page})</span></div>
                
                <div class="pagebtn float_r clearfix">
                    <div><a href="{prev_page}"><img src="<?php echo base_url()?>assets/img/prew.png"></a></div>
                    <div class="num_page02">
                            <span class="select-menu set_pagebtn float_r">  
                            <span>{current_page}</span>            
                            <select>
                            {page_url}
                                <option {selected}>{value}</option>
                            {/page_url}                             
                                </select>
                            </span>                                                                  
                    </div>
                    <div class="num100"><span> / {total_page}</span></div>
                    <div><a href="{next_page}"><img src="<?php echo base_url()?>assets/img/next.png"></a></div>
                    <div><a href="{last_page}"><img src="<?php echo base_url()?>assets/img/next2.png"></a></div>
                </div>  <!--num_pages-->
            </li>
        </ul>
        
    </div>	<!--wapper-->
	
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
       
        var x = "<?php echo $row_per_page?>";
        var x = 1;


    });
    
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
        $("#formSearch").attr("action", "<?php echo base_url()?>index.php/placenews/search/" + nextpage);
        $("#formSearch").submit();
    }
    function lastPage(val) {
        $("#formSearch").attr("action", "<?php echo base_url()?>index.php/placenews/search/" + val);
        $("#formSearch").submit();
    }
    function prevPage(val) {
        var prevpage = parseInt(val) - 1;
        if (prevpage == 0) {
            prevpage = 1;
        }
        $("#formSearch").attr("action", "<?php echo base_url()?>index.php/placenews/search/" + prevpage);
        $("#formSearch").submit();
    }
    function firstPage() {
        $("#formSearch").attr("action", "<?php echo base_url()?>index.php/placenews/search/1");
        $("#formSearch").submit();
    }

    function _exports() {
        $("#dialog").dialog({
            modal: true,
            width: 350
        });
    }
    function exportExcel() {
        $("#formSearch").attr("action", "<?php echo base_url()?>index.php/placenews/export_excel");
        $("#formSearch").submit();
    }
    function exportPdf() {
        $("#formSearch").attr("action", "<?php echo base_url()?>index.php/placenews/export_pdf");
        $("#formSearch").submit();
    }

    function generateChart() {
        $("#formSearch").attr("action", "<?php echo base_url()?>index.php/placenews/generateChart");
        $("#formSearch").submit();

    }

</script>
</html>
