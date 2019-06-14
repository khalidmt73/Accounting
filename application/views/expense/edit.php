<?php
if ($this->session->userdata('userCC') != TRUE) {
    redirect(base_url('login/index'));
}
if(!in_array('expense',$this->data_header['user'])){
		redirect(base_url('finance/index'));
}	
foreach ($record as $value) {
    ?>

    <!-- This part is a form modifies data which comes database by HTML ----------------------------------------------- -->
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="panel panel-default">
                    <div class="panel-heading pl-heading">
                        <h3 class="headline panel-title">
                            <i class="fa fa-pencil-square-o "></i>
                            <?php echo $this->lang->line('edit'); ?>
                        </h3>
                    </div>
                    <div class="panel-body">
                        <form role="form" method="post" action="<?php echo base_url('expense/update/' . $value->id . '/' . $value->journal_id); ?>" >
                            <fieldset>
                                </select>
                                <?php Myform_grp(); ?>
                                <select  class="form-control " name="accountno" style="width:263px;height:29px;margin:10px;"  
                                         readonly>
                                             <?php foreach ($bankRecords as $valueBn) { ?>
                                        <option value="<?php echo $valueBn->accountno ?>"
                                                 <?php if ($value->accountno == $valueBn->accountno) echo "selected" ?> >
                                                <?php echo $valueBn->title ?>
                                        </option>
                                                <?php } ?>
                                </select>
								  <?php Myform_grp(); ?>
                                <select class="form-control" name="box_accountno" style="width:263px;height:29px;margin:10px;" 
                                        readonly>
                                            <?php foreach ($expenseRecords as $valueIn) { ?>
                                        <option value="<?php echo $valueIn->accountno ?>"
                                                <?php if ($value->box_accountno == $valueIn->accountno) echo "selected" ?> >
                                                <?php echo $valueIn->title ?>
                                        </option>
                                    <?php } ?>
                                    <?php
                                    Myform_grp();
                                    inp_text('thedate', $value->thedate, "", 'class ="form-control" style="width:263px;height:29px;margin:10px;" id="thedate"');
                                    ?></div><?php
                                Myform_grp();
                                inp_text('beneficiary', $value->beneficiary, "", 'class ="form-control" style="width:263px;height:29px;margin:10px;" id="beneficiary"');
                                ?></div><?php
                                Myform_grp();
                                inp_text('thevalue', $value->thevalue, "", 'class ="form-control" style="width:263px;height:29px;margin:10px;" id="thevalue" readonly');
                                ?></div><?php
                                Myform_grp();
                                inp_text('nocheck', $value->nocheck, "", 'class ="form-control" style="width:263px;height:29px;margin:10px;" id="nocheck"', false);
                                ?></div><?php
                                Myform_grp();
                                inp_text('details', $value->details, "", 'class ="form-control" style="width:263px;height:29px;margin:10px;" id="details"');
                                ?></div><?php
                                Myform_grp();
                                button('submit', 'class ="edit_btn btn btn-block " style="width:263px;height:40px;margin:10px;"');
                                ?>
                                <span class="glyphicon glyphicon-edit" aria-hidden="true">
                                    <?php echo $this->lang->line('edit') ?>
                                </span>
                                <?php button_close(); ?>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<!-- This part deals with some of the fields(beneficiary and details) using jquery ------------------------------------- -->
<script>
    $(document).ready(function () {
        var x = '<?php echo $valueIn->title ?>';
        $("#beneficiary").keyup(function () {
            $("#details").val(x + ' - ' + $("#beneficiary").val());
        });
        $("#beneficiary").change(function () {
            $("#details").val(x + ' - ' + $("#beneficiary").val());
        });
    });
</script>
<!-- End file ----------------------------------------------------------------------------------------------------------- -->
