<?php
if ($this->session->userdata('userCC') != TRUE) {
    redirect(base_url('login/index'));
}
if(!in_array('user',$this->data_header['user'])){
		redirect(base_url('cpanel/index'));
		}	
?>

<!-- --------------------------------------------------------------------------- -->
    <?php if ($user) { ?>
        <div class="container text-center">
            <div class="box row col-md-10 col-md-push-1 col-xs-12 col-xs-push-1"><!-- /.row -->
<?php               
 echo viewData_add(
					  /*$total*/$total_rows,
					  /*$limit*/$limit,
					  /*$controller*/'user',
					  /*method_view*/'index',
					  /*method_search*/'search',	
				 	  /*method_add*/'add',
					  /*btn_add*/'<i class="fa fa-user-plus"></i>&nbsp;'.$this->lang->line('add')
					); 
?>	
<div id="result">
<?php
 echo viewData_table(
					  $th = array(
					  $this->lang->line('no'),
 					  $this->lang->line('userName'),
					  $this->lang->line('name'),
					  $this->lang->line('dep'),
					  '',
					  '<input type="checkbox" id="checkAll" />'
					  ),

					 $user,
					 $td         = array('id','userUser','userName','dep'),
					 $text       = null,
					 $pic        = null,	
					 $offset     = $start,
	 				 $controller = 'user',
 					 $button     = array('edit-'.$this->lang->line('edit'),'delet-'.$this->lang->line('delet')),
					 $pages
	
				 ); 
			?>
</div>
<div id="display" style="display:none;">

             </div>
        </div>

</div>
<?php } 
 
?>

<!-- End file ---------------------------------------------------------------------------- -->
