<?php

require_once('./tcpdf/config/lang/eng.php');
require_once('./tcpdf/tcpdf.php');

// create new PDF document
$pdf = new TCPDF('L', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Boripat');
$pdf->SetTitle('Consumer');
$pdf->SetSubject('Consumer');
$pdf->SetKeywords('Consumer');

// remove default header/footer
$pdf->setPrintHeader(false);
//$pdf->setPrintFooter(false);
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

//set margins
$pdf->SetMargins(10, 10, 10);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

//set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

//set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

//set some language-dependent strings
$pdf->setLanguageArray($l);

// ---------------------------------------------------------

// set font
// output the HTML content
$pdf->AddPage();
$pdf->SetFont('thsarabun', '', 16);
$txt = 'สรุปการเผยแพร่ข่าว '.$count.' รายการ <br/>';
$txt .= '
    <table border="1" cellpadding="5">
        <tr style="background-color:#e5e5e5">
            <th align="center" width="50px"><b>ลำดับ</b></th>
            <th align="center" width="150px"><b>เลขที่ข่าว</b></th>
            <th align="center" width="400px"><b>หัวข้อข่าว</b></th>
            <th align="center" width="80px"><b>วันที่ข่าว</b></th>
            <th align="center" width="100px"><b>แหล่งข่าว</b></th>
            <th align="center" width="100px"><b>สายข่าว</b></th>
            <th align="center" width="100px"><b>ผู้สื่อข่าว</b></th>
           
        </tr>';
foreach($result as $row){
    //$user = $this->db->get_where("users",array("user_id"=>$row->user_id))->row();
    $txt.="
        <tr>
            <td align='center'>$row->RowNumber</td>
            <td align='center'>$row->NT01_NewsID</td>
            <td align='center'>$row->NT01_NewsTitle</td>
            <td align='center'>$row->NT01_NewsDate</td>
            <td align='center'></td>
            <td align='center'></td>
            <td align='center'></td>
        </tr>
    ";
}

$txt .= '      
    </table>
';
// output the HTML content
$pdf->writeHTML($txt, true, false, true, false, '');
$pdf->SetFont('cordiaupc', 'I', 12);
$txt ='พิมพ์เมื่อ '.date("d-m-Y H:i:s");
$pdf->writeHTML($txt, true, false, true, false, '');
// ---------------------------------------------------------
//Close and output PDF document
$pdf->Output('Summary.pdf', 'I');





