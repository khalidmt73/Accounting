<?php
if ($this->session->userdata('userCC') != TRUE) {
	    redirect(base_url('login/index'));
		}
		if(!in_array('petty_cash',$this->data_header['user'])){
		redirect(base_url('finance/index'));
		}
?>
<div class='menu_up text-center'>
    <ul class="nav nav-tabs">
        <li role="presentation"  <?php if ($this->uri->segment(2) == 'add') echo 'class="active"'; ?>>
            <a href="<?php echo base_url('petty_cash/add') ?>"><i class="fa fa-plus"></i>
                <?php echo $this->lang->line('add') . '&nbsp;' . $this->lang->line('petty_cash') ?>
            </a>
        </li>
        <li role="presentation" <?php if ($this->uri->segment(2) == 'view' OR $this->uri->segment(2) == 'result') echo 'class="active"'; ?>>
            <a href="<?php echo base_url('petty_cash/view') ?>"><i class="fa fa-eye"></i>

                <?php echo $this->lang->line('view') . '&nbsp;' . $this->lang->line('petty_cashs') ?>
            </a>
        </li>
		<?php if($this->uri->segment(2) == 'edit'){ ?>
		<li role="presentation"  <?php if ($this->uri->segment(2) == 'edit' ) echo 'class="active"'; ?>>
            <a href="<?php echo base_url('petty_cash/edit') ?>"><i class="fa fa-plus"></i>
                <?php echo $this->lang->line('edit') . '&nbsp;' . $this->lang->line('petty_cash') ?>
            </a>
        </li>
		<?php } ?>
    </ul>
</div>
<br />
<!-- End file ----------------------------------------------------------------------------------------- -->
