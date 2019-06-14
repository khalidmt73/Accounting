<?php
if ($this->session->userdata('userCC') != TRUE) {
    redirect(base_url('login/index'));
}
if(!in_array('entry',$this->data_header['user'])){
		redirect(base_url('finance/index'));
		}	
$export_file = "my_name.doc";
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
<!DOCTYPE HTML>
<html lang='ar'>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <!-- Start Main Menu Code -->
        <link rel="stylesheet" href="<?php echo base_url('public/css/style.css'); ?>" media="screen">
    </head>
    <body>
        <div id="MainPage">
            <div id="MainMenu">
                <div class="container text-center">
                    <h3 align="center" class="headline"><?php echo $title; ?></h3>
                    <h3 align="center" class="headline"><?php echo count($records) . ' ' . $this->lang->line('recordes'); ?>
                    </h3>
                    <table align="center" lang="ar" dir="rtl" border="1" class="table" width="800px" style='width:800px;border-collapse:collapse;border:1;font-size:16.0pt;font-family:"Arial","sans-serif"''>
                        <thead>
                            <tr align="center">
                                <th  width="50px" ><?php echo $this->lang->line('No') ?>     </th>
                                <th  width="100px" ><?php echo $this->lang->line('thedate') ?></th>
                                <th  width="200px" ><?php echo $this->lang->line('byName') ?></th>
                                <th width="150px" ><?php echo $this->lang->line('thevalue') ?></th>
                                <th width="200px" ><?php echo $this->lang->line('depositor') ?></th>
                                <th width="350px" ><?php echo $this->lang->line('details') ?></th>
                                <th width="50px" ><?php echo $this->lang->line('entry') ?> </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php for ($i = 0; $i < count($records); $i++) { ?>
                                <tr align="center">
                                    <td width="80px"><?php echo $i + 1; ?></td>
                                    <td width="100px">
                                        <span  dir=LTR >
                                            <?php echo $records[$i]->thedate; ?>
                                        </span>
                                    </td>
                                    <td width="200px"><?php echo $records[$i]->byName; ?></td>
                                    <td width="200px"><?php echo $records[$i]->thevalue . ' ريال '; ?></td>
                                    <td width="200px"><?php echo $records[$i]->depositor; ?></td>
                                    <td width="390px"><?php echo $records[$i]->details; ?></td>
                                    <td width="80px"><?php echo $records[$i]->id; ?></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
                </body>
                </html>
                <!-- End file -------------------------------------------------------------------------------------------------------- -->

