<?php
if ($this->session->userdata('userCC') != TRUE) {
    redirect(base_url('login/index'));
}
if(!in_array('lists',$this->data_header['user'])){
		redirect(base_url('login/index'));
		}	

$pdf = new TCPDF('landscap', PDF_UNIT, 'A4', true, 'UTF-8', false);

$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);
$pdf->AddPage();
$pdf->setRTL(true);
$pdf->SetFont('aefurat', '', 8);
$txtA1 = $this->lang->line("site_name");
$txtA2 = $hijry;
$txtE1 = $this->lang->line("site_name_eng");
$txtE2 = date('Y/m/d');

// print a block of text using Write()
//$pdf->Ln();

//Cell($w, $h=0, $txt='', $border=0, $ln=0, $align='', $fill=0, $link='', $stretch=0, $ignore_min_height=false, $calign='T', $valign='M')

$pdf->Cell(0, 0, $txtE1, 0, 1, 'L', 0, '', 'M');
$pdf->Cell(0, 0, $txtE2, 0, 1, 'L', 0, '', 'M');

$pdf->Cell(0, 0, $txtA1, 0, 1, 'R', 0, 'T', '');
$pdf->Cell(0, 0, $txtA2, 0, 1, 'R', 0, '', 'M');



//$pdf->Cell(60, 0, $txtE2, 0, 1, 'L', 0, '', 'M');
// print newline

// This file view the data which comes databases by PDF Program ------------------------------------------------ -->
// Arabic and English content
// --------------------------------------------- -->
$pdf->Image('public/img/logo.png', 150, 10, 17,8, 'PNG', 'center', '', true, 150, '', false, false, 0, false, false, false);

$html = '';
$html .='<br/ ><br /><br/ ><br />
	<table align="center" lang="ar" dir="rtl" border="1" class="table" style="width:520px;border-collapse:collapse;border:1">	
		<thead>
			<tr align="center">
				<th width="40px" >' . $this->lang->line("no") . '</th>
				<th  width="100px" >' . $this->lang->line("name") . '</th>
				<th  width="80px" >' . $this->lang->line("academicNo") . '</th>
				<th width="300px" >' . $this->lang->line("p") . '</th>
			</tr>
		</thead>
		<tbody>';

for ($i = 0; $i < count($records); $i++) {
    $html .='<tr align="center">';
    $html .='<td width="40px">' . ($i + 1) . '</td> 
				<td width="100px">
					<span  dir="LTR" >' . $records[$i]->name . '</span>
				</td>
				<td width="80px">' . $records[$i]->academicNo . '</td>
				<td width="300px" ><input type="checkbox" name=""></td>

			</tr>';
}
$html .='</tbody>
	</table>';

$pdf->writeHTML($html, true, false, true, false, '');
$date = date('Y-m-d');
//Close and output PDF document
$pdf->Output('income' . $date . '.pdf', 'I');
?>
<!-- End file ----------------------------------------------------------------------------------------------------------- -->
