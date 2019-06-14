<?php
if ($this->session->userdata('userCC') != TRUE) {
    redirect(base_url('login/index'));
}
if(!in_array('staff',$this->data_header['user'])){
		redirect(base_url('cpanel/index'));
		}	

$atrb=array('class'=>'form form-inline white-pink');
echo form_open(base_url('staff/create'),$atrb);
echo '
<h4> <i class="fa fa-plus-square"></i>
      '.$this->lang->line("add").' '.$this->lang->line("staff").'
</h4>';

$data = array(
               'name'        => 'name',
               'id'          => 'name',
               'value'       => '',
               'maxlength'   => '100',
               'size'        => '50',
               'style'       => 'width:50%;margin-bottom:10px',
               'class'       => 'form-control',
			   'placeholder' => $this->lang->line("staff_name")
             );
echo form_input($data);

$data = array(
               'name'        => 'idCard',
               'id'          => 'idCard',
               'value'       => '',
               'maxlength'   => '100',
               'size'        => '50',
               'style'       => 'width:50%;margin-bottom:10px;',
               'class'       => 'form-control',
			   'placeholder' => $this->lang->line("idCard")
             );
echo form_input($data);

$data = array(
               'name'        => 'staffNo',
               'id'          => 'staffNo',
               'value'       => '',
               'maxlength'   => '100',
               'size'        => '50',
               'style'       => 'width:50%;margin-bottom:10px;',
               'class'       => 'form-control',
			   'placeholder' => $this->lang->line("staffNo")
             );
echo form_input($data);

$data = array(
               'name'        => 'mobile',
               'id'          => 'mobile',
               'value'       => '',
               'maxlength'   => '100',
               'size'        => '50',
               'style'       => 'width:50%;margin-bottom:10px;',
               'class'       => 'form-control',
			   'placeholder' => 'رقم الجوال'
             );
echo form_input($data);

$data = array(
               'name'        => 'email',
               'id'          => 'email',
               'value'       => '',
               'maxlength'   => '100',
               'size'        => '50',
               'style'       => 'width:50%;margin-bottom:10px;',
               'class'       => 'form-control',
			   'placeholder' => 'البريد الإلكتروني'
             );
echo form_input($data);
 
$drop['0'] ='حدد القسم';
			foreach($dep as $val){
			 $drop[$val->id] = $val->dep;
			 }
			echo form_dropdown('id_dep',$drop,'0','class="form-control" style="width:50%;margin-bottom:10px;"');

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


echo form_close();

?>



<?php if (isset($oneRecord)) { ?>
 <div class="container text-center">
            <div class="box row col-md-10 col-md-push-1 col-xs-12 col-xs-push-1"><!-- /.row -->
	<?php
			echo viewData_one(
					  $th = array(
					  $this->lang->line('no'),
					  $this->lang->line('name'),
 					  $this->lang->line('idCard'),
 					  $this->lang->line('staffNo'),
 					  $this->lang->line('mobile'),
 					  $this->lang->line('email'),
 					  $this->lang->line('dep'),
 					  ''
					  ),

					 $oneRecord,
					 $td=array('id','name','idCard','staffNo','mobile','email','id_dep'),
 					 $text = null,
					 $pic  = null,
	 				 $controller = 'staff',
 					 $button = array('edit-'.$this->lang->line('edit'),'delet-'.$this->lang->line('delet'))
 			 ); 
            ?>
            </div>
        </div>
<?php } ?>
<!-- End file --------------------------------------------------------------------------- -->


