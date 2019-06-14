<?php
if ($this->session->userdata('userCC') != TRUE) {
    redirect(base_url('login/index'));
}
?>
<!-- --------------------------------------------------------------------------- -->

    <?php if ($mail_box) { ?>
     
<?php               
 
 echo viewData_table(
					  $th = array(
					  $this->lang->line('no'),
					  $this->lang->line('messenger'),
					  $this->lang->line('email'),
 					  $this->lang->line('mobile'),
 					  $this->lang->line('subject'),
 					  $this->lang->line('text'),
 					  $this->lang->line('date'),
 					  $this->lang->line('time'),
 					  '',
					  '<input type="checkbox" id="checkAll" />'
					  ),

					 $mail_box,
					 $td=array('id','messenger','email','mobile','subject','text','date','time'),
					 $text = null,
					 $pic  = null,
					 $offset=$offset,
	 				 $controller = 'mail_box',
 					 $button = array('edit-'.$this->lang->line('edit'),'delet-'.$this->lang->line('delet')),
					 ''
 			 ); 
			?>
	
		
<?php } ?>

<!-- End file --------------------------------------------------------------------------------- -->
