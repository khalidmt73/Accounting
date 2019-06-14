<?php
if ($this->session->userdata('userCC') != TRUE) {
    redirect(base_url('login/index'));
}
if(!in_array('report',$this->data_header['user'])){
		redirect(base_url('finance/index'));
		}	
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
                                        <?php echo $title . '<font:color=black>&nbsp; - &nbsp;'; ?>
                                        من تاريخ  &nbsp;&nbsp;<?php echo $fromdate; ?>&nbsp; ألى تاريخ  <?php echo $todate; ?>
                                        &nbsp;&nbsp;&nbsp;<?php echo $this->lang->line('recordes') . '<span class="badge">' . $total_rows . '</span></font>'; ?>
                                    </h3>
                                </td>
                                <td class="text-left" >
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown" style="width:120px;height:29px;">
                                            تحميل
                                            <span class="caret"></span>
                                        </button>
                                        <ul class="dropdown-menu " role="menu">
                                            <li>		
                                                <a href="<?php echo base_url('report/pdf/' . $fromdate . '/' . $todate . '/'); ?>"class='a_img'>
                                                    <i class="fa fa-file-pdf-o fa-lg"></i>&nbsp;&nbsp; تحميل PDF
                                                </a>
                                            </li>
                                            <li>
                                                <a href="<?php echo base_url('report/excel/' . $fromdate . '/' . $todate . '/'); ?>" class='a_img'>
                                                    <i class="fa fa-file-excel-o fa-lg"></i>&nbsp;&nbsp; تحميل EXCEL
                                                </a>
                                            </li>
                                            <li>
                                                <a href="<?php echo base_url('report/word/' . $fromdate . '/' . $todate . '/'); ?>" class='a_img'>
                                                    <i class="fa fa-file-word-o fa-lg"></i>&nbsp;&nbsp; تحميل WORD
                                                </a>
                                            </li>
                                            <li>
                                                <a href="<?php echo base_url('report/printed/' . $fromdate . '/' . $todate . '/'); ?>" class='a_img'>
                                                    <i class="fa fa-print fa-lg"></i>&nbsp;&nbsp; طباعة
                                                </a>
                                        </ul>
                                    </div>

                                </td>
                        </table>

                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <table class="table table-bordered table-striped table-hover" align="center">

                            <tr>
                                <td colspan="2" ><strong>حساب الأرباح والخسائر<br>
                                        <br>
                                    </strong>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <table  align="center">

                                        <?php
                                        $TotalValue1 = 0;
                                        $TotalValue2 = 0;
                                        foreach ($type3 as $value_type3) {
                                            ?>
                                            <td width="378" align="right" valign="top"><?php echo $value_type3->title; ?></td>
                                            <td width="108" align="left" valign="top">
                                                <?php
                                                $CurrentValue = 0;
                                                // قيمة الأصل في الوقت الحالي وهي عبارة عن الرصيد الافتتاحي مع تاثيرات حركات الايداع والسحب عليه
                                                foreach ($journal_details as $value_journal_details) {
                                                    if ($value_journal_details->accountno == $value_type3->accountno) {
                                                        // الايرادات دائنة على كافة الاحوال
                                                        $CurrentValue += $value_journal_details->toaccount;
                                                    }
                                                }
                                                echo $CurrentValue;
                                                $TotalValue1 += $CurrentValue;
                                                ?>
                                            </td>
                                </tr>
                                <?php
                            }
                            ?>

                            <tr>
                                <td align="right" valign="top"><strong>مجموع الإيرادات</strong></td>
                                <td align="left" valign="top"><strong><?php echo $TotalValue1; ?></strong></td>
                            </tr>
                        </table>
                        </td>
                        <td>
                            <table align="center">
                                <?php
                                $TotalValue1 = 0;
                                $TotalValue2 = 0;
                                foreach ($type4 as $value_type4) {
                                    ?>
                                    <tr>
                                        <td width="378" align="right" valign="top"><?php echo $value_type4->title; ?></td>
                                        <td width="108" align="left" valign="top">
                                            <?php
                                            $CurrentValue = 0;
                                            // قيمة الأصل في الوقت الحالي وهي عبارة عن الرصيد الافتتاحي مع تاثيرات حركات الايداع والسحب عليه
                                            foreach ($journal_details as $value_journal_details) {
                                                if ($value_journal_details->accountno == $value_type4->accountno) {
                                                    // الايرادات دائنة على كافة الاحوال
                                                    $CurrentValue += $value_journal_details->fromaccount;
                                                }
                                            }
                                            echo $CurrentValue;
                                            $TotalValue2 += $CurrentValue;
                                            ?>
                                        </td>
                                    </tr>
                                    <?php
                                }
                                ?>

                                <tr>
                                    <td align="right" valign="top"><strong>مجموع المصروفات</strong></td>
                                    <td align="left" valign="top"><strong><?php echo $TotalValue2; ?></strong></td>
                                </tr>
                            </table>
                        </td>

                        </tr>
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