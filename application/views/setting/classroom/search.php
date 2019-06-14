<?php
if ($this->session->userdata('userCC') != TRUE) {
    redirect(base_url('login/index'));
}
if(!in_array('classroom',$this->data_header['user'])){
		redirect(base_url('cpanel/index'));
		}	
?>
<!-- --------------------------------------------------------------------------- -->

    <?php if ($classroom) { ?>
     
<?php               
 
 echo viewData_table(
					  $th = array(
					  $this->lang->line('no'),
					  $this->lang->line('number'),
 					  $this->lang->line('location'),
 					  ''
					  ),

					 $classroom,
					 $td=array('idClassroom','number','location'),
					 $text = null,
					 $pic  = null,
					 $offset=$offset,
	 				 $controller = 'classroom',
 					 $button = array('edit-'.$this->lang->line('edit')),
					 '',null
 			 ); 
			?>
	
		
<?php } ?>

<!-- End file --------------------------------------------------------------------------------- -->
