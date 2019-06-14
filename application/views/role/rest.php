<?php
if ($this->session->userdata('userCC') != TRUE) {
    redirect(base_url('login/index'));
}
foreach ($record as $value) {
    ?>
<div class="navbar_links" >
		<?php echo $title ?>
</div>
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="panel panel-default">
                    <div class="panel-heading pl-heading">
                        <h3 class="headline panel-title">
                            <i class="fa fa-pencil-square-o "></i>
                            <?php echo $this->lang->line('rest_pass'); ?>
                        </h3>
                    </div>
                    <div class="panel-body">
                    <form role="form" method="post" name="" action="<?php echo base_url('user/rest_update/'.$value->id); ?>">
						<fieldset>
							  <div class="text-right">في حالة نسيان كلمة السر لإي مستخدم يتم استخدام خاصية مسح كلمة السر.	
							  <span>ستكون كلمة السر الجديدة المؤقتة هي </span><span class="s">1234</span></div><br />

                              <button type="submit" class="add_btn btn btn-block" style="width:320px;height:30px;">
                                <li class="fa fa-eraser" aria-hidden="true">
							<?php echo $this->lang->line('rest') ?>
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
