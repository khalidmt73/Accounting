<?php
if ($this->session->userdata('userCC') != TRUE) {
    redirect(base_url('login/index'));
}
if(!in_array('course',$this->data_header['user'])){
		redirect(base_url('cpanel/index'));
		}	
?>
<!-- --------------------------------------------------------------------------- -->

    <?php if ($course) { ?>
     
<?php               
 
 echo viewData_table(
					  $th = array(
					  $this->lang->line('no'),
					  $this->lang->line('course1'),
 					  $this->lang->line('target'),
 					  $this->lang->line('amount'),
 					  '',
					  '<input type="checkbox" id="checkAll" />'
					  ),

					 $course,
					 $td=array('idCourse','course','target','amount'),
					 $text = null,
					 $pic  = null,
					 $offset=$offset,
	 				 $controller = 'course',
 					 $button = array('edit-'.$this->lang->line('edit'),'delet-'.$this->lang->line('delet')),
					 ''
 			 ); 
			?>
	
		
<?php } ?>

<!-- End file --------------------------------------------------------------------------------- -->
