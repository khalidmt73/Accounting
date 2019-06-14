<?php
if ($this->session->userdata('userCC') != TRUE) {
    redirect(base_url('login/index'));
}
if(!in_array('lists',$this->data_header['user'])){
		redirect(base_url('login/index'));
		}	
?>
<!-- --------------------------------------------------------------------------- -->
  <center>
  <div class="container text-center">
	 <div class="row">
		<div class="col-md-6">
			</div>
				<div class="col-md-2 text-left">
				<?php echo download(
					  $controller ='lists/',	
					  /*pdf   */'pdfCourses/',
					  $this->lang->line('pdf'),
					  /*excel */'excelCourses/',
					  $this->lang->line('excel'),
					  /*word  */'wordCourses/',
					  $this->lang->line('word'),
					  /*print */'printedCourses/',
					  $this->lang->line('print'),
					  $this->lang->line('download')
						);
			
?>
			</div>
		</div>
	</div>
<br />
<?php if(isset($linkCourse)){
?>
	<div class="box row col-md-12"><!-- /.row -->
		<table class="table">
		<tr >
			
			  <th class="text-center"><?php echo $this->lang->line('no');?></th>
			  <th class="text-center"><?php echo $this->lang->line('course1');?></th>
			  <th class="text-center"><?php echo $this->lang->line('trainer1');?></th>
			  <th class="text-center"><?php echo $this->lang->line('fromdate');?></th>
			  <th class="text-center"><?php echo $this->lang->line('todate');?></th>
			  <th class="text-center"><?php echo $this->lang->line('target');?></th>
			  <th class="text-center"><?php echo $this->lang->line('val');?></th>
		</tr>
			<?php  $no=1;   foreach ($linkCourse as $value) {?>
		<tr class="text-center">
			<td><?php echo $no++; ?></td>
			<td><?php echo $value->course; ?></td>
			<td><?php if($value->type == 1){echo $value->nameTrainer;}else{} ?></td>
			<td><?php echo $value->fromdate; ?></td>
			<td><?php echo $value->todate; ?></td>
			<td><?php echo $value->target; ?></td>
			<td><?php echo $value->amount; ?></td>
		</tr>
		<?php } ?>
		</table>
</div>
<?php } ?>
</center>

<!-- End file --------------------------------------------------------------------------------- -->
<?	