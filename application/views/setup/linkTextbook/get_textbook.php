<?php
if ($this->session->userdata('userCC') != TRUE) {
    redirect(base_url('login/index'));
}
if(!in_array('linkTextbook',$this->data_header['user'])){
		redirect(base_url('login/index'));
		}	
?>
<!-- --------------------------------------------------------------------------- -->
  <center>
	<div class="container text-center">
	<div class="box row col-md-10 col-md-push-1 col-xs-12 col-xs-push-1">
		<table class="viewData_tb table">
			<tr >
				<td class="text-right col-xs-3">
					<a href="<?php echo base_url('linkTextbook/add'); ?>">
						<button class="btn btn-default btn-sm">
						<i class="fa fa-user-plus"></i>
							<?php echo $this->lang->line("add") ?>
						</button>
					<a/>
				</td>
				<td class="text-center col-xs-3">
					<?php
					$js = 'id="idLinkCourse" onChange="get_textbook(this.value ,year.value,semester.value)"';
					$drop['0'] =$this->lang->line("course1");
							foreach($linkCourse as $val){
							 $drop[$val->idLinkCourse] = $val->course.' - '.$val->series;
							 }
					echo form_dropdown('idLinkCourse',$drop,'0',$js. 'class="form-control" style="width:70%;margin-bottom:10px;"');
				?>	
				</td>
				<td class="text-left col-xs-3" >
					<?php       
							$js = 'id="year" onChange="get_textbook(id.value ,this.value,semester.value)"';
							foreach($calendar as $val2){
							 $drop2[$val2->year] = $val2->year;
							 }
					echo form_dropdown('year',$drop2,'0',$js. 'class="form-control" style="width:70%;margin-bottom:10px;"');
				?>	
						
				</td>
				<td class="text-left col-xs-3" >
					<?php 
							$js = 'id="semester" onChange="get_textbook(id.value ,year.value,this.value)"';
							foreach($calendar as $val3){
							 $drop3[$val3->semester] = $val3->semester;
							 }
						 echo form_dropdown('semester',$drop3,1,$js. 'class="form-control" style="width:70%;margin-bottom:10px;"');
					?>
				</td>

			</tr>
		</table>
		<hr class="hr" />
	</div>
</div>
				
		<div class="box row col-md-9 col-md-push-2 col-xs-12"><!-- /.row -->
	<div id="result">

	</div>
	<div id="display" style="display:none;">
	
	</div>
		
</div>
</center>


<!-- End file --------------------------------------------------------------------------------- -->
<?	