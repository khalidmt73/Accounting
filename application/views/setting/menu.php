<?php
if ($this->session->userdata('userCC') != TRUE) {
    redirect(base_url('login/index'));
}
if(!in_array('textbook',$this->data_header['user'])){
		redirect(base_url('textbook/index'));
}	
?>
<div class='menu_up text-center'>
    <ul class="nav nav-tabs">
        <li role="presentation" <?php if ($this->uri->segment(1) == 'division') echo 'class="active"'; ?>>
            <a href="<?php echo base_url('division/index') ?>"><i class="fa fa-eye"></i>

                <?php echo $this->lang->line('divisions'); ?>
            </a>
        </li>
		<li role="presentation" <?php if ($this->uri->segment(1) == 'textbook')
		echo 'class="active"'; ?>>
            <a href="<?php echo base_url('textbook/index') ?>"><i class="fa fa-eye"></i>

                <?php echo $this->lang->line('textbooks') ?>
            </a>
        </li>
		<li role="presentation" <?php if ($this->uri->segment(1) == 'course') echo 'class="active"'; ?>>
            <a href="<?php echo base_url('course/index') ?>"><i class="fa fa-eye"></i>

                <?php echo $this->lang->line('courses') ?>
            </a>
        </li>
		 <li role="presentation" <?php if ($this->uri->segment(1) == 'trainer') echo 'class="active"'; ?>>
            <a href="<?php echo base_url('trainer/index') ?>"><i class="fa fa-eye"></i>
                <?php echo $this->lang->line('trainers') ?>
            </a>
        </li>
		<li role="presentation" <?php if ($this->uri->segment(1) == 'classroom') echo 'class="active"'; ?>>
            <a href="<?php echo base_url('classroom/index') ?>"><i class="fa fa-eye"></i>

                <?php echo $this->lang->line('classrooms') ?>
            </a>
        </li>
		
    </ul>
</div>
<br />
<!-- End file ----------------------------------------------------------------------------------------- -->
