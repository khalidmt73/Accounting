<?php
if ($this->session->userdata('userCC') != TRUE) {
    redirect(base_url('login/index'));
}
if(!in_array('lists',$this->data_header['user'])){
		redirect(base_url('login/index'));
		}	
?>
<?php
$export_file = 'lists_'.$division.'_'.$year.'_'.$semester.'_'.".doc";
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
header('Content-Type: application/vnd.ms-word;');                 // This should work for IE & Opera 
header("Content-type: application/x-msword");                    // This should work for the rest 
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
<table width="80%" border="0" align="center">
	<tr>
		<td width="25%" align="center">
			<h5>
			<b>
			<br />
			<?php echo $this->lang->line('site_name').'<br />';	?>
			<?php echo $this->lang->line('date');?>
			: <span class="" lang="ar" dir="rtl">
			<?php echo $hijry ;?>
			</span>
			<br />
			</b>	
			</h5>
		</td>
		<td width="30%" align="center">
			<?php echo $this->lang->line('god').'<br /><br />';	?>
		</b>
			</h5>
			<img src="<?php echo base_url('public/img/logo.png');?>" width="120" height="55" alt="" />
		</td>
		<td width="25%" align="center">
			<h5>
			<b>
			<br />
			<?php 
				echo $this->lang->line('site_name_eng').'<br />';
			?>
			<?php echo $this->lang->line('date_eng');?>
			: <span lang="en" style="font-family:Arial;">
				<?php echo date('d-m-Y'); ?>
			</span>
			<br />
			</b>	
			</h5>
		</td>
	</tr>
	<tr>
		<td colspan="3"><hr style="border:1px solid #000;padding:0px;" />
		</td>
	</tr>
</table>
	<table width="50%" border="0" align="center">

	<tr>
		<td width="25%" align="center">
			<?php echo $this->lang->line('yearStdy'); ?>
			<span lang="ar" dir="rtl" ><?php echo $year; ?></span>
			هـ 
			<br />
			<?php echo $this->lang->line('semester1').' : '.$semester;	?>
			</b>
			</h5>
		</td>
		
		<td width="25%" align="center">
			<h5>
			<b>
			<?php echo $this->lang->line('course1').' : '.$course.'<br />';
			echo $this->lang->line('division').' : '.$division;
			?>
			</h5>
			</b>
		</td>
	</tr>
</table>


<br /><br />
<table class="" border="1" width="50%" align="center">
	<tr  align="center">
		<td  align="center" ><?php echo $this->lang->line('no'); ?></td>
		<td  align="center" ><?php echo $this->lang->line('academicNo'); ?></td>
		<td  align="center" ><?php echo $this->lang->line('name'); ?></td>
	</tr>
	<?php  $no=1;   foreach ($trainee as $value) {?>
	<tr align="center">
		<td align="center"><?php echo $no++; ?></td>
		<td align="center"><?php echo $value->academicNo ;?></td>
		<td align="center"><?php echo $value->name ;?></td>
	</tr>
	<?php } ?>
</table>
</body>	
</html>            
<!-- End file ------------------------------------------------------------ -->
