<?php
if ($this->session->userdata('userCC') != TRUE) {
    redirect(base_url('login/index'));
}
if(!in_array('textbook',$this->data_header['user'])){
		redirect(base_url('cpanel/index'));
		}	
?>
<!-- --------------------------------------------------------------------------- -->

    <?php if ($textbook) { ?>
     
<?php               
 
 echo viewData_table(
					  $th = array(
					  $this->lang->line('no'),
					  $this->lang->line('textbook'),
 					  $this->lang->line('code'),
 					  $this->lang->line('course'),
 					  ''
					  ),

					 $textbook,
					 $td=array('idTextbook','textbook','code','course'),
					 $text = null,
					 $pic  = null,
					 $offset='',
	 				 $controller = 'textbook',
 					 $button = array('edit-'.$this->lang->line('edit')),
					 null,''
 			 ); 
			?>
	
		
<?php } ?>

<!-- End file --------------------------------------------------------------------------------- -->
