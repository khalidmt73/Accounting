<?php
if ($this->session->userdata('userCC') != TRUE) {
    redirect(base_url('login/index'));
}
if(!in_array('course',$this->data_header['user'])){
		redirect(base_url('cpanel/index'));
}	
foreach ($record as $value) {
  
$atrb=array('class'=>'form form-inline white-pink');
echo form_open(base_url('dep/update/'.$value->id),$atrb);
echo '
<h4> <i class="fa fa-pencil"></i>
      '.$this->lang->line("edit").' '.$this->lang->line("dep").'
</h4>';

$atb   = array(
			   'class' => '',
               'style' => 'color: #000;',
			   );

$data = array(
               'name'        => 'dep',
               'id'          => 'dep',
               'value'       => $value->dep,
               'maxlength'   => '100',
               'size'        => '50',
               'style'       => 'width:50%;margin-bottom:10px',
               'class'       => 'form-control',
			   'placeholder' => 'اسم المتدرب'
             );
echo form_input($data);

$atb   = array(
			   'class' => '',
               'style' => 'color: #000;',
			   );

$data = array(
               'name'        => 'dep_en',
               'id'          => 'dep_en',
               'value'       => $value->dep_en,
               'maxlength'   => '100',
               'size'        => '50',
               'style'       => 'width:50%;margin-bottom:10px;',
               'class'       => 'form-control',
			   'placeholder' => 'رقم الهوية'
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

$clos_div = ' </div></div>';
echo form_close($clos_div);


 } ?>

<!-- End file -------------------------------------------------------------------------- -->
