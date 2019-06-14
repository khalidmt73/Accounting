<?php
if ($this->session->userdata('userCC') != TRUE) {
    redirect(base_url('login/index'));
}
if(!in_array('account',$this->data_header['user'])){
		redirect(base_url('finance/index'));
		}	
?>	
<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="headline panel-title"><i class="fa fa-plus"></i>&nbsp;&nbsp;<?php echo $this->lang->line('accountno'); ?></h3>
                </div>
                <div class="panel-body">
                    <form role="form" method="post" action="<?php echo base_url('account/create'); ?>" >
                        <fieldset>
                            <?php
                            Myform_grp();
                            inp_text('accountno', '', $this->lang->line('accountno'), 'class ="form-control" style="width:263px;height:29px;margin:10px;" id="accountno"');
                            Myform_grp();
                            inp_text('title', '', $this->lang->line('account_title'), 'class ="form-control" style="width:263px;height:29px;margin:10px;" id="title"');
                            Myform_grp();
                            inp_text('thevalue', '', $this->lang->line('thevalue'), 'class ="form-control" style="width:263px;height:29px;margin:10px;" id="thevalue"');
                            Myform_grp();
                            ?>
                            <select class="form-control" name="type_id" style="width:263px;height:29px;margin:10px;">
                                <?php foreach ($treeRecords as $value) { ?> 
                                    <option value="<?php echo $value->id; ?>" >
                                        <?php echo $value->title ?>
                                    </option><?php } ?>
                            </select>
                            <?php
                            Myform_grp();
                            ?>
                            <select class="form-control " name="parent_id" style="width:263px;height:29px;margin:10px;">
                                <?php foreach ($accountRecords as $value) { ?> 
                                    <option value="<?php echo $value->accountno ?>"  >
                                    <?php echo $value->title ?>
                                    </option><?php } ?>
                            </select>
<?php
Myform_grp();
button('submit', ' class ="add_btn btn btn-block" style="width:263px;height:40px;margin:10px;"');
?>
                            <span class="glyphicon glyphicon-floppy-disk" aria-hidden="true">
                            <?php echo $this->lang->line('add_btn') ?>
                            </span>
                                <?php button_close(); ?>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>