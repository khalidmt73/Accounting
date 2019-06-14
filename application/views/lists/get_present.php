<?php
if ($this->session->userdata('userCC') != TRUE) {
    redirect(base_url('login/index'));
}
if(!in_array('lists',$this->data_header['user'])){
		redirect(base_url('login/index'));
		}	
?>
<!-- --------------------------------------------------------------------------- -->
<div class="container text-center">

	 <div class="row">
		<div class="col-md-6">
		</div>
		<div class="col-md-2 text-left">
			<?php echo download(
			  $controller ='lists/',	
			  /*pdf   */'pdfPresent/'.$id_textbook.'/'.$division.'/'.$id_trainer.'/'.$year.'/'.$semester,
			  $this->lang->line('pdf'),
			  /*excel */'excelPresent/'.$id_textbook.'/'.$division.'/'.$id_trainer.'/'.$year.'/'.$semester,
			  $this->lang->line('excel'),
			  /*word  */'wordPresent/'.$id_textbook.'/'.$division.'/'.$id_trainer.'/'.$year.'/'.$semester,
			  $this->lang->line('word'),
			  /*print */'printedPresent/'.$id_textbook.'/'.$division.'/'.$id_trainer.'/'.$year.'/'.$semester,
			  $this->lang->line('print'),
			  $this->lang->line('download')
			);
			
?>
		</div>
	</div>

<br />
	<div class="row">
<?php 
if ($trainee) { ?>
		<div class="col-md-8 "><!-- /.row -->

		  <div id="result">
				<form method="post" action="<?php echo base_url($controller.'save_mark/'); ?> ">

			<table class="table table-striped table-hover table-bordered  text-center">
			<tr class="text-center">
				<th class="text-center" rowspan="2"><?php echo $this->lang->line('no'); ?></th>
				<th class="text-center" rowspan="2"><?php echo $this->lang->line('academicNo'); ?></th>
				<th class="text-center" rowspan="2"><?php echo $this->lang->line('name'); ?></th>
				<th class="text-center" colspan="<?php echo $lectureNo; ?>">
				<?php echo $this->lang->line('present1'); ?>
				</th>
				
			</tr>
			<tr>
			
			<?php for($n=1;$n <= $lectureNo;$n++) { 
			?><td><?php echo $n; ?></td><?php } ?>
			</tr>
			<?php  $no=1;   foreach ($trainee as $value) {?>
			<tr>
				<td><?php echo $no++; ?></td>
				<td><?php echo $value->academicNo ;?></td>
				<td ><?php echo $value->name ;?></td>
				<?php for($i=1;$i <= $lectureNo;$i++) { 
				   
						 ?>
							 <td>
								<input type="checkbox" name="" value="" 
								<?php
								 foreach ($present as $val) {
									if($val->lectureNo ==$i){
									if($value->academicNo == $val->academicNo){
									if($val->presence == 1){?>
									checked
								<?php }}}} ?>
								
								/>
							 </td>
							 <?php } ?>
			</tr>
			<?php } ?>
			</table>

		<?php $data = array(
				   'name'        => 'submit',
				   'id'          => 'submit',
				   'value'       => 'حفظ',
				   'maxlength'   => '100',
				   'size'        => '50',
				   'class'       => 'btn btn-info',
				   'style'       => 'width:50%',
				 );
		echo form_submit($data);?>

	</div>
	<div id="display" style="display:none;">
	
	</div>
		
  </div>
</div>
<?php }else{echo '';} ?>

<!-- End file -------------------------------------------------------------------- -->
