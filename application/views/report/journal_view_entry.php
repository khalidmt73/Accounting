<?php
if ($this->session->userdata('userCC') != TRUE) {
    redirect(base_url('login/index'));
}
if(!in_array('report',$this->data_header['user'])){
		redirect(base_url('finance/index'));
		}	
if ($total_rows > 0 ){
?>
<div id="result2" >
    <div class="container text-center">
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading pl_heding">
                        <table class="table pl_table table-striped">
                            <tr>
                                <td class="text-left" >
                                    &nbsp;&nbsp;
                                </td>
                                <td class="text-center"  >
                                    <h3 class="headline">
                                        <?php echo $title . '<font:color=black>&nbsp; '; ?>
                                        <?php if (isset($entry_f)) { ?>
                                            - &nbsp; من  &nbsp;&nbsp;<?php echo $entry_f; ?>&nbsp; إلى  <?php echo $entry_t;
                                    } else {
                                        
                                    } ?>
                                        &nbsp;&nbsp;&nbsp;<?php echo $this->lang->line('recordes') . '<span class="badge">' . $total_rows . '</span></font>';
                                        ?>
                                    </h3>
                                </td>
                                <td class="text-left" >
<?php if (isset($entry_f)) { ?>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown" style="width:120px;height:29px;">
                                                تحميل
                                                <span class="caret"></span>
                                            </button>
                                            <ul class="dropdown-menu " role="menu">
                                                <li>		
                                                    <a href="<?php echo base_url('report/pdf/' . $entry_f . '/' . $entry_t . '/'); ?>"class='a_img'>
                                                        <i class="fa fa-file-pdf-o fa-lg"></i>&nbsp;&nbsp; تحميل PDF
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="<?php echo base_url('report/excel/' . $entry_f . '/' . $entry_t . '/'); ?>" class='a_img'>
                                                        <i class="fa fa-file-excel-o fa-lg"></i>&nbsp;&nbsp; تحميل EXCEL
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="<?php echo base_url('report/word/' . $entry_f . '/' . $entry_t . '/'); ?>" class='a_img'>
                                                        <i class="fa fa-file-word-o fa-lg"></i>&nbsp;&nbsp; تحميل WORD
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="<?php echo base_url('report/printed_entry/' . $entry_f . '/' . $entry_t . '/'); ?>" class='a_img'>
                                                        <i class="fa fa-print fa-lg"></i>&nbsp;&nbsp; طباعة
                                                    </a>
                                            </ul>
                                        </div>
<?php } else {
    
} ?>
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
                                    <td width="800" align="center" colspan="4"><a href="<?php echo base_url('report/printed_one/' . $value_journal->id); ?>"><b>رقم القيد : <?php echo $value_journal->id; ?></b></a></td>

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
                                    <td colspan="5"><hr  class="hr_part" /></td>
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