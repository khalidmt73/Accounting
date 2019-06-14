<?php
if ($this->session->userdata('userCC') != TRUE) {
    redirect(base_url('login/index'));
}
if(!in_array('entry',$this->data_header['user'])){
		redirect(base_url('finance/index'));
		}	


    
$bar = each($record);
print($bar);

    ?>
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
                        <form role="form" method="post" action="<?php echo base_url('entry/update/' . $value->id . '/' . $value->journal_id); ?>" >
                            <fieldset>
                                <?php Myform_grp(); ?>
                                <select  class="form-control " name="accountno" style="width:263px;height:29px;margin:10px;"  
                                         readonly>
                                             <?php foreach ($entryRecords as $entry_value) { ?>
                                        <option value="<?php echo $entry_value->accountno ?>"
                                                <?php if ($value->accountno == $entry_value->accountno) echo "selected" ?> >
                                                <?php echo $entry_value->title ?>
                                        </option>
                                    <?php } ?>
                                </select>
                                <?php Myform_grp(); ?>
                                <select class="form-control" name="box_accountno" style="width:263px;height:29px;margin:10px;" 
                                        readonly>
                                            <?php foreach ($entryRecords as $entry_value) { ?>
                                        <option value="<?php echo $entry_value->accountno ?>"
                                                <?php if ($value->box_accountno == $entry_value->accountno) echo "selected" ?> >
                                                <?php echo $entry_value->title ?>
                                        </option>
                                                <?php } ?>
                                </select>
                                    <?php
                                    Myform_grp();
                                    inp_text('thedate', $value->thedate, "", 'class ="form-control" style="width:263px;height:29px;margin:10px;" id="thedate"');
                                    ?></div><?php
                            Myform_grp();
                                    inp_text('thedate', $value->toaccount, "", 'class ="form-control" style="width:263px;height:29px;margin:10px;" id="thedate"');
                                    ?></div><?php
                                    Myform_grp();
                            Myform_grp();
                                inp_text('details',$value->details, "", 'class ="form-control" style="width:263px;height:29px;margin:10px;" id="details"');
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
<?php //} ?>
<!-- This part deals with some of the fields(byName and details) using jquery ------------------------------------- -->
<script>
    $(document).ready(function () {
        var x = '<?php echo $valueIn->title ?>';
        $("#byName").keyup(function () {
            $("#details").val(x + ' - ' + $("#byName").val());
        });
        $("#byName").change(function () {
            $("#details").val(x + ' - ' + $("#byName").val());
        });
    });
</script>
<!-- End file ----------------------------------------------------------------------------------------------------------- -->
