<?php
if ($this->session->userdata('userCC') != TRUE) {
    redirect(base_url('login/index'));
}
if(!in_array('lists',$this->data_header['user'])){
		redirect(base_url('login/index'));
		}	
?>
<!-- --------------------------------------------------------------------------- -->

    <?php 
	if ($trainee) { ?>
<div class="row">
		<div class="col-md-10">
			</div>
				<div class="col-md-2 text-left">
				<?php echo download(
					  $controller ='lists/',	
					  /*pdf   */'pdfList/',
					  $this->lang->line('pdf'),
					  /*excel */'excelList/',
					  $this->lang->line('excel'),
					  /*word  */'wordList/',
					  $this->lang->line('word'),
					  /*print */'printedList/',
					  $this->lang->line('print'),
					  $this->lang->line('download')
						);
			
?>
			</div>
		</div>
	</div>
<br />	
      <div class="container text-center">
			<div class="box row col-md-8  col-xs-12"><!-- /.row -->

<div id="result">
<?php
 echo viewData_table(
					  $th = array(
					  $this->lang->line('no'),
  					  $this->lang->line('academicNo'),
					  $this->lang->line('name'),
					  
					  ),

					 $trainee,
					 $td=array('academicNo','academicNo','name'),
					 $text = null,
					 $pic  = null,
					 $offset=0,
	 				 $controller = 'lists',
 					 $button = null,
					 ''
 			 ); 
			?>
	</div>
	<div id="display" style="display:none;">
	
	</div>
		
		</div>
	</div>
<?php }else{echo 'sss';} ?>

<!-- End file --------------------------------------------------------------------------------- -->
