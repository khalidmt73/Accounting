<?php
if ($this->session->userdata('userCC') != TRUE) {
    redirect(base_url('login/index'));
}


//if(!in_array($role,$this->data_header['user'])){
//		redirect(base_url('login/index'));
//}

?>
<div class='menu_up text-center'>
    <ul class="nav nav-tabs">
       
        <li role="presentation" <?php if ($this->uri->segment(2) == 'index' OR $this->uri->segment(3) == 'result') echo 'class="active"'; ?>>
            <a href="<?php echo base_url('role/index/'.$id_dep) ?>"><i class="fa fa-eye"></i>

                <?php echo $this->lang->line('view') . '&nbsp;' . $this->lang->line('role') ?>
            </a>
        </li>
		<?php if($this->uri->segment(2) == 'edit'){ ?>
		<li role="presentation"  <?php if ($this->uri->segment(2) == 'edit' ) echo 'class="active"'; ?>>
            <a href="<?php echo base_url('role/edit/'.$id.'/'.$dep) ?>"><i class="fa fa-plus"></i>
                <?php echo $this->lang->line('edit') . '&nbsp;' . $this->lang->line('role') ?>
            </a>
        </li>
		<?php } ?>
    </ul>
</div>
<br />
<!-- End file ---------------------------------------------------------------------- -->
