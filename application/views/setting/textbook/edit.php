<?php
if ($this->session->userdata('userCC') != TRUE) {
    redirect(base_url('login/index'));
}
if(!in_array('textbook',$this->data_header['user'])){
		redirect(base_url('cpanel/index'));
}	
?>
<div class="row">
	<div class="col-xs-6 col-md-push-3">
<?php

foreach ($record as $value) {
  
$atrb=array('class'=>'form form-inline white-pink');
echo form_open(base_url('textbook/update/'.$value->idTextbook),$atrb);
echo '
<h4> <i class="fa fa-pencil"></i>
      '.$this->lang->line("edit").' '.$this->lang->line("textbook").'
</h4>';

$data = array(
               'name'        => 'textbook',
               'id'          => 'textbook',
               'value'       => $value->textbook,
               'maxlength'   => '100',
               'size'        => '50',
               'style'       => 'width:50%;margin-bottom:10px',
               'class'       => 'form-control',
			   'placeholder' => $this->lang->line("number1")
             );
echo form_input($data);


$data = array(
               'name'        => 'code',
               'id'          => 'code',
               'value'       => $value->code,
               'maxlength'   => '100',
               'size'        => '50',
               'style'       => 'width:50%;margin-bottom:10px',
               'class'       => 'form-control',
			   'placeholder' => $this->lang->line("number1")
             );
echo form_input($data);

?><div class="course" style="color:red;font-size:15px;"></div><?php
$drop3['0'] =$this->lang->line("course1");
		foreach($course as $val3){
		 $drop3[$val3->idCourse]= $val3->course;
		 }
echo form_dropdown('id_course',$drop3,$value->id_course,'class="form-control" id= "id_course"  style="width:50%;margin-bottom:10px;"');

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
 } ?>
</div></div>
<!-- End file -------------------------------------------------------------------------- -->
