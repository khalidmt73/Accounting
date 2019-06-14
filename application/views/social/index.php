<?php
if ($this->session->userdata('userCC') != TRUE) {
    redirect(base_url('login/index'));
}
if(!in_array('social',$this->data_header['user'])){
		redirect(base_url('cpanel/index'));
		}	
?>
<div class="navbar_links" >
		<?php echo $title ?>
</div>
<?php  foreach ($social as $key => $social_value) { ?>
<div class="container ">
	<div class="col-xs-12 col-md-12">
	<div class="row">
		<form class="form" action="<?php echo base_url('social/update/'.$social_value->id); ?>" method="post">
			<div class="row">
				<div class="form-group ">
					<a href="<?php echo $social_value->facebook ; ?>"  target="_blanck" class="soc">
						<div class="fa fa-facebook facebook"></div>
					</a>
					<input type="text" class=" input-sm" style="width:250px;" name="facebook" value="<?php echo $social_value->facebook; ?>">
				</div>
				<div class="form-group ">
					<a href="<?php echo $social_value->twitter ; ?>"  target="_blanck" class="soc">
						<div class="fa fa-twitter twitter"></div>
					</a>
					<input type="text" class=" input-sm"  style="width:250px;" name="twitter" value="<?php echo $social_value->twitter; ?>">
				</div>
				<div class="form-group ">
					<a href="<?php echo $social_value->youtube ; ?>"  target="_blanck" class="soc">
						<div class="fa fa-youtube youtube"></div>
					</a>
					<input type="text" class=" input-sm" style="width:250px;" name="youtube" value="<?php echo $social_value->youtube; ?>">
				</div>
				<div class="form-group ">
					<a href="<?php echo $social_value->instagram ; ?>"  target="_blanck" class="soc">
						<div class="fa fa-instagram" style="background:#6e4a2b;"></div>
					</a>
					<input type="text" class=" input-sm" style="width:250px;" name="instagram" value="<?php echo $social_value->instagram; ?>">
				</div>
			</div>
			<div class="row">
				<div class="col-md-6 col-md-push-3 col-xs-11 col-xs-push-1 ">
					<div class="form-group">
						<input class="btn btn-info" style="width:275px;height:30px;" type="submit" name="submit" value="تعديل">
					</div>
				</div>
			</div>
		</form>
	</div>
	</div>
</div>
<?php } ?>