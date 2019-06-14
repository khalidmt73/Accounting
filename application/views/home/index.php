<?php
if ($this->session->userdata('userCC') != TRUE) {
    redirect(base_url('login/index'));
}
?>
<div class="box_dep">
<?php
if (count($site) > 1 ){
?>

<div class="row">
   <?php if(in_array('financeDep',$site)){?>
	<div class="new"><br/>
      <a href="<?php echo base_url('income/view') ?>" > <img  src="<?php echo  base_url('public/img/financeDep.jpg');?>" width="170" height="80" class="imgView"  />
        <div class="photo_font">
			<?php echo $this->lang->line('financeDep'); ?>
		  </a>
		  </div>
	</div>
	<?php }
	if(in_array('traineeDep',$site)){?>
	<div class="new"><br/>
       <a href="<?php echo base_url('trainee/index') ?>" ><img  src="<?php echo  base_url('public/img/traineeDep.jpg');?>" width="170" height="80" class="imgView"  />
        <div class="photo_font">
			<?php echo $this->lang->line('traineeDep'); ?>
		  </a>
		  </div>
	</div>
	<?php }
	if(in_array('managementDep',$site)){?>
	<div class="new"><br/>
       <a href="<?php echo base_url('staff/index') ?>" ><img  src="<?php echo  base_url('public/img/managementDep.jpg');?>" width="170" height="80" class="imgView"  />
        <div class="photo_font">
			<?php echo $this->lang->line('managementDep'); ?>
		</a>
		</div>
	</div>
	<?php }
	if(in_array('serviceDep',$site)){?>
	<div class="new"><br/>
       <a href="<?php echo base_url('serviceDep/index') ?>" ><img  src="<?php echo  base_url('public/img/serviceDep.png');?>" width="170" height="80" class="imgView"  />
        <div class="photo_font">
			<?php echo $this->lang->line('serviceDep'); ?>
		</a>
		</div>
	</div>
	<?php } ?>
	</div>
	<div class="row">
	<?php 
	if(in_array('planDep',$site)){?>
	<div class="new"><br/>
       <a href="<?php echo base_url('planDep/index') ?>" ><img  src="<?php echo  base_url('public/img/planDep.jpg');?>" width="170" height="80" class="imgView"  />
        <div class="photo_font">
			<?php echo $this->lang->line('planDep'); ?>
		</a>
		</div>
	</div>
	<?php } ?>
   <?php if(in_array('developmentDep',$site)){?>
	<div class="new"><br/>
      <a href="<?php echo base_url('developmentDep/index') ?>" > <img  src="<?php echo  base_url('public/img/developmentDep.jpg');?>" width="170" height="80" class="imgView"  />
        <div class="photo_font">
			<?php echo $this->lang->line('developmentDep'); ?>
		  </a>
		  </div>
	</div>
	<?php }
	if(in_array('researchDep',$site)){?>
	<div class="new"><br/>
       <a href="<?php echo base_url('researchDep/index') ?>" ><img  src="<?php echo  base_url('public/img/researchDep.jpg');?>" width="170" height="80" class="imgView"  />
        <div class="photo_font">
			<?php echo $this->lang->line('researchDep'); ?>
		  </a>
		  </div>
	</div>
	<?php }
	if(in_array('elearningDep',$site)){?>
	<div class="new"><br/>
       <a href="<?php echo base_url('elearningDep/index') ?>" ><img  src="<?php echo  base_url('public/img/elearningDep.png');?>" width="170" height="80" class="imgView"  />
        <div class="photo_font">
			<?php echo $this->lang->line('elearningDep'); ?>
		</a>
		</div>
	</div>
	<?php }?>
	</div>
	<div class="row">
	<?php
	if(in_array('trainerDep',$site)){?>
	<div class="new"><br/>
       <a href="<?php echo base_url('trainerDep/index') ?>" ><img  src="<?php echo  base_url('public/img/trainerDep.png');?>" width="170" height="80" class="imgView"  />
        <div class="photo_font">
			<?php echo $this->lang->line('trainerDep'); ?>
		</a>
		</div>
	</div>
	<?php } ?>
	<?php 
	if(in_array('itDep',$site)){?>
	<div class="new"><br/>
       <a href="<?php echo base_url('itDep/index') ?>" ><img  src="<?php echo  base_url('public/img/itDep.jpg');?>" width="170" height="80" class="imgView"  />
        <div class="photo_font">
			<?php echo $this->lang->line('itDep'); ?>
		</a>
		</div>
	</div>
	<?php } ?>

   <?php if(in_array('marketingDep',$site)){?>
	<div class="new"><br/>
      <a href="<?php echo base_url('marketingDep/index') ?>" > <img  src="<?php echo  base_url('public/img/marketingDep.png');?>" width="170" height="80" class="imgView"  />
        <div class="photo_font">
			<?php echo $this->lang->line('marketingDep'); ?>
		  </a>
		  </div>
	</div>
	<?php }
	if(in_array('qualityDep',$site)){?>
	<div class="new"><br/>
       <a href="<?php echo base_url('qualityDep/index') ?>" ><img  src="<?php echo  base_url('public/img/qualityDep.png');?>" width="170" height="80" class="imgView"  />
        <div class="photo_font">
			<?php echo $this->lang->line('qualityDep'); ?>
		  </a>
		  </div>
	</div>
	
	<?php }?>
	</div>
	<div class="row ">

	<?php 
	if(in_array('cpanel',$site)){?>
	<div class="new"><br/>
       <a href="<?php echo base_url('cpanel/index') ?>" ><img  src="<?php echo  base_url('public/img/cpanel.png');?>" width="170" height="80" class="imgView"  />
        <div class="photo_font">
			<?php echo $this->lang->line('cpanel'); ?>
		</a>
		</div>
	</div>
	<?php } ?>
	
</div>
<?php } ?>
</div>