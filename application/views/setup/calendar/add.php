<?php
if ($this->session->userdata('userCC') != TRUE) {
    redirect(base_url('login/index'));
}
if(!in_array('calendar',$this->data_header['user'])){
		redirect(base_url('cpanel/index'));
		}	
?>
<div class="container text-center">
	<div class="box row col-md-8 col-md-push-2 col-xs-12 col-xs-push-1">
		<table class="viewData_tb table">
			<tr >
				<td class="text-right col-xs-4">
					<a href="<?php echo base_url('calendar/index'); ?>">
						<button class="btn btn-default btn-sm">
							<?php echo $this->lang->line("view") ?>
						</button>
					<a/>
				</td>
				<td class="text-center col-xs-4">
				</td>
				<td class="text-left col-xs-4" >
				</div>
				</td>
			</tr>
		</table>
		<hr class="hr" />
	</div>
</div>
<div class="row">
	<div class="col-xs-6 col-md-push-3">
<?php
$atrb=array('class'=>'form form-inline white-pink');
echo form_open(base_url('calendar/create'),$atrb);
echo '
<h4> <i class="fa fa-plus-square"></i>
      '.$this->lang->line("add").' '.$this->lang->line("calendar").'
</h4>';
foreach($calendar as $val);
 $semesterVal = $val->semester;
 $year = $val->year;

 if($semesterVal < 3 ){
	$semester = $semesterVal + 1;
	
	}
	else {
		$semester = 1;
		$year = $val->year+1;
	}


$data = array(
               'name'        => 'year',
               'id'          => 'year',
               'value'       =>  $year,
               'maxlength'   => '4',
               'style'       => 'width:50%;margin-bottom:10px',
               'class'       => 'form-control',
			   'required'    => 'required',
			   'placeholder' =>  $this->lang->line("year1")
             );
echo form_input($data);

$data = array(
               'name'        => 'semester',
               'id'          => 'semester',
               'value'       => $semester,
               'maxlength'   => '1',
               'size'        => '50',
               'style'       => 'width:50%;margin-bottom:10px;',
               'class'       => 'form-control',
			   'required'    => 'required',
			   'placeholder' => $this->lang->line("semester1")
            
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
</div></div>


<?php if (isset($oneRecord)) { ?>
 <div class="container text-center">
            <div class="box row col-md-10 col-md-push-1 col-xs-12 col-xs-push-1"><!-- /.row -->
	<?php
			echo viewData_one(
					  $th = array(
					  $this->lang->line('no'),
					  $this->lang->line('year'),
 					  $this->lang->line('semester'),
 					  ''
					  ),

					 $oneRecord,
					 $td=array('idCalendar','year','semester'),
 					 $text = null,
					 $pic  = null,
	 				 $controller = 'calendar',
 					 $button = array('edit-'.$this->lang->line('edit'))
 			 ); 
            ?>
            </div>
        </div>
<?php } ?>
<!-- End file --------------------------------------------------------------------------- -->


