<?php
if ($this->session->userdata('userCC') != TRUE) {
    redirect(base_url('login/index'));
}
if(!in_array('trainee',$this->data_header['user'])){
		redirect(base_url('login/index'));
		}	
?>

<div class="row">
	<div class="col-xs-6 col-md-push-3">
<?php
foreach ($record as $value) {
  
$atrb=array('class'=>'form form-inline white-pink');
echo form_open(base_url('trainee/update/'.$value->academicNo),$atrb);
echo '
<h4> <i class="fa fa-pencil"></i>
      '.$this->lang->line("edit").' '.$this->lang->line("trainee1").'
</h4>';

$data = array(
               'name'        => 'fname',
               'id'          => 'fname',
               'value'       => $value->fname,
               'maxlength'   => '100',
               'style'       => 'width:50%;margin-bottom:10px',
               'class'       => 'form-control',
			   'required'    => 'required',
			   'placeholder' =>  $this->lang->line("fname")
             );
echo form_input($data);

$data = array(
               'name'        => 'frname',
               'id'          => 'frname',
               'value'       => $value->frname,
               'maxlength'   => '100',
               'style'       => 'width:50%;margin-bottom:10px',
               'class'       => 'form-control',
			   'required'    => 'required',
			   'placeholder' => $this->lang->line("frname")
             );
echo form_input($data);

$data = array(
               'name'        => 'gname',
               'id'          => 'gname',
               'value'       => $value->gname,
               'maxlength'   => '100',
               'style'       => 'width:50%;margin-bottom:10px',
               'class'       => 'form-control',
			   'required'    => 'required',
			   'placeholder' => $this->lang->line("gname")
             );
echo form_input($data);

$data = array(
               'name'        => 'family',
               'id'          => 'family',
               'value'       => $value->family,
               'maxlength'   => '100',
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
				echo '&nbsp;&nbsp;'.form_dropdown('nat',$drop,$value->nat,'class="form-control" style="width:30%;font-size:13px;margin-right:0px;"');

$sex = array(1=>'ذكر','أنثى');

				foreach($sex as $key1 => $val1){
				$drop1[$key1] = $val1;
				}
				echo '&nbsp;&nbsp;'.form_dropdown('sex',$drop1,$value->sex,'class="form-control" style="width:15%;font-size:13px;margin-left:15px;"');
?>
</div>
<?php
$data = array(
               'name'        => 'birthDay',
               'id'          => 'birthDay',
               'value'       => $value->birthDay,
               'maxlength'   => '10',
               'style'       => 'width:50%;margin-bottom:10px;',
               'class'       => 'form-control',
			   'required'    => 'required',
			   'placeholder' => $this->lang->line("birthDay") 
             );
echo form_input($data);

echo form_hidden('idCardOld',$value->id_card);

$data = array(
               'name'        => 'idCard',
               'id'          => 'idCard',
               'value'       => $value->id_card,
               'maxlength'   => '10',
               'style'       => 'width:50%;margin-bottom:10px;',
               'class'       => 'form-control',
			   'required'    => 'required',
			   'placeholder' => $this->lang->line("idCard"),
             );
echo form_input($data);
?>
<div style="margin-bottom:10px;">
<?php
$degree = array(1=>'دكتوراه','ماجستير','بكالوريوس','ثانوي','متوسط','إبتدائي');
				foreach($degree as $key2 => $val2){
				$drop2[$key2] = $val2;
				}
				echo '&nbsp;&nbsp;'.form_dropdown('degree',$drop2,$value->degree,'class="form-control" style="width:50%;font-size:13px;margin-left:12px;"');
?>
</div>
<?php
$data = array(
               'name'        => 'occupation',
               'id'          => 'occupation',
               'value'       => $value->occupation,
               'maxlength'   => '200',
               'style'       => 'width:50%;margin-bottom:10px;',
               'class'       => 'form-control',
			   'required'    => 'required',
			   'placeholder' => $this->lang->line("occupation") 
             );
echo form_input($data);

$data = array(
               'name'        => 'mobile',
               'id'          => 'mobile',
               'value'       => $value->mobile,
               'maxlength'   => '10',
               'style'       => 'width:50%;margin-bottom:10px;',
               'class'       => 'form-control',
			   'required'    => 'required',
			   'placeholder' => $this->lang->line("mobile"),
             );
echo form_input($data);

$data = array(
               'name'        => 'email',
               'id'          => 'email',
               'value'       => $value->email,
               'maxlength'   => '50',
               'style'       => 'width:50%;margin-bottom:10px;',
               'class'       => 'form-control',
			   'required'    => 'required',
			   'placeholder' => $this->lang->line("email"),
             );
echo form_input($data);
 
		foreach($linkCourse as $key => $val3){
		 $drop3[$val3->idLinkCourse] = $val3->course.' - '.$val3->series;
		
		 }
echo form_dropdown('idLinkCourse',$drop3,$value->id_linkCourse,'class="form-control" style="width:50%;margin-bottom:10px;"');

$data = array(
               'name'        => 'submit',
               'id'          => 'submit',
               'value'       => 'تعديل',
               'maxlength'   => '100',
               'size'        => '50',
               'class'       => 'btn btn-info',
               'style'       => 'width:50%',
             );

 echo form_submit($data);

$clos_div = ' </div></div>';
echo form_close($clos_div);


 } ?>


<!-- End file ------------------------------------------------------------------------ -->
