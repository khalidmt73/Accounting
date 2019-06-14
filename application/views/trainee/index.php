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
	
      <div class="container text-center">
            <div class="box row col-md-12  col-xs-12 "><!-- /.row -->
<?php
 echo viewData_add(
					  /*$total*/$total_rows,
					  /*$limit*/$limit,
					  /*$controller*/'trainee',
					  /*$method_view*/'index',
					  /*method_search*/'search',	
					  /*$method_add*/'add',
					  /*btn_add*/'<i class="fa fa-user-plus"></i>&nbsp;'.$this->lang->line('add')
					); 
?>
<div id="result">
<?php
 echo viewData_table(
					  $th = array(
					  $this->lang->line('no'),
  					  $this->lang->line('academicNo'),
					  $this->lang->line('name'),
 					  $this->lang->line('idCard'),
 					  $this->lang->line('mobile'),
 					  $this->lang->line('email'),
 					  $this->lang->line('course1'),
 					  $this->lang->line('series'),
 					  $this->lang->line('year'),
 					  $this->lang->line('semester'),
					  ''
					  ),

					 $trainee,
					 $td=array('academicNo','academicNo','name','idCard','mobile','email','course','series','year','semester'),
					 $text       = null,
					 $pic        = null,
					 $offset     = $start,
	 				 $controller = 'trainee',
 					 $button     = array('pay-'.$this->lang->line('pay'),'copy-'.$this->lang->line('copy'),'edit-'.$this->lang->line('edit')),
					 $pages,
					 null
 			 ); 
			?>
	</div>
	<div id="display" style="display:none;">
	
	</div>
		
		</div>
	</div>
<?php } ?>


<!-- End file ---------------------------------------------------------------- -->
