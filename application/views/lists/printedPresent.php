<?php
if ($this->session->userdata('userCC') != TRUE) {
    redirect(base_url('login/index'));
}
if(!in_array('lists',$this->data_header['user'])){
		redirect(base_url('login/index'));
		}	
?>
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
					<div class="row">
						
						<div class="col-md-4 col-md-12 text-center">
							<h5>
							<b>
							<br />
								<?php 
									echo $this->lang->line('site_name').'<br />';
									
									?>
									<?php echo $this->lang->line('date');?>
									: <span class="" lang="ar" dir="rtl">
									<?php echo $hijry ;?>
									</span><br />

							</b>	
							</h5>
						</div>
						<div class="col-md-4 col-md-12 text-cenetr">
								<h5>
								<b>
									<?php echo $this->lang->line('god').'<br />';	?>
								</b>
								</h5>
								<img src="<?php echo base_url('public/img/logo.png');?>" width="120" height="55" alt="" />
						</div>
						<div class="col-md-4 col-md-12 text-cenetr">
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
					<div class="row" >
		           	<div class="col-md-12 text-center" >
							<h5>
							<b>
								قائمة التحضير
								<hr />
							</b>
							<h5>
						</div>
					</div>
                    <div class="row" >
		           
						<div class="col-md-3 text-right" >
						<h5>
						<b>
							<?php
								echo $this->lang->line('yearStdy');
								?>
								<span lang="ar" dir="rtl" ><?php echo $year; ?></span>
								هـ 
								<br />
								<?php 
								echo $this->lang->line('semester1').' : '.$semester;
							?>
							
						</b>
						</h5>
						</div>
						<div class="col-md-6 text-center">
						<h5>
						<b>
							<?php
								echo $this->lang->line('trainer1').' : '.$trainer.'<br />';
							?>
						</b>
						</h5>
						</div>
						<div class="col-md-3 text-right">
						<h5>
						<b>
						<?php
								echo $this->lang->line('course1').' : '.$course.'<br />';
								echo $this->lang->line('division').' : '.$division;
						?>
						</h5>
						</b>
						</div>
					</div>
					

					<br /><br />
			<table class="" width="100%" border="1">
			<tr class="text-center" >
				<th class="text-center" rowspan="2" width="2%"><?php echo $this->lang->line('no'); ?></th>
				<th class="text-center" rowspan="2" width="12%"><?php echo $this->lang->line('academicNo'); ?></th>
				<th class="text-center" rowspan="2" width="20%"><?php echo $this->lang->line('name'); ?></th>
				<th class="text-center" colspan="<?php echo $lectureNo; ?>">
				<?php echo $this->lang->line('present1'); ?>
				</th>
				
			</tr>
			<tr>
			
			<?php for($n=1;$n <= $lectureNo;$n++) { 
			?><td><?php echo $n; ?></td><?php } ?>
			</tr>
			<?php  $no=1;   foreach ($trainee as $value) {?>
			<tr>
				<td><?php echo $no++; ?></td>
				<td><?php echo $value->academicNo ;?></td>
				<td ><?php echo $value->name ;?></td>
				<?php for($i=1;$i <= $lectureNo;$i++) { 
				   
						 ?>
							 <td>&nbsp;
															 </td>
							 <?php } ?>
			</tr>
			<?php } ?>
			</table>
                </div>
                </body>	
                </html>

                <!-- End file ------------------------------------------------------------ -->

