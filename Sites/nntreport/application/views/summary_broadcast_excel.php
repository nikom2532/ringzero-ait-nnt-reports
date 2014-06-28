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
<strong>สรุปการเผยแพร่ข่าว</strong><br>
<br>
<div id="SiXhEaD_Excel" align=center x:publishsource="Excel">
<table x:str border=1 cellpadding=0 cellspacing=0 width=100% style="border-collapse: collapse">
<tr>
<td width="100" class=xl2216681 nowrap><strong>ลำดับ</strong></td>
<td width="180" class=xl2216681 nowrap><strong>เลขที่ข่าว</strong></td>
<td width="600" class=xl2216681 nowrap><strong>หัวข้อข่าว</strong></td>
<td width="150" class=xl2216681 nowrap><strong>วันที่ข่าว</strong></td>
<td width="150" class=xl2216681 nowrap><strong>แหล่งข่าว</strong></td>
<td width="150" class=xl2216681 nowrap><strong>สายข่าว</strong></td>
<td width="150" class=xl2216681 nowrap><strong>ผู้สื่อข่าว</strong></td>
</tr>
<?php
foreach($result as $row){
?>
<tr>
<td class=xl2216681 nowrap><?php echo $row->RowNumber;?></td>
<td class=xl2216681 nowrap><?php echo $row->NT01_NewsID;?></td>
<td class=xl2216681 nowrap><?php echo $row->NT01_NewsTitle;?></td>
<td class=xl2216681 nowrap><?php echo $row->NT01_NewsDate;?></td>
<td class=xl2216681 nowrap></td>
<td class=xl2216681 nowrap></td>
<td class=xl2216681 nowrap></td>
</tr>
<?php } ?>
</table>
</div>
 
</body>
</html>