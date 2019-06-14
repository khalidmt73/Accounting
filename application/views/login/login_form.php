<br /><br />
<div class="container">
<div class="row">
<div class="col-md-4 col-md-offset-4">

<br/><br/><br/><br/><br/><br/>
<form role="form" class="form form-inline white-pink" method="post" action="<?php echo base_url('login'); ?>" >
<h4 class="headline panel-title">
<i class="fa fa-sign-in fa-fw"></i><?php echo $this->lang->line('login'); ?></h4>
<input type="text" name="userUser" id="userUser"  value="" placeholder="<?php echo	$this->lang->line('userName'); ?>"        
class ="form-control" style="width:200px;height:29px;margin:10px;">
<input type="password" name="userPass" id="userPass" value="" placeholder="<?php echo $this->lang->line('password'); ?>" class ="form-control" style="width:200px;height:29px;margin:10px;">
<button type="submit" class="add_btn btn btn-block" style="width:200px;height:40px;">
<span class="glyphicon glyphicon-log-in" aria-hidden="true">
<?php echo $this->lang->line('login') ?>
</form>

</div>
</div>
</div>
