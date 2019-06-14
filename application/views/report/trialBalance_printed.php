
<?php
if ($this->session->userdata('userCC') != TRUE) {
    redirect(base_url('login/index'));
}
if(!in_array('report',$this->data_header['user'])){
		redirect(base_url('finance/index'));
		}	
?>
<div id="result2" dir="rtl">
    <div class="container text-center">
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                </table>
						<table class="" border="0" align="center"  >
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
                   

                        <table class="" border="1"  cellpadding="1" cellspacing="0" width="90%">

                            <tr >
                                <td  rowspan="2" align="right" valign="middle"><strong>الحساب</strong></td>
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
											if ($value_accountnot->thevalue > 0){
                                            echo number_format(ABS($value_accountnot->thevalue),2);
                                            $Total_Madin += doubleval($value_accountnot->thevalue);
                                            $Total += doubleval($value_accountnot->thevalue);
                                        } else {
                                            echo "";
                                        }
										}else echo "";
                                        ?>
                                    </td>
                                    <td align="center" valign="middle">
                                        <?php
                                        // إذا كان نوع الحساب خصوم أو إيرادات أو حقوق ملكية
                                        if (($value_accountnot->type_id == 2) || ($value_accountnot->type_id == 3) || ($value_accountnot->type_id == 5)) {
  										  if ($value_accountnot->thevalue > 0){
											echo number_format(ABS($value_accountnot->thevalue . ''),2);
                                            $Total_Daien += doubleval($value_accountnot->thevalue);
                                            $Total2 += doubleval($value_accountnot->thevalue);
                                        } else {
                                            echo "";
                                        }
										}else echo "";
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
										if ($CurrentValue > 0){
                                        echo number_format(ABS($CurrentValue),2);
                                        $Total_Madin += doubleval($CurrentValue);
                                        $Total3 += doubleval($CurrentValue);
										}else echo "";
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
										if($CurrentValue > 0){
                                        echo number_format(ABS($CurrentValue),2);
                                        $Total_Daien += doubleval($CurrentValue);
                                        $Total4 += doubleval($CurrentValue);
										}else echo "";
                                        ?>
                                    </td>
                                    <td align="center" valign="middle">
                                        <?php
                                        $TotalResult = $Total_Madin - $Total_Daien;

                                        if ($Total_Daien < $Total_Madin) {
											echo number_format(ABS($TotalResult),2);
                                            $Total5 += $TotalResult;
                                        } else
                                            echo "";
                                        ?>
                                    </td>
                                    <td align="center" valign="middle">
                                        <?php
                                        if ($Total_Daien > $Total_Madin) {
                                            echo number_format(ABS($TotalResult),2);
                                            $Total6 += ABS($TotalResult);
                                        } else
                                            echo "";
										
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
                                <td align="center" valign="middle"><?php echo number_format(ABS($Total),2); ?></td>
                                <td align="center" valign="middle"><?php echo number_format(ABS($Total2),2); ?></td>
                                <td align="center" valign="middle"><?php echo number_format(ABS($Total3),2); ?></td>
                                <td align="center" valign="middle"><?php echo number_format(ABS($Total4),2); ?></td>
                                <td align="center" valign="middle"><?php echo number_format(ABS($Total5),2); ?></td>
                                <td align="center" valign="middle"><?php echo number_format(ABS($Total6),2); ?></td>
                            </tr>

                        </table>
                  
            <!-- /.col-lg-12 -->
        </div>
    </div>
</div>
