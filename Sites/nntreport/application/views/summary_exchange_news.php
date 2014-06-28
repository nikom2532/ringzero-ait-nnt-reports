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


<link href="{base_url}assets/css/main.css" rel="stylesheet" type="text/css" />
<link href="{base_url}assets/css/style-report.css" rel="stylesheet" type="text/css" />
<link href="{base_url}assets/css/flick/jquery-ui.min.css" rel="stylesheet" type="text/css" />


</head>

<body>
	
    <div class="wapper">
    	<div class="header">
        	<div class="navlink"><span class="clearfix"><p class="float_l">
        	<a href="{base_url}index.php/main/index"><img src="{base_url}assets/img/house.png"/></a> &nbsp;
        	{lbl_welcome} : <span class="blue-txt">นายชื่อ นามสกุล |</span></p><a href="{base_url}index.php/authenticator/signout" class="blue-txt link-logout">{lbl_signout}</a></span></div>
        </div>
        <div class="bor_bottom02"></div>
        
        <div>
        	<h2>{report_name}</h2>
        </div>
        
        <form action="{base_url}index.php/exchange/search" method="post">
            
            <div class="but_form03 clearfix">
                <div class="con_form02 float_l clearfix">            	 
                 <span class=" float_r" style="margin-bottom:20px"> 
                     <img src="{base_url}assets/img/Layer_217.png" class="float_l" style="margin-top:8px; margin-right:3px" />
                        <input type="text" name="start_date" id="start_date" value="{start_date}" class="float_l" style="width:220px; height:30px; border:solid 1px #ccc"/>           
                    </span>
                    <p class="float_r">{default_date}</p>
                    <div class="clear"></div>                              
                
                <span class="select-menu float_r"> 
                        <span id="newsType_text">{default_select}{domain_news_category}</span>
                        <select name="newsType" id="newsType" onchange="return changeNewsType(this.value)">
                            <option value="0">{default_select}{domain_news_category}</option>
                            {newsType_list}
                                <option class="newsType" value="{NT02_TypeID}">
                                    {NT02_TypeCode} - {NT02_TypeName}
                                </option>
                            {/newsType_list}
                            
                        </select>
                    </span>
                    <p class="float_r">{domain_news_category}</p>                         
                <div class="clear"></div>   
                
                <span class="select-menu float_r">
                        <span id="department_text">{default_select}{domain_group}</span>
                        <select name="department" onchange="return changeDepartment(this.value)">
                            <option value="0">{default_select}{domain_group}</option>
                         {parentDepartment_list}
                            <option class="department" value="{SC07_DepartmentId}">{SC07_DepartmentName}</option>
                         {/parentDepartment_list}   
                            
                        </select>
                        </span>
                    <p class="float_r">{domain_group}</p>
                <div class="clear"></div>
                
                    <span class="select-menu float_r">
                    <span id="region_text">{default_select}{domain_region}</span>
                        <select name="region" onchange="return changeRegion(this.value)">
                        <option value="0">{default_select}{domain_region}</option>
                        {region_list}
                            <option class="region" value="{CM05_RegionID}">{CM05_RegionName}</option>
                        {/region_list}
                           
                        </select>
                        </span>
                    <p class="float_r">{domain_region}</p>
                <div class="clear"></div>
                                               
                </div>	<!--con_form02-->
    
                                                    
                <div class="con_form03 float_l clearfix">
                    <span class=" float_r" style="margin-bottom:20px"> 
                     <img src="{base_url}assets/img/Layer_217.png" class="float_l" style="margin-top:8px; margin-right:3px" />
                        <input type="text" name="end_date" id="end_date" value="{end_date}" class="float_l" style="width:220px; height:30px; border:solid 1px #ccc"/>           
                    </span>
                    <p class="float_r">{default_to}</p>
                    <div class="clear"></div>
                  	<span class="select-menu float_r">            
                    <span id="newsSubType_text">{default_select}{domain_sub_news_category}</span>  
                    
                            <select id="news_sub_type" name="news_sub_type">
                                <option value="0">{default_select}{domain_sub_news_category}</option>
                                {newsSubType}
                                    <option class="newsSubType" value="{NT03_SubTypeID}">{NT03_SubTypeName}</option>
                                {/newsSubType}
                            </select>
                    </span>
                    <p class="float_r">{domain_sub_news_category}</p>
                <div class="clear"></div>
                
                  	<span class="select-menu float_r">
                    <span id="subDepartment_text">{default_select}{domain_organize}</span>  
                        <select name="sub_department" id="sub_department">
                            <option value="0">{default_select}{domain_organize}</option>
                            {subDepartment}
                                <option class="subDepartment" value="{SC07_DepartmentId}">{SC07_DepartmentName}</option>
                            {/subDepartment}
                        </select>
                        </span>
                    <p class="float_r">{domain_organize}</p>
                <div class="clear"></div>
                <span class="select-menu float_r">
                    <span id="province_text">{default_select}{domain_province}</span>  
                        <select name="province" id="provinceId">
                            <option value="0">{default_select}{domain_province}</option>
                            {provinceList}
                                <option class="province" value="{CM06_ProvinceID}">{CM06_ProvinceName}</option>
                            {/provinceList}
                        </select>
                        </span>
                    <p class="float_r">{domain_province}</p>
                <div class="clear"></div>                
                
                
                </div>	<!--con_form03-->
                <div class="clear"></div>
                
                
                    <div class="but_form">        		
                        <input type="submit" name="logout" value="{default_btn_report}" />            	 
                    </div>
                           
            </div>    
        </form>
        
        
        	<!--but_form03-->
        
        <div class="bor_bottom"></div>
        
        <div class="export"><a href="#"><img src="{base_url}assets/img/export.png"></a></div>
        
        <ul class="report-box report-box04">
			<li class="header-report set-font01 clearfix">
            	<div><span></span></div>
				<div><span>{lbl_date}</span></div>
    			<div><span>{lbl_category}</span></div>
    			<div><span></span></div>
    			<div><span>{lbl_group}</span></div>
    			<div><span>{lbl_organize}</span></div>
                <div><span>{lbl_region}</span></div>
                <div><span>{lbl_province}</span></div>
                <div><span>{lbl_news_qty}</span></div>
			</li>
            <?php 
            foreach($resultDate_list as $date_list){
                foreach ($newsType_list as $type_list) {
                    foreach ($department_arr as $dept_list) {
                
                $countNews = $this->news_model->countNewsByDate($dept_list->SC07_DepartmentId,$type_list->NT02_TypeID,$date_list->NT01_NewsDate);

            ?>
            <li class="row-report clearfix">
            	<div><span class="ListNo">1</span></div>
				<div><span><?php echo $date_list->NT01_NewsDate?></span></div>
    			<div><span><?php echo $type_list->NT02_TypeName?></span></div>
    			<div><span></span></div>
    			<div><span><?php echo $dept_list->ParentDepartmentName?></span></div>
                <div><span><?php echo $dept_list->SC07_DepartmentName?></span></div>
                <div><span><?php echo $dept_list->CM05_RegionName?></span></div>
                <div><span><?php echo $dept_list->CM06_ProvinceName?></span></div>
                <div><span><?php echo number_format($countNews)?></span></div>   			  			
			</li>
    <?php 
            }
        }
    }
    ?>
            <li class="num_page clearfix">
                <div class="float_l"><span>{default_total}: {count_row} {default_list} ({total_page} {default_page})</span></div>
                
                <div class="pagebtn float_r clearfix">
                    <div><a href="javascript:firstPage()"><img src="{base_url}assets/img/prew.png"></a></div>
                    <div><a href="javascript:prevPage({current_page})"><img src="{base_url}assets/img/prev.png"></a></div>
                    <div class="num_page02">
                            <span class="select-menu set_pagebtn float_r">  
                            <span>{current_page}</span>    
                                   
                            <select onchange="jump_page(this.value)">
                            {page_url}
                                <option value="{value}" {selected}>{value}</option>
                            {/page_url}                             
                                </select>
                            </span>                                                                  
                    </div>
                    <div class="num100"><span> / {total_page}</span></div>
                    <div><a href="javascript:nextPage({current_page})"><img src="{base_url}assets/img/next.png"></a></div>
                    <div><a href="javascript:lastPage({total_page})"><img src="{base_url}assets/img/next2.png"></a></div>
                </div>  <!--num_pages-->
            </li>
            
        </ul>
        
    </div>	<!--wapper-->
    <script src="{base_url}assets/js/jquery-1.8.3.min.js"></script>
    <script src="{base_url}/assets/js/jquery-ui.js"></script>
<script>
$(function(){
	
	$(".select-menu > select > option:eq(0)").attr("selected","selected");
	$(".select-menu > select").live("change",function(){
		var selectmenu_txt = $(this).find("option:selected").text();
		$(this).prev("span").text(selectmenu_txt);
	});
	
	var x = "{row_per_page}";
	var x=1;
	$(".row-report").each(function(){
		if(x%2==0){
			$(this).addClass("gray-bg");
		}

		x++;
	});

    var y=1;
    $(".ListNo").each(function(){
        $(this).text(y);
        y++;
    });

	$(".newsType").each(function(){
            if($(this).val()=='{newsType}'){
                $(this).attr('selected','selected');
                $("#newsType_text").text($(this).text());
            }
    });
    $(".newsSubType").each(function(){
            if($(this).val()=="{news_sub_type}"){
                $(this).attr('selected','selected');
                $("#newsSubType_text").text($(this).text());
            }
    });
    $(".department").each(function(){
            if($(this).val()=="{department}"){
                $(this).attr('selected','selected');
                $("#department_text").text($(this).text());
            }
    });
    $(".subDepartment").each(function(){
            if($(this).val()=="{sub_department}"){
                $(this).attr('selected','selected');
                $("#subDepartment_text").text($(this).text());
            }
    });
    $(".region").each(function(){
            if($(this).val()=="{region}"){
                $(this).attr('selected','selected');
                $("#region_text").text($(this).text());
            }
    });
    $(".province").each(function(){
            if($(this).val()=="{province}"){
                $(this).attr('selected','selected');
                $("#province_text").text($(this).text());
            }
    });
    $(".portal").each(function(){
            if($(this).val()=="{portal}"){
                $(this).attr('selected','selected');
                $("#portal_text").text($(this).text());
            }
    });

    var monthNames =  ["มกราคม","กุมภาพันธ์","มีนาคม","เมษายน","พฤษภาคม","มิถุนายน","กรกฎาคม","สิงหาคม","กันยายน","ตุลาคม","พฤศจิกายน","ธันวาคม"];
    var dayNamesShort =  ["อา.", "จ.", "อ.", "พ.", "พฤ.", "ศ.", "ส."]
    $("#start_date").datepicker({
        changeYear:true,
        changeMonth:true,
        dateFormat:"dd/mm/yy",
        monthNamesShort:monthNames,
        dayNamesMin:dayNamesShort,
        onSelect: function(selected) {
          $("#end_date").datepicker("option","minDate", selected)
        }
    });
    $("#end_date").datepicker({
        changeYear:true,
        changeMonth:true,
        dateFormat:"dd/mm/yy",
        monthNamesShort:monthNames,
        dayNamesMin:dayNamesShort,
        onSelect: function(selected) {
           $("#start_date").datepicker("option","maxDate", selected)
        }
    });
});
function jump_page(val){
    location='{jump_url}'+val;
}
function nextPage(val){
    var nextpage = parseInt(val)+1;
    if({total_page}==val){
        nextpage = val;
    }
    $("#formSearch").attr("action","{base_url}index.php/exchange/search/"+nextpage);
    $("#formSearch").submit();
}
function lastPage(val){
    $("#formSearch").attr("action","{base_url}index.php/exchange/search/"+val);
    $("#formSearch").submit();
}
function prevPage(val){
    var prevpage = parseInt(val)-1;
    $("#formSearch").attr("action","{base_url}index.php/exchange/search/"+prevpage);
    $("#formSearch").submit();
}
function firstPage(){
    $("#formSearch").attr("action","{base_url}index.php/exchange/search/1");
    $("#formSearch").submit();
}

function _exports(){
    $( "#dialog" ).dialog({
        modal:true
    });
}
function exportExcel(){
    $("#formSearch").attr("action","{base_url}index.php/exchange/export_excel");
    $("#formSearch").submit();
}
function exportPdf(){
    $("#formSearch").attr("action","{base_url}index.php/exchange/export_pdf");
    $("#formSearch").submit();
}
</script>	
</body>
</html>
