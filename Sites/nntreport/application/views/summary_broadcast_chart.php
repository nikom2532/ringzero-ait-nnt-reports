<!doctype html>
<!--[if lt IE 7]> <html class="ie6 oldie"> <![endif]-->
<!--[if IE 7]>    <html class="ie7 oldie"> <![endif]-->
<!--[if IE 8]>    <html class="ie8 oldie"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="">
<!--<![endif]-->
<head>
 <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
 <title>สรุปการเผยแพร่ข่าว</title>
 <link href="<?php echo base_url();?>assets/css/main.css" rel="stylesheet" type="text/css" />
 <link href="<?php echo base_url();?>assets/css/style-report.css" rel="stylesheet" type="text/css" />
 <link href="<?php echo base_url();?>assets/css/flick/jquery-ui.min.css" rel="stylesheet" type="text/css" />
</head>

<body>
	<div class="wapper">
      <div class="header">
         <div class="navlink"><span class="clearfix"><p class="float_l">
         <a href="<?php echo base_url();?>index.php/main/index" style="border:0">
            <img src="<?php echo base_url();?>assets/img/house.png" style="border-style:none; margin-bottom: -4px"/></a> 
         <?php echo $lbl_welcome;?> : <span class="blue-txt">{นายชื่อ นามสกุล} |</span>
         <a href="{base_url}index.php/authenticator/signout" class="blue-txt link-logout"><?php echo $lbl_signout;?></a></p></span>
         </div>
      </div>
   <div class="bor_bottom02"></div>
   <div>
    <h2><?php echo $report_name;?></h2>
   </div>
   <div class="bor_bottom"></div>
   <?php
      $sum = "";
      $dept = $this->department_model;
      $news = $this->news_model;
      $i = 0;
   ?>
      <div id="line_chart" style="width: 1005px; height: 500px;"></div>
   </div>	<!--wapper-->
   <script src="<?php echo base_url();?>/assets/js/jquery-1.8.3.min.js"></script>
   <script src="<?php echo base_url();?>/assets/js/jquery-ui.js"></script>
   <script type="text/javascript" src="https://www.google.com/jsapi"></script>
   <script type="text/javascript">
   google.load("visualization", "1", {packages:["corechart"]});
   google.setOnLoadCallback(drawChart);
      function drawChart() {

         var data = google.visualization.arrayToDataTable([
          ['หน่วยงาน',
            'ข่าวดิบทั้งหมด', 'Thainews', 'Sharing','IOS','Android',
            'Black Berry','Win8/ winPhone 8','Smart TV','Face book','Twitter',
            'Email','Rss Feed','ข่าวดิบที่ ถูกเผยแพร่','ข่าวดิบที่ ไม่ถูกเผยแพร่'],
            <?php foreach($result as $val){
            $dept->setDepartmentId($val->departmentId);
            $news->setSC07DepartmentId($val->departmentId);

            $rawCount = $news->countRawNewsByDepartmentId();

            $thainewsCount = $news->countNewsbyDepartmentAndPublictype($val->departmentId, "1");

            $news->setNT08PubTypeID("11");
            $sharingCount = $news->countNewsbyDepartmentAndPublictype();

            $news->setNT08PubTypeID("6");
            $facebookCount = $news->countNewsbyDepartmentAndPublictype();

            $news->setNT08PubTypeID("13");
            $twetterCount = $news->countNewsbyDepartmentAndPublictype();

            $news->setNT08PubTypeID("15");
            $emailCount = $news->countNewsbyDepartmentAndPublictype();

            $publicRawCount = $news->countPublicNewsByDepartmentId();
            $dis = $rawCount - $publicRawCount;

            ?>
               ['<?php echo $dept->toString()?>',
                  <?php echo $rawCount?>,
                  <?php echo $thainewsCount?>,
                  <?php echo $sharingCount?>,
                  0,
                  0,
                  0,
                  0,
                  0,
                  <?php echo $facebookCount?>,
                  <?php echo $twetterCount?>,
                  <?php echo $emailCount?>,
                  0,
                  <?php echo $publicRawCount?>,
                  <?php echo $dis?>
               ],
            <?php }?>
          
        ]);

        var options = {
          // title: 'สรุปการเผยแพร่ข่าว'
        };

        var chart = new google.visualization.LineChart(document.getElementById('line_chart'));
        chart.draw(data, options);
      }
</script>
<script>    
   $(function(){
   });
</script>
</body>
</html>
