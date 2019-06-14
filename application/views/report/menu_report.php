<?php
if ($this->session->userdata('userCC') != TRUE) {
    redirect(base_url('login/index'));
}
if(!in_array('report',$this->data_header['user'])){
		redirect(base_url('finance/index'));
		}	
?>
<div class='menu_up text-center'>
    <ul class="nav nav-tabs">
        <li role="presentation"  <?php if ($this->uri->segment(2) == 'view_form_journal') echo 'class="active"'; ?>>
            <a href="<?php echo base_url('report/view_form_journal') ?>">
                <?php echo $this->lang->line('journal') ?>
            </a>
        </li>
        <li role="presentation"  <?php if ($this->uri->segment(2) == 'view_form_trialBalance') echo 'class="active"'; ?>>
            <a href="<?php echo base_url('report/view_form_trialBalance') ?>">
                <?php echo $this->lang->line('trial_balance') ?>
            </a>
        </li>
        <li role="presentation"  <?php if ($this->uri->segment(2) == 'view_form_budjet') echo 'class="active"'; ?>>
            <a href="<?php echo base_url('report/view_form_budjet') ?>">
                <?php echo $this->lang->line('budjet') ?>
            </a>
        </li>
        <li role="presentation"  <?php if ($this->uri->segment(2) == 'view_form_incomeStatement') echo 'class="active"'; ?>>
            <a href="<?php echo base_url('report/view_form_incomeStatement') ?>">
                <?php echo $this->lang->line('income_statement') ?>
            </a>
        </li>
        </li>
        <li role="presentation"  <?php if ($this->uri->segment(2) == 'view_form_lp_account') echo 'class="active"'; ?>>
            <a href="<?php echo base_url('report/view_form_lp_account') ?>">
                <?php echo $this->lang->line('lp_account') ?>
            </a>
        </li>
    </ul>
</div>
<br />
