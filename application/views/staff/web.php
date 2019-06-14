<div class="navbar_links text-right" >
		<?php echo $this->lang->line('course')?>
</div>

<div class="container-fluid">
<?php $i=1;$b=1;
foreach ($course as $key => $value) {?>
  <div class="new">
       <img  src="<?php echo  base_url('public/img/course/'.$value->pic);?>" width="150" height="150" class="imgView<?php echo $i; ?>" 
	     data-toggle="modal" data-target="#myModal<?php echo $i;?>"/>
      
	   
	   
          <div class="course_font">
			<?php  echo $value->head;?>
			<i class="course<?php echo $i; ?> fa fa-search-plus"></i>
		  </div>
      
	     
    
	</div>
     <script>
	     $(document).ready(function() {
           $('.course<?php echo $i?>').hover(function(){
              $('#myModal<?php echo $i?>').modal('show');
           });
		   
		   $('#myModal<?php echo $i?>').click(function(){
              $('#myModal<?php echo $i?>').modal('hide');
           });
		  
        });
	   </script>

<div class="modal fade" id="myModal<?php echo $b++;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      
      <div class="modal-body">
        <img  src="<?php echo  base_url('public/img/course/'.$value->pic);?>"  class="img-thumbnail img-responsive center-block" /> 
      </div>
  
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">إغلاق</button>
      </div>    

    </div>
  </div>
</div>

	
  <?php
  $i++;}
   
?>
</div>
<div class="text-center"><?php echo $pages; ?></div>
