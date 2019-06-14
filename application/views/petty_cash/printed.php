<?php
if ($this->session->userdata('userCC') != TRUE) {
	    redirect(base_url('login/index'));
		}
		if(!in_array('petty_cash',$this->data_header['user'])){
		redirect(base_url('finance/index'));
		}
?>
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
                    <br /><br /><br />
                    <h3 align="center" class="">
                        <?php echo $title; ?>
                        <?php echo '&nbsp;' . $this->lang->line('fromdate'); ?>
                        <?php echo '<span  dir=RTL >&nbsp;' . $fromdate . '&nbsp;</span>'; ?>
                        <?php echo '&nbsp;' . $this->lang->line('todate'); ?>
                        <?php echo '<span  dir=RTL >&nbsp;' . $todate . '&nbsp;</span>'; ?></h3>
                    <h3 align="center" class=""><?php echo count($records) . ' ' . $this->lang->line('recordes'); ?></h3>
                    <table align="center" lang="ar" dir="rtl" border="1" class="table"  
                           style='width:1200px;border-collapse:collapse;border:1;font-size:16.0pt;font-family:"Arial","sans-serif"''>
                        <thead>
                            <tr align="center">
                                <th  width="80px" ><?php echo $this->lang->line('no') ?>     </th>
                                <th  width="170px" ><?php echo $this->lang->line('thedate') ?></th>
                                 <!-- <th  width="200px" ><?php echo $this->lang->line('beneficiary') ?></th>-->
                                <th width="120px" ><?php echo $this->lang->line('thevalue') ?></th>
                                <th width="180px" ><?php echo $this->lang->line('nocheck') ?></th>
                                <th width="370px" ><?php echo $this->lang->line('details') ?></th>
                                <th width="80px" ><?php echo $this->lang->line('entry') ?> </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php for ($i = 0; $i < count($records); $i++) { ?>
                                <tr align="center">
                                    <td width="80px"><?php echo $i + 1; ?></td>
                                    <td width="170px">
                                        <span  dir=LTR >
                                            <?php echo $records[$i]->thedate; ?>
                                        </span></td>
                                   <!-- <td width="200px" align='right'>&nbsp;<?php echo $records[$i]->details; ?></td>-->
                                    <td width="120px"><?php echo $records[$i]->thevalue . '&nbsp;' . $this->lang->line('currency'); ?></td>
                                    <td width="180px" align='right'>&nbsp;<?php echo $records[$i]->nocheck; ?></td>
                                    <td width="370px" align='right'>&nbsp;<?php echo $records[$i]->details; ?></td>
                                    <td width="80px"><?php echo $records[$i]->journal_id; ?></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
                </body>	
                </html>

                <!-- End file ----------------------------------------------------------------------------------------------------------- -->

