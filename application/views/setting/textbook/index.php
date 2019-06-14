<?php
if ($this->session->userdata('userCC') != TRUE) {
    redirect(base_url('login/index'));
}
if(!in_array('textbook',$this->data_header['user'])){
		redirect(base_url('cpanel/index'));
		}
		
?>
<!-- --------------------------------------------------------------------------- -->
<div class="container text-center">
	<div class="box row col-md-10 col-md-push-1 col-xs-12 col-xs-push-1"><!-- /.row -->
<?php               
 echo viewData_add(
					  /*$total*/$total_rows,
					  /*$limit*/$limit,
					  /*$controller*/'textbook',
					  /*$method_view*/'index',
					  /*method_search*/'search',	
					  /*$method_add*/'add',
					  /*btn_add*/'<i class="fa fa-user-plus"></i>&nbsp;'.$this->lang->line('add')
					); 
if ($textbook) { ?>
<div id="result">
<?php
 echo viewData_table(
					  $th = array(
					  $this->lang->line('no'),
 					  $this->lang->line('textbook1'),
 					  $this->lang->line('code'),
 					  $this->lang->line('course1'),
 					  ''
					  ),

					 $textbook,
					 $td=array('idTextbook','textbook','code','course'),
					 $text = null,
					 $pic  = null,
					 $offset=$start,
	 				 $controller = 'textbook',
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
