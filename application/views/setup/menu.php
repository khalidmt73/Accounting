<?php
if ($this->session->userdata('userCC') != TRUE) {
    redirect(base_url('login/index'));
}
if(!in_array('setup',$this->data_header['user'])){
		redirect(base_url('setup/index'));
}	
?>
<div class='menu_up text-center'>
    <ul class="nav nav-tabs">
        <li role="presentation"  <?php if ($this->uri->segment(1) == 'calendar') echo 'class="active"'; ?>>
            <a href="<?php echo base_url('calendar/index') ?>"><i class="fa fa-plus"></i>
                <?php echo $this->lang->line('calendar1') ?>
            </a>
        </li>
		<li role="presentation" <?php if ($this->uri->segment(1) == 'linkCourse') 
			echo 'class="active"'; ?>>
            <a href="<?php echo base_url('linkCourse/index') ?>">
			<i class="fa fa-eye"></i>
            <?php echo $this->lang->line('setup'). '&nbsp;' . $this->lang->line('course') ?>
            </a>
        </li>
        <li role="presentation" <?php if ($this->uri->segment(1) == 'linkTextbook')
			echo 'class="active"'; ?>>
            <a href="<?php echo base_url('linkTextbook/get_textbook') ?>">
			<i class="fa fa-eye"></i>
            <?php echo $this->lang->line('setup'). '&nbsp;' . $this->lang->line('textbooks') ?>
            </a>
        </li>
    </ul>
</div>
<br />
<!-- End file ----------------------------------------------------------------------------------------- -->
