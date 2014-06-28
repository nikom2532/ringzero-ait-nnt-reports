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
<style>

.report-box .header-report {
    width:1300px;
    height:52px;
    background: #D9D9D9;
}
.report-box .row-report {
    width:1300px;
    height:52px;
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
    font-size:14px;
}
.report-box .header-report > div:first-child {
    width: 30px;
}
.report-box .header-report >  div:first-child +div{
    width: 120px;
}
.report-box .header-report > div:first-child + div + div {
    width:80px;
}
.report-box .header-report > div:first-child + div + div + div {
    width:80px;
}
.report-box .header-report > div:first-child + div + div + div +div{
    width:80px;
}
.report-box .header-report > div:first-child + div + div + div +div +div{
    width:80px;
}
.report-box .header-report > div:first-child + div + div + div +div +div+div{
    width:80px;
}
.report-box .header-report > div:first-child + div + div + div +div +div+div+div{
    width:80px;
}
.report-box .header-report > div:first-child + div + div + div +div +div+div+div+div{
    width:80px;
}
.report-box .header-report > div:first-child + div + div + div +div +div+div+div+div+div{
    width:80px;
}
.report-box .header-report > div:first-child + div + div + div +div +div+div+div+div+div+div{
    width:80px;
}
.report-box .header-report > div:first-child + div + div + div +div +div+div+div+div+div+div+div{
    width:80px;
}
.report-box .header-report > div:first-child + div + div + div +div +div+div+div+div+div+div+div+div{
    width:80px;
}
.report-box .header-report > div:first-child + div + div + div +div +div+div+div+div+div+div+div+div+div{
    width:80px;
}
.report-box .header-report > div:first-child + div + div + div +div +div+div+div+div+div+div+div+div+div+div{
    width:80px;
}
.report-box .header-report > div:first-child + div + div + div +div +div+div+div+div+div+div+div+div+div+div+div{
    width:80px;
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
    width: 120px;
}

.report-box .row-report > div:first-child + div + div {
    width:80px;
}

.report-box .row-report > div:first-child + div + div + div {
    width:80px;
}

.report-box .row-report > div:first-child + div + div + div + div{
    width:80px;
}

.report-box .row-report > div:first-child + div + div + div + div + div {
    width:80px;
}

.report-box .row-report > div:first-child + div + div + div + div + div + div {
    width:80px;
}
.report-box .row-report > div:first-child + div + div + div + div + div + div + div{
    width:80px;
}
.report-box .row-report > div:first-child + div + div + div + div + div + div + div +div{
    width:80px;
}
.report-box .row-report > div:first-child + div + div + div + div + div + div + div +div + div{
    width:80px;
}
.report-box .row-report > div:first-child + div + div + div + div + div + div + div +div + div+ div{
    width:80px;
}
.report-box .row-report > div:first-child + div + div + div + div + div + div + div +div + div+ div+ div{
    width:80px;
}
.report-box .row-report > div:first-child + div + div + div + div + div + div + div +div + div+ div+ div+ div{
    width:80px;
}
.report-box .row-report > div:first-child + div + div + div + div + div + div + div +div + div+ div+ div+ div+ div{
    width:80px;
}
.report-box .row-report > div:first-child + div + div + div + div + div + div + div +div + div+ div+ div+ div+ div+ div{
    width:80px;
}
.report-box .row-report > div:first-child + div + div + div + div + div + div + div +div + div+ div+ div+ div+ div+ div+ div{
    width:80px;
}
</style>

</head>

<body>
	
    <div class="wapper">
    	<div class="header">
        	<div class="navlink"><span class="clearfix"><p class="float_l">
            <a href="{base_url}index.php/main/index"><img src="{base_url}assets/img/house.png"/></a>
            {lbl_welcome} <span class="blue-txt">นายชื่อ นามสกุล |</span></p><a href="{base_url}index.php/authenticator/signout" class="blue-txt link-logout">{lbl_signout}</a></span></div>
        </div>
        <div class="bor_bottom02"></div>
        
        <div>
        	<h2>{report_name}</h2>
        </div>
        
        <form action="{base_url}index.php/crossportal/search" method="post">
            
            <div class="but_form03 clearfix">
                <div class="con_form02 float_l clearfix">  
                <span class=" float_r" style="margin-bottom:20px"> 
                     <img src="{base_url}assets/img/Layer_217.png" class="float_l" style="margin-top:8px; margin-right:3px" />
                        <input type="text" name="Date" class="float_l" style="width:220px; height:30px; border:solid 1px #ccc;  "/>           
                    </span>
                    <p class="float_r">{default_date}</p>
                    <div class="clear"></div>

                    <span class="select-menu float_r"> 
                        <span>{default_select}{domain_news_category}</span>             
                            <select>
                            <option selected="selected">หมวดหมู่ที่ 1</option>
                            <option>หมวดหมู่ที่ 2</option>
                            <option>หมวดหมู่ที่ 3</option>
                            </select>
                    </span>
                    <p class="float_r">{domain_news_category}</p>                        
                <div class="clear"></div>            
                
                    <span class="select-menu float_r">
                        <span>{default_select}{domain_group}</span>
                        <select>
                            <option selected="selected">สังกัดที่ 1</option>
                            <option>สังกัดที่ 2</option>
                            <option>สังกัดที่ 3</option>
                        </select>
                        </span>
                    <p class="float_r">{domain_group}</p>
                <div class="clear"></div>
                
                    <span class="select-menu float_r">
                    <span>{default_select}{domain_region}</span>
                        <select>
                            <option selected="selected">ภูมิภาค1</option>
                            <option>ภูมิภาค2</option>
                            <option>ภูมิภาค3</option>
                        </select>
                        </span>
                    <p class="float_r">{domain_region}</p>
                <div class="clear"></div>
                
                <span class="img_submit float_r">
                    <a href="#"><img src="{base_url}assets/img/Layer_126.png" /></a>
                    <a href="#"><img src="{base_url}assets/img/Layer_127.png" /></a>        
                </span>
                    <p class="float_r">{domain_presenter}</p>
                <div class="clear"></div>
                            
                </div>  <!--con_form02-->
                <div class="con_form03 float_l clearfix">
                <span class=" float_r" style="margin-bottom:20px"> 
                     <img src="{base_url}assets/img/Layer_217.png" class="float_l" style="margin-top:8px; margin-right:3px" />
                        <input type="text" name="end_date" class="float_l" style="width:220px; height:30px; border:solid 1px #ccc"/>           
                    </span>
                    <p class="float_r">{default_to}</p>
                    <div class="clear"></div>
                <span class="select-menu float_r">
                <span>{default_select}{domain_sub_news_category}</span>              
                            <select>
                            <option selected="selected">หมวดหมู่ข่าวย่อย1</option>
                            <option>หมวดหมู่ข่าวย่อย2</option>
                            <option> หมวดหมู่ข่าวย่อย3</option>
                            </select>
                    </span>
                    <p class="float_r">{domain_sub_news_category}</p>                        
                <div class="clear"></div>            
                
                    <span class="select-menu float_r">
                    <span>{default_select}{domain_organize}</span>  
                        <select>
                            <option selected="selected">หน่วยงาน1</option>
                            <option>หน่วยงาน2</option>
                            <option>หน่วยงาน3</option>
                        </select>
                        </span>
                    <p class="float_r">{domain_organize}</p>
                <div class="clear"></div>
                
                    <span class="select-menu float_r">
                    <span>{default_select}{domain_province}</span>  
                        <select>
                            <option selected="selected">จังหวัด1</option>
                            <option>จังหวัด2</option>
                            <option> จังหวัด3</option>
                        </select>
                        </span>
                    <p class="float_r">{domain_province}</p>
                <div class="clear"></div>
                
                
                
                </div>  <!--con_form03-->
                <div class="clear"></div>
                
                
                    <div class="but_form">              
                        <input type="submit" name="logout" value="{default_btn_report}" />               
                    </div>
                           
            </div>    
        </form>
        
        
        	<!--but_form03-->
        
        <div class="bor_bottom"></div>
        
        <div class="export"><a href="#"><img src="{base_url}assets/img/export.png"></a></div>
        <div class="contentOverflow">
        <ul class="report-box">
			<li class="header-report clearfix">
                <div><span></span></div>
                <div><span>{lbl_department}</span></div>
                <div><span>{lbl_rawnews}</span></div>
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
                <div><span>{lbl_rawnews_public}</span></div>
                <div><span>{lbl_rawnews_no_public}</span></div>

			</li>
            <?php foreach ($department_list as $val) {
                # code...
            ?>
            <li class="row-report clearfix">
                <div><span><?php echo $val->RowNumber?></span></div>
				<div><span><?php echo $val->SC07_DepartmentName?></span></div>
                <div><span>
                    <?php // RawNews
                        $rawCount = $this->news_model
                        ->countRawNewsByDepartment($val->SC07_DepartmentId);
                        echo $rawCount;
                    ?>
                </span></div>
                <div><span>
                    <?php // Thainews
                        $thainewsCount = $this->news_model
                        ->countNewsbyDepartmentAndPublictype($val->SC07_DepartmentId,"1");
                        echo $thainewsCount;
                    ?></span></div>
                <div><span>
                    <?php // Sharing
                        $sharingCount = $this->news_model
                        ->countNewsbyDepartmentAndPublictype($val->SC07_DepartmentId,"11");
                        echo $sharingCount;
                    ?>
                </span></div>
                <div><span>{0}</span></div>
                <div><span>{0}</span></div>
                <div><span>{0}</span></div>
                <div><span>{0}</span></div>
                <div><span>{0}</span></div>
                <div><span>
                <?php // Facebook
                        $facebookCount = $this->news_model
                        ->countNewsbyDepartmentAndPublictype($val->SC07_DepartmentId,"6");
                        echo $facebookCount;
                    ?></span></div>
                <div><span>
                <?php // Twetter
                        $twetterCount = $this->news_model
                        ->countNewsbyDepartmentAndPublictype($val->SC07_DepartmentId,"13");
                        echo $twetterCount;
                    ?></span></div>
                <div><span><?php // Email
                        $emailCount = $this->news_model
                        ->countNewsbyDepartmentAndPublictype($val->SC07_DepartmentId,"15");
                        echo $emailCount;
                    ?></span></div>
                <div><span>{0}</span></div>
                <div><span>
                    <?php // PublicRaw
                        $publicRawCount = $this->news_model
                        ->countPublicRawNewsByDepartment($val->SC07_DepartmentId);
                        echo $publicRawCount;
                    ?></span></div>
                <div><span>
                <?php
                    echo $rawCount - $publicRawCount;
                ?></span></div>
			</li>
            <?php }?>
            
            
            <li class="num_page clearfix">
                <div class="float_l"><span>{default_total}:{count_row} {default_list} ({total_page} {default_page})</span></div>
                
                <div class="pagebtn float_r clearfix">
                    <div><a href="{prev_page}"><img src="{base_url}assets/img/prew.png"></a></div>
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
                    <div><a href="{next_page}"><img src="{base_url}assets/img/next.png"></a></div>
                    <div><a href="{last_page}"><img src="{base_url}assets/img/next2.png"></a></div>
                </div>  <!--num_pages-->
            </li>
        </ul>
        </div>
    </div>	<!--wapper-->
	
</body>
<script src="{base_url}assets/js/jquery-1.8.3.min.js"></script>
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
});
</script>
</html>
