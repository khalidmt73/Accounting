<?php
if ($this->session->userdata('userCC') != TRUE) {
	    redirect(base_url('login/index'));
		}
		if(!in_array('petty_cash',$this->data_header['user'])){
		redirect(base_url('finance/index'));
		}
?>
<?php if ($records) { ?>
    <div class="container text-center">
        <div class="row"><!-- /.row -->
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading pl_heding">
                        <table class="table pl_table table-striped">
                            <tr>
                                <td class="text-left" >
                                    &nbsp;&nbsp;&nbsp;							
                                </td>
                                <td class="text-center"  >
                                    <h3 class="headline">
                                        <?php
                                        echo $title . '<font:color=black> - ';
                                        echo $this->lang->line('num') . '&nbsp;' . $this->lang->line('recordes') . '&nbsp;<span class="badge">' . $total_rows . '</span></font>';
                                        ?>
                                    </h3>
                                </td>
                                <td class="text-left" >
                                    &nbsp;&nbsp;&nbsp;										
                                </td>
                        </table>
                    </div><!-- /.panel-heading -->
                    <div class="panel-body">
                        <table class="table table-bordered table-striped table-hover">
                            <thead>
                                <tr >
                                    <th class="text-center"><?php echo $this->lang->line('no') ?></th>
                                    <th class="text-center"><?php echo $this->lang->line('thedate') ?></th>
                                    <th class="text-center"><?php echo $this->lang->line('beneficiary') ?></th>
                                    <th class="text-center"><?php echo $this->lang->line('thevalue') ?></th>
                                    <th class="text-center"><?php echo $this->lang->line('nocheck') ?></th>
                                    <th class="text-center"><?php echo $this->lang->line('details') ?></th>
                                    <th class="text-center"><?php echo $this->lang->line('entry') ?></th>
                                    <th class="text-center"><?php echo $this->lang->line('edit') ?></th>
                                    <th class="text-center"><?php echo $this->lang->line('delet') ?></th>
                                </tr>
                            </thead>
                            <tbody>
    <?php for ($i = 0; $i < count($records); $i++) { ?>
                                    <tr>
                                        <td><?php echo $i + 1; ?></td>
                                        <td><?php echo $records[$i]->thedate; ?></td>
                                        <td><?php echo $records[$i]->accountno; ?></td>
                                        <td><?php echo $records[$i]->thevalue; ?></td>
                                        <td><?php echo $records[$i]->nocheck; ?></td>
                                        <td><?php echo $records[$i]->details; ?></td>
                                        <td><?php echo $records[$i]->journal_id; ?></td>
                                        <td>
                                            <a  href="<?php echo base_url('petty_cash/edit/' . $records[$i]->id) ?>" >
                                                <font style='color:green'><i class="fa fa-pencil-square-o fa-lg"></i></font>		  
                                            </a>
                                        </td>
                                        <td>
                                            <a href="<?php echo base_url('petty_cash/delet/' . $records[$i]->id) ?>" 
                                               onclick="if (confirm('هل أنت متأكد من الحذف !') == false) {
                                                                                               return false;
                                                                                           }">
                                                <font style='color:red'>
                                                <i class="fa fa-trash-o fa-lg ">
                                                </i>
                                                </font>
                                            </a>
                                        </td>
                                    </tr> 
    <?php } ?>
                            </tbody>
                        </table>
                    </div><!-- /.panel-body -->
                </div><!-- /.panel -->
            </div><!-- /.col-lg-12 -->
        </div>
    </div>
<?php } ?>
<!-- End file ----------------------------------------------------------------------------------------------------------- -->
