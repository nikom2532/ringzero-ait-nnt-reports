<?php
$strExcelFileName   =   "สรุปการเผยแพร่ข่าว-".date("d-m-Y").".xls";
header("Content-Type: application/x-msexcel; name=\"$strExcelFileName\"");
header("Content-Disposition: inline; filename=\"$strExcelFileName\"");
header("Pragma: no-cache");
?>
<html xmlns:o="urn:schemas-microsoft-com:office:office"
xmlns:x="urn:schemas-microsoft-com:office:excel"
xmlns="http://www.w3.org/TR/REC-html40">
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<meta http-equiv="Content-type" content="text/html;charset=utf-8" />
<style id="SiXhEaD_Excel_Styles"></style>
 
</head>
<body>
<strong>รายงานสรุปการเผยแพร่ข่าวผ่านทางช่องทางของระบบ<br/>
สถิติประจำวันที่ ……………..ถึง……………………….
</strong><br>
<br>
<div id="SiXhEaD_Excel" align=center x:publishsource="Excel">
<table x:str border=1 cellpadding=0 cellspacing=0 width=100% style="border-collapse: collapse">
<tr>
<td width="50" class=xl2216681 nowrap style="vertical-align:middle; text-align:center; background-color:#cccccc"><strong>ลำดับ</strong></td>
<td width="300" class=xl2216681 nowrap style="vertical-align:middle; text-align:center; background-color:#cccccc"><strong>หน่วยงาน</strong></td>
<td width="100" class=xl2216681 nowrap style="vertical-align:middle; text-align:center; background-color:#cccccc"><strong>ข่าวดิบทั้งหมด</strong></td>
<td width="100" class=xl2216681 nowrap style="vertical-align:middle; text-align:center; background-color:#cccccc"><strong>Thainews</strong></td>
<td width="100" class=xl2216681 nowrap style="vertical-align:middle; text-align:center; background-color:#cccccc"><strong>Sharing</strong></td>
<td width="100" class=xl2216681 nowrap style="vertical-align:middle; text-align:center; background-color:#cccccc"><strong>IOS</strong></td>
<td width="100" class=xl2216681 nowrap style="vertical-align:middle; text-align:center; background-color:#cccccc"><strong>Android</strong></td>
<td width="100" class=xl2216681 nowrap style="vertical-align:middle; text-align:center; background-color:#cccccc"><strong>Black Berry</strong></td>
<td width="130" class=xl2216681 nowrap style="vertical-align:middle; text-align:center; background-color:#cccccc"><strong>Windows8/ <br/>windows phone 8</strong></td>
<td width="100" class=xl2216681 nowrap style="vertical-align:middle; text-align:center; background-color:#cccccc"><strong>Smart TV</strong></td>
<td width="100" class=xl2216681 nowrap style="vertical-align:middle; text-align:center; background-color:#cccccc"><strong>Face book</strong></td>
<td width="100" class=xl2216681 nowrap style="vertical-align:middle; text-align:center; background-color:#cccccc"><strong>Twitter</strong></td>
<td width="100" class=xl2216681 nowrap style="vertical-align:middle; text-align:center; background-color:#cccccc"><strong>Email</strong></td>
<td width="100" class=xl2216681 nowrap style="vertical-align:middle; text-align:center; background-color:#cccccc"><strong>Rss Feed</strong></td>
<td width="100" class=xl2216681 nowrap style="vertical-align:middle; text-align:center; background-color:#cccccc"><strong>ข่าวดิบที่<br/> ถูกเผยแพร่</strong></td>
<td width="100" class=xl2216681 nowrap style="vertical-align:middle; text-align:center; background-color:#cccccc"><strong>ข่าวดิบที่<br/>ไม่ถูกเผยแพร่</strong></td>
</tr>
<?php
$sum = "";
$dept = $this->department_model;
$news = $this->news_model;
$i = 0;
foreach($result as $val){
	$news->setSC07DepartmentId($val->departmentId);
?>
<tr>
<td class=xl2216681 nowrap style="text-align:center"><?php echo $val->RowNumber;?></td>
<td class=xl2216681 nowrap>
	<?php 	$dept->setDepartmentId($val->departmentId);
            echo $dept->toString();
    ?>
</td>
<td class=xl2216681 nowrap style="text-align:right">
	<?php // RawNews
		$rawCount = $news->countRawNewsByDepartmentId();
		echo number_format($rawCount);
		$sum[0][$i] = $rawCount;
    ?>
</td>
<td class=xl2216681 nowrap style="text-align:right">
	<?php // Thainews
		$thainewsCount = $news->countNewsbyDepartmentAndPublictype($val->departmentId, "1");
		echo number_format($thainewsCount);
		$sum[1][$i] = $thainewsCount;
	?>
</td>
<td class=xl2216681 nowrap style="text-align:right">
	<?php // Sharing
		$news->setNT08PubTypeID("11");
		$sharingCount = $news->countNewsbyDepartmentAndPublictype();
		echo number_format($sharingCount);
		$sum[2][$i] = $sharingCount;
	?>
</td>
<td class=xl2216681 nowrap style="text-align:right">
	
</td>
<td class=xl2216681 nowrap style="text-align:right">
	
</td>
<td class=xl2216681 nowrap style="text-align:right">
	
</td>
<td class=xl2216681 nowrap style="text-align:right">
	
</td>
<td class=xl2216681 nowrap style="text-align:right">
	
</td>
<td class=xl2216681 nowrap style="text-align:right">
	<?php // Facebook
		$news->setNT08PubTypeID("6");
		$facebookCount = $news->countNewsbyDepartmentAndPublictype();
		echo number_format($facebookCount);
		$sum[8][$i] = $facebookCount;
	?>
</td>
<td class=xl2216681 nowrap style="text-align:right">
	<?php // Twetter
		$news->setNT08PubTypeID("13");
		$twetterCount = $news->countNewsbyDepartmentAndPublictype();
		echo number_format($twetterCount);
		$sum[9][$i] = $twetterCount;
	?>
</td>
<td class=xl2216681 nowrap style="text-align:right">
	<?php // Email
		$news->setNT08PubTypeID("15");
		$emailCount = $news->countNewsbyDepartmentAndPublictype();
		echo number_format($emailCount);
		$sum[10][$i] = $emailCount;
	?>
</td>
<td class=xl2216681 nowrap style="text-align:right">
	
</td>
<td class=xl2216681 nowrap style="text-align:right">
	<?php // PublicRaw
		$publicRawCount = $news->countPublicNewsByDepartmentId();
		echo number_format($publicRawCount);
		$sum[11][$i] = $publicRawCount;
	?>
</td>
<td class=xl2216681 nowrap style="text-align:right">
	<?php
		echo number_format($rawCount - $publicRawCount);
		$sum[12][$i] = $rawCount - $publicRawCount;
	?>
</td>

</tr>
<?php 
	$i++;
} ?>
<tr>
<td class=xl2216681 nowrap style="vertical-align:middle; text-align:center; background-color:#cccccc"></td>
<td class=xl2216681 nowrap style="vertical-align:middle; text-align:center; background-color:#cccccc"><strong>Summation</strong></td>
<td class=xl2216681 nowrap style="vertical-align:middle; text-align:center; background-color:#cccccc">
	<?php 
		echo number_format(array_sum($sum[0]));
	?>
</td>
<td class=xl2216681 nowrap style="vertical-align:middle; text-align:center; background-color:#cccccc">
	<?php 
		echo number_format(array_sum($sum[1]));
	?>
</td>
<td class=xl2216681 nowrap style="vertical-align:middle; text-align:center; background-color:#cccccc">
	<?php 
		echo number_format(array_sum($sum[2]));
	?>
</td>
<td class=xl2216681 nowrap style="vertical-align:middle; text-align:center; background-color:#cccccc"></td>
<td class=xl2216681 nowrap style="vertical-align:middle; text-align:center; background-color:#cccccc"></td>
<td class=xl2216681 nowrap style="vertical-align:middle; text-align:center; background-color:#cccccc"></td>
<td class=xl2216681 nowrap style="vertical-align:middle; text-align:center; background-color:#cccccc"></td>
<td class=xl2216681 nowrap style="vertical-align:middle; text-align:center; background-color:#cccccc"></td>
<td class=xl2216681 nowrap style="vertical-align:middle; text-align:center; background-color:#cccccc"></td>
<td class=xl2216681 nowrap style="vertical-align:middle; text-align:center; background-color:#cccccc"></td>
<td class=xl2216681 nowrap style="vertical-align:middle; text-align:center; background-color:#cccccc"></td>
<td class=xl2216681 nowrap style="vertical-align:middle; text-align:center; background-color:#cccccc"></td>
<td class=xl2216681 nowrap style="vertical-align:middle; text-align:center; background-color:#cccccc"></td>
<td class=xl2216681 nowrap style="vertical-align:middle; text-align:center; background-color:#cccccc"></td>
</tr>
<tr>
<td class=xl2216681 nowrap style="vertical-align:middle; text-align:center; background-color:#cccccc"></td>
<td class=xl2216681 nowrap style="vertical-align:middle; text-align:center; background-color:#cccccc"><strong>ค่าเฉลี่ย ต่อวัน</strong></td>
<td class=xl2216681 nowrap style="vertical-align:middle; text-align:center; background-color:#cccccc"></td>
<td class=xl2216681 nowrap style="vertical-align:middle; text-align:center; background-color:#cccccc"></td>
<td class=xl2216681 nowrap style="vertical-align:middle; text-align:center; background-color:#cccccc"></td>
<td class=xl2216681 nowrap style="vertical-align:middle; text-align:center; background-color:#cccccc"></td>
<td class=xl2216681 nowrap style="vertical-align:middle; text-align:center; background-color:#cccccc"></td>
<td class=xl2216681 nowrap style="vertical-align:middle; text-align:center; background-color:#cccccc"></td>
<td class=xl2216681 nowrap style="vertical-align:middle; text-align:center; background-color:#cccccc"></td>
<td class=xl2216681 nowrap style="vertical-align:middle; text-align:center; background-color:#cccccc"></td>
<td class=xl2216681 nowrap style="vertical-align:middle; text-align:center; background-color:#cccccc"></td>
<td class=xl2216681 nowrap style="vertical-align:middle; text-align:center; background-color:#cccccc"></td>
<td class=xl2216681 nowrap style="vertical-align:middle; text-align:center; background-color:#cccccc"></td>
<td class=xl2216681 nowrap style="vertical-align:middle; text-align:center; background-color:#cccccc"></td>
<td class=xl2216681 nowrap style="vertical-align:middle; text-align:center; background-color:#cccccc"></td>
<td class=xl2216681 nowrap style="vertical-align:middle; text-align:center; background-color:#cccccc"></td>
</tr>
</table>

</div>
 
</body>
</html>