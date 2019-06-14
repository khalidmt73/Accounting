<center>
	<div class="main">
	    <div class="the-container">
<!--close in footer -------------------------------------------------------------------- -->
				<?php if ($this->session->userdata('userCC') == TRUE) {?>
				<div class="container-fluid">
				<div class="logo col-lg-2 col-xs-12">
						<img src="<?php echo base_url('public/img/logo.png');?>" width="180" height="71" border="0" alt="">
				</div>
				<div class="col-lg-10 col-xs-12">
					<div class="row" >
							<div class="site_name text-center" >
								<span class="logo_name_ar">
									<?php echo $this->lang->line('site_name'); ?>
								</span>
								<span class="logo_name_ar">
									&nbsp; > &nbsp;<?php echo $this->lang->line('cpanel'); ?>
								</span>
							</div>
						</div>
					<div class="row">
<!-- ------------------------------------------------------------------------------------ -->
					<nav class="navbar_top" role="navigation" >
						<div class="container-fluid">
							<div class="navbar-header"><!-- navbar-header -->
								<button class="navbar-toggle" type="button" data-toggle="collapse"     data-target="#bs-navbar" aria-controls="bs-navbar" aria-expanded="false">
									<span class="sr-only">القائمة</span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
								</button>
							</div><!-- End of the navbar-header -->
							<!-- Collect the nav links, forms, and other content for toggling -->
							<!-- Start collapse -->
						<?php if(in_array('cpanel',$site)){?>
						<div class="collapse navbar-collapse" id="bs-navbar">
							<ul class="nav navbar-nav " ><!-- Start ul nav -->
								<?php
									if (count($site) > 1 ){
							
							?>
								<li <?php
								if ($this->uri->segment(1) == 'web') {
									echo 'class="active"';
								}
								?> >
									<a href="<?php echo base_url('web/index'); ?>">
										<?php echo $this->lang->line('home'); ?>
									</a>
								</li>
								<?php }
								
									if(in_array('user',$user)){
								?>
								<li <?php
								if ($this->uri->segment(1) == 'user') {
									echo 'class="active"';
								}
								?> >
									<a href="<?php echo base_url('user/index') ?>">
										<?php echo $this->lang->line('users') ?> 
										</a>
								</li>
								<?php }
								
									if(in_array('dep',$user)){
								?>
								<li <?php
								if ($this->uri->segment(1) == 'dep') {
									echo 'class="active"';
								}
								?> >
									<a href="<?php echo base_url('dep/index') ?>">
										<?php echo $this->lang->line('deps') ?> 
										</a>
								</li>
								<?php }  
									if(in_array('setting',$user)){
								?>
								<li <?php
								if ($this->uri->segment(1) == 'setting') {
									echo 'class="active"';
								}
								?> >
									<a href="<?php echo base_url('setting/index') ?>">
										<?php echo $this->lang->line('setting') ?> 
										</a>
								</li>
							   <?php }  ?>								

							 </ul><!-- End of the ul nav  -->
							<ul class="nav  navbar-nav navbar-left">
								<li
									<?php
								if ($this->uri->segment(1) == 'mydata') {
									echo 'class="active"';
								}
								?>
								>
									<a  href="<?php echo base_url('mydata/index')?>">
										<i class="fa fa-user fa-fw"></i><?php echo $this->session->userdata('userNameCC'); ?>

									</a>
						   
								</li>
								<!-- /.dropdown -->
							</ul><!-- End of the ul nav  -->
						   <ul class="nav navbar-nav navbar-left">
								<li>
									<a  href="<?php echo base_url('in/out') ?>">
									<i class="fa fa-sign-out fa-fw"></i><?php echo $this->lang->line('exit'); ?>

									</a>
						   
								</li>
								<!-- /.dropdown -->
							</ul><!-- End of the ul nav  -->
															
							 <?php } ?>
							<ul class="nav navbar-nav navbar-left">
								<li class="dropdown">
									<a class="dropdown-toggle" data-toggle="dropdown" href="#">
									<?php if ($mail_box_menu_num > 0){ ?>
										<span class="badge"><?php echo $mail_box_menu_num; ?></span>
										<?php } ?>
										<i class="fa fa-envelope fa-fw"></i>
										
										<i class="fa fa-caret-down">
										</i>
									</a>
									<ul class="dropdown-menu dropdown-user">
										<?php 
											if ($mail_box_menu_num > 0){
											foreach ($mail_box_menu as $mail_box_menu_value) {
											echo '<li><a href="'.base_url('mail_box/reply/'.$mail_box_menu_value->id).'">'.$mail_box_menu_value->subject.'</a></li>';  
										 }
										 }else
											{   echo "&nbsp;&nbsp; ..."."<br />";}
										 
										?>
										<li class="env">
										<a href="<?php echo base_url('mail_box/index');?>">
										<i class="fa fa-envelope fa-fw"></i>
											<?php echo $this->lang->line('mail_box') ?>	
											</a>
										</li>
									</ul>
									<!-- / mail_box -->
								</li>
								<!-- /.dropdown -->
							</ul><!-- End of the ul nav  -->
						   </div><!-- End of the collapse -->
						</div><!-- End of the container -->
					</nav><!-- End our navbar -->
<!-- ------------------------------------------------------------------------------------ -->

				<?php 	
				

}
			
			?>
		</div>
		</div>