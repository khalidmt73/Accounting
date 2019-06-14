<?php
if ($this->session->userdata('userCC') != TRUE) {
    redirect(base_url('login/index'));
}
if(!in_array('linkCourse',$this->data_header['user'])){
		redirect(base_url('login/index'));
		}	
?>
<!-- --------------------------------------------------------------------------- -->
 <div class="container text-center">
            <div class="box row col-md-10 col-md-push-1 col-xs-12 col-xs-push-1"><!-- /.row -->
<?php               
 echo viewData_add(
					  /*$total*/$total_rows,
					  /*$limit*/$limit,
					  /*$controller*/'linkCourse',
					  /*$method_view*/'index',
					  /*method_search*/'search',	
					  /*$method_add*/'add',
					  /*btn_add*/'<i class="fa fa-user-plus"></i>&nbsp;'.$this->lang->line('add')
					); 
?>
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
if ($linkCourse) { ?>
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
					<?php echo $this->lang->line('number'); ?>
				</th>
				<th class="text-center">
					<?php echo $this->lang->line('year'); ?>
				</th>
				<th class="text-center">
					<?php echo $this->lang->line('semester'); ?>
				</th>
				<th class="text-center">
					<?php echo $this->lang->line('fromdate'); ?>
				</th>
				<th class="text-center">
					<?php echo $this->lang->line('todate'); ?>
				</th>
				
			</tr>
			<?php  $no=1;   foreach ($linkCourse as $value) {?>
			<tr>
				<td><?php echo $no++; ?></td>
				<td><?php echo $value->course.' - '.$value->series ;?></td>
				<td ><?php echo $value->series ;?></td>
				<td ><?php echo $value->year ;?></td>
				<td ><?php echo $value->semester ;?></td>
				<td ><?php echo $value->fromdate ;?></td>
				<td ><?php echo $value->todate ;?></td>
			</tr>
			<?php } ?>
			</table>
<div class="well_tb">	

<table class="viewData_tb table " >
	<tr >
		<td class="text-center col-md-11"> 
		<?php echo $pages; ?>
		</td>
		
	</tr>
	
</table>

	</div>
	<div id="display" style="display:none;">
	
	</div>
		
  </div>
</div>
<?php }else{echo '';} ?>

<!-- End file -------------------------------------------------------------------- -->
