<?php
if ($this->session->userdata('userCC') != TRUE) {
    redirect(base_url('login/index'));
}
if(!in_array('textbook',$this->data_header['user'])){
		redirect(base_url('cpanel/index'));
		}	
?>
<div class="container text-center">
	<div class="box row col-md-10 col-md-push-1 col-xs-12 col-xs-push-1">
		<table class="viewData_tb table">
			<tr >
				<td class="text-right col-xs-4">
					<a href="<?php echo base_url('linkTextbook/get_textbook'); ?>">
						<button class="btn btn-default btn-sm">
							<?php echo $this->lang->line("view") ?>
						</button>
					<a/>
				</td>
				<td class="text-center col-xs-4">
				</td>
				<td class="text-left col-xs-4" >
				</div>
				</td>
			</tr>
		</table>
		<hr class="hr" />
	</div>
</div>
<?php
$atrb=array('class'=>'form form-inline');

echo form_open(base_url('linkTextbook/create'),$atrb);
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
				$js = 'id="idLinkCourse" onChange="linkTextbook(this.value)"';
				$drop['0'] =$this->lang->line("course1");
				foreach($linkCourse as $val){
				$drop[$val->idLinkCourse] = $val->course.' - '.$val->series;
				}
				echo form_dropdown('idLinkCourse',$drop,'0',$js.' class="form-control" style="width:50%;margin-bottom:10px;"');
				?>
				<div id="getDivision"></div>
				<div id="display"></div>
				
				<?php
				$drop2['0'] = $this->lang->line("trainer1");
				foreach($trainer as $val2){
				$drop2[$val2->idTrainer] = $val2->nameTrainer;
				}
				echo form_dropdown('id_trainer',$drop2,'0','class="form-control" style="width:50%;margin-bottom:10px;"');

				$drop3['0'] = $this->lang->line("classroom1");
				foreach($classroom as $val3){
				$drop3[$val3->idClassroom] = $val3->number;
				}
			    echo form_dropdown('id_classroom',$drop3,'0','class="form-control" style="width:50%;margin-bottom:10px;"');

				$data = array(
					'name'        => 'lectureNo',
					'id'          => 'lectureNo',
					'value'       =>  '',
					'maxlength'   => '3',
					'size'        => '',
					'style'       => 'width:50%;margin-bottom:0px;text-center',
					'class'       => 'form-control',
					'placeholder' => $this->lang->line("num").' '.$this->lang->line("lectures")
				);
				echo form_input($data);
				?>

			</div>

			<div class="col-md-6 col-xs-12 text-right">
			<div class="row " >
				<div class="col-md-12 col-xs-12">
				<?php echo $this->lang->line("days").' : &nbsp;&nbsp;&nbsp;';?><br />
				<input type="checkbox" class="checkbox" name="day[]" value="su"> 
				<?php echo $this->lang->line('su'); ?>&nbsp;
				<input type="checkbox" class="checkbox" name="day[]" value="mo"> 
				<?php echo $this->lang->line('mo'); ?>&nbsp;
				<input type="checkbox" class="checkbox" name="day[]" value="tu"> 
				<?php echo $this->lang->line('tu'); ?>&nbsp;
				<input type="checkbox" class="checkbox" name="day[]" value="we"> 
				<?php echo $this->lang->line('we'); ?>&nbsp;
				<input type="checkbox" class="checkbox" name="day[]" value="th"> 
				<?php echo $this->lang->line('th'); ?>
				</div>
			</div>
			<div class="row">
			<div class="col-md-12 col-xs-12"><br />
			<?php echo $this->lang->line("time").' : &nbsp;&nbsp;&nbsp; <br />';
				echo form_label($this->lang->line("from").' : ');
				$data = array(
				   'name'        => 'fromM',
				   'id'          => 'fromM',
				   'value'       =>  '00',
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
				   'value'       =>  '',
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
				echo '&nbsp;&nbsp;'.form_dropdown('fromPAM',$drop4,$drop4['am'],'class="form-control" style="width:25%;font-size:10px;"');
				
				echo '<br />';
				?>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12 col-xs-12">
				<?php
				echo form_label($this->lang->line("to").' : ');
				$data = array(
				   'name'        => 'toM',
				   'id'          => 'toM',
				   'value'       =>  '00',
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
				   'value'       =>  '',
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
				echo '&nbsp;&nbsp;'.form_dropdown('toPAM',$drop5,$drop5['pm'],'class="form-control" style="width:25%;font-size:10px;"');
				
				echo '<br />';
				?>
				
			</div>
		</div>
		</div></div>
		<div class="row">
					<div class="col-md-12 col-xs-12">
		
				<?php
				$data = array(
							   'name'        => 'submit',
							   'id'          => 'submit',
							   'value'       => 'حفظ',
							   'maxlength'   => '',
							   'size'        => '',
							   'class'       => 'btn btn-info ',
							   'style'       => 'width:40%;margin-top:50px;',
							 );
				echo form_submit($data);
				echo form_close();

				?>
			</div></div>		
		
</div>
	</div>
</div>


<div class="container">

<?php if (isset($oneRecord)) { ?>
            <div class="box row col-md-10 col-md-push-1 col-xs-12 col-xs-push-1"><!-- /.row -->
				<?php
					echo viewData_one(
					$th = array(
					$this->lang->line('no'),
					$this->lang->line('course1'),
					$this->lang->line('textbook1'),
					''
					),
				    $oneRecord,
					$td=array('idTextbook','course','textbook'),
					$text = null,
					$pic  = null,
					$controller = 'textbook',
					$button = array('edit-'.$this->lang->line('edit'),'delet-'.$this->lang->line('delet'))
					); 
				?>
           </div>

</div>
<?php } ?>
<!-- End file --------------------------------------------------------------------------- -->


