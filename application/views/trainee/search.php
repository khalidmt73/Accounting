<?php
if ($this->session->userdata('userCC') != TRUE) {
    redirect(base_url('login/index'));
}
if(!in_array('trainee',$this->data_header['user'])){
		redirect(base_url('login/index'));
		}	
?>
<!-- --------------------------------------------------------------------------- -->

    <?php if ($trainee) { ?>
     
<?php               
 
 echo viewData_table(
					  $th = array(
					  $this->lang->line('no'),
 					  $this->lang->line('academicNo'),
 					  $this->lang->line('idCard'),
					  $this->lang->line('name'),
 					  $this->lang->line('course'),
 					  $this->lang->line('year'),
 					  $this->lang->line('semester'),
 					  $this->lang->line('mobile'),
 					  $this->lang->line('email'),
 					  ''
					  ),

					 $trainee,
					 $td=array('academicNo','academicNo','idCard','name','course','year','semester','mobile','email'),
					 $text = null,
					 $pic  = null,
					 $offset='',
	 				 $controller = 'trainee',
 					 $button     = array('pay-'.$this->lang->line('pay'),'copy-'.$this->lang->line('copy'),'edit-'.$this->lang->line('edit')),
 					 '',null

 			 ); 
			?>
	
		
<?php } ?>

<!-- End file --------------------------------------------------------------------------------- -->
