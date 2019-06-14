<?php
if ($this->session->userdata('userCC') != TRUE) {
    redirect(base_url('login/index'));
}
if(!in_array('income',$this->data_header['user'])){
		redirect(base_url('finance/index'));
		}	
?>
<div class='menu_up text-center'>
    <ul class="nav nav-tabs">
        <li role="presentation"  <?php if ($this->uri->segment(2) == 'add') echo 'class="active"'; ?>>
            <a href="<?php echo base_url('income/add') ?>"><i class="fa fa-plus"></i>
                <?php echo $this->lang->line('add') . '&nbsp;' . $this->lang->line('income') ?>
            </a>
        </li>
		<li role="presentation"  <?php if ($this->uri->segment(2) == 'addD') echo 'class="active"'; ?>>
            <a href="<?php echo base_url('income/addD') ?>"><i class="fa fa-plus"></i><i class="fa fa-plus"></i>
                <?php echo $this->lang->line('from') . '&nbsp;' . $this->lang->line('entryD') ?>
            </a>
        </li>
        <li role="presentation" <?php if ($this->uri->segment(2) == 'view') echo 'class="active"'; ?>>
            <a href="<?php echo base_url('income/view') ?>"><i class="fa fa-eye"></i>

                <?php echo $this->lang->line('view') . '&nbsp;' . $this->lang->line('incomes') ?>
            </a>
        </li>
		<?php if($this->uri->segment(2) == 'edit'){ ?>
		<li role="presentation"  <?php if ($this->uri->segment(2) == 'edit' ) echo 'class="active"'; ?>>
            <a href="<?php echo base_url('income/edit') ?>"><i class="fa fa-plus"></i>
                <?php echo $this->lang->line('edit') . '&nbsp;' . $this->lang->line('income') ?>
            </a>
        </li>
		<?php } ?>
    </ul>
</div>
<br />
<!-- End file ----------------------------------------------------------------------------------------- -->
