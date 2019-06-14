<?php
if ($this->session->userdata('userCC') != TRUE) {
    redirect(base_url('login/index'));
}
foreach ($record as $value) {
    ?>
    <div class="container">
        <div class="row">
                <div class="panel panel-default">
                    <div class="panel-heading pl-heading">
					
                        <h3 class="headline panel-title">
                            <i class="fa fa-reply "></i>
                            <?php echo $this->lang->line('reply').'&nbsp;<font style="color:red;">('.$value->subject.')</font>'; ?>
                        </h3><br />
						<div class="row">
						<div class="container">
						<div class="col-xs-6">
                    <div class="text-right">
							<?php echo 'التاريخ :'.$value->date.'&nbsp;&nbsp;&nbsp; الوقت : '.$value->time; ?>
							</div></div>
							<div class="col-xs-6">
					<div class="text-left">
						<button class="btn btn-info btn-sm" id="reply_btn">الرد</button>
					</div></div></div>
					</div>
					</div>
                    <div class="panel-body">
                    <form role="form" method="post" name="reply" action="<?php echo base_url('mail_box/create/'.$value->id); ?>" >
						<fieldset>
							<div class="text-center">
							<?php echo 'المرسل : '.$value->messenger.'&nbsp;&nbsp;&nbsp; جوال : '.$value->mobile.'&nbsp;&nbsp;&nbsp; بريد : '.$value->email; ?>
							</div>
							
							<hr />
							<div class="mail_text text-justify">
								<?php echo $value->text;?>
							</div>
							<div id="reply" style="display:none;">
							<div class="main_font" >الرد  </div>
							<?php echo ($value->reply_date).'&nbsp;&nbsp;&nbsp;'.($value->reply_time) ;?>
							<div class="col-md-12 col-xs-12">
				    	     <div class="form-group">
							 <input type="hidden" name="subject" value="<?php echo trim($value->subject) ;?>">
							 <input type="hidden" name="email" value="<?php echo $value->email ;?>">
							<textarea name="reply" class="form-control text-right" rows="6" cols="40">
							<?php echo trim($value->reply) ;?>
							</textarea>
							</div>
							</div>
			                <button type="submit" class="add_btn btn btn-block" style="width:263px;height:40px;margin-top:20px">
                                <li class="fa fa-reply" aria-hidden="true">
							<?php echo $this->lang->line('reply') ?>
                                </li>
                            </button>
							</div>
                        </fieldset>                               
                        </form>
                    </div>
                </div>
        </div>
    </div>
<?php } ?>
<script>
    $(document).ready(function () {
		$("#reply_btn").click(function(){
     $("#reply").toggle();
		});

    });
</script>

<!-- End file -------------------------------------------------------------- -->
