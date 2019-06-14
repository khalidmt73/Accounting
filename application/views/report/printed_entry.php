<?php
if ($this->session->userdata('userCC') != TRUE) {
    redirect(base_url('login/index'));
}
if(!in_array('report',$this->data_header['user'])){
		redirect(base_url('finance/index'));
		}	
if ($total_rows > 0 ){
?>
<table class="" border="0" align="center" >
	<tr>
		<td  >
			<img  src=<?php echo base_url("public/img/logo.png");?> width="150" height="70" >
		</td>
	</tr>
	<tr>
		<td  >
			<?php echo $this->lang->line('site_name')?>
		</td>
	</tr>
</table>
<br /><br />
<div align="center" >طباعة :<?php echo date("Y/m/d"); ?><div>
<br />
<div id="result2" >
    <div class="container text-center">
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading pl_heding">
                        
                        <table class="" border="0" align="center" >
                            <tr>
                                <td class="text-center" >
                                    &nbsp;&nbsp;
                                </td>
                                <td class="text-center"  >
                                    <h3 class="headline">
                                        <?php echo $title . '<font:color=black>&nbsp; '; ?>
                                        <?php if (isset($fromdate)) { ?>
                                            - &nbsp; من تاريخ  &nbsp;&nbsp;<?php echo $fromdate; ?>&nbsp; ألى تاريخ  <?php echo $todate;
                                    } else {
                                        
                                    } ?>
                                        &nbsp;&nbsp;&nbsp;<?php echo $this->lang->line('recordes') . '<span class="badge">' . $total_rows . '</span></font>';
                                        ?>
                                    </h3>
                                </td>
                               
                        </table>

                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">

                        <table class=""  width="900px" border="0" align="center" >
                            <tr>
                                <td colspan="5"><hr  class="hr_part" /></td>
                            </tr>
<?php foreach ($journal as $value_journal) { ?>

                                <tr>
                                    <td width="100"  align="right"  colspan="1"><b><?php echo $value_journal->thedate; ?></b></td>
                                    <td width="800" align="center" colspan="4"><b>رقم القيد : <?php echo $value_journal->id; ?></b></td>

                                </tr>

                                <tr>
                                    <td align="center" colspan="5"><br/>
                                        <b><?php echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" . $value_journal->details; ?><b /><br/>
                                    </td>

                                </tr>

                                <?php
                                foreach ($journal_details as $value_journal_details) {
                                    if ($value_journal_details->journal_id == $value_journal->id) {
                                        ?>
                                        <tr>
                                            <td width="100px">&nbsp;&nbsp;</td>

                                            <td width="300px" align="right"><br/>
                                                <?php
                                                if ($value_journal_details->toaccount > 0) {
                                                    echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
                                                }
                                                foreach ($tree_account as $value_accountnot) {
                                                    if ($value_journal_details->accountno == $value_accountnot->accountno) {
                                                        echo $value_accountnot->title;
                                                    }
                                                }
                                                ?>
                                            </td>
                                            <td width="300px" align="right"  >
            <?php
            if ($value_journal_details->fromaccount > 0)
                echo $value_journal_details->fromaccount;
            elseif ($value_journal_details->toaccount > 0)
                echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" . $value_journal_details->toaccount;
            ?>
                                            </td>
                                            <td width="200px">&nbsp;&nbsp;</td>

                                        </tr>
                                        <?php
                                    }
                                }
                                ?>
                                <tr>
                                    <td colspan="5"><br /><hr  class="hr_part" /></td>
                                </tr>
    <?php
}
?>
                        </table>
                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
            </div>
            <!-- /.col-lg-12 -->
        </div>
    </div>
</div>
<?php } ?>