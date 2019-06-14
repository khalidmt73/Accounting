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
                                                <a href="<?php echo base_url('report/trialBalance_printed/' . $fromdate . '/' . $todate . '/'); ?>" class='a_img'>
                                                    <i class="fa fa-print fa-lg"></i>&nbsp;&nbsp; طباعة
                                                </a>
                                        </ul>
                                    </div>

                                </td>
                        </table>

                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">

                        <table class="table table-bordered table-striped table-hover" width="700" >

                            <tr>
                                <td width="229" rowspan="2" align="right" valign="middle"><strong>الحساب</strong></td>
                                <td colspan="2" align="center" valign="middle"><strong>رصيد إفتتاحي</strong></td>
                                <td colspan="2" align="center" valign="middle"><strong>الحركات خلال الفترة</strong></td>
                                <td colspan="2" align="center" valign="middle"><strong>الرصيد الختامي<br>
                                        جمع قيمة الرصيد الافتتاحي والحركات خلال الفترة
                                    </strong></td>
                            </tr>
                            <tr>
                                <td width="72" align="center" valign="middle"><strong>مدين</strong></td>
                                <td width="66" align="center" valign="middle"><strong>دائن</strong></td>
                                <td width="71" align="center" valign="middle"><strong>مدين</strong></td>
                                <td width="80" align="center" valign="middle"><strong>دائن</strong></td>
                                <td width="68" align="center" valign="middle"><strong>مدين</strong></td>
                                <td width="70" align="center" valign="middle"><strong>دائن</strong></td>
                            </tr>
                            <?php
                            $Total_Madin = 0;
                            $Total_Daien = 0;
                            $Total = 0;
                            $Total2 = 0;
                            $Total3 = 0;
                            $Total4 = 0;
                            $Total5 = 0;
                            $Total6 = 0;
                            foreach ($tree_account as $value_accountnot) {
                                ?>
                                <tr>
                                    <td align="right" valign="top"><?php echo $value_accountnot->title; ?></td>
                                    <td align="center" valign="middle">
                                        <?php
                                        // إذا كان نوع الحساب أصول أو مصروفات
                                        if (($value_accountnot->type_id == 1) || ($value_accountnot->type_id == 4)) {
                                            echo $value_accountnot->thevalue;
                                            $Total_Madin += doubleval($value_accountnot->thevalue);
                                            $Total += doubleval($value_accountnot->thevalue);
                                        } else {
                                            echo "0";
                                        }
                                        ?>
                                    </td>
                                    <td align="center" valign="middle">
                                        <?php
                                        // إذا كان نوع الحساب خصوم أو إيرادات أو حقوق ملكية
                                        if (($value_accountnot->type_id == 2) || ($value_accountnot->type_id == 3) || ($value_accountnot->type_id == 5)) {
                                            echo $value_accountnot->thevalue . '';
                                            $Total_Daien += doubleval($value_accountnot->thevalue);
                                            $Total2 += doubleval($value_accountnot->thevalue);
                                        } else {
                                            echo "0";
                                        }
                                        ?>
                                    </td>
                                    <td align="center" valign="middle">
                                        <?php
                                        $CurrentValue = 0;
                                        // إجمالي قيمة الحركات فقط ولا نجمعها على الرصيد الافتتاحي الا عند عرض الرصيد الختامي

                                        foreach ($journal_details as $value_journal_details) {
                                            if ($value_journal_details->accountno == $value_accountnot->accountno) {


                                                if ($value_journal_details->fromaccount > 0) {
                                                    // إذا كان هناك قيد مدين فسوف يزيد رصيد الحساب
                                                    $CurrentValue += $value_journal_details->fromaccount;
                                                } else {
                                                    // وإلا فسوف ينقص رصيد الحساب
                                                    //$CurrentValue -=  $value_journal_details->toaccount;
                                                }
                                            }
                                        }
                                        echo $CurrentValue;
                                        $Total_Madin += doubleval($CurrentValue);
                                        $Total3 += doubleval($CurrentValue);
                                        ?>
                                    </td>
                                    <td align="center" valign="middle">
                                        <?php
                                        $CurrentValue = 0;
                                        // إجمالي قيمة الحركات فقط ولا نجمعها على الرصيد الافتتاحي الا عند عرض الرصيد الختامي

                                        foreach ($journal_details as $value_journal_details) {
                                            if ($value_journal_details->accountno == $value_accountnot->accountno) {
                                                if ($value_journal_details->fromaccount > 0) {
                                                    // إذا كان هناك قيد مدين فسوف يزيد رصيد الحساب
                                                    //$CurrentValue += $row_JournalDetails['fromaccount'];
                                                } else {
                                                    // وإلا فسوف ينقص رصيد الحساب
                                                    $CurrentValue += $value_journal_details->toaccount;
                                                }
                                            }
                                        }
                                        echo $CurrentValue;
                                        $Total_Daien += doubleval($CurrentValue);
                                        $Total4 += doubleval($CurrentValue);
                                        ?>
                                    </td>
                                    <td align="center" valign="middle">
                                        <?php
                                        $TotalResult = $Total_Madin - $Total_Daien;

                                        if ($Total_Daien < $Total_Madin) {
                                            echo number_format($TotalResult,2);
                                            $Total5 += $TotalResult;
                                        } else
                                            echo "0";
                                        ?>
                                    </td>
                                    <td align="center" valign="middle">
                                        <?php
                                        if ($Total_Daien > $Total_Madin) {
                                            echo number_format(ABS($TotalResult),2);
                                            $Total6 += ABS($TotalResult);
                                        } else
                                            echo "0";
                                        ?>
                                    </td>
                                </tr>
                                        <?php
                                        $Total_Madin = 0;
                                        $Total_Daien = 0;
                                    }
                                    ?>
                            <tr>
                                <td align="right" valign="top">المجموع</td>
                                <td align="center" valign="middle"><?php echo $Total; ?></td>
                                <td align="center" valign="middle"><?php echo $Total2; ?></td>
                                <td align="center" valign="middle"><?php echo $Total3; ?></td>
                                <td align="center" valign="middle"><?php echo $Total4; ?></td>
                                <td align="center" valign="middle"><?php echo $Total5; ?></td>
                                <td align="center" valign="middle"><?php echo $Total6; ?></td>
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
