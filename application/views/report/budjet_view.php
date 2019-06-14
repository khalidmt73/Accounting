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
                                <td class="text-center"  valign="middel">
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
                        <table class="table table-bordered table-striped table-hover" width="700" >
                            <?php
// إختيار جميع الحسابات التي تنتمي إلى الأصول
                            ?>

                            <tr>
                                <td colspan="2" align="center" s><strong>لابد أن يتساوى الطرفين وتتم عملية التساوي بتسجيل قيم حقيقة للحسابات</strong></td>
                            </tr>
                            <tr>
                                <td align="center"><strong>الأصول</strong></td>
                                <td  align="center"><strong>الخصوم وحقوق الملكية</strong></td>
                            </tr>
                            <tr>
                                <td align="right" valign="top">

                                    <table width="290" border="0" align="center" cellpadding="2" cellspacing="2">
                                        <?php
                                        $TotalValue = 0;
                                        foreach ($type1 as $value_type1) {
                                            ?>
                                            <tr>
                                                <td width="184" align="right" valign="top">
                                                    <?php echo $value_type1->title; ?></td>
                                                <td width="92" align="left" valign="top">
                                                    <?php
                                                    $CurrentValue = $value_type1->thevalue;
                                                    // قيمة الأصل في الوقت الحالي وهي عبارة عن الرصيد الافتتاحي مع تاثيرات حركات الايداع والسحب عليه
                                                    foreach ($journal_details as $value_journal_details) {
														if($value_journal_details->accountno == $value_type1->accountno){
                                                        if ($value_journal_details->fromaccount > 0) {
                                                          // إذا كان هناك قيد مدين فسوف يزيد رصيد الحساب
                                                            $CurrentValue += $value_journal_details->fromaccount;
                                                        } else {
                                                            // وإلا فسوف ينقص رصيد الحساب
                                                            $CurrentValue -= $value_journal_details->toaccount;
                                                        }
														}
                                                    }
                                                    echo doubleval($CurrentValue);
                                                    $TotalValue += doubleval($CurrentValue);
                                                    ?>
                                                </td>
                                            </tr>

                                        <?php } ?>
                                        <tr>
                                            <td align="right" valign="top">&nbsp;</td>
                                            <td align="left" valign="top"><strong>
											<?php echo $TotalValue; ?></strong></td>
                                        </tr>
                                    </table>

                                </td>
                                <td align="right" valign="top">
                                    <table width="290" border="0" align="center" cellpadding="2" cellspacing="2">
                                        <?php
                                       
                                           $TotalValue2 = 0;
                                        foreach ($type2 as $value_type2) {
                                            ?>
                                            <tr>
                                                <td width="184" align="right" valign="top">
                                                    <?php echo $value_type2->title; ?></td>
                                                <td width="92" align="left" valign="top">
                                                    <?php
                                                    $CurrentValue2 = $value_type2->thevalue;
                                                    // قيمة الأصل في الوقت الحالي وهي عبارة عن الرصيد الافتتاحي مع تاثيرات حركات الايداع والسحب عليه
                                                    foreach ($journal_details as $value_journal_details) {
														if($value_journal_details->accountno == $value_type2->accountno){
                                                        if ($value_journal_details->fromaccount > 0) {
                                                          // إذا كان هناك قيد مدين فسوف يزيد رصيد الحساب
                                                            $CurrentValue2 -= $value_journal_details->fromaccount;
                                                        } else {
                                                            // وإلا فسوف ينقص رصيد الحساب
                                                            $CurrentValue2 += $value_journal_details->toaccount;
                                                        }
														}
                                                    }
                                                    echo doubleval($CurrentValue2);;
                                                    $TotalValue2 += doubleval($CurrentValue2);;
                                                    ?>
                                                </td>
                                            </tr>

                                        <?php } ?>
                                        <tr>
                                            <td align="right" valign="top">&nbsp;</td>
                                            <td align="left" valign="top"><strong>
											<?php echo $TotalValue2; ?></strong></td>
                                        </tr>
                                        <?php
                                        $CurrentValue3 = 0;
                                        foreach ($type3 as $value_type3) { ?>
                                            <tr>
                                                <td width="108" align="left" valign="top">
                                                    <?php 
			                                        $TotalValue3 = 0;
                                                    foreach ($journal_details as $value_journal_details) {
                                                        if ($value_journal_details->accountno == $value_type3->accountno) {
                                                            // الايرادات دائنة على كافة الاحوال
                                                            $CurrentValue3 += $value_journal_details->toaccount;
                                                        }
                                                    }
                                                    $TotalValue3 += $CurrentValue3;
                                                    ?>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                        <tr>
                                            <td align="right" valign="top"><strong>مجموع الإيرادات</strong></td>
                                            <td align="left" valign="top"><strong><?php echo $TotalValue3; ?></strong></td>
                                        </tr>
                                        <?php
                                        $CurrentValue4 = 0;
                                        foreach ($type4 as $value_type4) {
                                            ?>
                                            <tr>
                                                <td width="108" align="left" valign="top">
                                                    <?php
                                                   $TotalValue4 = 0;
                                                    // قيمة الأصل في الوقت الحالي وهي عبارة عن الرصيد الافتتاحي مع تاثيرات حركات الايداع والسحب عليه
                                                    foreach ($journal_details as $value_journal_details) {

                                                        if ($value_journal_details->accountno == $value_type4->accountno) {

                                                            // المصروفات مدينة على كافة الاحوال
                                                            $CurrentValue4 += $value_journal_details->fromaccount;
                                                        }
                                                    }
                                                   
                                                    $TotalValue4 += $CurrentValue4;
                                                    ?>
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                        ?>

                                        <tr>
                                            <td align="right" valign="top"><strong>مجموع المصروفات</strong></td>
                                            <td align="left" valign="top"><strong><?php echo $TotalValue4; ?></strong></td>
                                        </tr>
                                        <tr>
                                            <td align="right" valign="top"><strong>الاجمالي</strong></td>
                                            <td align="left" valign="top"><strong>
											<?php  
											echo $t =  $TotalValue2 +($TotalValue3 - $TotalValue4) ; ?></strong></td>
                                        </tr>
                                    </table></td>
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