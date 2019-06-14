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
					<?php echo $this->lang->line('textbook1'); ?>
				</th>
				<th class="text-center">
					<?php echo $this->lang->line('division1'); ?>
				</th>
				<th class="text-center">
					<?php echo $this->lang->line('trainer1'); ?>
				</th>
				<th class="text-center">
					<?php echo $this->lang->line('lectures'); ?>
				</th>
				<th class="text-center">
					<?php echo $this->lang->line('from'); ?>
				</th>
				<th class="text-center">
					<?php echo $this->lang->line('to'); ?>
				</th>
				<th class="text-center">
					&nbsp;
				</th>
				
				
			</tr>
			<?php  $no=1;   foreach ($linkTextbook as $value) {?>
			<tr>
				<td><?php echo $no++; ?></td>
				<td ><?php echo $value->textbook ;?></td>
				<td ><?php echo $value->idDivision ;?></td>
				<td ><?php echo $value->nameTrainer ;?></td>
				<td ><?php echo $value->lectureNo ;?></td>
				<td ><?php echo $value->fromTime ;?></td>
				<td >
					<?php 
						$toTime = explode(':',$value->toTime);
						 if($toTime[2] = 'pm')$PAM ='م' ;else $PAM = 'ص';
						echo $toTime[0].':'.$toTime[1].' '.$PAM ;
					?>
				</td>
				<td >
				
					<a class="icon-edit" href="<?php echo	base_url('linktextbook/edit/'.$value->idLinktextBook); ?>" data-toggle="tooltip" title="<?php echo $this->lang->line('edit'); ?>">
					</a>
					
			  </td>
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
