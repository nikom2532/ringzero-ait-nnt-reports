<?php
$content = "This is test page";



// Size – Denotes A4, Legal, A3, etc ——- size:8.5in 11.0in; for Legal size
// Margin – Set the margin of the word document – margin:0.5in 0.31in 0.42in 0.25in; [margin: top right bottom left]

$word_xmlns = "xmlns:o='urn:schemas-microsoft-com:office:office' xmlns:w='urn:schemas-microsoft-com:office:word' xmlns='http://www.w3.org/TR/REC-html40'&#8221";
$word_xml_settings = "<xml><w:WordDocument><w:View>Print</w:View><w:Zoom>100</w:Zoom></w:WordDocument></xml>";
$word_landscape_style = "@page {size:15.0in 8.5in; margin:0.5in 0.31in 0.42in 0.25in;} div.Section1{page:Section1;}";
$word_landscape_div_start = "<div class='Section1'>";
$word_landscape_div_end = "</div>";
$content = '
<html '.$word_xmlns.'>
<head>'.$word_xml_settings.'<style type="text/css">
'.$word_landscape_style.' table,td {border:0px solid #FFFFFF;} </style>
</head>';

$content.='<strong>รายงานสรุปการเผยแพร่ข่าวผ่านทางช่องทางของระบบ<br/>
สถิติประจำวันที่ ……………..ถึง……………………….
</strong><br>';
$content.='<table x:str border=1 cellpadding=1 cellspacing=1 width=100% style="border-collapse: collapse">
<tr>
<td width="50" class=xl2216681 nowrap style="vertical-align:middle; text-align:center; background-color:#cccccc"><strong>ลำดับ</strong></td>
<td width="150" class=xl2216681 nowrap style="vertical-align:middle; text-align:center; background-color:#cccccc"><strong>หน่วยงาน</strong></td>
<td width="50" class=xl2216681 nowrap style="vertical-align:middle; text-align:center; background-color:#cccccc"><strong>ข่าวดิบทั้งหมด</strong></td>
<td width="50" class=xl2216681 nowrap style="vertical-align:middle; text-align:center; background-color:#cccccc"><strong>Thainews</strong></td>
<td width="50" class=xl2216681 nowrap style="vertical-align:middle; text-align:center; background-color:#cccccc"><strong>Sharing</strong></td>
<td width="50" class=xl2216681 nowrap style="vertical-align:middle; text-align:center; background-color:#cccccc"><strong>IOS</strong></td>
<td width="50" class=xl2216681 nowrap style="vertical-align:middle; text-align:center; background-color:#cccccc"><strong>Android</strong></td>
<td width="50" class=xl2216681 nowrap style="vertical-align:middle; text-align:center; background-color:#cccccc"><strong>Black Berry</strong></td>
<td width="50" class=xl2216681 nowrap style="vertical-align:middle; text-align:center; background-color:#cccccc"><strong>Windows8/ <br/>windows phone 8</strong></td>
<td width="50" class=xl2216681 nowrap style="vertical-align:middle; text-align:center; background-color:#cccccc"><strong>Smart TV</strong></td>
<td width="50" class=xl2216681 nowrap style="vertical-align:middle; text-align:center; background-color:#cccccc"><strong>Face book</strong></td>
<td width="50" class=xl2216681 nowrap style="vertical-align:middle; text-align:center; background-color:#cccccc"><strong>Twitter</strong></td>
<td width="50" class=xl2216681 nowrap style="vertical-align:middle; text-align:center; background-color:#cccccc"><strong>Email</strong></td>
<td width="50" class=xl2216681 nowrap style="vertical-align:middle; text-align:center; background-color:#cccccc"><strong>Rss Feed</strong></td>
<td width="50" class=xl2216681 nowrap style="vertical-align:middle; text-align:center; background-color:#cccccc"><strong>ข่าวดิบที่<br/> ถูกเผยแพร่</strong></td>
<td width="50" class=xl2216681 nowrap style="vertical-align:middle; text-align:center; background-color:#cccccc"><strong>ข่าวดิบที่<br/>ไม่ถูกเผยแพร่</strong></td>
</tr>';

$sum = "";
$dept = $this->department_model;
$news = $this->news_model;
$i = 0;
foreach($result as $val){
	$news->setSC07DepartmentId($val->departmentId);
$content.='<tr>
<td class=xl2216681 nowrap style="text-align:center">';
$content.=$val->RowNumber;
$content.='</td>
<td class=xl2216681 nowrap>';
	 	$dept->setDepartmentId($val->departmentId);
$content.= $dept->toString();
$content.='</td>
<td class=xl2216681 nowrap style="text-align:right">';
		$rawCount = $news->countRawNewsByDepartmentId();
		$sum[0][$i] = $rawCount;
$content.= number_format($rawCount);
$content.= '</td>
<td class=xl2216681 nowrap style="text-align:right">';
		$thainewsCount = $news->countNewsbyDepartmentAndPublictype($val->departmentId, "1");
		$sum[1][$i] = $thainewsCount;
$content.= number_format($thainewsCount);
$content.= '</td>
<td class=xl2216681 nowrap style="text-align:right">';
		$news->setNT08PubTypeID("11");
		$sharingCount = $news->countNewsbyDepartmentAndPublictype();
		$sum[2][$i] = $sharingCount;
$content.= number_format($sharingCount);
$content.= '</td>
<td class=xl2216681 nowrap style="text-align:right">
	
</td>
<td class=xl2216681 nowrap style="text-align:right">
	
</td>
<td class=xl2216681 nowrap style="text-align:right">
	
</td>
<td class=xl2216681 nowrap style="text-align:right">
	
</td>
<td class=xl2216681 nowrap style="text-align:right">
	
</td>';

$content.= '<td class=xl2216681 nowrap style="text-align:right">';
		$news->setNT08PubTypeID("6");
		$facebookCount = $news->countNewsbyDepartmentAndPublictype();
		$sum[8][$i] = $facebookCount;

$content.= number_format($facebookCount);
$content.='</td>
<td class=xl2216681 nowrap style="text-align:right">';
		$news->setNT08PubTypeID("13");
		$twetterCount = $news->countNewsbyDepartmentAndPublictype();
		$sum[9][$i] = $twetterCount;
$content.= number_format($twetterCount);
$content.= '</td>
<td class=xl2216681 nowrap style="text-align:right">';
		$news->setNT08PubTypeID("15");
		$emailCount = $news->countNewsbyDepartmentAndPublictype();
		$sum[10][$i] = $emailCount;
$content.= number_format($emailCount);
$content.= '</td>
<td class=xl2216681 nowrap style="text-align:right">
	
</td>';
$content.= '<td class=xl2216681 nowrap style="text-align:right">';
		$publicRawCount = $news->countPublicNewsByDepartmentId();
		$sum[12][$i] = $publicRawCount;
$content.= number_format($publicRawCount);
$content.= '</td>
<td class=xl2216681 nowrap style="text-align:right">';
		$sum[13][$i] = $rawCount - $publicRawCount;
$content.= number_format($rawCount - $publicRawCount);
$content.='</td>

</tr>';
$i++;
} 
$content.='<tr>
<td class=xl2216681 nowrap style="vertical-align:middle; text-align:center; background-color:#cccccc"></td>
<td class=xl2216681 nowrap style="vertical-align:middle; text-align:center; background-color:#cccccc"><strong>Summation</strong></td>
<td class=xl2216681 nowrap style="vertical-align:middle; text-align:center; background-color:#cccccc">';
$content.= number_format(array_sum($sum[0]));
$content.= '</td>
<td class=xl2216681 nowrap style="vertical-align:middle; text-align:center; background-color:#cccccc">';
$content.= number_format(array_sum($sum[1]));
$content.= '</td>
<td class=xl2216681 nowrap style="vertical-align:middle; text-align:center; background-color:#cccccc">';
$content.= number_format(array_sum($sum[2]));
$content.='</td>
<td class=xl2216681 nowrap style="vertical-align:middle; text-align:center; background-color:#cccccc"></td>
<td class=xl2216681 nowrap style="vertical-align:middle; text-align:center; background-color:#cccccc"></td>
<td class=xl2216681 nowrap style="vertical-align:middle; text-align:center; background-color:#cccccc"></td>
<td class=xl2216681 nowrap style="vertical-align:middle; text-align:center; background-color:#cccccc"></td>
<td class=xl2216681 nowrap style="vertical-align:middle; text-align:center; background-color:#cccccc"></td>
<td class=xl2216681 nowrap style="vertical-align:middle; text-align:center; background-color:#cccccc"></td>
<td class=xl2216681 nowrap style="vertical-align:middle; text-align:center; background-color:#cccccc">';
$content.= number_format(array_sum($sum[9]));
$content.='</td>
<td class=xl2216681 nowrap style="vertical-align:middle; text-align:center; background-color:#cccccc">';
$content.= number_format(array_sum($sum[10]));
$content.='</td>
<td class=xl2216681 nowrap style="vertical-align:middle; text-align:center; background-color:#cccccc"></td>
<td class=xl2216681 nowrap style="vertical-align:middle; text-align:center; background-color:#cccccc">';
$content.= number_format(array_sum($sum[12]));
$content.='</td>
<td class=xl2216681 nowrap style="vertical-align:middle; text-align:center; background-color:#cccccc">';
$content.= number_format(array_sum($sum[13]));
$content.='</td>
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
</table>';
$content .='<body>'.$word_landscape_div_start.$content.$word_landscape_div_end.'</body></html>';
@header('Content-Type: application/msword');
@header('Content-Length: '.strlen($content));
@header('Content-disposition: inline; filename="testdocument.doc"'); 
echo $content;

?>