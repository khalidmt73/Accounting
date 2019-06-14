<?php
if ($this->session->userdata('userCC') != TRUE) {
    redirect(base_url('login/index'));
}
if(!in_array('trainee',$this->data_header['user'])){
		redirect(base_url('cpanel/index'));
		}	
?>
<div class="container text-center">
	<div class="box row col-md-10 col-md-push-1 col-xs-12 col-xs-push-1">
		<table class="viewData_tb table">
			<tr >
				<td class="text-right col-xs-4">
					<a href="<?php echo base_url('trainer/index'); ?>">
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
echo form_open(base_url('trainer/create'),$atrb);
echo '
<h4> <i class="fa fa-plus-square"></i>
      '.$this->lang->line("add").' '.$this->lang->line("trainee1").'
</h4>';

$atb   = array(
			   'class' => '',
               'style' => 'color: #000;',
			   );

$data = array(
               'name'        => 'nameTrainer',
               'id'          => 'nameTrainer',
               'value'       => '',
               'maxlength'   => '100',
               'size'        => '50',
               'style'       => 'width:50%;margin-bottom:10px',
               'class'       => 'form-control'.'" autofocus "',
			   'required'    => 'required',
			   'placeholder' => $this->lang->line("name1").' '.$this->lang->line("trainer1"),
             );
echo form_input($data);

$atb   = array(
			   'class' => '',
               'style' => 'color: #000;',
			   );
?><div class="idCard" style="color:red;font-size:15px;"></div><?php
$data = array(
               'name'        => 'idCardTrainer',
               'id'          => 'idCardTrainer',
               'value'       => '',
               'maxlength'   => '10',
               'size'        => '50',
               'style'       => 'width:50%;margin-bottom:10px;',
               'class'       => 'form-control',
			   'required'    => 'required',
			   'placeholder' => $this->lang->line('idCard'),
             );
echo form_input($data);
?><div class="mobile" style="color:red;font-size:15px;"></div><?php

$data = array(
               'name'        => 'mobileTrainer',
               'id'          => 'mobileTrainer',
               'value'       => '',
               'maxlength'   => '10',
               'size'        => '50',
               'style'       => 'width:50%;margin-bottom:10px;',
               'class'       => 'form-control',
			   'required'    => 'required',
			   'placeholder' => $this->lang->line('mobile'),
             );
echo form_input($data);

$data = array(
               'name'        => 'emailTrainer',
               'id'          => 'emailTrainer',
               'value'       => '',
               'maxlength'   => '100',
               'size'        => '50',
               'style'       => 'width:50%;margin-bottom:10px;',
               'class'       => 'form-control',
			   'required'    => 'required',
			   'placeholder' => $this->lang->line('email'),
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
					  $this->lang->line('name'),
 					  $this->lang->line('idCard'),
 					  $this->lang->line('mobile'),
 					  $this->lang->line('email'),
 					  ''
					  ),

					 $oneRecord,
					 $td=array('idTrainer','nameTrainer','idCardTrainer','mobileTrainer','emailTrainer'),
 					 $text = null,
					 $pic  = null,
	 				 $controller = 'trainer',
 					 $button = array('edit-'.$this->lang->line('edit'))
 			 ); 
            ?>
            </div>
        </div>
<?php } ?>
<!-- End file --------------------------------------------------------------------------- -->


