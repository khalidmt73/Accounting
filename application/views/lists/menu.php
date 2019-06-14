<?php
if ($this->session->userdata('userCC') != TRUE) {
    redirect(base_url('login/index'));
}
if(!in_array('lists',$this->data_header['user'])){
		redirect(base_url('login/index'));
		}	
?>
<div class='menu_up text-center'>
    <ul class="nav nav-tabs">
        
		<li role="presentation" <?php if ($this->uri->segment(2) == 'index') echo 'class="active"'; ?>>
            <a href="<?php echo base_url('lists/index') ?>"><i class="fa fa-eye"></i>

                <?php echo $this->lang->line('textbooks'); ?>
            </a>
        </li>
		<li role="presentation" <?php if ($this->uri->segment(2) == 'coursesList') echo 'class="active"'; ?>>
            <a href="<?php echo base_url('lists/coursesList') ?>"><i class="fa fa-eye"></i>

                <?php echo $this->lang->line('courses'); ?>
            </a>
        </li>
		<li role="presentation" <?php if ($this->uri->segment(2) == 'present') echo 'class="active"'; ?>>
            <a href="<?php echo base_url('lists/present') ?>"><i class="fa fa-eye"></i>

                <?php echo $this->lang->line('present1'); ?>
            </a>
        </li>
		<li role="presentation" <?php if ($this->uri->segment(2) == 'mark') echo 'class="active"'; ?>>
            <a href="<?php echo base_url('lists/mark') ?>"><i class="fa fa-eye"></i>

                <?php echo $this->lang->line('marks'); ?>
            </a>
        </li>
		<?php if($this->uri->segment(2) == 'edit'){ ?>
		 <li role="presentation" <?php if ($this->uri->segment(2) == 'edit') echo 'class="active"'; ?>>
            <a href="#"><i class="fa fa-eye"></i>

                <?php echo $this->lang->line('edit') . '&nbsp;' . $this->lang->line('lists') ?>
            </a>
        </li>
		<?php } ?>
		<?php if($this->uri->segment(2) == 'copy'){ ?>
		 <li role="presentation" <?php if ($this->uri->segment(2) == 'copy') echo 'class="active"'; ?>>
            <a href="#"><i class="fa fa-eye"></i>

                <?php echo $this->lang->line('copy') . '&nbsp;' . $this->lang->line('lists') ?>
            </a>
        </li>
		<?php } ?>
    </ul>
</div>
<br />
<!-- End file ----------------------------------------------------------------------------------------- -->
