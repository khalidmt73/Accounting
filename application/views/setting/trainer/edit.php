<?php
if ($this->session->userdata('userCC') != TRUE) {
    redirect(base_url('login/index'));
}
if(!in_array('trainer',$this->data_header['user'])){
		redirect(base_url('cpanel/index'));
}	
?>
<div class="row">
	<div class="col-xs-6 col-md-push-3">
<?php
foreach ($record as $value) {
  
$atrb=array('class'=>'form form-inline white-pink');
echo form_open(base_url('trainer/update/'.$value->idTrainer),$atrb);
echo '
<h4> <i class="fa fa-pencil"></i>
      '.$this->lang->line("edit").' '.$this->lang->line("trainer1").'
</h4>';

$atb   = array(
			   'class' => '',
               'style' => 'color: #000;',
			   );

$data = array(
               'name'        => 'nameTrainer',
               'id'          => 'nameTrainer',
               'value'       => $value->nameTrainer,
               'maxlength'   => '100',
               'size'        => '50',
               'style'       => 'width:50%;margin-bottom:10px',
               'class'       => 'form-control',
			   'placeholder' => '',
             );
echo form_input($data);

$atb   = array(
			   'class' => '',
               'style' => 'color: #000;',
			   );

$data = array(
               'name'        => 'idCardTrainer',
               'id'          => 'idCardTrainer',
               'value'       => $value->idCardTrainer,
               'maxlength'   => '100',
               'size'        => '50',
               'style'       => 'width:50%;margin-bottom:10px;',
               'class'       => 'form-control',
			   'placeholder' => ''
             );
echo form_input($data);
$data = array(
               'name'        => 'mobileTrainer',
               'id'          => 'mobileTrainer',
               'value'       => $value->mobileTrainer,
               'maxlength'   => '100',
               'size'        => '50',
               'style'       => 'width:50%;margin-bottom:10px;',
               'class'       => 'form-control',
			   'placeholder' => ''
             );
echo form_input($data);

$data = array(
               'name'        => 'emailTrainer',
               'id'          => 'emailTrainer',
               'value'       => $value->emailTrainer,
               'maxlength'   => '100',
               'size'        => '50',
               'style'       => 'width:50%;margin-bottom:10px;',
               'class'       => 'form-control',
			   'placeholder' => ''
             );
echo form_input($data);

$data = array(
               'name'        => 'submit',
               'id'          => 'submit',
               'value'       => 'تعديل',
               'maxlength'   => '100',
               'size'        => '50',
               'class'       => 'btn btn-info',
               'style'       => 'width:50%',
             );

 echo form_submit($data);

echo form_close();

?>
</div></div>
<?php
 } 
     if (isset($msg)) {echo $msg;}

 
 ?>

<!-- End file ---------------------------------------------------------------------- -->
