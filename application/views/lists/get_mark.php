<?php
if ($this->session->userdata('userCC') != TRUE) {
    redirect(base_url('login/index'));
}
if(!in_array('lists',$this->data_header['user'])){
		redirect(base_url('login/index'));
		}	
?>
<!-- --------------------------------------------------------------------------- -->
<div class="container text-center">
	 <div class="row">
		<div class="col-md-6">
			</div>
				<div class="col-md-2 text-left">
				<?php echo download(
					  $controller ='lists/',	
					  /*pdf   */'pdfMark/'.$division.'/'.$id_trainer.'/'.$year.'/'.$semester,
					  $this->lang->line('pdf'),
					  /*excel */'excelMark/'.$division.'/'.$id_trainer.'/'.$year.'/'.$semester,
					  $this->lang->line('excel'),
					  /*word  */'wordMark/'.$division.'/'.$id_trainer.'/'.$year.'/'.$semester,
					  $this->lang->line('word'),
					  /*print */'printedMark/'.$division.'/'.$id_trainer.'/'.$year.'/'.$semester,
					  $this->lang->line('print'),
					  $this->lang->line('download')
						);
			
?>
			</div>
		</div>
	</div>
<br />
<?php 
if ($trainee) { ?>
		<div class="container text-center">
			<div class="box row col-md-8  col-xs-12"><!-- /.row -->

<div id="result">
		<form method="post" action="<?php echo base_url($controller.'save_mark/'); ?> ">

		<table class="table table-striped table-hover table-bordered  text-center">
		<tr class="text-center">
			<th class="text-center"><?php echo $this->lang->line('no'); ?></th>
			<th class="text-center"><?php echo $this->lang->line('academicNo'); ?></th>
			<th class="text-center"><?php echo $this->lang->line('name'); ?></th>
			<th class="text-center"><?php echo $this->lang->line('mark1'); ?></th>
		</tr>
		<?php  $i=1;   foreach ($trainee as $value) {?>
		<tr>
			<td><?php echo $i++; ?></td>
			<td><?php echo $value->academicNo ;?></td>
			<td><?php echo $value->name ;?></td>
			<td>
			

			
			<?php $data = array(
               'name'        => 'mark['.$value->id.']',
               'id'          => '',
               'value'       =>  $value->mark,
               'maxlength'   => '3',
               'style'       => 'width:50px;height:28px;margin-bottom:5px;margin-right:80px;',
               'class'       => 'form-control text-center',
			   'placeholder' => $this->lang->line('mark1')
             );
			echo form_input($data); ?>
			<input type="hidden" name="id"    value="<?php echo $value->id; ?>">
			</td>
		</tr>
		<?php } ?>
		</table>

<?php $data = array(
               'name'        => 'submit',
               'id'          => 'submit',
               'value'       => 'حفظ',
               'maxlength'   => '100',
               'size'        => '50',
               'class'       => 'btn btn-info',
               'style'       => 'width:50%',
             );
 echo form_submit($data);?>
	
</div>
	<div id="display" style="display:none;">
	
	</div>
		
		</div>
	</div>
<?php }else{echo '';} ?>

<!-- End file --------------------------------------------------------------------------------- -->
