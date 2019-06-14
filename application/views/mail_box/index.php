<?php
if ($this->session->userdata('userCC') != TRUE) {
    redirect(base_url('login/index'));
}
?>
<!-- --------------------------------------------------------------------------- -->
<div id="result2" >
    <?php if ($mail_box) { ?>
        <div class="container text-center">
            <div class="box row col-md-10 col-md-push-1 col-xs-12 col-xs-push-1"><!-- /.row -->
<?php               
 echo viewData_add(
					  /*$total*/$total_rows,
					  /*$limit*/$limit,
					  /*$controller*/'mail_box',
					  /*$method_view*/'index',
					  /*method_search*/'search',	
					  /*$method_add*/null,
					  /*btn_add*/'<i class="fa fa-user-plus"></i>&nbsp;'.$this->lang->line('add')
					); 
?>
<div id="result">
<?php
echo viewData_table(
					  $th = array(
					  $this->lang->line('no'),
					  $this->lang->line('messenger'),
					  $this->lang->line('email'),
 					  $this->lang->line('mobile'),
 					  $this->lang->line('date'),
 					  $this->lang->line('time'),
					  '',
					  '<input type="checkbox" id="checkAll" />'
					  ),

					 $mail_box,
					 $td = array('id','messenger','email','mobile','date','time'),
 					 $text = 'text|-100',
					 $pic  = null,	
					 $offset=$offset,
	 				 $controller = 'mail_box',
 					 $button = array('reply-'.$this->lang->line('reply'),'delet-'.$this->lang->line('delet')),
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
