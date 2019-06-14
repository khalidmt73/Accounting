<?php
if ($this->session->userdata('userCC') != TRUE) {
    redirect(base_url('login/index'));
}
if(!in_array('textbook',$this->data_header['user'])){
		redirect(base_url('cpanel/index'));
}	
foreach ($record as $value) {
  

$atrb=array('class'=>'form form-inline white-pink');
echo form_open(base_url('textbook/updateLinkin/'.$value->id),$atrb);
echo '
<h4> <i class="fa fa-plus-square"></i>
      '.$this->lang->line("edit").' '.$this->lang->line("linkin").' '.$this->lang->line("textbook").'
</h4>';

 $drop['0'] =$this->lang->line("course1");
		foreach($course as $val){
		 $drop[$val->division] = $val->course.' - '.$val->division;
		 }
echo form_dropdown('division',$drop,$value->division,'class="form-control" style="width:50%;margin-bottom:10px;"');



$drop1['0'] =$this->lang->line("textbook1");
		foreach($textbook as $val1){
		 $drop1[$val1->idTextbook] = $val1->textbook;
		 }
echo form_dropdown('id_textbook',$drop1,$value->id_textbook,'class="form-control" style="width:50%;margin-bottom:10px;"');

 
$drop2['0'] = $this->lang->line("trainer1");
		foreach($trainer as $val2){
		 $drop2[$val2->id] = $val2->name;
		 }
echo form_dropdown('id_trainer',$drop2,$value->id_trainer,'class="form-control" style="width:50%;margin-bottom:10px;"');


$drop3['0'] = $this->lang->line("classroom1");
		foreach($classroom as $val3){
		 $drop3[$val3->id] = $val3->number;
		 }
echo form_dropdown('id_classroom',$drop3,$value->id_classroom,'class="form-control" style="width:50%;margin-bottom:10px;"');


$drop4['0'] = $this->lang->line("num").' '.$this->lang->line("hours");
for($h=1;$h <= 6 ;$h++){
$drop4[$h] = $h;
}
echo form_dropdown('hour',$drop4,$value->hour,'class="form-control" style="width:50%;margin-bottom:10px;"');


$data = array(
               'name'        => 'lectureNo',
               'id'          => 'lectureNo',
               'value'       =>  $value->lectureNo,
               'maxlength'   => '3',
               'size'        => '',
               'style'       => 'width:50%;margin-bottom:0px;text-center',
               'class'       => 'form-control',
			   'placeholder' => $this->lang->line("num").' '.$this->lang->line("lectures")
             );
echo form_input($data);

?>

<div class="text-right">
<?php echo $this->lang->line("days");?>
<hr />
</div>
<?php 		$day = explode('-',$value->day);?>
<input type="checkbox" class="checkbox" name="day[]" value="su" <?php if(in_array('su',$day)) echo "checked";?>> 
<?php echo $this->lang->line('su'); ?>&nbsp;
<input type="checkbox" class="checkbox" name="day[]" value="mo" <?php if(in_array('mo',$day)) echo "checked";?>> 
<?php echo $this->lang->line('mo'); ?>&nbsp;
<input type="checkbox" class="checkbox" name="day[]" value="tu" <?php if(in_array('tu',$day)) echo "checked";?>> 
<?php echo $this->lang->line('tu'); ?>&nbsp;
<input type="checkbox" class="checkbox" name="day[]" value="we" <?php if(in_array('we',$day)) echo "checked";?>> 
<?php echo $this->lang->line('we'); ?>&nbsp;
<input type="checkbox" class="checkbox" name="day[]" value="th" <?php if(in_array('th',$day)) echo "checked";?>> 
<?php echo $this->lang->line('th'); ?>

<div class="text-right">
<?php echo $this->lang->line("time").' : ';?>
<hr />
</div>

<?php

echo form_label($this->lang->line("from").' : &nbsp;');
$data = array(
               'name'        => 'from',
               'id'          => 'from',
               'value'       =>  $value->from,
               'maxlength'   => '2',
               'size'        => '50',
               'style'       => 'width:10%;margin-bottom:0px;text-center',
               'class'       => 'form-control',
			   'placeholder' => ''
             );
echo form_input($data);

echo '&nbsp;'.form_label($this->lang->line("to").' : &nbsp;');
$data = array(
               'name'        => 'to',
               'id'          => 'to',
               'value'       =>  $value->to,
               'maxlength'   => '2',
               'size'        => '50',
               'style'       => 'width:10%;margin-bottom:0px;text-center',
               'class'       => 'form-control',
			   'placeholder' => ''
             );
echo form_input($data);

$drop3['0'] = $this->lang->line("classroom1");
		foreach($classroom as $val3){
		 $drop3[$val3->id] = $val3->number;
		 } 

$pm = array('مساء','صباح');
foreach($pm as $key => $val){
$drop5[$key] = $val;
}
echo '&nbsp;'.form_dropdown('pm',$drop5,$value->pm,'class="form-control" style="width:15%;font-size:10px;"');

?><br /><br /><?php

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
}
?>

<!-- End file -------------------------------------------------------------------------- -->
