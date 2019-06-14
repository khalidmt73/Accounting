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
			<div class="row"><!-- /.row -->
				<div class = "col-md-2">
				</div>
				<div class = "col-md-4 col-md-push-1">
					<?php
					$js = 'id="id_textbook_linkin" onChange="get_mark(this.value ,year.value,semester.value)"';
					$drop3['0'] =$this->lang->line("textbook");
							foreach($textbook_linkin as $val3){
							 $drop3[$val3->id.'/'.$val3->division.'/'.$val3->id_trainer] = $val3->name.'-'.$val3->textbook.'-'.$val3->division;
							 }
					echo form_dropdown('id',$drop3,'0',$js. 'class="form-control" style="width:70%;margin-bottom:10px;"');
				?>	
					
				</div>
				<div class = "col-md-2 ">
					<?php 
								$js = 'id="year" ';
								for($i=1436;$i <= $year;$i++){
								$drop1[$i] = $i;
								}
							 echo form_dropdown('year',$drop1,$year,$js. 'class="form-control" style="width:70%;margin-bottom:10px;"');
						?>
				</div>
				<div class = "col-md-2 ">
					<?php 
							$js = 'id="semester" ';
							for($i=1;$i <=3 ;$i++){
							$drop2[$i] = $this->lang->line('semester1').' - '.$i;
							}
						 echo form_dropdown('semester',$drop2,1,$js. 'class="form-control" style="width:70%;margin-bottom:10px;"');
					?>
				</div>
				
				
			</div>
		<div class="box row col-md-8 col-md-push-2 col-xs-12"><!-- /.row -->
	<hr />
	<div id="result">

	</div>
	<div id="display" style="display:none;">
	
	</div>
		
</div>
</div>
</center>


<!-- End file --------------------------------------------------------------------------------- -->
<?	