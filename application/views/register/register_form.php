<?php

grd_con();
grd_row();
grd_col('x-12 d-6 dh-3');
Myform_post('register/create');
grd_row();
grd_col('x-10 xh-1 d-6 dh-3');
Myform_grp();
Myform_head($this->lang->line('register'), 'formHeading');
grd_x(3);
grd_row();
grd_col('x-10 xh-1 d-6 dh-3');
Myform_grp();
inp_text('userName', set_value('userName'), $this->lang->line('userName'), 'class ="form-control" id="userName"');
grd_x(3);
grd_row();
grd_col('x-10 xh-1 d-6 dh-3');
Myform_grp();
inp_email('userEmail', set_value('userEmail'), $this->lang->line('userEmail'), 'class ="form-control" id="userEmail"');
grd_x(3);
grd_row();
grd_col('x-10 xh-1 d-6 dh-3');
Myform_grp();
inp_text('userUser', set_value('userUser'), $this->lang->line('userUser'), 'class ="form-control" id="userUser"');
grd_x(3);
grd_row();
grd_col('x-10 xh-1 d-6 dh-3');
Myform_grp();
inp_pass('userPass', set_value('userPass'), $this->lang->line('userPass'), 'class ="form-control" id="userPass"');
grd_x(3);
grd_row();
grd_col('x-10 xh-1 d-6 dh-3');
Myform_grp();
inp_sub('submit', $this->lang->line('login_btn'), 'class ="btn btn-info btn-block" ');
grd_x(3);
Myform_close();
grd_x(3);
?>
				
