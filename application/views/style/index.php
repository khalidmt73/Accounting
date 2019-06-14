<?php
if ($this->session->userdata('userCC') != TRUE) {
    redirect(base_url('login/index'));
}
if(!in_array('setting',$this->data_header['user'])){
		redirect(base_url('cpanel/index'));
		}	
?>
<div class="container ">
	<div class="row">
		<form class="form" action="<?php echo base_url('setting/update/1'); ?>" method="post">
			
				<div class="head_font text-right">حدد واجهة الموقع : </div>
				<hr />
				<div class="row">
					<div class="col-md-6 col-xs-12  text-center ">
						<input type="radio" name="style" value="style1" <?php if($style =='style1') echo 'checked'; ?>>  style 1 <br /><br />
						<img class="img-thumbnail" src=<?php echo base_url("public/img/style1.png");?> width="300" height="200" >
						
						
					</div>
					
					<div class="col-md-6 col-xs-12  text-center ">
						<input type="radio" name="style" value="style2" <?php if($style =='style2') echo 'checked'; ?>>  style 2 <br /><br />
						<img class="img-thumbnail" src=<?php echo base_url("public/img/style2.png");?> width="300" height="200" >
										
						
					</div>
				</div><br /><br /><br />
			<div class="row">
				<div class="col-md-12  text-center ">
					<div class="form-group">
						<input class="btn btn-info" style="width:275px;height:30px;" type="submit" name="submit" value="حفظ">
					</div>
				</div>
			</div>
		</form>
	</div>
	</div>
