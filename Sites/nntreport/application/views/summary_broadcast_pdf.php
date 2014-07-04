<?php

require_once('./tcpdf/config/lang/eng.php');
require_once('./tcpdf/tcpdf.php');

// create new PDF document
$pdf = new TCPDF('L', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('AIT');
$pdf->SetTitle('NNT Summary broadcast');
$pdf->SetSubject('NNT Summary broadcast');
$pdf->SetKeywords('NNT-Report');

// remove default header/footer
$pdf->setPrintHeader(false);
//$pdf->setPrintFooter(false);
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

$pdf->SetMargins(5, 5, 5);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(5);

$pdf->SetAutoPageBreak(TRUE, 5);

$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

$pdf->setLanguageArray($l);

// ---------------------------------------------------------

// set font
// output the HTML content
$pdf->AddPage();
$headerText = '<b>สรุปการเผยแพร่ข่าว<br/>
สถิติประจำวันที่ ……………..ถึง……………………….</b><br/>';
$txt = '
    <table border="1" cellpadding="2">
        <tr style="background-color:#e5e5e5">
            <th align="center" width="40px"><b>ลำดับ</b></th>
            <th align="center" width="180px"><b>หน่วยงาน</b></th>
            <th align="center" width="60px"><b>ข่าวดิบทั้งหมด</b></th>
            <th align="center" width="55px"><b>Thainews</b></th>
            <th align="center" width="55px"><b>Sharing</b></th>
            <th align="center" width="55px"><b>IOS</b></th>
            <th align="center" width="55px"><b>Android</b></th>
            <th align="center" width="55px"><b>Black Berry</b></th>
            <th align="center" width="55px"><b>Win8/ winPhone 8</b></th>
            <th align="center" width="55px"><b>Smart TV</b></th>
            <th align="center" width="55px"><b>Face book</b></th>
            <th align="center" width="55px"><b>Twitter</b></th>
            <th align="center" width="55px"><b>Email</b></th>
            <th align="center" width="55px"><b>Rss Feed</b></th>
            <th align="center" width="55px"><b>ข่าวดิบที่ <br/>ถูกเผยแพร่</b></th>
            <th align="center" width="65px"><b>ข่าวดิบที่ <br/>ไม่ถูกเผยแพร่</b></th>
        </tr>';
$sum = "";
$dept = $this->department_model;
$news = $this->news_model;
$i = 0;
foreach($result as $val){
    $news->setSC07DepartmentId($val->departmentId);
    $dept->setDepartmentId($val->departmentId);

    $rawCount = $news->countRawNewsByDepartmentId();
    $sum[0][$i] = $rawCount;

    $thainewsCount = $news->countNewsbyDepartmentAndPublictype($val->departmentId, "1");
    $sum[1][$i] = $thainewsCount;

    $news->setNT08PubTypeID("11");
    $sharingCount = $news->countNewsbyDepartmentAndPublictype();
    $sum[2][$i] = $sharingCount;

    $news->setNT08PubTypeID("6");
    $facebookCount = $news->countNewsbyDepartmentAndPublictype();
    $sum[8][$i] = $facebookCount;

    $news->setNT08PubTypeID("13");
    $twetterCount = $news->countNewsbyDepartmentAndPublictype();
    $sum[9][$i] = $twetterCount;

    $news->setNT08PubTypeID("15");
    $emailCount = $news->countNewsbyDepartmentAndPublictype();
    $sum[10][$i] = $emailCount;

    $publicRawCount = $news->countPublicNewsByDepartmentId();

    $sum[12][$i] = $publicRawCount;
    
    $sum[13][$i] = $rawCount - $publicRawCount;
    
    $dis = $rawCount - $publicRawCount;

    $txt.="
        <tr>
            <td align='center'>".$val->RowNumber."</td>
            <td style='text-align:right'>".$dept->toString()."</td>
            <td style='text-align:right'>".number_format($rawCount)."</td>
            <td style='text-align:right'>".number_format($thainewsCount)."</td>
            <td style='text-align:right'>".number_format($sharingCount)."</td>
            <td style='text-align:right'></td>
            <td style='text-align:right'></td>
            <td style='text-align:right'></td>
            <td style='text-align:right'></td>
            <td style='text-align:right'></td>
            <td style='text-align:right'>".number_format($facebookCount)."</td>
            <td style='text-align:right'>".number_format($twetterCount)."</td>
            <td style='text-align:right'>".number_format($emailCount)."</td>
            <td style='text-align:right'></td>
            <td style='text-align:right'>".number_format($publicRawCount)."</td>
            <td style='text-align:right'>".number_format($dis)."</td>
        </tr>
    ";
    $i++;
}

$txt .= '   
        <tr style="background-color:#e5e5e5">
            <td></td>
            <td>Summation</td>
            <td>'.number_format(array_sum($sum[0])).'</td>
            <td>'.number_format(array_sum($sum[1])).'</td>
            <td>'.number_format(array_sum($sum[2])).'</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td>'.number_format(array_sum($sum[9])).'</td>
            <td>'.number_format(array_sum($sum[10])).'</td>
            <td></td>
            <td>'.number_format(array_sum($sum[12])).'</td>
            <td>'.number_format(array_sum($sum[13])).'</td>
        </tr>
        <tr style="background-color:#e5e5e5">
            <td></td>
            <td>ค่าเฉลี่ย ต่อวัน</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
    </table>
    พิมพ์เมื่อ '.date("d-m-Y H:i:s");
// output the HTML content
$pdf->SetFont('thsarabun', '', 14);
$pdf->writeHTML($headerText, true, false, true, false, '');
$pdf->SetFont('thsarabun', '', 10);
$pdf->writeHTML($txt, true, false, true, false, '');
// ---------------------------------------------------------
//Close and output PDF document
$pdf->Output('Summary'.date("d-m-Y_H:i:s").'.pdf', 'I');





