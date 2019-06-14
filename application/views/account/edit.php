<?php
if ($this->session->userdata('userCC') != TRUE) {
    redirect(base_url('login/index'));
}
if(!in_array('account',$this->data_header['user'])){
		redirect(base_url('finance/index'));
		}	

foreach ($records as $value) {
    ?>
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="panel panel-default">
                    <div class="panel-heading pl-heading">
                        <h3 class="headline panel-title"><i class="fa fa-pencil-square-o "></i>
                            <?php echo $this->lang->line('edit_head'); ?></h3>
                    </div>
                    <div class="panel-body">
                        <form role="form" method="post" action="<?php echo base_url('account/update/' . $value->accountno, ''); ?>" >
                            <fieldset>
                                <?php
                                Myform_grp();
                                inp_text('accountno', $value->accountno, $this->lang->line('accountno'), 'class ="form-control" style="width:263px;height:29px;margin:10px;" id="accountno"');
                                Myform_grp();
                                inp_text('title', $value->title, $this->lang->line('account_title'), 'class ="form-control" style="width:263px;height:29px;margin:10px;" id="title"');
                                Myform_grp();
                                inp_text('thevalue', $value->thevalue, $this->lang->line('thevalue'), 'class ="form-control" style="width:263px;height:29px;margin:10px;" id="thevalue"');
                                Myform_grp();
                                ?>
                                <select class="form-control" name="type_id" style="width:263px;height:29px;margin:10px;">
                                    <?php foreach ($treeRecords as $treeValue) { ?> 
                                        <option value="<?php echo $treeValue->id; ?>" 
                                                <?php if ($treeValue->id == $value->type_id) echo "selected" ?>>
                                                <?php echo $treeValue->title ?>
                                        </option><?php } ?>
                                </select>
                                <?php
                                Myform_grp();
                                ?>
                                <select class="form-control " name="parent_id" style="width:263px;height:29px;margin:10px;">
                                    <?php foreach ($accountRecords as $accountValue) { ?> 
                                        <option value="<?php echo $accountValue->accountno ?>"
                                        <?php if ($accountValue->accountno == $value->parent_id) echo "selected" ?>>
                                                <?php echo $accountValue->title . $accountValue->accountno ?>
                                        </option><?php } ?>
                                </select>
    <?php
    Myform_grp();
    button('submit', 'class ="edit_btn btn btn-block " style="width:263px;height:40px;margin:10px;"');
    ?>
                                <span class="glyphicon glyphicon-edit" aria-hidden="true">
                                <?php echo $this->lang->line('edit_btn') ?>
                                </span>
                                    <?php button_close(); ?>

                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php } ?>