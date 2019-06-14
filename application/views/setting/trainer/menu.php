<?php
if ($this->session->userdata('userCC') != TRUE) {
    redirect(base_url('login/index'));
}
if(!in_array('trainer',$this->data_header['user'])){
		redirect(base_url('trainer/index'));
}	
?>
<div class='menu_up text-center'>
    <ul class="nav nav-tabs">
        <li role="presentation"  <?php if ($this->uri->segment(2) == 'add') echo 'class="active"'; ?>>
            <a href="<?php echo base_url('trainer/add') ?>"><i class="fa fa-plus"></i>
                <?php echo $this->lang->line('add') . '&nbsp;' . $this->lang->line('trainer') ?>
            </a>
        </li>
        <li role="presentation" <?php if ($this->uri->segment(2) == 'index') echo 'class="active"'; ?>>
            <a href="<?php echo base_url('trainer/index') ?>"><i class="fa fa-eye"></i>

                <?php echo $this->lang->line('view') . '&nbsp;' . $this->lang->line('trainer') ?>
            </a>
        </li>
		<?php if($this->uri->segment(2) == 'edit'){ ?>
		 <li role="presentation" <?php if ($this->uri->segment(2) == 'edit') echo 'class="active"'; ?>>
            <a href="<?php echo base_url('trainer/edit') ?>"><i class="fa fa-eye"></i>

                <?php echo $this->lang->line('edit') . '&nbsp;' . $this->lang->line('trainer') ?>
            </a>
        </li>
		<?php } ?>
    </ul>
</div>
<br />
<!-- End file ----------------------------------------------------------------------------------------- -->
