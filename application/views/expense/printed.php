<?php
if ($this->session->userdata('userCC') != TRUE) {
    redirect(base_url('login/index'));
}
if(!in_array('expense',$this->data_header['user'])){
		redirect(base_url('finance/index'));
}
?>
<table class="" border="0" align="center" >
	<tr>
		<td  >
			<img  src=<?php echo base_url("public/img/logo.png");?> width="150" height="70" >
		</td>
	</tr>
	<tr>
		<td  >
			<?php echo $this->lang->line('site_name')?>
		</td>
	</tr>
</table>
<br /><br />
<div align="center" ><?php echo $this->lang->line('print')." ".date("Y/m/d"); ?><div>
<br />
<div class="container text-center">
    <table  class="table table-striped table-hover text-center" >
        <tr class="text-center">
            <td  align="center" colspan="6"><strong>
                        <?php echo $this->lang->line('expenses')." ".$this->lang->line('fromdate')."  ". $fromdate ." ".$this->lang->line('todate')." ".$todate ; ?>
            </td>
        </tr> 
		</table>
                    <table class="table table-striped table-hover text-center" >
                            <tr align="center">
                                <th  width="80px" ><?php echo $this->lang->line('no') ?>     </th>
                                <th  width="170px" ><?php echo $this->lang->line('thedate') ?></th>
                                <th  width="200px" ><?php echo $this->lang->line('beneficiary') ?></th>
                                <th width="120px" ><?php echo $this->lang->line('thevalue') ?></th>
                                <th width="180px" ><?php echo $this->lang->line('nocheck') ?></th>
                                <th width="370px" ><?php echo $this->lang->line('details') ?></th>
                                <th width="80px" ><?php echo $this->lang->line('entry') ?> </th>
                            </tr>
                            <?php for ($i = 0; $i < count($records); $i++) { ?>
                                <tr align="center">
                                    <td width="80px"><?php echo $i + 1; ?></td>
                                    <td width="170px">
                                        <span  dir=LTR >
                                            <?php echo $records[$i]->thedate; ?>
                                        </span></td>
                                    <td width="200px" align='right'>&nbsp;<?php echo $records[$i]->beneficiary; ?></td>
                                    <td width="120px"><?php echo $records[$i]->thevalue . '&nbsp;' . $this->lang->line('currency'); ?></td>
                                    <td width="180px" align='right'>&nbsp;<?php echo $records[$i]->nocheck; ?></td>
                                    <td width="370px" align='right'>&nbsp;<?php echo $records[$i]->details; ?></td>
                                    <td width="80px"><?php echo $records[$i]->id; ?></td>
                                </tr>
                            <?php } ?>
                    </table>
                </div>
               

                <!-- End file ----------------------------------------------------------------------------------------------------------- -->

