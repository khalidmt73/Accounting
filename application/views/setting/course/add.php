<?php
if ($this->session->userdata('userCC') != TRUE) {
    redirect(base_url('login/index'));
}
if(!in_array('course',$this->data_header['user'])){
		redirect(base_url('cpanel/index'));
		}	
?>
<div class="container text-center">
	<div class="box row col-md-10 col-md-push-1 col-xs-12 col-xs-push-1">
		<table class="viewData_tb table">
			<tr >
				<td class="text-right col-xs-4">
					<a href="<?php echo base_url('course/index'); ?>">
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
$atrb=array('class'=>'form  white-pink');
echo form_open(base_url('course/create'),$atrb);
echo '
<h4> <i class="fa fa-plus-square"></i>
      '.$this->lang->line("add").' '.$this->lang->line("course").'
</h4>';

$data = array(
               'name'        => 'course',
               'id'          => 'course',
               'value'       => '',
               'maxlength'   => '100',
               'style'       => 'width:50%;margin-bottom:-5px',
               'class'       => 'form-control',
			   'required'    => 'required',
			   'placeholder' => $this->lang->line("name1").' '.$this->lang->line("course1"),
             );
echo form_input($data);

$type = array('دورة','دبلوم');
				foreach($type as $key => $val){
				$drop[$key] = $val;
				}
				echo '&nbsp;&nbsp;'.form_dropdown('type',$drop,$drop[0],'class="form-control" style="width:50%;font-size:13px;margin-bottom:10px"');

$data = array(
               'name'        => 'amount',
               'id'          => 'amount',
               'value'       => '',
               'maxlength'   => '10',
               'style'       => 'width:50%;margin-bottom:10px',
               'class'       => 'form-control',
			   'required'    => 'required',
			   'placeholder' => $this->lang->line("val").' '.$this->lang->line("course1"),
             );
echo form_input($data);

$data = array(
               'name'        => 'target',
               'id'          => 'target',
               'value'       => '',
               'size'        => '10',
               'style'       => 'width:50%;height:80px;margin-bottom:10px',
               'class'       => 'form-control',
			   'required'    => 'required',
			   'placeholder' => $this->lang->line("target"),
             );
echo form_textarea($data);

$data = array(
               'name'        => 'submit',
               'id'          => 'submit',
               'value'       => 'حفظ',
               'maxlength'   => '100',
               'class'       => 'btn btn-info',
               'style'       => 'width:50%',
             );

 echo form_submit($data);

$clos_div = ' </div></div>';
echo form_close($clos_div);

?>



<?php if (isset($oneRecord)) { ?>
 <div class="container text-center">
            <div class="box row col-md-10 col-md-push-1 col-xs-12 col-xs-push-1"><!-- /.row -->
	<?php
			echo viewData_one(
					  $th = array(
					  $this->lang->line('no'),
					  $this->lang->line('course'),
 					  $this->lang->line('type'),
 					  $this->lang->line('amount'),
 					  $this->lang->line('target'),
 					  ''
					  ),

					 $oneRecord,
					 $td=array('idCourse','course','type','amount','target'),
 					 $text = null,
					 $pic  = null,
	 				 $controller = 'course',
 					 $button = array('edit-'.$this->lang->line('edit'))
 			 ); 
            ?>
            </div>
        </div>
<?php } ?>
<!-- End file --------------------------------------------------------------------------- -->


