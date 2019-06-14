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
				<div class = "col-md-8 col-md-push-2 col-xs-12">
				<table class="viewData_tb table">
			<tr >
				<td class="text-left col-xs-3" >
					<?php       
							$drop1['0'] =$this->lang->line("type1");
							$js = 'id="type" onChange="get_courses(this.value,idCalendar.value)"';
							$type = array('1'=>'دورة','2'=>'دبلوم');
							foreach($type as $key => $val1){
							 $drop1[$key] = $val1;
							 }
					echo form_dropdown('type',$drop1,'0',$js. 'class="form-control" style="width:70%;margin-bottom:10px;"');
				?>	
						
				</td>
				<td class="text-left col-xs-3" >
					<?php       
							//$drop2['0'] =$this->lang->line("year");
							$js = 'id="idCalendar" onChange="get_courses(type.value,this.value)"';
							foreach($calendar as $val2){
							 $drop2[$val2->idCalendar] =$val2->semester.' - '. $val2->year;
							 }
					echo form_dropdown('idCalendar',$drop2,'',$js. 'class="form-control" style="width:70%;margin-bottom:10px;"');
				?>	
						
				</td>
			</tr>
		</table>
				




								
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