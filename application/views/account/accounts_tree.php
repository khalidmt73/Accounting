<?php
if ($this->session->userdata('userCC') != TRUE) {
    redirect(base_url('login/index'));
}
if(!in_array('account',$this->data_header['user'])){
		redirect(base_url('finance/index'));
		}	

											
?>	<div class="container text-center">
    <table class="table table-striped table-hover" >
        <thead>
            <tr>
                <th class="text-right">اسم الحساب</th>
                <th class="text-center">قيمته الحالية</th>
                <th class="text-center">الحساب الرئيسي</th>
                <th class="text-center"></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($records as $value) { ?>
                <tr>
                    <td class="text-right">
                        <?php
                        if ($value->accountno > 99) {
                            echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
                        }
                        if ($value->accountno > 999) {
                            echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
                        }

                        if ($value->accountno < 99) {
                            echo '<font style="color:red"><b>';
                        }

                        if (($value->accountno > 99) and ( $value->accountno < 999)) {
                            echo '<b>';
                        }

                        echo '<a href="' . base_url('account/account_view/' . $value->accountno . '') . '">' . $value->accountno . ' - ' . $value->title . '</a>';

                        if (($value->accountno > 99) and ( $value->accountno > 999)) {
                            echo '</b>';
                        }
                        if ($value->accountno < 99) {
                            echo '</font></b>';
                        }
                        ?>
                    </td>
                    <td>
					<?php 
						// قيمة الأصل في الوقت الحالي وهي عبارة عن الرصيد الافتتاحي مع تاثيرات حركات الايداع والسحب عليه
						if($value->type_id == 1 ){
						$CurrentValue = $value->thevalue;
                        $TotalValue = 0;
						if($value->accountno == $value->parent_id){
						$where = 'parent_id = '.$value->parent_id;
						$sql = $this->model->sum('tree_account','thevalue',$where);
						echo $sql;
						}
						foreach ($journal_details as $value_journal_details) {
							
							if($value_journal_details->accountno == $value->accountno){
							if ($value_journal_details->fromaccount > 0) {
							  // إذا كان هناك قيد مدين فسوف يزيد رصيد الحساب
							 
								 $CurrentValue += $value_journal_details->fromaccount;
							
							} else {
								// وإلا فسوف ينقص رصيد الحساب
								$CurrentValue -= $value_journal_details->toaccount;
							}

							
							}
						}}
						if($value->type_id == 2 or  $value->type_id == 5){
						$CurrentValue = $value->thevalue;

						foreach ($journal_details as $value_journal_details) {
							
							if($value_journal_details->accountno == $value->accountno){
							if ($value_journal_details->fromaccount > 0) {
							  // إذا كان هناك قيد مدين فسوف يزيد رصيد الحساب
								 $CurrentValue -= $value_journal_details->fromaccount;
							} else {
								// وإلا فسوف ينقص رصيد الحساب
								$CurrentValue += $value_journal_details->toaccount;
							}
							}
						}}
						 echo doubleval($CurrentValue);
						?>
					</td>
                    <td>
                        <?php
                        switch ($value->type_id) {
                            case 1:
                                echo "الأصول";
                                break;
                            case 2:
                                echo "الالتزامات";
                                break;
                            case 3:
                                echo "الإيرادات";
                                break;
                            case 4:
                                echo "المصروفات";
                                break;
                            case 5:
                                echo "حقوق الملكية";
                                break;
                            default:
                                echo "";
                                break;
                        }
                        ?>
                    </td>
                    <td>
                        <a  href="<?php echo base_url('account/edit/' . $value->accountno) ?>" >
                            <font style='color:green'><font style='color:green'><i class="fa fa-pencil-square-o fa-lg"></i>
                            </font>	</font>			  
                        </a>
                    </td>
                    <td>
                            <!--  <a href="<?php echo base_url('income/delet/' . $value->accountno) ?>" 
                               onclick="if (confirm('هل أنت متأكد من الحذف !') == false) {
               return false;}">-->
                        <font style='color:red'><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></font>
                        </a>
                    </td>
                </tr>
    <?php }
?>
        </tbody>
    </table>

</div>
