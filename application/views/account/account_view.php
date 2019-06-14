<?php
if ($this->session->userdata('userCC') != TRUE) {
    redirect(base_url('login/index'));
}
if(!in_array('account',$this->data_header['user'])){
		redirect(base_url('finance/index'));
		}	
?>	
<td class="text-left" >
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown" style="width:120px;height:29px;">
    <?php echo $this->lang->line('download'); ?>
                                                <span class="caret"></span>
                                            </button>
                                            <ul class="download_menu dropdown-menu" role="menu">
                                                <li>		
                                                    <a href="<?php echo
    base_url('account/pdf/' . $id);
    ?>"class='a_img'>
                                                        <i class="fa fa-file-pdf-o fa-lg"></i>
    <?php echo $this->lang->line('download') . '&nbsp;' . $this->lang->line('pdf'); ?>

                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="<?php echo
    base_url('account/excel/' . $id );
    ?>" class='a_img'>
                                                        <i class="fa fa-file-excel-o fa-lg"></i>
                                                       <?php echo $this->lang->line('download') . '&nbsp;' . $this->lang->line('excel'); ?>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="<?php echo
                                                   base_url('account/word/' . $id );
                                                   ?>" class='a_img'>
                                                        <i class="fa fa-file-word-o fa-lg"></i>
                                                        <?php echo $this->lang->line('download') . '&nbsp;' . $this->lang->line('word'); ?>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="<?php echo
                                                        base_url('account/printed/' . $id );
                                                        ?>" class='a_img'>
                                                        <i class="fa fa-print fa-lg"></i>
    <?php echo $this->lang->line('print'); ?>
                                                    </a>
                                            </ul>
                                        </div>
                                    </td>	
<div class="container text-center">
    <table  class="table table-striped table-hover text-center" >
        <tr class="text-center">
            <td  align="center" colspan="7"><strong>
                    <?php foreach ($title_view as $valueTitle)
                        echo $valueTitle->title; ?>
            </td>
        </tr> 
        <tr>
            <th class="text-center">م</th>
            <th class="text-center">قيد</th>
            <th class="text-center">مدين</th>
            <th class="text-center">دائن</th>
            <th class="text-center">الرصيد</th>
            <th class="text-center">التاريخ</th>
            <th class="text-right">البيان</th>
        </tr>
        <tr>
            <td>-</td>
			<td>-</td>
            <td>
                <?php
                if ($valueTitle->type_id == 1)
                    echo number_format($valueTitle->thevalue);
                else
                    echo "";
                ?>
            </td>
            <td>
                <?php
                if ($valueTitle->type_id == 2 or $valueTitle->type_id == 5)
                    echo number_format($valueTitle->thevalue);
                else
                    echo "";
                ?>
            </td>
            <td><?php echo number_format($valueTitle->thevalue); ?></td>
            <td>-</td>
            <td class="text-right">رصيد إفتتاحي</td>
        </tr>
<?php
$FinalValue  = $valueTitle->thevalue;
$fromaccount = 0;
$toaccount   = 0;
$i = 1;
if ($journal_details){

foreach ($journal_details as $value_journal_details) {
    ?>
            <tr>
                <td><?php echo $i++; ?></td>
                <td><?php echo $value_journal_details->journal_id ?></td>
				<td><?php if ($value_journal_details->fromaccount == 0) echo ""; else echo   number_format($value_journal_details->fromaccount,2); ?></td>
                <td><?php if ($value_journal_details->toaccount == 0) echo ""; else echo   number_format($value_journal_details->toaccount,2); ?></td>
                <td>
                    <?php
					$fromaccount += $value_journal_details->fromaccount;
					$toaccount   += $value_journal_details->toaccount;

                    if ($value_journal_details->fromaccount > 0) {
                        if (($valueTitle->type_id == 1) || ($valueTitle->type_id == 4)) {
                            $FinalValue += ABS($value_journal_details->fromaccount);
                        } else {
                            $FinalValue -=ABS($value_journal_details->fromaccount);
                        }
                    }
                    if ($value_journal_details->toaccount > 0) {
                        if (($valueTitle->type_id == 2) || ($valueTitle->type_id == 3) || ($valueTitle->type_id == 5)) {
                            $FinalValue += ABS($value_journal_details->toaccount);
                        } else {
                            $FinalValue -=  ABS($value_journal_details->toaccount);
                        }

					}
                      echo number_format(ABS($FinalValue),2);
                    ?>
                </td>
                <td>
    <?php
    foreach ($journal as $value_journal) {
        if ($value_journal_details->journal_id == $value_journal->id)
            echo $value_journal->thedate;
    }
    ?>
                </td>
                <td class="text-right">
                    <?php
                    foreach ($journal as $value_journal) {
                        if ($value_journal_details->journal_id == $value_journal->id)
                            echo $value_journal->details;
                    }
                    ?>
                </td>
            </tr>
        <?php }
		} ?>
        <tr>
            <td >-</td>
            <td >-</td>
            <td ><?php echo number_format(ABS($fromaccount+$valueTitle->thevalue),2); ?></td>
            <td ><?php echo number_format(ABS($toaccount),2); ?></td>
            <td ><?php  echo number_format(ABS($FinalValue),2); ?></td>
            <td >-</td>
            <td class="text-right">الرصيد الختامي</td>
        </tr>
    </table>
</div>
