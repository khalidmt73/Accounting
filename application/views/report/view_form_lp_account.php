<?php
if ($this->session->userdata('userCC') != TRUE) {
    redirect(base_url('login/index'));
}
if(!in_array('report',$this->data_header['user'])){
		redirect(base_url('finance/index'));
		}	
?>
<?php
Myform_post('#', 'class=" form-inline"');
Myform_grp();
label($this->lang->line('fromdate'));
?>
<input class="form-control input-sm"  type="text" id="fromdate" name="fromdate" value="<?php echo $fromdate ?>" placeholder="2015-01-30" style="width:110px;height:30px;"   onchange="AjaxSearch(this.value, 'result', '', 'report/view_lp_account/' + fromdate.value + '/' + todate.value + '/')" onclick="restData('result2')">

<?php
label($this->lang->line('todate'));
?>
<input class="form-control input-sm"  type="text" id="todate" name="todate" value=<?php echo $todate ?> placeholder="2015-01-30" style="width:110px;height:30px;"   onchange="AjaxSearch(this.value, 'result', '', 'report/view_lp_account/' + fromdate.value + '/' + todate.value + '/')" onclick="restData('result2')">


<?php
button_close();

grd_x(1);

$month = '1';
$year = '2015';
?>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;	
<?php
Myform_post('income/view', 'class=" form-inline"');

Myform_grp();
label($this->lang->line('month'));
?>
<select class="form-control" id="month" name="month" style="width:70px;height:30px;"  onchange="AjaxSearch(this.value, 'result', '', 'report/view_lp_account/' + year.value + '-' + month.value + '-01/' + year.value + '-' + month.value + '-31/')" onclick="restData('result2')">
        <?php for ($i = 1; $i < 13; $i++) { ?> 
        <option value="<?php echo $i; ?>" <?php if ($month == $i) echo "selected"; ?>>
    <?php echo $i; ?>
        </option><?php } ?>
</select>
<?php label($this->lang->line('year'));
?>
<select class="form-control" id="year" name="year" style="width:85px;height:30px;"  onchange="AjaxSearch(this.value, 'result', '', 'report/view_lp_account/01-' + month.value + '-' + year.value + '/31-' + month.value + '-' + year.value + '/')" onclick="restData('result2')">
    <?php for ($i = 2015; $i < 2050; $i++) { ?> 
        <option value="<?php echo $i; ?>" <?php if ($year == $i) echo "selected"; ?>>
            <?php echo $i; ?>
        </option><?php } ?>
</select>

<?php
button_close();
grd_x(1);

Myform_close();
?>

<hr class='hr_main'>
<div id="result" >

</div>

