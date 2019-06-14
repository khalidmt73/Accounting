<?php
if ($this->session->userdata('userCC') != TRUE) {
    redirect(base_url('login/index'));
}
if(!in_array('textbook',$this->data_header['user'])){
		redirect(base_url('cpanel/index'));
		}	
?>
<div class="container text-center">
	<div class="box row col-md-10 col-md-push-1 col-xs-12 col-xs-push-1">
		<table class="viewData_tb table">
			<tr >
				<td class="text-right col-xs-4">
					<a href="<?php echo base_url('division/index'); ?>">
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
echo form_open(base_url('division/create'),$atrb);
echo '
<h4> <i class="fa fa-plus-square"></i>
      '.$this->lang->line("add").' '.$this->lang->line("division").'
</h4>';

?><div class="course" style="color:red;font-size:15px;"></div><?php
$js = 'id="id_course" onChange="getTextbook(this.value)"';
			$drop['0'] =$this->lang->line("course1");
							foreach($course as $val){
							 $drop[$val->idCourse] = $val->course;
							 }
					echo form_dropdown('id_course',$drop,'0',$js. 'class="form-control" style="width:50%;margin-bottom:10px;"');
?>
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
<div class="container">

<?php if (isset($oneRecord)) { ?>
            <div class="box row col-md-10 col-md-push-1 col-xs-12 col-xs-push-1"><!-- /.row -->
				<?php
					echo viewData_one(
					$th = array(
					$this->lang->line('no'),
					$this->lang->line('textbook1'),
					$this->lang->line('code'),
					''
					),
				    $oneRecord,
					$td=array('idTextbook','textbook','code'),
					$text = null,
					$pic  = null,
					$controller = 'textbook',
					$button = array('edit-'.$this->lang->line('edit'),'delet-'.$this->lang->line('delet'))
					); 
				?>
           </div>

</div>
<?php } ?>
<!-- End file --------------------------------------------------------------------------- -->


