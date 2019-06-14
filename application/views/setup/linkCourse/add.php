<?php
if ($this->session->userdata('userCC') != TRUE) {
    redirect(base_url('login/index'));
}
if(!in_array('linkCourse',$this->data_header['user'])){
		redirect(base_url('cpanel/index'));
		}	
?>

<div class="row">
	<div class="col-xs-6 col-md-push-3">
<?php
$atrb=array('class'=>'form form-inline white-pink');
echo form_open(base_url('linkCourse/create'),$atrb);
echo '
<h4> <i class="fa fa-plus-square"></i>
      '.$this->lang->line("linkin").' '.$this->lang->line("new").'
</h4>';
$drop['0'] =$this->lang->line("course1");
		foreach($course as $val){
		 $drop[$val->idCourse] = $val->course;
		 }
echo form_dropdown('idCourse',$drop,'0',' class="form-control" style="width:50%;margin-bottom:10px;"');
?>


<script>
$(function() {
	var calendar = $.calendars.instance('islamic');
	$('#popupDatepicker').calendarsPicker({calendar: calendar});
});

function showDate(date) {
	alert('The date chosen is ' + date);
}
$(function() {
	var calendar = $.calendars.instance('islamic');
	$('#popupDatepicker2').calendarsPicker({calendar: calendar});
});

function showDate(date) {
	alert('The date chosen is ' + date);
}
</script>

<?php

$data = array(
               'name'        => 'fromdate',
               'id'          => 'popupDatepicker',
               'value'       => '',
               'maxlength'   => '100',
               'size'        => '50',
               'style'       => 'width:50%;margin-bottom:10px;',
               'class'       => 'tcal form-control',
			   'placeholder' => $this->lang->line("fromdate"),
             );
echo form_input($data);

$data = array(
               'name'        => 'todate',
               'id'          => 'popupDatepicker2',
               'value'       => '',
               'maxlength'   => '100',
               'size'        => '50',
               'style'       => 'width:50%;margin-bottom:10px;',
               'class'       => 'tcal form-control',
			   'placeholder' => $this->lang->line("todate"),
             );
echo form_input($data);

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

</div>
</div>

<?php if (isset($oneRecord)) { ?>
 <div class="container text-center">
            <div class="box row col-md-10 col-md-push-1 col-xs-12 col-xs-push-1"><!-- /.row -->
	<?php
			echo viewData_one(
					  $th = array(
					  $this->lang->line('no'),
					  $this->lang->line('course1'),
 					  $this->lang->line('series'),
 					  $this->lang->line('fromdate'),
 					  $this->lang->line('todate'),
 					  ''
					  ),

					 $oneRecord,
					 $td=array('idLinkCourse','course','series','fromdate','todate'),
 					 $text = null,
					 $pic  = null,
	 				 $controller = 'linkCourse',
 					 $button = array('edit-'.$this->lang->line('edit'))
 			 ); 
            ?>
            </div>
        </div>
<?php } ?>
<!-- End file --------------------------------------------------------------------------- -->


