<?php
if ($this->session->userdata('userCC') != TRUE) {
    redirect(base_url('login/index'));
}
foreach ($record as $value) {
    ?>
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1" >
                <div class="panel panel-default" style="width:300px;">
                    <div class="panel-heading pl-heading">
                        <h3 class="headline panel-title">
                            <i class="fa fa-pencil-square-o "></i>
                            <?php echo $this->lang->line('edit').' '.$this->lang->line('password'); ?>
                        </h3>
                    </div>
                    <div class="panel-body">
                    <form role="form" method="post" name="" action="<?php echo base_url('mydata/update'); ?>" >
					<fieldset>
					
					
                    <div class="text-danger " >
					<?php if(isset($userPass_old_msg)) echo $userPass_old_msg;?>
					</div>
					<input type="password" name="userPass_old2" id="userPass_old2" placeholder="<?php echo $this->lang->line('password').' '.$this->lang->line('old') ?>" value="<?php  if (isset($_POST['userPass_old2']))echo $_POST['userPass_old2'];?>" class ="form-control" style="width:200px;height:29px;margin-bottom:10px;" required>
					
					<input type="hidden" name="userPass_old" id="userPass_old"  value="<?php echo $value->userPass;?>" class ="form-control" style="width:200px;height:29px;margin-bottom:10px;" ><br />
                    
					<div class="text-danger " >
					<?php if(isset($userPass_msg)) echo $userPass_msg;?>
					</div>
					<input type="password" name="userPass" id="userPass" placeholder="<?php echo $this->lang->line('password').' '.$this->lang->line('new') ?>" value="<?php  
					if (isset($_POST['userPass']))echo $_POST['userPass'];?>" 	class ="form-control" style="width:200px;height:29px;margin-bottom:10px;" required><br />
                    
					<input type="password" name="userPass2" id="userPass2" placeholder="<?php echo $this->lang->line('return').' '.$this->lang->line('password').' '.$this->lang->line('new') ?>" value="<?php if(isset($_POST['userPass2'])) echo $_POST['userPass2'];?>" class ="form-control" style="width:200px;height:29px;margin-bottom:10px;" required>
					
					
					<button type="submit" class="add_btn btn btn-block" style="width:200px;height:30px;">
                    <li class="fa fa-pencil-square-o" aria-hidden="true">
							<?php echo $this->lang->line('edit') ?>
                                </li>
                            </button>
                        </fieldset>                               
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
<!-- End file ----------------------------------------------------------------------------------------------------------- -->