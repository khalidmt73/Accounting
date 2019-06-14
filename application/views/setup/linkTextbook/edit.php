<?php
if ($this->session->userdata('userCC') != TRUE) {
    redirect(base_url('login/index'));
}
if(!in_array('textbook',$this->data_header['user'])){
		redirect(base_url('cpanel/index'));
}	
foreach ($record as $value) {
  
$atrb=array('class'=>'form form-inline');

echo form_open(base_url('linktextbook/update/'.$value->idLinktextBook),$atrb);
?>
<div class="container text-center">
	<div class="box row col-md-10 col-md-push-1 col-xs-12 col-xs-push-1">
	<div class="white-pink">
		
		<div class="row">
				
				<h4> <i class="fa fa-plus-square"></i>
					<?php echo $this->lang->line("setup").' '.$this->lang->line("textbook");?>
				</h4>
		</div>

		<div class="row">
			<div class="col-md-6 col-xs-12">
			<?php


$drop['0'] =$this->lang->line("course1");
				foreach($linkCourse as $val){
				$drop[$val->idLinkCourse] = $val->course.' - '.$val->series;
				}
				echo form_dropdown('idLinkCourse',$drop,$value->id_linkCourse,'class="form-control" style="width:50%;margin-bottom:10px;"');

				$drop1['0'] =$this->lang->line("textbook1");
				foreach($division as $val1){
				$drop1[$val1->idDivision] = $val1->course.'-'.$val1->idDivision.' '.$val1->textbook;
				}
				echo form_dropdown('id_division',$drop1,$value->idDivision,'class="form-control" style="width:50%;margin-bottom:10px;"');
 
				$drop2['0'] = $this->lang->line("trainer1");
				foreach($trainer as $val2){
				$drop2[$val2->idTrainer] = $val2->nameTrainer;
				}
				echo form_dropdown('id_trainer',$drop2,$value->idTrainer,'class="form-control" style="width:50%;margin-bottom:10px;"');

				$drop3['0'] = $this->lang->line("classroom1");
				foreach($classroom as $val3){
				$drop3[$val3->idClassroom] = $val3->number;
				}
			    echo form_dropdown('id_classroom',$drop3,$value->idClassroom,'class="form-control" style="width:50%;margin-bottom:10px;"');

				$data = array(
					'name'        => 'lectureNo',
					'id'          => 'lectureNo',
					'value'       =>  $value->lectureNo,
					'maxlength'   => '3',
					'size'        => '',
					'style'       => 'width:50%;margin-bottom:0px;text-center',
					'class'       => 'form-control',
					'placeholder' => $this->lang->line("num").' '.$this->lang->line("lectures")
				);
				echo form_input($data);
				?>

			</div>
			<?php $days = explode('-',$value->day); ?>
			<div class="col-md-6 col-xs-12 text-right">
			<div class="row " >
				<div class="col-md-12 col-xs-12">
				<?php echo $this->lang->line("days").' : &nbsp;&nbsp;&nbsp;';?><br />
				<input type="checkbox" class="checkbox" <?php if(in_array('su',$days)) echo 'checked'; ?> name="day[]" value="su"> 
				<?php echo $this->lang->line('su'); ?>&nbsp;
				<input type="checkbox" class="checkbox" <?php if(in_array('mo',$days)) echo 'checked'; ?> name="day[]" value="mo"> 
				<?php echo $this->lang->line('mo'); ?>&nbsp;
				<input type="checkbox" class="checkbox" <?php if(in_array('tu',$days)) echo 'checked'; ?> name="day[]" value="tu"> 
				<?php echo $this->lang->line('tu'); ?>&nbsp;
				<input type="checkbox" class="checkbox" <?php if(in_array('we',$days)) echo 'checked'; ?> name="day[]" value="we"> 
				<?php echo $this->lang->line('we'); ?>&nbsp;
				<input type="checkbox" class="checkbox" <?php if(in_array('th',$days)) echo 'checked'; ?> name="day[]" value="th"> 
				<?php echo $this->lang->line('th'); ?>
				</div>
			</div>
			<div class="row">
			<div class="col-md-12 col-xs-12"><br />
			<?php echo $this->lang->line("time").' : &nbsp;&nbsp;&nbsp; <br />';
				$fromTime = explode(':',$value->fromTime);
				echo form_label($this->lang->line("from").' : ');
				$data = array(
				   'name'        => 'fromM',
				   'id'          => 'fromM',
				   'value'       =>  $fromTime[1],
				   'maxlength'   => '2',
				   'size'        => '',
				   'style'       => 'width:15%;margin-bottom:0px;text-center',
				   'class'       => 'form-control',
				   'placeholder' => ''
				 );
				echo '&nbsp;&nbsp;'.form_input($data);
 				echo '&nbsp;د ';

				$data = array(
				   'name'        => 'fromH',
				   'id'          => 'fromH',
				   'value'       =>  $fromTime[0],
				   'maxlength'   => '2',
				   'size'        => '',
				   'style'       => 'width:15%;margin-bottom:0px;text-center',
				   'class'       => 'form-control',
				   'placeholder' => ''
				 );
				echo '&nbsp;&nbsp;'.form_input($data);
 				echo '&nbsp; س';
				
				
				$fromPAM = array('pm'=>'مساء','am'=>'صباح');
				foreach($fromPAM as $key4 => $val4){
				$drop4[$key4] = $val4;
				}
				echo '&nbsp;&nbsp;'.form_dropdown('fromPAM',$drop4,$fromTime[2],'class="form-control" style="width:25%;font-size:10px;"');
				
				echo '<br />';
				?>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12 col-xs-12">
				<?php
				$toTime = explode(':',$value->toTime);
				echo form_label($this->lang->line("to").' : ');
				$data = array(
				   'name'        => 'toM',
				   'id'          => 'toM',
				   'value'       =>  $toTime[1],
				   'maxlength'   => '2',
				   'size'        => '',
				   'style'       => 'width:15%;margin-bottom:0px;text-center',
				   'class'       => 'form-control',
				   'placeholder' => ''
				 );
				echo '&nbsp;&nbsp;'.form_input($data);
 				echo '&nbsp;د ';

				$data = array(
				   'name'        => 'toH',
				   'id'          => 'toH',
				   'value'       =>  $toTime[0],
				   'maxlength'   => '2',
				   'size'        => '',
				   'style'       => 'width:15%;margin-bottom:0px;text-center',
				   'class'       => 'form-control',
				   'placeholder' => ''
				 );
				echo '&nbsp;&nbsp;'.form_input($data);
 				echo '&nbsp; س';
				
				
				$toPAM = array('pm' => 'مساء','am' => 'صباح');
				foreach($toPAM as $key5 => $val5){
				$drop5[$key5] = $val5;
				}
						 
				echo '&nbsp;&nbsp;'.form_dropdown('toPAM',$drop5,$toTime[2],'class="form-control" style="width:25%;font-size:10px;"');
				?>
					
			</div>
		</div>
		</div></div>
		<div class="row">
					<div class="col-md-12 col-xs-12"><br /><br />
				<?php

				$data = array(
               'name'        => 'submit',
               'id'          => 'submit',
               'value'       => 'حفظ',
               'maxlength'   => '100',
               'size'        => '50',
               'class'       => 'btn btn-info',
               'style'       => 'width:50%',
             );


 echo form_submit($data);

echo form_close();
}
?>
</div></div>
			
		
		
</div>
	</div>
</div>
<!-- End file -------------------------------------------------------------------------- -->
