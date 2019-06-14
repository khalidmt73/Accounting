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
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?php echo $title; ?></title>

        <!-- Start Main Menu Code -->
        <link rel="stylesheet" href="<?php echo base_url('public/css/style.css'); ?>" media="all">	
        <link rel="stylesheet" href="<?php echo base_url('public/css/bootstrap.css'); ?>" media="all">	
		<link rel="stylesheet"  href="<?php echo base_url('public/css/printed.css'); ?> " media="all">
		    <link rel="stylesheet" href="<?php echo base_url('public/css/bootstrap-rtl.css'); ?>" />

    </head>
    <body>
           <div class="container text-center ">
				<br />

					<div class="row">
						
						<div class="col-md-4 text-center">
							<h5>
							<b>
							<br />
								<?php 
									echo $this->lang->line('site_name').'<br />';
									
									?>
									<?php echo $this->lang->line('date');?>
									: <span class="" lang="ar" dir="rtl">
									<?php echo $hijri ;?>
									</span><br />

							</b>	
							</h5>
						</div>
						<div class="text-cenetr col-md-4">
								<h5>
								<b>
									<?php echo $this->lang->line('god').'<br />';	?>
								</b>
								</h5>
								<img src="<?php echo base_url('public/img/logo.png');?>" width="120" height="55" alt="" />
						</div>
						<div class="col-md-4">
						<h5>
							<b>
							<br />
								<?php 
									echo $this->lang->line('site_name_eng').'<br />';
									
									?>
									<?php echo $this->lang->line('date_eng');?>
									: <span lang="en" style="font-family:Arial;">
									<?php echo date('d-m-Y'); ?>
									</span><br />

							</b>	
							</h5>
						</div>
					</div>
					<br />
					<hr style="border:1px solid #000;padding:0px;" />
                    
					<div class="main_font">
						<?php echo $this->lang->line('receipt');?>
						<hr />
					</div>

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
								echo $this->lang->line('division').' : '.$value->division;
						?>
						</h5>
						</b>
						</div>
					</div>
		</div>
	</div>
	
		

	 
	<br />
<?php } ?>
      <div class="container text-center">

			<div class="box row col-md-8 col-md-push-2 col-xs-12"><!-- /.row -->
			<div id="result">

		<table class="table  table-bordered  text-center">
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
 					     echo '&nbsp;&nbsp;'.$this->lang->line('sr');

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
			<table class="table table-bordered" >
			<tr>
				<td class="text-center" colspan="5">
					خصم &nbsp;<?php echo $discount; ?>% 
				</td>
				<td >
					<?php echo $disc = ($value->amount * $discount)/100; 
					  echo '&nbsp;&nbsp;'.$this->lang->line('sr');
					?>
				</td>
			</tr>
			<tr>
				<td class="text-center" width="76%" colspan="5">
					قيمة الدورة 
				</td>
				<td width="24%">
					<?php
						echo $value->amount;
  					    echo '&nbsp;&nbsp;'.$this->lang->line('sr');
					?>
				</td>
			</tr>
			<tr>
				
				<td class="text-center" colspan="5">
					المتبقي
				</td>
				<td>
					<?php 
						  $discount = ($value->amount * $discount)/100;
						  $amount   = ($value->amount - $discount);
						  echo $total1= $amount - $total;
						  echo '&nbsp;&nbsp;'.$this->lang->line('sr');

						
					?>
				</td>
				</tr>
			</table>
		
			

		



</div>		
  </div>
</div>
 </div>
                </body>	
                </html>
<!-- End file -------------------------------------------------------------------- -->
