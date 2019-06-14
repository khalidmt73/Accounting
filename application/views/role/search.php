<?php
if ($this->session->userdata('userCC') != TRUE) {
    redirect(base_url('login/index'));
}
if(!in_array('studint',$this->data_header['user'])){
		redirect(base_url('cpanel/index'));
		}	
?>
<!-- --------------------------------------------------------------------------- -->

    <?php if ($user) { ?>
     
<?php               
 
 echo viewData_table(
					  $th = array(
					  $this->lang->line('no'),
 					  $this->lang->line('userName'),
					  $this->lang->line('name'),
 					  '',
					  '<input type="checkbox" id="checkAll" />'
					  ),

					 $user,
					 $td=array('id','userUser','userName'),
					 $text = null,
					 $pic  = null,
					 $offset=$offset,
	 				 $controller = 'user',
 					 $button = array('edit-'.$this->lang->line('edit'),'delet-'.$this->lang->line('delet')),
					 ''
 			 ); 
			?>
	
		
<?php } ?>

<!-- End file --------------------------------------------------------------------------------- -->
