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
foreach($division as $value);
$atrb=array('class'=>'form form-inline white-pink');
echo form_open(base_url('division/update/'.$value->idDivision),$atrb);
echo '
<h4> <i class="fa fa-plus-square"></i>
      '.$this->lang->line("add").' '.$this->lang->line("division").'
</h4>';

?><div class="course" style="color:red;font-size:15px;"></div><?php


$js = 'id="id_course" onChange="get_textbook(this.value)"';
							foreach($course as $val){
							 $drop[$val->idCourse] = $val->course;
							 }
			echo form_dropdown('id_course',$drop,$value->idCourse,$js. 'class="form-control" style="width:50%;margin-bottom:10px;"');
			?>
			<div id="getTextbook2">
			<?php
			$drop4['0'] =$this->lang->line("textbook1");
			foreach($textbook as $val4){
			 $drop4[$val4->idTextbook]= $val4->textbook;
			 }
			echo form_dropdown('id_textbook',$drop4,$value->idTextbook,'class="form-control" id= "id_textbook"  style="width:50%;margin-bottom:10px;"');
			
?>
</div>
<div id="getTextbook" style="color:red;font-size:15px;">

</div>
<?php


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

?>
</div></div>



<!-- End file ---------------------------------------------------------------- -->
