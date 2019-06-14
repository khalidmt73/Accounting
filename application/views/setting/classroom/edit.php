<?php
if ($this->session->userdata('userCC') != TRUE) {
    redirect(base_url('login/index'));
}
if(!in_array('classroom',$this->data_header['user'])){
		redirect(base_url('cpanel/index'));
}	
?>
<div class="row">
	<div class="col-xs-6 col-md-push-3">
<?php
foreach ($record as $value) {
  
$atrb=array('class'=>'form form-inline white-pink');
echo form_open(base_url('classroom/update/'.$value->idClassroom),$atrb);
echo '
<h4> <i class="fa fa-pencil"></i>
      '.$this->lang->line("edit").' '.$this->lang->line("classroom1").'
</h4>';

$data = array(
               'name'        => 'number',
               'id'          => 'number',
               'value'       => $value->number,
               'maxlength'   => '100',
               'size'        => '50',
               'style'       => 'width:50%;margin-bottom:10px',
               'class'       => 'form-control',
			   'placeholder' => $this->lang->line("number1")
             );
echo form_input($data);

$data = array(
               'name'        => 'capacity',
               'id'          => 'capacity',
               'value'       => $value->capacity,
               'maxlength'   => '100',
               'size'        => '50',
               'style'       => 'width:50%;margin-bottom:10px;',
               'class'       => 'form-control',
			   'placeholder' => $this->lang->line("capacity")
            
             );
echo form_input($data);

$data = array(
               'name'        => 'location',
               'id'          => 'location',
               'value'       => $value->location,
               'maxlength'   => '100',
               'size'        => '50',
               'style'       => 'width:50%;margin-bottom:10px;',
               'class'       => 'form-control',
			   'placeholder' => $this->lang->line("location")
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


 } ?>
</div></div>
<!-- End file -------------------------------------------------------------------------- -->
