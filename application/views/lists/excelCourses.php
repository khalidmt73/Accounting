<?php
if ($this->session->userdata('userCC') != TRUE) {
    redirect(base_url('login/index'));
}
if(!in_array('lists',$this->data_header['user'])){
		redirect(base_url('login/index'));
		}	
$export_file = "my_name.xls";
ob_end_clean();
ini_set('zlib.output_compression', 'Off');
header('Pragma: public');
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");                  // Date in the past    
header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT');
header('Cache-Control: no-store, no-cache, must-revalidate');     // HTTP/1.1 
header('Cache-Control: pre-check=0, post-check=0, max-age=0');    // HTTP/1.1 
header("Pragma: no-cache");
header("Expires: 0");
header('Content-Transfer-Encoding: none');
header('Content-Type: application/vnd.ms-excel;');                 // This should work for IE & Opera 
header("Content-type: application/x-msexcel");                    // This should work for the rest 
header('Content-Disposition: attachment; filename="' . basename($export_file) . '"');
?>

<!-- This part html and php deals with data to setting  ----------------------------------------------------------- -->
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
									<?php echo $hijry ;?>
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
					<br /><hr style="border:1px solid #000;padding:0px;" />
                    <div class="row" >
		           
						<div class="col-md-3 text-right" >
						<h5>
						<b>
							
							
						</b>
						</h5>
						</div>
						<div class="col-md-6 text-center">
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
						<div class="col-md-3 text-right">
						<h5>
						<b>
						
						</h5>
						</b>
						</div>
					</div>
					

					<br /><br />
			<table class="table table-striped table-hover table-bordered  text-center">
		<tr>
			
			  <th class="text-center"><?php echo $this->lang->line('no');?></th>
			  <th class="text-center"><?php echo $this->lang->line('prog');?></th>
			  <th class="text-center"><?php echo $this->lang->line('target');?></th>
			  <th class="text-center">تاريخ بدء البرنامج</th>
			  <th class="text-center">المدرب</th>
		</tr>
			<?php  $no=1;   foreach ($linkin as $value) {?>
		<tr>
			<td height="100px;" valign="middle" align="center"><?php echo $no++; ?></td>
			<td><?php echo $value->course; ?></td>
			<td><?php echo $value->target; ?></td>
			<td><?php echo $value->fromdate; ?></td>
			<td><?php echo $value->name; ?></td>
		</tr>
		<?php } ?>
		</table>

                </div>
                </body>	
                </html>

                <!-- End file ------------------------------------------------------------ -->

