<?php
if ($this->session->userdata('userCC') != TRUE) {
    redirect(base_url('login/index'));
}
if(!in_array('account',$this->data_header['user'])){
		redirect(base_url('finance/index'));
		}	
?>	
<div class="container text-center">
    <h3 class="headline"><?php echo $title; ?></h3>
    <br />
    <table align="center" class="table table-bordered table-striped table-hover" style="width:400px;">
        <thead>
            <tr >
                <th width="10px" class="text-center"><?php echo $this->lang->line('no') ?></th>
                <th width="90px" class="text-center"><?php echo $this->lang->line('type') . '&nbsp;' . $this->lang->line('account') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php for ($i = 0; $i < count($records); $i++) { ?>
                <tr>
                    <td width="10px"><?php echo $records[$i]->id; ?></td>
                    <td width="90px"><?php echo $records[$i]->title; ?></td>

                </tr>
                <?php }
            ?>
        </tbody>
    </table>

</div>
























