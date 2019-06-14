<?php
if ($this->session->userdata('userCC') != TRUE) {
    redirect(base_url('login/index'));
}
if(!in_array('income',$this->data_header['user'])){
		redirect(base_url('finance/index'));
		}	
?>
<!-- ----------------------------------------------------------------------------- -->
<div id="result2" >
        <div class="container text-center">
            <div class="row"><!-- /.row -->
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading pl_heding">
                            <table class="table pl_table table-striped">
                                <tr>
                                    <td class="text-left" >
                                        <select class="form-control" id="val" name="limit" style="width:80px;height:30px;"		onchange="location = '<?php echo
    base_url('income/result/id/ASC/' . $fromdate . '/' . $todate . '/cl');
        ?>/' + this.value + '/'" >
                                            <option value="5" <?php if ($limit == 5) echo "selected"; ?> >5</option>
                                            <option value="10" <?php if ($limit == 10) echo "selected"; ?>>10</option>
                                            <option value="20" <?php if ($limit == 20) echo "selected"; ?>>20</option>
                                            <option value="50" <?php if ($limit == 50) echo "selected"; ?>>50</option>
                                            <option value="100" <?php if ($limit == 100) echo "selected"; ?>>100</option>
                                        </select>
                                    </td>
                                    <td class="text-center"  >
                                        <h3 class="headline">
                                            <?php
                                            echo $title . '<font:color=black>&nbsp; - &nbsp;';
                                            echo $this->lang->line('fromdate') . '&nbsp;&nbsp;' . $fromdate . '&nbsp;&nbsp;';
                                            echo $this->lang->line('todate') . '&nbsp;&nbsp;' . $todate . '&nbsp;&nbsp;';
                                            echo $this->lang->line('num') . '&nbsp;' . $this->lang->line('recordes') . '&nbsp;<span class="badge">' . $total_rows . '</span></font>';
                                            ?>
                                        </h3>
                                    </td>
                                    <td class="text-left" >
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown" style="width:120px;height:29px;">
    <?php echo $this->lang->line('download'); ?>
                                                <span class="caret"></span>
                                            </button>
                                            <ul class="download_menu dropdown-menu" role="menu">
                                                <li>		
                                                    <a href="<?php echo
    base_url('income/pdf/' . $order . '/' . $sc . '/' . $fromdate . '/' . $todate . '/');
    ?>"class='a_img'>
                                                        <i class="fa fa-file-pdf-o fa-lg"></i>
    <?php echo $this->lang->line('download') . '&nbsp;' . $this->lang->line('pdf'); ?>

                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="<?php echo
    base_url('income/excel/' . $order . '/' . $sc . '/' . $fromdate . '/' . $todate . '/');
    ?>" class='a_img'>
                                                        <i class="fa fa-file-excel-o fa-lg"></i>
                                                       <?php echo $this->lang->line('download') . '&nbsp;' . $this->lang->line('excel'); ?>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="<?php echo
                                                   base_url('income/word/' . $order . '/' . $sc . '/' . $fromdate . '/' . $todate . '/');
                                                   ?>" class='a_img'>
                                                        <i class="fa fa-file-word-o fa-lg"></i>
                                                        <?php echo $this->lang->line('download') . '&nbsp;' . $this->lang->line('word'); ?>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="<?php echo
                                                        base_url('income/printed/' . $order . '/' . $sc . '/' . $fromdate . '/' . $todate . '/');
                                                        ?>" class='a_img'>
                                                        <i class="fa fa-print fa-lg"></i>
    <?php echo $this->lang->line('print'); ?>
                                                    </a>
                                            </ul>
                                        </div>
                                    </td>	
                                </tr>
                            </table>
                        </div><!-- /.panel-heading -->
                        <div class="panel-body">
                             <div class="text-center"> <?php echo $pages; ?></div>
                            <table class="table table-striped table-bordered table-hover">
                                <thead>
                                    <tr >
                                        <th class="text-center">
                                            <?php echo $this->lang->line('no') ?>
                                        </th>
                                        <th class="text-center" width="100px">
                                               <?php if ($sc == 'ASC') { ?>
                                                <a href="<?php echo
                                                   base_url('income/result/thedate/DESC/' . $fromdate . '/' . $todate . '/cl/' . $limit . '/');
                                                   ?>">
                                                    <i class="fa fa-sort"></i>
                                                </a>
    <?php } ?>
                                            <?php if ($sc == 'DESC') { ?>
                                                <a href="<?php echo
                                                base_url('income/result/thedate/ASC/' . $fromdate . '/' . $todate . '/cl/' . $limit . '/');
                                                ?>">
                                                    <i class="fa fa-sort"></i>
                                                </a>
                                            <?php } ?>
                                            <?php echo $this->lang->line('thedate') ?>
                                        </th>
                                        <th class="text-center">
    <?php if ($sc == 'ASC') { ?>
                                                <a href="<?php echo
        base_url('income/result/byName/DESC/' . $fromdate . '/' . $todate . '/cl/' . $limit . '/');
        ?>">
                                                    <i class="fa fa-sort"></i>
                                                </a>
                                            <?php } ?>
                                            <?php if ($sc == 'DESC') { ?>
                                                <a href="<?php echo
                                        base_url('income/result/byName/ASC/' . $fromdate . '/' . $todate . '/cl/' . $limit . '/');
                                        ?>">
                                                    <i class="fa fa-sort"></i>
                                                </a>
    <?php } ?>
    <?php echo $this->lang->line('byName') ?>
                                        </th>
                                        <th class="text-center">

    <?php if ($sc == 'ASC') { ?>
                                                <a href="<?php echo base_url('income/result/thevalue/DESC/' . $fromdate . '/' . $todate . '/cl/' . $limit . '/'); ?>">
                                                    <i class="fa fa-sort"></i>
                                                </a>
    <?php } ?>
                                            <?php if ($sc == 'DESC') { ?>
                                                <a href="<?php echo base_url('income/result/thevalue/ASC/' . $fromdate . '/' . $todate . '/cl/' . $limit . '/'); ?>">
                                                    <i class="fa fa-sort"></i>
                                                </a>
                                               <?php } ?>
                                               <?php echo $this->lang->line('thevalue') ?>

                                        </th>
                                        <th class="text-center">
                                            <?php echo $this->lang->line('depositor') ?>
                                        </th>
                                        <th class="text-center"><?php echo
                                        $this->lang->line('details')
                                        ?></th>
                                        <th class="text-center">
                                            <?php if ($sc == 'ASC') { ?>
                                                <a href="<?php echo
                                        base_url('income/result/id/DESC/' . $fromdate . '/' . $todate . '/cl/');
                                        ?>">
                                                    <i class="fa fa-sort"></i>
                                                </a>
                                            <?php } ?>
    <?php if ($sc == 'DESC') { ?>
                                                <a href="<?php echo
        base_url('income/result/id/ASC/' . $fromdate . '/' . $todate . '/cl/');
        ?>">
                                                    <i class="fa fa-sort"></i>
                                                </a>
                                    <?php } ?>
                                    <?php echo $this->lang->line('entry') ?>
                                        </th>
                                        <th class="text-center">
    <?php echo $this->lang->line('edit') ?>
                                        </th>
                                        <th class="text-center">
                                            <?php echo $this->lang->line('delet') ?>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
    <?php
    $offset = $start + 1;
    $FinalTotal = 0;
    $i = 1;
    foreach ($records as $records_value) {
        ?>
                                        <tr>
                                            <td><?php echo $offset++; ?></td>
                                            <td><?php echo $records_value->thedate; ?></td>
                                            <td><?php echo $records_value->byName; ?></td>
                                            <td>
        <?php
        echo $records_value->thevalue;
        $FinalTotal += doubleval($records_value->thevalue);
        ?>
                                            </td>
                                            <td><?php echo $records_value->depositor; ?></td>
                                            <td><?php echo $records_value->details; ?></td>
                                            <td><?php echo $records_value->journal_id; ?></td>
                                            <td>
                                                <a  href="<?php echo base_url('income/edit/' . $records_value->id) ?>" >
                                                    <font style='color:green'><i class="fa fa-pencil-square-o fa-lg"></i>
                                                    </font>				  
                                                </a>
                                            </td>
                                            <td>
                                                    <!--  <a href="<?php echo base_url('income/delet/' . $records_value->id) ?>" 
                                                    onclick="if (confirm('هل أنت متأكد من الحذف !') == false) {
                                                    return false;}">-->
                                                <font style='color:red'><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></font>
                                                </a>
                                            </td>
                                        </tr>
    <?php } ?>
                                    <tr>
                                        <td colspan="3">المجموع</td>
                                        <td colspan="1"><?php echo $FinalTotal; ?></td>
                                        <td colspan="5">&nbsp;</td>
                                    </tr>
                                </tbody>
                            </table>
                             <div class="text-center"> <?php echo $pages; ?></div>
                        </div><!-- /.panel-body -->
                    </div><!-- /.panel -->
                </div><!-- /.col-lg-12 -->
            </div>
        </div>
</div>

<!-- This part deals with some of the fields(byName and details) using jquery ------------------------------------- -->
<script>
    $(document).ready(function () {
        $('.pagination a').click(function () {
            var theUrl = $(this).attr('href');
            $('#result').load(theUrl);
        });
    });
</script>		

<!-- End file ----------------------------------------------------------------------------------------------------------- -->
