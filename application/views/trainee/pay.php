<?php
if ($this->session->userdata('userCC') != TRUE) {
    redirect(base_url('login/index'));
}
if(!in_array('trainee',$this->data_header['user'])){
		redirect(base_url('login/index'));
		}	
$no=1;   foreach ($trainee as $value) {

?>
<!-- --------------------------------------------------------------------------- -->
<div class="container text-center">

	<div class="row">
		<div class="col-md-12">
                    <div class="row" >
		           
						<div class="col-md-3 col-md-push-1 text-right" >
						<h5>
						<b>
							<?php
								echo $this->lang->line('yearStdy');
								?>
								<span lang="ar" dir="rtl" ><?php echo $value->year; ?></span>
								هـ 
								<br /><br />
								<?php 
								echo $this->lang->line('semester1').' : '.$value->semester;
							?>
							
						</b>
						</h5>
						</div>
						<div class="col-md-6 text-center">
						<h5>
						<b>
							<?php 
								echo $this->lang->line('name').' : '.$value->name.'<br /><br />';
								echo $this->lang->line('academicNo').' : '.$value->academicNo;
							?>
						</b>
						</h5>
						</div>
						<div class="col-md-2 text-right">
						<h5>
						<b>
						<?php
								echo $this->lang->line('course1').' : '.$value->course.'<br /><br />';
						?>
						</h5>
						</b>
						</div>
					</div>
		</div>
	</div>
	
		<hr style="border:0.5px solid #000;padding:0px;" />
	 <?php
		$atrb=array('class'=>'form form-inline ');
echo form_open(base_url('trainee/createPay/'.$value->academicNo),$atrb);
echo $this->lang->line("value").' '.$this->lang->line("course1").' : ';

echo form_hidden('academicNo',$value->academicNo); 
echo form_hidden('id_card',$value->id_card);
echo form_hidden('amount',$value->amount);

$data = array(
               'name'        => 'payAmount',
               'id'          => 'payAmount',
               'value'       =>  $value->amount,
               'maxlength'   => '4',
               'style'       => 'width:10%;',
               'class'       => 'form-control',
			   'required'    => 'required',
			   'placeholder' =>  $this->lang->line("amount")
             );
echo form_input($data); 
$data = array(
               'name'        => 'discount',
               'id'          => 'discount',
               'value'       => '0',
               'maxlength'   => '4',
               'style'       => 'width:5%;',
               'class'       => 'form-control',
			   'placeholder' =>  $this->lang->line("discount")
             );
echo '&nbsp;&nbsp;'.form_input($data).'%'; 
$data = array(
               'name'        => 'submit',
               'id'          => 'submit',
               'value'       => 'حفظ',
               'maxlength'   => '10',
               'class'       => 'btn btn-info',
               'style'       => 'width:10%',
             );

 echo '&nbsp;&nbsp;&nbsp;'.form_submit($data);

echo form_close();
?>
		<hr style="border:0.5px solid #000;padding:0px;" />

	 <div class="row">
		<div class="col-md-8">
		</div>
		<div class="col-md-2 text-left">
			<?php echo download(
			  $controller ='trainee/',	
			  /*pdf   */'pdfPay/'.$value->academicNo,
			  $this->lang->line('pdf'),
			  /*excel */'excelPay/'.$value->academicNo,
			  $this->lang->line('excel'),
			  /*word  */'wordPay/'.$value->academicNo,
			  $this->lang->line('word'),
			  /*print */'printedPay/'.$value->academicNo,
			  $this->lang->line('print'),
			  $this->lang->line('download')
			);
			
?>
		</div>
	</div>
	<br />
<?php } ?>
      <div class="container text-center">

			<div class="box row col-md-8 col-md-push-2 col-xs-12"><!-- /.row -->
			<div id="result">

		<table class="table table-striped table-hover table-bordered  text-center">
			<tr class="text-center">
				<th class="text-center"><?php echo $this->lang->line('no'); ?></th>
				<th class="text-center"><?php echo $this->lang->line('hijri'); ?></th>
				<th class="text-center"><?php echo $this->lang->line('gregorian'); ?></th>
				<th class="text-center"><?php echo $this->lang->line('time'); ?></th>
				<th class="text-center"><?php echo $this->lang->line('thevalue'); ?></th>
				
			</tr>
			<?php $total ='';
			if(count($pay) > 0 ){ 
			$no=1;   foreach ($pay as $val) {
							

			?>

			<tr>
				<td><?php echo $no++; ?></td>
				<td><?php echo $val->hijri ;?></td>
				<td><?php echo $val->date ;?></td>
				<td><?php echo $val->time ;?></td>
				<td><?php 
						 echo  $val->payAmount ;
						$total += $val->payAmount;
				?></td>
				
			</tr>
			<?php } 
			}else {?>
			
			<tr>
				<td>-</td>
				<td>-</td>
				<td>-</td>
				<td>-</td>
				<td>0</td>
				
			</tr>
			
			<?php }	?>
			</tr>
			</table>
			<table class="table" >
			<tr>
				<td class="text-left" colspan="5">
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					خصم &nbsp;<?php echo $discount; ?>% 
				</td>
				<td >
					<?php echo $disc = ($value->amount * $discount)/100; ?>
				</td>
			</tr>
			<tr>
				<td class="text-left" colspan="5">
					قيمة الدورة 
				</td>
				<td >
					<?php echo $value->amount; ?>
				</td>
			</tr>
			<tr>
				
				<td class="text-left" colspan="5">
					المتبقي
				</td>
				<td>
					<?php 
						  $discount = ($value->amount * $discount)/100;
						  $amount   = ($value->amount - $discount);
						  echo $total1= $amount - $total; 

						
					?>
				</td>
				</tr>
			</table>
		
			

		



</div>		
  </div>
</div>

<!-- End file -------------------------------------------------------------------- -->
