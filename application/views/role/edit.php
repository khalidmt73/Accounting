<?php
if ($this->session->userdata('userCC') != TRUE) {
    redirect(base_url('login/index'));
}
foreach ($record as $value) {
$role = explode('-',$value->userRole);
 ?>
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                        <h3 class="headline">
                            <i class="fa fa-pencil-square-o "></i>
                            <?php echo $this->lang->line('edit').' '.$this->lang->line('role'); ?>
                        </h3>
						<br />
                    <form role="form" method="post" name="" action="<?php echo base_url('role/update/'.$value->id.'/'.$dep); ?>" >
                            							
				<table class="table table-bordered text-center">
			
				<?php if ($dep == 'cpanel'){ ?>
				<tr>
					<td class="head_role text-right" colspan="3">
						<?php echo $this->lang->line('cpanel'); ?>
					</td>
				</tr>
				<tr>
					<td>
						<input class="checkbox-inline" type="checkbox" name="cpanel[]" value='user' <?php if(in_array('user',$role)){ echo "checked";}?>/><br /><?php echo $this->lang->line('users');?>
					</td>
					<td>
						<input class="checkbox-inline" type="checkbox" name="cpanel[]" value='setting' <?php if(in_array('setting',$role)){ echo "checked";}?>/><br /><?php echo $this->lang->line('setting');?>
					</td>
					<td>
						&nbsp;
					</td>
				</tr>
				<?php } 
				if ($dep == 'financeDep'){ ?>				<tr>
					<td class="text-center" colspan="3">
						<?php echo $this->lang->line('financeDep').'<br /> '.$this->lang->line('staff1').' : '.$value->userName ;?>
						
					</td>
				</tr>
				<tr>
					<td>
						<input class="checkbox-inline" type="checkbox" name="finance[]" value='account' <?php if(in_array('account',$role)){ echo "checked";}?>/><br /><?php echo $this->lang->line('accounts');?>
					</td>
					<td>
						<input class="checkbox-inline" type="checkbox" name="finance[]" value='expense' <?php if(in_array('expense',$role)){ echo "checked";}?>/><br /><?php echo $this->lang->line('expenses');?>
					</td>
					<td>
						<input class="checkbox-inline" type="checkbox" name="finance[]" value='income' <?php if(in_array('income',$role)){ echo "checked";}?>/><br /><?php echo $this->lang->line('incomes');?>
					</td>
				</tr>
				<tr>
					<td>
						<input class="checkbox-inline" type="checkbox" name="finance[]" value='petty_cash' <?php if(in_array('petty_cash',$role)){ echo "checked";}?>/>
						<br />
						<?php echo $this->lang->line('petty_cash');?>
					</td>
					<td>
						<input class="checkbox-inline" type="checkbox" name="finance[]" value='entry' <?php if(in_array('entry',$role)){ echo "checked";}?>/>
						<br />
						<?php echo $this->lang->line('entrys');?>
					</td>
					<td>
						<input class="checkbox-inline" type="checkbox" name="finance[]" value='report' <?php if(in_array('report',$role)){ echo "checked";}?>/>
						<br />
						<?php echo $this->lang->line('reports');?>
					</td>
				</tr>
				<tr>
					<td>
						<input class="checkbox-inline" type="checkbox" name="finance[]" value='role' <?php if(in_array('role',$role)){ echo "checked";}?>/>
						<br />
						<?php echo $this->lang->line('role');?>
					</td>
					<td>
						&nbsp;
					</td>
					<td>
						&nbsp;
					</td>
				</tr>

				<?php } 
				if ($dep == 'traineeDep'){ ?>
				<tr>
					<td class=" text-center" colspan="3">
						<?php echo $this->lang->line('traineeDep').'<br /> '.$this->lang->line('staff1').' : '.$value->userName; ?>
					</td>
				</tr>
				<tr>
					<td>
						<input class="checkbox-inline" type="checkbox" name="training[]" value='trainee' <?php if(in_array('trainee',$role)){ echo "checked";}?>/><br /><?php echo $this->lang->line('trainees');?>
					</td>
					<td>
						<input class="checkbox-inline" type="checkbox" name="training[]" value='lists' <?php if(in_array('lists',$role)){ echo "checked";}?>/><br /><?php echo $this->lang->line('lists');?>
					</td>
					<td>
						<input class="checkbox-inline" type="checkbox" name="training[]" value='linkin' <?php if(in_array('linkin',$role)){ echo "checked";}?>/><br /><?php echo $this->lang->line('linkin');?>
					</td>
					
				</tr>
				<tr>
					<td>
						<input class="checkbox-inline" type="checkbox" name="training[]" value='course' <?php if(in_array('course',$role)){ echo "checked";}?>/><br /><?php echo $this->lang->line('courses');?>
					</td>
					
					<td>
						<input class="checkbox-inline" type="checkbox" name="training[]" value='textbook' <?php if(in_array('textbook',$role)){ echo "checked";}?>/><br /><?php echo $this->lang->line('textbooks');?>
					</td>
					<td>
						<input class="checkbox-inline" type="checkbox" name="training[]" value='trainer' <?php if(in_array('trainer',$role)){ echo "checked";}?>/><br /><?php echo $this->lang->line('trainers');?>
					</td>
				</tr>
				<tr>
					<td>
						<input class="checkbox-inline" type="checkbox" name="training[]" value='classroom' <?php if(in_array('classroom',$role)){ echo "checked";}?>/><br /><?php echo $this->lang->line('classrooms');?>
					</td>
					<td>
						<input class="checkbox-inline" type="checkbox" name="training[]" value='trole' <?php if(in_array('trole',$role)){ echo "checked";}?>/>
						<br />
						<?php echo $this->lang->line('role');?>
					</td>
					<td>
						&nbsp;
					</td>

				</tr>
				<?php } ?>
			</table>
			<button type="submit" class="add_btn btn btn-block" style="width:70px;height:30px;">
                <li class="fa fa-pencil-square-o" aria-hidden="true">
							<?php echo $this->lang->line('edit') ?>
                                </li>
                            </button>
                        </form>
                   
            </div>
        </div>
    </div>
<?php } ?>
<!-- End file ----------------------------------------------------------------------------------------------------------- -->
