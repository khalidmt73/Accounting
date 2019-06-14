<?php
if ($this->session->userdata('userCC') != TRUE) {
    redirect(base_url('login/index'));
}
if(!in_array('staff',$this->data_header['user'])){
		redirect(base_url('cpanel/index'));
}	
foreach ($record as $value) {
  
$atrb=array('class'=>'form form-inline white-pink');
echo form_open(base_url('staff/update/'.$value->id),$atrb);
echo '
<h4> <i class="fa fa-pencil"></i>
      '.$this->lang->line("edit").' '.$this->lang->line("staff").'
</h4>';
$data = array(
               'name'        => 'name',
               'id'          => 'name',
               'value'       => $value->name,
               'maxlength'   => '100',
               'size'        => '50',
               'style'       => 'width:50%;margin-bottom:10px',
               'class'       => 'form-control',
			   'placeholder' => $this->lang->line("staff_name")
             );
echo form_input($data);

$data = array(
               'name'        => 'idCard',
               'id'          => 'idCard',
               'value'       => $value->idCard,
               'maxlength'   => '100',
               'size'        => '50',
               'style'       => 'width:50%;margin-bottom:10px;',
               'class'       => 'form-control',
			   'placeholder' => $this->lang->line("idCard")
             );
echo form_input($data);

$data = array(
               'name'        => 'staffNo',
               'id'          => 'staffNo',
               'value'       => $value->staffNo,
               'maxlength'   => '100',
               'size'        => '50',
               'style'       => 'width:50%;margin-bottom:10px;',
               'class'       => 'form-control',
			   'placeholder' => $this->lang->line("staffNo")
             );
echo form_input($data);

$data = array(
               'name'        => 'mobile',
               'id'          => 'mobile',
               'value'       => $value->mobile,
               'maxlength'   => '100',
               'size'        => '50',
               'style'       => 'width:50%;margin-bottom:10px;',
               'class'       => 'form-control',
			   'placeholder' => 'رقم الجوال'
             );
echo form_input($data);

$data = array(
               'name'        => 'email',
               'id'          => 'email',
               'value'       => $value->email,
               'maxlength'   => '100',
               'size'        => '50',
               'style'       => 'width:50%;margin-bottom:10px;',
               'class'       => 'form-control',
			   'placeholder' => 'البريد الإلكتروني'
             );
echo form_input($data);
 
$drop['0'] ='حدد القسم';
			foreach($dep as $val){
			 $drop[$val->id] = $val->dep;
			 }
			echo form_dropdown('id_dep',$drop,$value->id_dep,'class="form-control" style="width:50%;margin-bottom:10px;"');

$data = array(
               'name'        => 'submit',
               'id'          => 'submit',
               'value'       => 'حفظ',
               'maxlength'   => '100',
               'size'        => '50',
               'class'       => 'btn btn-info',
               'style'       => 'width:50%',
             );

 echo form_submit($data);

echo form_close();


 } ?>

<!-- End file -------------------------------------------------------------------------- -->
