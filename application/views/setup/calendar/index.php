<?php
if ($this->session->userdata('userCC') != TRUE) {
    redirect(base_url('login/index'));
}
if(!in_array('calendar',$this->data_header['user'])){
		redirect(base_url('cpanel/index'));
		}
		
?>
<!-- --------------------------------------------------------------------------- -->

	
      <div class="container text-center">
            <div class="box row col-md-8 col-md-push-2 col-xs-12 col-xs-push-1"><!-- /.row -->
<?php               
 echo viewData_add(
					  /*$total*/$total_rows,
					  /*$limit*/$limit,
					  /*$controller*/'calendar',
					  /*$method_view*/'index',
					  /*method_search*/null,	
					  /*$method_add*/'add',
					  /*btn_add*/'<i class="fa fa-user-plus"></i>&nbsp;'.$this->lang->line('add')
					); 
if ($calendar) { 

?>
<div id="result">
<?php
 echo viewData_table(
					  $th = array(
					  $this->lang->line('no'),
 					  $this->lang->line('year1'),
 					  $this->lang->line('semester1'),
 					  ''
					  ),

					 $calendar,
					 $td=array('idCalendar','year','semester'),
					 $text = null,
					 $pic  = null,
					 $offset=$start,
	 				 $controller = 'calendar',
 					 $button = array('edit-'.$this->lang->line('edit')),
					 $pages,
					 null	  
 			 ); 
			?>
	</div>
	<div id="display" style="display:none;">
	
	</div>
		
		</div>
	</div>
<?php } ?>


<!-- End file --------------------------------------------------------------------------------- -->
