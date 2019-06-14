<?php
if ($this->session->userdata('userCC') != TRUE) {
    redirect(base_url('login/index'));
}
if(!in_array('trainer',$this->data_header['user'])){
		redirect(base_url('cpanel/index'));
		}	
?>
<!-- --------------------------------------------------------------------------- -->

    <?php if ($trainer) { ?>
     
<?php               
 
 echo viewData_table(
					  $th = array(
					  $this->lang->line('no'),
					  $this->lang->line('name'),
 					  $this->lang->line('idCard'),
 					  $this->lang->line('mobile'),
 					  $this->lang->line('email'),
 					  '',
					  '<input type="checkbox" id="checkAll" />'
					  ),

					 $trainer,
					 $td=array('idTrainer','nameTrainer','idCardTrainer','mobileTrainer','emailTrainer'),
					 $text = null,
					 $pic  = null,
					 $offset=$offset,
	 				 $controller = 'trainer',
 					 $button = array('edit-'.$this->lang->line('edit'),'delet-'.$this->lang->line('delet')),
					 ''
 			 ); 
			?>
	
		
<?php } ?>

<!-- End file --------------------------------------------------------------------------------- -->
