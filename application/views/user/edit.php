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
           <?php
			$atrb=array('class'=>'form  white-pink');
			echo form_open('user/update/'.$value->id,$atrb);
			echo '
			<h4> <i class="fa fa-user-plus"></i>&nbsp;'.$this->lang->line("edit").' '.$this->lang->line("user").'
			</h4>';
			$data = array(
				   'name'        => 'userUser',
				   'id'          => 'userUser',
				   'value'       =>  $value->userUser,
				   'maxlength'   => '100',
				   'size'        => '50',
				   'style'       => 'width:242px;height:32px;margin-bottom:10px;',
				   'class'       => 'form-control',
				   'placeholder' =>  $this->lang->line('name').' '.$this->lang->line('english'),
				   'required'    => 'required',
				 );
			echo form_input($data);
			$data = array(
				   'name'        => 'userName',
				   'id'          => 'userName',
				   'value'       =>  $value->userName,
				   'maxlength'   => '100',
				   'size'        => '50',
				   'style'       => 'width:242px;height:32px;margin-bottom:10px;',
				   'class'       => 'form-control',
				   'placeholder' =>  $this->lang->line('userName').' '.$this->lang->line('arbic'),
				   'required'    => 'required',
				 );
			echo form_input($data);
			
			$drop['0'] ='حدد القسم';
			foreach($dep as $val){
			 $drop[$val->id] = $val->dep;
			 }
			echo form_dropdown('id_dep',$drop,$value->id_dep,'class="form-control" style="width:50%;margin-bottom:10px;"');
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
						<input class="checkbox-inline" type="checkbox" name="cpanel[]" value='user' <?php if(in_array('user',$role)){ echo "checked";}?>/><br /><?php echo $this->lang->line('users');?>
					</td>
					<td>
						<input class="checkbox-inline" type="checkbox" name="cpanel[]" value='setting' <?php if(in_array('setting',$role)){ echo "checked";}?>/><br /><?php echo $this->lang->line('setting');?>
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
						<input class="checkbox-inline" type="checkbox" name="finance[]" value='frole' <?php if(in_array('frole',$role)){ echo "checked";}?>/>
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
						<input class="checkbox-inline" type="checkbox" name="training[]" value='trainee' <?php if(in_array('trainee',$role)){ echo "checked";}?>/><br /><?php echo $this->lang->line('trainees');?>
					</td>
					<td>
						<input class="checkbox-inline" type="checkbox" name="training[]" value='course' <?php if(in_array('course',$role)){ echo "checked";}?>/><br /><?php echo $this->lang->line('courses');?>
					</td>
					<td>
						<input class="checkbox-inline" type="checkbox" name="training[]" value='trainer' <?php if(in_array('trainer',$role)){ echo "checked";}?>/><br /><?php echo $this->lang->line('trainer');?>
					</td>
				</tr>
				<tr>
					<td>
						<input class="checkbox-inline" type="checkbox" name="training[]" value='trole' <?php if(in_array('trole',$role)){ echo "checked";}?>/>
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
