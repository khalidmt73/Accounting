<?php
if ($this->session->userdata('userCC') != TRUE) {
    redirect(base_url('login/index'));
}
if(!in_array('trainee',$this->data_header['user'])){
		redirect(base_url('login/index'));
		}	
?>
<center>

<div class="row">
	<div class="col-xs-6 col-md-push-3">
<?php
$atrb=array('class'=>'form form-inline white-pink','name'=>'add','id'=>'add');
echo form_open(base_url('trainee/create'),$atrb);
echo '
<h4> <i class="fa fa-plus-square"></i>
      '.$this->lang->line("add").' '.$this->lang->line("trainee1").'
</h4>';

$data = array(
               'name'        => 'fname',
               'id'          => 'fname',
               'value'       => '',
               'maxlength'   => '100',
               'size'        => '50',
               'style'       => 'width:50%;margin-bottom:10px',
               'class'       => 'form-control'.'" autofocus "',
			   'required'    => 'required',
			   'placeholder' =>  $this->lang->line("fname")
             );
echo form_input($data);

$data = array(
               'name'        => 'frname',
               'id'          => 'frname',
               'value'       => '',
               'maxlength'   => '100',
               'size'        => '50',
               'style'       => 'width:50%;margin-bottom:10px',
               'class'       => 'form-control',
			   'required'    => 'required',
			   'placeholder' => $this->lang->line("frname")
             );
echo form_input($data);

$data = array(
               'name'        => 'gname',
               'id'          => 'gname',
               'value'       => '',
               'maxlength'   => '100',
               'size'        => '50',
               'style'       => 'width:50%;margin-bottom:10px',
               'class'       => 'form-control',
			   'required'    => 'required',
			   'placeholder' => $this->lang->line("gname")
             );
echo form_input($data);

$data = array(
               'name'        => 'family',
               'id'          => 'family',
               'value'       => '',
               'maxlength'   => '100',
               'size'        => '50',
               'style'       => 'width:50%;margin-bottom:10px',
               'class'       => 'form-control',
			   'required'    => 'required',
			   'placeholder' => $this->lang->line("family")
             );
echo form_input($data);

?>
<div style="margin-bottom:10px;">
<?php
$nat = array(1=>'سعودي','مصري');
				foreach($nat as $key => $val){
				$drop[$key] = $val;
				}
				echo '&nbsp;&nbsp;'.form_dropdown('nat',$drop,$drop[1],'class="form-control" style="width:30%;font-size:13px;margin-right:0px;"');

$sex = array(1=>'ذكر','أنثى');

				foreach($sex as $key1 => $val1){
				$drop1[$key1] = $val1;
				}
				echo '&nbsp;&nbsp;'.form_dropdown('sex',$drop1,$drop1[1],'class="form-control" style="width:15%;font-size:13px;margin-left:15px;"');
?>
</div>
<?php
$data = array(
               'name'        => 'birthDay',
               'id'          => 'birthDay',
               'value'       => '',
               'maxlength'   => '10',
               'size'        => '50',
               'style'       => 'width:50%;margin-bottom:10px;',
               'class'       => 'form-control',
			   'required'    => 'required',
			   'placeholder' => $this->lang->line("birthDay") 
             );
echo form_input($data);
?>
<div class ="idCard" style="color:red;font-size:15px;"></div>
<div id    ="checkidCard" style="color:red;font-size:15px;"></div>
<?php
$data = array(
               'name'        => 'idCard',
               'id'          => 'idCard',
               'value'       => '',
               'maxlength'   => '10',
               'size'        => '50',
               'style'       => 'width:50%;margin-bottom:10px;',
               'class'       => 'form-control',
			   'onsubmit'    => 'return validateForm()',
			   'required'    => 'required',
			   'placeholder' => $this->lang->line("idCard")
             );
echo form_input($data);
?>
<div style="margin-bottom:10px;">
<?php
$degree = array(1=>'دكتوراه','ماجستير','بكالوريوس','ثانوي','متوسط','إبتدائي');
				foreach($degree as $key2 => $val2){
				$drop2[$key2] = $val2;
				}
				echo '&nbsp;&nbsp;'.form_dropdown('degree',$drop2,'3','class="form-control" style="width:50%;font-size:13px;margin-left:12px;"');
?>
</div>
<?php
$data = array(
               'name'        => 'occupation',
               'id'          => 'occupation',
               'value'       => '',
               'maxlength'   => '300',
               'style'       => 'width:50%;margin-bottom:10px;',
               'class'       => 'form-control',
			   'required'    => 'required',
			   'placeholder' => $this->lang->line("occupation") 
             );
echo form_input($data);
?><div class="mobile" style="color:red;font-size:15px;"></div><?php
$data = array(
               'name'        => 'mobile',
               'id'          => 'mobile',
               'value'       => '',
               'maxlength'   => '10',
               'style'       => 'width:50%;margin-bottom:10px;',
               'class'       => 'form-control',
			   'required'    => 'required',
			   'placeholder' => 'رقم الجوال'
             );
echo form_input($data);

$data = array(
               'name'        => 'email',
               'id'          => 'email',
               'value'       => '',
               'maxlength'   => '50',
               'style'       => 'width:50%;margin-bottom:10px;',
               'class'       => 'form-control',
			   'required'    => 'required',
			   'placeholder' => $this->lang->line("email")
             );
echo form_input($data);

?><div class="course" style="color:red;font-size:15px;"></div><?php
$drop3['0'] =$this->lang->line("course1");
		foreach($linkCourse as $val3){
		 $drop3[$val3->idLinkCourse]= $val3->course.' - '.$val3->series;
		 }
echo form_dropdown('idLinkCourse',$drop3,'0','class="form-control" id= "idLinkCourse"  style="width:50%;margin-bottom:10px;"');

$data = array(
               'name'        => 'submit',
               'id'          => 'submit',
               'value'       => 'حفظ',
               'maxlength'   => '100',
               'size'        => '50',
               'class'       => 'btn btn-info',
               'style'       => 'width:50%;',
             );

 echo form_submit($data);

echo form_close();

?>
</div>
</div>
</div>


<?php if (isset($oneRecord)) { ?>
 <div class="container text-center">
            <div class="box row col-md-10 col-md-push-1 col-xs-12 col-xs-push-1"><!-- /.row -->
	<?php
			echo viewData_one(
					  $th = array(
					  $this->lang->line('no'),
					  $this->lang->line('name'),
 					  $this->lang->line('idCard'),
 					  $this->lang->line('mobile'),
 					  $this->lang->line('email'),
 					  ''
					  ),

					 $oneRecord,
					 $td=array('idCard','name','id_card','mobile','email'),
 					 $text = null,
					 $pic  = null,
	 				 $controller = 'trainee',
 					 $button = array('edit-'.$this->lang->line('edit'))
 			 ); 
            ?>
            </div>
        </div>
</center>

<?php } ?>
<!-- End file --------------------------------------------------------------------------- -->


