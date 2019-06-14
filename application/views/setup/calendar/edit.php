<?php
if ($this->session->userdata('userCC') != TRUE) {
    redirect(base_url('login/index'));
}
if(!in_array('calendar',$this->data_header['user'])){
		redirect(base_url('cpanel/index'));
}	
?>
<div class="row">
	<div class="col-xs-6 col-md-push-3">
<?php
foreach ($record as $value) {
  
$atrb=array('class'=>'form form-inline white-pink');
echo form_open(base_url('calendar/update/'.$value->idCalendar),$atrb);
echo '
<h4> <i class="fa fa-pencil"></i>
      '.$this->lang->line("edit").' '.$this->lang->line("calendar1").'
</h4>';

$data = array(
               'name'        => 'year',
               'id'          => 'year',
               'value'       => $value->year,
               'maxlength'   => '4',
               'style'       => 'width:50%;margin-bottom:10px',
               'class'       => 'form-control',
			   'required'    => 'required',
			   'placeholder' => $this->lang->line("year1")
             );
echo form_input($data);

$data = array(
               'name'        => 'semester',
               'id'          => 'semester',
               'value'       => $value->semester,
               'maxlength'   => '1',
               'style'       => 'width:50%;margin-bottom:10px;',
               'class'       => 'form-control',
			   'required'    => 'required',
			   'placeholder' => $this->lang->line("semester1")
            
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
