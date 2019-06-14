<?php
if ($this->session->userdata('userCC') != TRUE) {
    redirect(base_url('login/index'));
}
if(!in_array('course',$this->data_header['user'])){
		redirect(base_url('cpanel/index'));
}	
?>
<div class="row">
	<div class="col-xs-6 col-md-push-3">
<?php
foreach ($record as $value) {
  
$atrb=array('class'=>'form form-inline white-pink');
echo form_open(base_url('course/update/'.$value->idCourse),$atrb);
echo '
<h4> <i class="fa fa-pencil"></i>
      '.$this->lang->line("edit").' '.$this->lang->line("course1").'
</h4>';

$data = array(
               'name'        => 'course',
               'id'          => 'course',
               'value'       => $value->course,
               'maxlength'   => '100',
               'style'       => 'width:50%;margin-bottom:10px',
               'class'       => 'form-control',
			   'placeholder' => $this->lang->line("name1").' '.$this->lang->line("course1"),
             );
echo form_input($data);

$type = array('دورة','دبلوم');
				foreach($type as $key => $val){
				$drop[$key] = $val;
				}
				echo '&nbsp;&nbsp;'.form_dropdown('type',$drop,$value->type,'class="form-control" style="width:50%;font-size:13px;margin-bottom:10px"');

$data = array(
               'name'        => 'amount',
               'id'          => 'amount',
               'value'       => $value->amount,
               'maxlength'   => '10',
               'style'       => 'width:50%;margin-bottom:10px',
               'class'       => 'form-control',
			   'placeholder' => $this->lang->line("val").' '.$this->lang->line("course1"),
             );
echo form_input($data);

$data = array(
               'name'        => 'target',
               'id'          => 'target',
               'value'       => $value->target,
               'size'        => '10',
               'style'       => 'width:50%;height:80px;margin-bottom:10px',
               'class'       => 'form-control',
			   'placeholder' => $this->lang->line("target"),
             );
echo form_textarea($data);

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
