
<div class='menu_up text-center'>
    <ul class="nav nav-tabs">
        <li role="presentation"  <?php if ($this->uri->segment(2) == 'add') echo 'class="active"'; ?>>
            <a href="<?php echo base_url('account/add') ?>"><i class="fa fa-plus"></i>
                <?php echo $this->lang->line('add') ?>
            </a>
        </li><li role="presentation"  <?php if ($this->uri->segment(2) == 'class_of_accounts') echo 'class="active"'; ?>>
            <a href="<?php echo base_url('account/class_of_accounts') ?>"><i class="fa fa-table"></i>
                <?php echo $this->lang->line('class_of_accounts') ?>
            </a>
        </li>
        <li role="presentation" <?php if ($this->uri->segment(2) == 'accounts_tree') echo 'class="active"'; ?>>
            <a href="<?php echo base_url('account/accounts_tree') ?>"><i class="fa fa-tree"></i>


                <?php echo $this->lang->line('accounts_tree') ?>
            </a>
        </li>
        <li role="presentation" <?php if ($this->uri->segment(2) == 'accounts_close') echo 'class="active"'; ?>>
            <a href="<?php echo base_url('account/accounts_close') ?>"><i class="fa fa-times"></i>
                <?php echo $this->lang->line('accounts_close') ?>
            </a>
        </li>
		<?php if($this->uri->segment(2) == 'edit'){ ?>
		<li role="presentation"  <?php if ($this->uri->segment(2) == 'edit' ) echo 'class="active"'; ?>>
            <a href="<?php echo base_url('account/edit') ?>"><i class="fa fa-plus"></i>
                <?php echo $this->lang->line('edit') . '&nbsp;' . $this->lang->line('account') ?>
            </a>
        </li>
		<?php } ?>
    </ul>
</div>
<br />