<?php
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);
$pdf->AddPage();
$pdf->setRTL(true);
$pdf->SetFont('aefurat', '', 8);
// print newline
$pdf->Ln();
// This file view the data which comes databases by PDF Program ------------------------------------------------ -->
// Arabic and English content
// ------------------------------------------------------------------------------------------------------------- -->
$html = '<div class="container text-center"><h3 align="center" class="headline">' . $title . '</h3>';
$html .='<h3 align="center" class="headline">' . $this->lang->line("recordes") . ' ' . count($records) . '</h3>
	<table align="center" lang="ar" dir="rtl" border="1" class="table" style="width:520px;border-collapse:collapse;border:1">	
		<thead>
			<tr align="center">
				<th width="40px" >' . $this->lang->line("no") . '</th>
				<th  width="50px" >' . $this->lang->line("thedate") . '</th>
				<th  width="100px" >' . $this->lang->line("beneficiary") . '</th>
				<th width="60px" >' . $this->lang->line("thevalue") . '</th>
				<th width="80px" >' . $this->lang->line("nocheck") . '</th>
				<th width="160px" >' . $this->lang->line("details") . '</th>
				<th width="40px" >' . $this->lang->line("entry") . ' </th>
			</tr>
		</thead>
		<tbody>';

for ($i = 0; $i < count($records); $i++) {
    $html .='<tr align="center">';
    $html .='<td width="40px">' . ($i + 1) . '</td> 
				<td width="50px">
					<span  dir="LTR" >' . $records[$i]->thedate . '</span>
				</td>
				<td width="100px">' . $records[$i]->beneficiary . '</td>
				<td width="60px">' . $records[$i]->thevalue . '</td>
				<td width="80px">' . $records[$i]->nocheck . '</td>
				<td width="160px">' . $records[$i]->details . '</td>
				<td width="40px">' . $records[$i]->journal_id . '</td>
			</tr>';
}
$html .='</tbody>
	</table>';

$pdf->writeHTML($html, true, false, true, false, '');
$date = date('Y-m-d');
//Close and output PDF document
$pdf->Output('expense' . $date . '.pdf', 'I');
?>
<!-- End file ----------------------------------------------------------------------------------------------------------- -->
