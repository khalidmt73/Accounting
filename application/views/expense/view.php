<?php
if ($this->session->userdata('userCC') != TRUE) {
    redirect(base_url('login/index'));
}
if(!in_array('expense',$this->data_header['user'])){
		redirect(base_url('finance/index'));
		}	
?>
<?php
Myform_post('expense/result', 'class=" form-inline"');
Myform_grp();
label($this->lang->line('fromdate'));
?>:
<input class="form-control input-sm"  type="text" id="fromdate" name="fromdate" value="<?php echo $fromdate ?>" placeholder="2015-01-30" style="width:110px;height:30px;"   onchange="AjaxSearch(this.value, 'result', '', 'expense/result/id/ASC/' + fromdate.value + '/' + todate.value + '/')" onclick="restData('result2')">
&nbsp;&nbsp;
<?php
label($this->lang->line('todate'));
?>:
<input class="form-control input-sm"  type="text" id="todate" name="todate" value=<?php echo $todate ?> placeholder="2015-01-30" style="width:110px;height:30px;"   onchange="AjaxSearch(this.value, 'result', '', 'expense/result/id/ASC/' + fromdate.value + '/' + todate.value + '/')" onclick="restData('result2')">

<?php
grd_x(1);
$month = '1';
$year = '2015';
?>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<?php
Myform_post('expense/result', 'class=" form-inline"');

Myform_grp();
label($this->lang->line('month'));
?>:
<select class="form-control" id="month" name="month" style="width:70px;height:30px;"  onchange="AjaxSearch(this.value, 'result', '', 'expense/result/id/ASC/' + year.value + '-' + month.value + '-01/' + year.value + '-' + month.value + '-31/')" onclick="restData('result2')">
        <?php for ($i = 1; $i < 13; $i++) { ?> 
        <option value="<?php echo $i; ?>" <?php if ($month == $i) echo "selected"; ?>>
        <?php echo $i; ?>
        </option>
<?php } ?>
</select>
&nbsp;&nbsp;<?php label($this->lang->line('year')); ?>:
<select class="form-control" id="year" name="year" style="width:85px;height:30px;"  onchange="AjaxSearch(this.value, 'result', '', 'expense/result/id/ASC/01-' + month.value + '-' + year.value + '/31-' + month.value + '-' + year.value + '/')" onclick="restData('result2')">
        <?php for ($i = 2015; $i < 2050; $i++) { ?> 
        <option value="<?php echo $i; ?>" <?php if ($year == $i) echo "selected"; ?>>
        <?php echo $i; ?>
        </option>
<?php } ?>
</select>
<?php grd_x(1); ?>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<div class="input-group">
    <span class="input-group-addon" style="width:50px;height:27px;">
<?php echo $this->lang->line('search'); ?>
    </span>
    <input type="text" name="searchByName"  placeholder="<?php echo $this->lang->line('beneficiary') . '&nbsp; أو &nbsp;' . $this->lang->line('thevalue'); ?>" id="searchByName" class="form-control" style="width:110px;height:30px;"onclick="restData('result2')" onkeyup="AjaxSearch(this.value, 'result', 'display', 'expense/search_result');"/>
    <span class="input-group-addon">
        <span class="glyphicon glyphicon-search" aria-hidden="true">
        </span>
    </span>
</div>
<?php Myform_close(); ?>

<!-- This part break --------------------------------------------------------------------------------------------------- -->
<hr class='hr_main'>

<!-- This part of the display data expense from the database ------------------------------------------------------- -->
<div id="result" >
<?php if (isset($oneRecord)) { ?>
        <div class="container text-center">
            <table class="table table-bordered table-striped table-hover text-center">
                <thead>
                    <tr>
                        <th><?php echo $this->lang->line('No'); ?></th>
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
                            <td><?php echo$value_oneRecord->beneficiary; ?></td>
                            <td><?php echo$value_oneRecord->thevalue; ?></td>
                            <td><?php echo$value_oneRecord->nocheck; ?></td>
                            <td><?php echo$value_oneRecord->details; ?></td>
                            <td><?php echo$value_oneRecord->journal_id; ?></td>
                            <td>
                                <a  href="<?php echo base_url('expense/edit/' . $value_oneRecord->id) ?>" >
                                    <font style='color:green'>
                                    <i class="fa fa-pencil-square-o fa-lg">
                                    </i>
                                    </font>				  
                                </a>
                            </td>
                            <td>
                                &nbsp;&nbsp;&nbsp;&nbsp;
                                <!--  <a href="<?php echo base_url('expense/delet/' . $records[$i]->id) ?>" 
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
</div>
<!-- End file ----------------------------------------------------------------------------------------------------------- -->
