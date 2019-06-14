<?php
if ($this->session->userdata('userCC') != TRUE) {
    redirect(base_url('login/index'));
}
if(!in_array('linkTextbook',$this->data_header['user'])){
		redirect(base_url('login/index'));
		}	
?>
<!-- --------------------------------------------------------------------------- -->
<div class="container text-center">

	 <div class="row">
		<div class="col-md-8">
		</div>
		<div class="col-md-2 text-left">
			<?php echo download(
			  $controller ='lists/',	
			  /*pdf   */'pdfPresent/',
			  $this->lang->line('pdf'),
			  /*excel */'excelPresent/',
			  $this->lang->line('excel'),
			  /*word  */'wordPresent/',
			  $this->lang->line('word'),
			  /*print */'printedPresent/',
			  $this->lang->line('print'),
			  $this->lang->line('download')
			);
			
?>
		</div>
	</div>

<br />
	<div class="row">
<?php 
if ($linkTextbook) { ?>
		<div class="col-md-10 "><!-- /.row -->

		  <div id="result">
				<form method="post" action="<?php echo base_url($controller.'save_mark/'); ?> ">

			<table class="table table-striped table-hover table-bordered  text-center">
			<tr class="text-center">
				<th class="text-center" >
					<?php echo $this->lang->line('no'); ?>
				</th>
				<th class="text-center">
					<?php echo $this->lang->line('course1'); ?>
				</th>
				<th class="text-center">
					<?php echo $this->lang->line('textbook1'); ?>
				</th>
				<th class="text-center">
					<?php echo $this->lang->line('division1'); ?>
				</th>
				<th class="text-center">
					<?php echo $this->lang->line('trainer1'); ?>
				</th>
				<th class="text-center">
					<?php echo $this->lang->line('lectureNo'); ?>
				</th>
				<th class="text-center">
					<?php echo $this->lang->line('fromdate'); ?>
				</th>
				<th class="text-center">
					<?php echo $this->lang->line('todate'); ?>
				</th>
				
			</tr>
			<?php  $no=1;   foreach ($linkTextbook as $value) {?>
			<tr>
				<td><?php echo $no++; ?></td>
				<td><?php echo $value->course ;?></td>
				<td ><?php echo $value->textbook ;?></td>
				<td ><?php echo $value->idDivision ;?></td>
				<td ><?php echo $value->nameTrainer ;?></td>
				<td ><?php echo $value->lectureNo ;?></td>
				<td ><?php echo $value->fromdate ;?></td>
				<td ><?php echo $value->todate ;?></td>
			</tr>
			<?php } ?>
			</table>


	</div>
	<div id="display" style="display:none;">
	
	</div>
		
  </div>
</div>
<?php }else{echo '';} ?>

<!-- End file -------------------------------------------------------------------- -->
