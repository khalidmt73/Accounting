1- Numbers
===========================================================================
controler
---------------
$amountBenef=56700;
$data['str']      = $this->numbers->money2str($amountBenef, 'SAR', 'ar'); 

view
---------------
echo $str;


2- pdf
===========================================================================

view
---------------

<?php
$pdf = new Tcpdf(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);
$pdf->AddPage();
$pdf->setRTL(true);
$pdf->SetFont('aefurat', '', 8);
// print newline
$pdf->Ln();

$html = '<div class="container text-center"><h3 align="center" class="headline">Œ«·œ</h3>';
$html .='<h3 align="center" class="headline">Â·««««</h3>';
$html .='';
$pdf->writeHTML($html, true, false, true, false, '');
$date = date('Y-m-d');
//Close and output PDF document
$pdf->Output('income' . $date . '.pdf', 'I');
?>



3- Mpages 
===========================================================================

controler
---------------
$start =$this->mpages->mulitiPages($offset,$get_num ,$limit);
$data['photo']=$this->model->get_all('table',$limit,$start ,"id", "DESC");
$data['pages'] = $this->mpages->pagesPrint(base_url('link'.$limit."/"));

view
---------------
echo $pages;




