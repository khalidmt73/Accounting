<?php
if ($this->session->userdata('userCC') != TRUE) {
    redirect(base_url('login/index'));
}
    ?>
<div class="container">
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<?php
			
			$atrb=array('class'=>'form  white-pink');
			echo form_open('user/create',$atrb);
			echo '
			<h4> <i class="fa fa-user-plus"></i>'.$this->lang->line("add").' '.$this->lang->line("user").'
			</h4>';
			$data = array(
				   'name'        => 'userUser',
				   'id'          => 'userUser',
				   'value'       => '',
				   'maxlength'   => '100',
				   'size'        => '50',
				   'style'       => 'width:200px;height:29px;margin-bottom:10px;',
				   'class'       => 'form-control',
				   'placeholder' =>  $this->lang->line('name').' '.$this->lang->line('arbic'),
				   'required'    => 'required',
				 );
			echo form_input($data);
			$data = array(
				   'name'        => 'userName',
				   'id'          => 'userName',
				   'value'       => '',
				   'maxlength'   => '100',
				   'size'        => '50',
				   'style'       => 'width:200px;height:29px;margin-bottom:10px;',
				   'class'       => 'form-control',
				   'placeholder' =>  $this->lang->line('userName').' '.$this->lang->line('english'),
				   'required'    => 'required',
				 );
			echo form_input($data);
			?>
			<table class="table role text-center">
				<tr>
					<td class="text-center head_role" colspan="3">
						<?php echo $this->lang->line('define').''.$this->lang->line('role'); ?>
					</td>
				</tr>
				<tr>
					<td class="head_role text-right" colspan="3">
						<?php echo $this->lang->line('cpanel'); ?>
					</td>
				</tr>
				<tr>
					<td>
						<input class="checkbox-inline" type="checkbox" name="cpanel[]" value='user'/><br /><?php echo $this->lang->line('users');?>
					</td>
					<td>
						<input class="checkbox-inline" type="checkbox" name="cpanel[]" value='setting' /><br /><?php echo $this->lang->line('setting');?>
					</td>
					<td>
						&nbsp;
					</td>
				</tr>
				<tr>
					<td class="head_role text-right" colspan="3">
						<?php echo $this->lang->line('finance_dep'); ?>
					</td>
				</tr>
				<tr>
					<td>
						<input class="checkbox-inline" type="checkbox" name="finance[]" value='account'/><br /><?php echo $this->lang->line('accounts');?>
					</td>
					<td>
						<input class="checkbox-inline" type="checkbox" name="finance[]" value='expense' /><br /><?php echo $this->lang->line('expenses');?>
					</td>
					<td>
						<input class="checkbox-inline" type="checkbox" name="finance[]" value='income' /><br /><?php echo $this->lang->line('incomes');?>
					</td>
				</tr>
				<tr>
					<td>
						<input class="checkbox-inline" type="checkbox" name="finance[]" value='petty_cash' />
						<br />
						<?php echo $this->lang->line('petty_cash');?>
					</td>
					<td>
						<input class="checkbox-inline" type="checkbox" name="finance[]" value='entry' />
						<br />
						<?php echo $this->lang->line('entrys');?>
					</td>
					<td>
						<input class="checkbox-inline" type="checkbox" name="finance[]" value='report' />
						<br />
						<?php echo $this->lang->line('reports');?>
					</td>
				</tr>
				<tr>
					<td>
						<input class="checkbox-inline" type="checkbox" name="finance[]" value='frole' />
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
				<tr>
					<td class="head_role text-right" colspan="3">
						<?php echo $this->lang->line('training_dep'); ?>
					</td>
				</tr>
				<tr>
					<td>
						<input class="checkbox-inline" type="checkbox" name="training[]" value='trainee'/><br /><?php echo $this->lang->line('trainees');?>
					</td>
					<td>
						<input class="checkbox-inline" type="checkbox" name="training[]" value='course' /><br /><?php echo $this->lang->line('courses');?>
					</td>
					<td>
						<input class="checkbox-inline" type="checkbox" name="training[]" value='trainer' /><br /><?php echo $this->lang->line('trainer');?>
					</td>
				</tr>
				<tr>
					<td>
						<input class="checkbox-inline" type="checkbox" name="training[]" value='trole' />
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
			</table>
									 
			<button type="submit" class="add_btn btn btn-block" style="width:200px;height:30px;">
				<li class="fa fa-user-plus" aria-hidden="true">
			<?php echo $this->lang->line('add') ?>
				</li>
			</button>
				<?php echo form_close();?>                   
            </div>
        </div>
    </div>



<!-- End file ----------------------------------------------------------------------------------------------------------- -->
