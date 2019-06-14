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
	<div class="box row col-md-10 col-md-push-1 col-xs-12 col-xs-push-1">
		<table class="viewData_tb table">
			<tr >
				<td class="text-right col-xs-3">
					&nbsp;
				</td>
				<td class="text-center col-xs-3">
					<?php
					$js = 'id="idLinktextbook" onChange="get_listTextbook(this.value ,idCalendar.value)"';
					$drop['0'] =$this->lang->line("textbook1");
							foreach($linktextbook as $val){
							 $drop[$val->id_division] = $val->nameTrainer.' - '.$val->id_division;
							 }
					echo form_dropdown('idLinktextbook',$drop,'0',$js. 'class="form-control" style="width:70%;margin-bottom:10px;"');
				?>	
				</td>
				<td class="text-left col-xs-3" >
					<?php       
							$js = 'id="idCalendar" onChange="get_textbook(idLinktextbook.value ,this.value)"';
							foreach($calendar as $val2){
							 $drop2[$val2->idCalendar] = $val2->semester.' - '.$val2->year;
							 }
					echo form_dropdown('idCalendar',$drop2,'0',$js. 'class="form-control" style="width:70%;margin-bottom:10px;"');
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