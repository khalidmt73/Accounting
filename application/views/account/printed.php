<?php
if ($this->session->userdata('userCC') != TRUE) {
    redirect(base_url('login/index'));
}
if(!in_array('account',$this->data_header['user'])){
		redirect(base_url('finance/index'));
		}	
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
<div class="container text-center">
    <table  class="table text-center" border="1" >
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
                if ($valueTitle->type_id == 1 || $valueTitle->type_id == 4)
				   if($valueTitle->thevalue > 0)
                    echo  number_format(ABS($valueTitle->thevalue),2);
                else echo  "";
				else echo "";
				?>
            </td>
            <td>
                <?php
                if ($valueTitle->type_id == 2 || $valueTitle->type_id == 3 || $valueTitle->type_id == 5)
				    if($valueTitle->thevalue > 0)
                     echo  number_format(ABS($valueTitle->thevalue),2);
                else
                    echo "";
                ?>
            </td>
            <td><?php if ($valueTitle->type_id == 1 || $valueTitle->type_id == 4)
					    if($valueTitle->thevalue > 0)
							echo  number_format(ABS($valueTitle->thevalue),2); 
						else echo "";
					if ($valueTitle->type_id == 2 || $valueTitle->type_id == 3 || $valueTitle->type_id == 5)
 				      if($valueTitle->thevalue > 0)
						echo  number_format(ABS($valueTitle->thevalue),2);	
					  else echo "";
					 else echo "";
				?>
			</td>
			 <td>-</td>
            <td class="text-right">رصيد إفتتاحي</td>
        </tr>
<?php
$FinalValue = $valueTitle->thevalue;
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
                            $FinalValue += $value_journal_details->fromaccount;
                        } else {
                            $FinalValue -= $value_journal_details->fromaccount;
                        }
                    }
                    if ($value_journal_details->toaccount > 0) {
                        if (($valueTitle->type_id == 2) || ($valueTitle->type_id == 3) || ($valueTitle->type_id == 5)) {
                            $FinalValue += $value_journal_details->toaccount;
                        } else {
                            $FinalValue -= $value_journal_details->toaccount;
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
            <td >&nbsp;</td>
            <td ></td>
            <td ><?php
				if(($valueTitle->type_id == 1) || ($valueTitle->type_id == 4))
				   if($valueTitle->thevalue > 0)
					 echo number_format(ABS($fromaccount+$valueTitle->thevalue),2);
				   else
					 echo number_format(ABS($fromaccount),2);  
				else echo "";
			?></td>
            <td ><?php 
				if(($valueTitle->type_id == 2) || ($valueTitle->type_id == 3) || ($valueTitle->type_id == 5)) echo number_format(ABS($toaccount+$valueTitle->thevalue),2);
				else echo number_format(ABS($toaccount),2);  

			?></td>
            <td ><?php echo number_format(ABS($FinalValue),2);  ?></td>
			  <td ></td>
            <td class="text-right">الرصيد الختامي</td>
        </tr>
    </table>
</div>
