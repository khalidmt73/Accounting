<?php
if ($this->session->userdata('userCC') != TRUE) {
	    redirect(base_url('login/index'));
		}
		if(!in_array('petty_cash',$this->data_header['user'])){
		redirect(base_url('finance/index'));
		}
?>
<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="panel panel-default">
                <div class="panel-heading pl-heading">
                    <h3 class="headline panel-title">
                        <i class="fa fa-plus"></i>
                        &nbsp;&nbsp;<?php echo $this->lang->line('add'); ?>
                    </h3>
                </div>
                <div class="panel-body">
                    <form role="form" method="post" action="<?php echo base_url('petty_cash/create'); ?>" >
                        <fieldset>

                            <select class="form-control " name="accountno" id="accountno" 
                                    style="width:263px;height:29px;margin:10px;">
                                        <?php foreach ($petty_cashRecords as $valueIn) { ?> 
                                    <option value="<?php echo $valueIn->accountno ?>" >
                                        <?php echo $valueIn->title ?>
                                    </option>
                                <?php } ?>
                            </select>
                            <select class="form-control" name="box_accountno"  id="box_accountno"  
                                    style="width:263px;height:29px;margin:10px;">
                                        <?php foreach ($bankRecords as $valueBn) { ?> 
                                    <option value="<?php echo $valueBn->accountno ?>" 
                                            <?php if ($valueBn->accountno == '1111') echo "selected" ?> >
                                            <?php echo $valueBn->title ?>
                                    </option>
                                            <?php } ?>
                            </select>
                            <input type="text" name="thedate" id="thedate"  value="<?php echo date('Y-m-d'); ?>" placeholder="<?php echo date('Y-m-d'); ?>" class ="form-control"	style="width:263px;height:29px;margin:10px;">
                            <input type="text" name="thevalue" id="thevalue"  value="" placeholder="<?php echo $this->lang->line('thevalue'); ?>" 
                                   class ="form-control" style="width:263px;height:29px;margin:10px;">
                            <input type="text" name="nocheck" id="nocheck"  value="" placeholder="<?php echo $this->lang->line('nocheck'); ?>"	class ="form-control" style="width:263px;height:29px;margin:10px;">
                            <input type="text" name="details" id="details"  value="" placeholder="<?php echo $this->lang->line('details'); ?>" 
                                   class ="form-control" style="width:263px;height:29px;margin:10px;">
                            <button type="submit" class="add_btn btn btn-block" style="width:263px;height:40px;">
                                <span class="glyphicon glyphicon-floppy-disk" aria-hidden="true">
<?php echo $this->lang->line('add') ?>
                                </span>
                            </button>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- This part deals with some of the fields(beneficiary and details) using jquery ------------------------------------- -->
<script>
    $(document).ready(function () {
        var x = '<?php echo $valueIn->title; ?>';
        $("#beneficiary").keyup(function () {
            $("#details").val(x + ' - ' + $("#beneficiary").val());
        });
        $("#beneficiary").change(function () {
            $("#details").val(x + ' - ' + $("#beneficiary").val());
        });
    });
</script>

<!-- This part of the display data from the database ----------------------------------------------------------------- -->
<?php if (isset($oneRecord)) { ?>
    <div class="container text-center">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th><?php echo $this->lang->line('no'); ?></th>
                    <th><?php echo $this->lang->line('thevalue'); ?></th>
                    <th><?php echo $this->lang->line('beneficiary'); ?></th>
                    <th><?php echo $this->lang->line('thevalue'); ?></th>
                    <th><?php echo $this->lang->line('nocheck'); ?></th>
                    <th><?php echo $this->lang->line('details'); ?></th>
                    <th><?php echo $this->lang->line('entry'); ?></th>
                    <th class="text-center">
    <?php echo $this->lang->line('edit') ?>
                    </th>
                    <th class="text-center">
    <?php echo $this->lang->line('delet') ?>
                    </th>
                </tr>
            </thead>
            <tbody>
    <?php foreach ($oneRecord as $value_oneRecord) { ?>
                    <tr>
                        <td>1</td>
                        <td><?php echo$value_oneRecord->thedate; ?></td>
                        <td>
        <?php
        foreach ($type as $type_value) {
            if ($type_value->accountno == $value_oneRecord->accountno) {
                echo $type_value->title;
            }
        }
        ?>
                        </td>
                        <td><?php echo$value_oneRecord->thevalue; ?></td>
                        <td><?php echo$value_oneRecord->nocheck; ?></td>
                        <td><?php echo$value_oneRecord->details; ?></td>
                        <td><?php echo$value_oneRecord->journal_id; ?></td>
                        <td>
                            <a  href="<?php echo base_url('petty_cash/edit/' . $value_oneRecord->id) ?>" >
                                <font style='color:green'>
                                <span class="glyphicon glyphicon-edit" aria-hidden="true">
                                </span>
                                </font>				  
                            </a>
                        </td>
                        <td>
                            &nbsp;&nbsp;&nbsp;&nbsp;
                            <!--  <a href="<?php echo base_url('petty_cash/delet/' . $records[$i]->id) ?>" 
                            onclick="if (confirm('هل أنت متأكد من الحذف !') == false) {
                            return false;}">-->
                            <font style='color:red'>
                            <span class="glyphicon glyphicon-trash" aria-hidden="true">
                            </span>
                            </font>
                            </a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
<?php } ?>
<!-- End file ----------------------------------------------------------------------------------------------------------- -->


