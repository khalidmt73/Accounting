<?php
if ($this->session->userdata('userCC') != TRUE) {
    redirect(base_url('login/index'));
}
if(!in_array('textbook',$this->data_header['user'])){
		redirect(base_url('cpanel/index'));
		}	
?>
<!-- --------------------------------------------------------------------------- -->

    <?php if ($division) { ?>
     
<?php               
 
 echo viewData_table(
					  $th = array(
					  $this->lang->line('no'),
					  $this->lang->line('textbook1'),
 					  $this->lang->line('division1'),
 					  $this->lang->line('code'),
 					  $this->lang->line('course1'),
 					  ''
					  ),

					 $division,
					 $td=array('idDivision','textbook','idDivision','code','course'),
					 $text = null,
					 $pic  = null,
					 $offset='',
	 				 $controller = 'division',
 					 $button = array('edit-'.$this->lang->line('edit')),
					 null,''
 			 ); 
			?>
	
		
<?php } ?>

<!-- End file --------------------------------------------------------------------------------- -->
