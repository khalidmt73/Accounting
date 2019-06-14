<?php
if ($this->session->userdata('userCC') != TRUE) {
    redirect(base_url('login/index'));
}
if(!in_array('dep',$this->data_header['user'])){
		redirect(base_url('cpanel/index'));
		}	

$atrb=array('class'=>'form form-inline white-pink');
echo form_open(base_url('dep/create'),$atrb);
echo '
<h4> <i class="fa fa-plus-square"></i>
      '.$this->lang->line("add").' '.$this->lang->line("dep").'
</h4>';

$atb   = array(
			   'class' => '',
               'style' => 'color: #000;',
			   );

$data = array(
               'name'        => 'dep',
               'id'          => 'dep',
               'value'       => '',
               'maxlength'   => '100',
               'size'        => '50',
               'style'       => 'width:50%;margin-bottom:10px',
               'class'       => 'form-control',
			   'placeholder' => $this->lang->line("dep1").'&nbsp;'.$this->lang->line("arbic")
             );
echo form_input($data);

$atb   = array(
			   'class' => '',
               'style' => 'color: #000;',
			   );

$data = array(
               'name'        => 'dep_en',
               'id'          => 'dep_en',
               'value'       => '',
               'maxlength'   => '100',
               'size'        => '50',
               'style'       => 'width:50%;margin-bottom:10px;',
               'class'       => 'form-control',
			   'placeholder' => $this->lang->line("dep1").'&nbsp;'.$this->lang->line("english")
             );
echo form_input($data);

$data = array(
               'name'        => 'submit',
               'id'          => 'submit',
               'value'       => 'حفظ',
               'maxlength'   => '100',
               'size'        => '50',
               'class'       => 'btn btn-info',
               'style'       => 'width:50%',
             );

 echo form_submit($data);

$clos_div = ' </div></div>';
echo form_close($clos_div);

?>



<?php if (isset($oneRecord)) { ?>
 <div class="container text-center">
            <div class="box row col-md-10 col-md-push-1 col-xs-12 col-xs-push-1"><!-- /.row -->
	<?php
			echo viewData_one(
					  $th = array(
					  $this->lang->line('no'),
					  $this->lang->line('dep1'),
 					  $this->lang->line('dep_en'),
 					  ''
					  ),

					 $oneRecord,
					 $td=array('id','dep','dep_en'),
 					 $text = null,
					 $pic  = null,
	 				 $controller = 'dep',
 					 $button = array('edit-'.$this->lang->line('edit'),'delet-'.$this->lang->line('delet'))
 			 ); 
            ?>
            </div>
        </div>
<?php } ?>
<!-- End file --------------------------------------------------------------------------- -->


