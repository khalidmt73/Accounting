<?php
if ($this->session->userdata('userCC') != TRUE) {
    redirect(base_url('login/index'));
}
if(!in_array('trainee',$this->data_header['user'])){
		redirect(base_url('login/index'));
}	
?>
<div class='menu_up text-center'>
    <ul class="nav nav-tabs">
        <li role="presentation"  <?php if ($this->uri->segment(2) == 'add') echo 'class="active"'; ?>>
            <a href="<?php echo base_url('trainee/add') ?>"><i class="fa fa-plus"></i>
                <?php echo $this->lang->line('add') . '&nbsp;' . $this->lang->line('trainee') ?>
            </a>
        </li>
				<?php if($this->uri->segment(2) == 'pay'){ ?>

		 <li role="presentation"  <?php if ($this->uri->segment(2) == 'pay') echo 'class="active"'; ?>>
            <a href="#"><i class="fa fa-plus"></i>
                <?php echo $this->lang->line('pay'); ?>
            </a>
        </li>
		<?php } ?>
        <li role="presentation" <?php if ($this->uri->segment(2) == 'index') echo 'class="active"'; ?>>
            <a href="<?php echo base_url('trainee/index') ?>"><i class="fa fa-eye"></i>

                <?php echo $this->lang->line('view') . '&nbsp;' . $this->lang->line('trainee') ?>
            </a>
        </li>
		<?php if($this->uri->segment(2) == 'edit'){ ?>
		 <li role="presentation" <?php if ($this->uri->segment(2) == 'edit') echo 'class="active"'; ?>>
            <a href="#"><i class="fa fa-eye"></i>

                <?php echo $this->lang->line('edit') . '&nbsp;' . $this->lang->line('trainee') ?>
            </a>
        </li>
		<?php } ?>
		<?php if($this->uri->segment(2) == 'copy'){ ?>
		 <li role="presentation" <?php if ($this->uri->segment(2) == 'copy') echo 'class="active"'; ?>>
            <a href="#"><i class="fa fa-eye"></i>

                <?php echo $this->lang->line('copy') . '&nbsp;' . $this->lang->line('trainee') ?>
            </a>
        </li>
		<?php } ?>
    </ul>
</div>
<br />
<!-- End file ----------------------------------------------------------------------------------------- -->
