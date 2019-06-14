<?php
if ($this->session->userdata('userCC') != TRUE) {
    redirect(base_url('login/index'));
}
if(!in_array('income',$this->data_header['user'])){
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
            <td   ><strong>
                        <?php echo $this->lang->line('incomes')." ".$this->lang->line('fromdate')."  ". $fromdate ." ".$this->lang->line('todate')." ".$todate ; ?>
            </td>
        </tr> 
		</table>
                    <table class="table table-striped table-hover text-center" >
                            <tr>
                                <th class="text-center"><?php echo $this->lang->line('no') ?>     </th>
                                <th class="text-center"><?php echo $this->lang->line('thedate') ?></th>
                                <th class="text-center"><?php echo $this->lang->line('byName') ?></th>
                                <th class="text-center"><?php echo $this->lang->line('thevalue') ?></th>
                                <th class="text-center"><?php echo $this->lang->line('depositor') ?></th>
                                <th class="text-center"><?php echo $this->lang->line('details') ?></th>
                                <th class="text-center"12/04/38><?php echo $this->lang->line('entry') ?> </th>
                            </tr>
                            <?php for ($i = 0; $i < count($records); $i++) { ?>
                            <tr >
                                <td ><?php echo $i + 1; ?></td>
                                <td ><?php echo $records[$i]->thedate; ?></td>
                                <td >&nbsp;<?php echo $records[$i]->byName; ?></td>
                                <td ><?php echo $records[$i]->thevalue . '&nbsp;' . $this->lang->line('currency'); ?></td>
                                <td >&nbsp;<?php echo $records[$i]->depositor; ?></td>
                                <td >&nbsp;<?php echo $records[$i]->details; ?></td>
                                <td ><?php echo $records[$i]->id; ?></td>
                           </tr>
                            <?php } ?>
                    </table>
                </div>
              

                <!-- End file ------------------------------------------------------------ -->

