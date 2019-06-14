<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// ------------------------------------------------------------------------
if (!function_exists('viewData_add')) {
function viewData_add ($total,$limit,$controller,$method_view,$method_search,$method_add,$btn_add) {
        ?>
  		 <table class="viewData_tb table">
             <tr >
				<td class="text-right col-xs-4">
					<?php if ($method_add != null){ ?>
							<a href="<?php echo base_url($controller.'/'.$method_add) ?>">
                            <button class="btn btn-default btn-sm">
						 <?php echo $btn_add; ?>
						 </button><a/>
						 <?php } else{} ?>
						
						</td>

						<td class="text-center col-xs-4">
							<?php if ($method_search != null){ ?>
                            <input type="text" id="search" name="search" class="form-control search_input"  style="height:32px;" placeholder="ابحث ..."  
							onkeyup="AjaxSearch(this.value,
							'result', 'display','<?php echo $controller."/".$method_search ;?>') " />
							<?php } else{} ?>
                         </td>
                        
                        <td class="text-left col-xs-4" >
							<?php if ($method_view != null){ ?>

						<div class="dropdown">													<?php echo $total; ?>
								<button id="dLabel" class="btn btn-default btn-sm" type="button"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							    <?php echo $limit ; ?>
								<span class="caret"></span>
								</button>
							<ul class="dropdown-menu left_menu_pages" aria-labelledby="dLabel">
								<li>عدد الاسطر</li>
								<li><a href="<?php echo base_url($controller.'/'.$method_view.'/5/'); ?>"> 5 </a></li>
								<li><a href="<?php echo base_url($controller.'/'.$method_view.'/10/'); ?>"> 10 </a></li>
								<li><a href="<?php echo base_url($controller.'/'.$method_view.'/20/'); ?>"> 20 </a></li>
								<li><a href="<?php echo base_url($controller.'/'.$method_view.'/50/'); ?>"> 50 </a></li>
							    <li><a href="<?php echo base_url($controller.'/'.$method_view.'/'.$total.'/'); ?>"> الكل</a></li>
							</ul>
							<?php } else{} ?>
						</div>
                         </td>
						</tr>
                        </table>
<hr class="hr" />
				<?php  
    }
	}
// ------------------------------------------------------------------------
if (!function_exists('viewData_table')) {
function viewData_table($th,$result,$td,$text,$pic,$offset,$controller,$button,$pager,$input = null) {
?>

<form method="post" action="
						<?php if ($input != null)
						        { 
							      echo base_url($controller.'/save_mark/'); 
							     }
							  elseif($input == null)
								  {
							      echo base_url($controller.'/array_delet/'); 
						
							     }	?>
							">
<div class="table-responsive">
<table class="table table-striped table-hover table-bordered  text-center">
	<thead>
		<tr class="tr_head">
		 <?php
	foreach($th as $value)	 
	{ ?>
			<th class="text-center">
				<?php  echo $value; ?>
			</th>
		 <?php } ?>
		 </tr>
	</thead>
	 <tbody>

	   <?php
	    $offset = $offset + 1;
		$result_count = count($result)-1;
		for($i= 0 ; $i <= $result_count ; $i++){
				$tdc=count($td)-1;
			?>
			<tr class="">
			<td><?php echo $offset++; ?></td>

			<?php
				for($n= 1 ; $n <= $tdc ; $n++){
				$v ='';
				$c ='';
				$p ='';
			
			?>
			<td >
		<?php 
		$text_val = explode('|',$text);
		$pic_val  = explode('|',$pic);
		$field = $result[$i]->$td[$n];
				if ($text != null){
					if ($td[$n] == $text_val[0]){
						echo substr($field, $text_val[1]);
						}
					}
				if ($pic != null){
					if ($td[$n] == $pic_val[0]){
						?><img  src="<?php echo  base_url('public/img/'.$controller.'/'.$field);?>" 
						width="<?php echo $pic_val[1]; ?>" height="<?php echo $pic_val[2]; ?>" class="imgView<?php echo $n; ?>" 
						data-toggle="modal" data-target="#myModal<?php echo $i;?>"/>
						<?php $p.=$field;
					}	
				}
			
				if(($td[$n] != $text_val[0]) AND ($td[$n] != $pic_val[0])) 
					{ echo $field; }?>
			</td>
			<?php 
			$v.=$result[$i]->$td[0];
			$c.=$result[$i]->$td[1];
				}
			if($button != null){?>	
		 
			 <td class="col-md-2">
				<?php 
					foreach($button as $key => $val_but){
					$val_but = explode('-',$val_but);
					$val  = $val_but[0];
					$lang = $val_but[1];
				?>
					<a class="icon-<?php $vals = substr($val,0,4); if($vals =='edit'){echo 'edit';} else{ echo $val;} ?>" href="<?php echo	base_url($controller.'/'.$val.'/'.$v) ?>" data-toggle="tooltip" title="<?php echo $lang; ?>">
					</a>
					<?php  
							if($val == 'delet'){
						?>
												
						 <a class="icon-delete" href="<?php echo base_url($controller.'/delet/'.$v.'/'.$p) ?>" 
						onclick="if (confirm('هل أنت متأكد من الحذف !') == false) {
						return false;}" data-toggle="tooltip" title="<?php echo $lang ; ?>">
					</a>

			  <td>
			 <input type="checkbox" name="delet[]" id="delet" 
					value=<?php echo $v ; ?> />
			 </td>
					<?php }} ?>

<?php
			}
			?>
			 <?php 
			 if(isset($input)){
			$inputVal = explode('-',$input);
			
			 if($inputVal[0] == 'input'){
				
				?>
			<td>
			<input type="text" name="mark[<?php echo $v; ?>]" value="">		
			<input type="hidden" name="academicNo[]" value="<?php echo $c ;?>">
			<input type="hidden" name="id_course" value="<?php echo $inputVal[1]; ?>">
			<input type="hidden" name="year" value="<?php echo $inputVal[2]; ?>">
			<input type="hidden" name="semester" value="<?php echo $inputVal[3]; ?>">
			</td>
			<?php }
			
			
			}?>
			
			<?php } ?>
			</tr>
	</tbody>
</table>
</div>
<?php if ($button != null){ ?>

<div class="well_tb">	

<table class="viewData_tb table " >
	<tr >
		<td class="text-center col-md-11"> 
		<?php echo $pager; ?>
		</td>
		<td class="text-left col-md-1" >
		<?php if($val == 'delet'){ ?>
			 <a href="<?php echo base_url($controller.'/delet_array') ?>">
				
                            <button class="btn btn-default btn-sm" onclick="if (confirm('هل أنت متأكد من الحذف !') == false) {
				return false;}">
								<i class="fa fa-trash-o"></i>
							</button>
						 <a/>
			  <?php } ?>
			</div>
			
	   </td>
	</tr>
	
</table>

</div><?php } ?>
<?php if($input != null){
$data = array(
               'name'        => 'submit',
               'id'          => 'submit',
               'value'       => 'حفظ',
               'maxlength'   => '100',
               'size'        => '50',
               'class'       => 'btn btn-info',
               'style'       => 'width:50%',
             );
 echo form_submit($data);

}
?>
</form>

			<?php
			}
}
//---------------------------------------------------------------------------------------------
if (!function_exists('viewData_one')) {
function viewData_one($th,$result,$td,$text,$pic,$controller,$button) {
?>				
<div class="table-responsive">
	<table class="table table-striped table-bordered table-hover   text-center">
                                <thead>
                                    <tr class="tr_head">
									 <?php
								foreach($th as $value)	 
								{ ?>
                                        <th class="text-center">
                                            <?php  echo $value; ?>
                                        </th>
									 <?php } ?>
									 </tr>
                                </thead>
								 <tbody>

								   <?php

									$result_count = count($result)-1;
									for($i= 0 ; $i <= $result_count ; $i++){
											$tdc=count($td)-1;
										?>
										<tr class="">
										<td><?php echo 1; ?></td>

										<?php
											for($n= 1 ; $n <= $tdc ; $n++){
											$v ='';
											$p ='';
										
										?>
										<td >
									<?php 
									$text_val = explode('|',$text);
                                   	$pic_val  = explode('|',$pic);
										$field = $result[$i]->$td[$n];
											if ($text != null){
												if ($td[$n] == $text_val[0]){
													echo substr($field, $text_val[1]);
													}
												}
											if ($pic != null){
												if ($td[$n] == $pic_val[0]){
													?><img  src="<?php echo  base_url('public/img/'.$controller.'/'.$field);?>" 
													width="<?php echo $pic_val[1]; ?>" height="<?php echo $pic_val[2]; ?>" class="imgView<?php echo $n; ?>" 
													data-toggle="modal" data-target="#myModal<?php echo $i;?>"/>
													<?php $p.=$field;
												}	
											}
										
											if(($td[$n] != $text_val[0]) AND ($td[$n] != $pic_val[0])) 
												{ echo $field; }?>
										</td>
										<?php 
										$v.=$result[$i]->$td[0];
											}
										 ?>
									 
										 <td class="col-md-2">
											<?php foreach($button as $key => $val_but){
												$val_but = explode('-',$val_but);
												$val  = $val_but[0];
												$lang = $val_but[1];
											?>
												<a class="icon-<?php echo $val; ?>" href="<?php echo	base_url($controller.'/'.$val.'/'.$v) ?>" data-toggle="tooltip" title="<?php echo $lang; ?>">
                                                </a>
												<?php  
														if($val == 'delet'){
													?>
																			
													 <a class="icon-delete" href="<?php echo base_url($controller.'/delet/'.$v.'/'.$p) ?>" 
                                                    onclick="if (confirm('هل أنت متأكد من الحذف !') == false) {
                                                    return false;}" data-toggle="tooltip" title="<?php echo $lang ; ?>">
                                                </a>
												<?php }} ?>
										  
										 </tr>

										 <?php
										}
										?>
										
                                    
                                </tbody>
                            </table>
					   </div>

			<?php
			}
	}
//--------------------------------------------------------------------------------------------
if (!function_exists('download')) {
function download($controller,$pdf,$pdfLng,$excel,$excelLng,$word,$wordLng,$printed,$printedLng,$download) {
?>		
<div class="btn-group">
		<button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown" style="width:100px;height:34px;">
			<?php echo $download; ?>
			<span class="caret"></span>
		</button>
		<ul class="download_menu dropdown-menu" role="menu">
			<li>		
				<a href="<?php echo
				base_url($controller.$pdf);
				?> "class='a_img'>
				<i class="fa fa-file-pdf-o fa-lg"></i>
				<?php echo $download . '&nbsp;' . $pdfLng; ?>
				</a>
			</li>
			<li>
				<a href="<?php echo
				base_url($controller.$excel);
				?>" class='a_img'>
			<i class="fa fa-file-excel-o fa-lg"></i>
				<?php echo $download . '&nbsp;' . $excelLng; ?>
				</a>
			</li>
			<li>
				<a href="<?php echo
				base_url($controller.$word);
				?>" class='a_img'>
				<i class="fa fa-file-word-o fa-lg"></i>
				<?php echo $download . '&nbsp;' . $wordLng; ?>
				</a>
			</li>
			<li>
				<a href="<?php echo
				base_url($controller.$printed);
				?>" class='a_img'>
				<i class="fa fa-print fa-lg"></i>
				<?php echo $printedLng; ?>
				</a>
		</ul>
	</div>
<?php }
}
// ------------------------------------------------------------------------
if (!function_exists('viewData_table_delet')) {
function viewData_table_delet($th,$result,$td,$text,$pic,$offset,$controller,$button,$pager,$input = null) {
?>

<form method="post" action="
						<?php if ($input != null)
						        { 
							      echo base_url($controller.'/save_mark/'); 
							     }
							  elseif($input == null)
								  {
							      echo base_url($controller.'/array_delet/'); 
						
							     }	?>
							">
<div class="table-responsive">
<table class="table table-striped table-hover table-bordered  text-center">
	<thead>
		<tr class="tr_head">
		 <?php
	foreach($th as $value)	 
	{ ?>
			<th class="text-center">
				<?php  echo $value; ?>
			</th>
		 <?php } ?>
		 </tr>
	</thead>
	 <tbody>

	   <?php
	    $offset = $offset + 1;
		$result_count = count($result)-1;
		for($i= 0 ; $i <= $result_count ; $i++){
				$tdc=count($td)-1;
			?>
			<tr class="">
			<td><?php echo $offset++; ?></td>

			<?php
				for($n= 1 ; $n <= $tdc ; $n++){
				$v ='';
				$c ='';
				$p ='';
			
			?>
			<td >
		<?php 
		$text_val = explode('|',$text);
		$pic_val  = explode('|',$pic);
		$field = $result[$i]->$td[$n];
				if ($text != null){
					if ($td[$n] == $text_val[0]){
						echo substr($field, $text_val[1]);
						}
					}
				if ($pic != null){
					if ($td[$n] == $pic_val[0]){
						?><img  src="<?php echo  base_url('public/img/'.$controller.'/'.$field);?>" 
						width="<?php echo $pic_val[1]; ?>" height="<?php echo $pic_val[2]; ?>" class="imgView<?php echo $n; ?>" 
						data-toggle="modal" data-target="#myModal<?php echo $i;?>"/>
						<?php $p.=$field;
					}	
				}
			
				if(($td[$n] != $text_val[0]) AND ($td[$n] != $pic_val[0])) 
					{ echo $field; }?>
			</td>
			<?php 
			$v.=$result[$i]->$td[0];
			$c.=$result[$i]->$td[1];
				}
			if($button != null){?>	
		 
			 <td class="col-md-2">
				<?php 
					foreach($button as $key => $val_but){
					$val_but = explode('-',$val_but);
					$val  = $val_but[0];
					$lang = $val_but[1];
				?>
					<a class="icon-<?php $vals = substr($val,0,4); if($vals =='edit'){echo 'edit';} else{ echo $val;} ?>" href="<?php echo	base_url($controller.'/'.$val.'/'.$v) ?>" data-toggle="tooltip" title="<?php echo $lang; ?>">
					</a>
					<?php  
							if($val == 'delet'){
						?>
												
						 <a class="icon-delete" href="<?php echo base_url($controller.'/delet/'.$v.'/'.$p) ?>" 
						onclick="if (confirm('هل أنت متأكد من الحذف !') == false) {
						return false;}" data-toggle="tooltip" title="<?php echo $lang ; ?>">
					</a>
					<?php }} ?>
			  <td>
			 <input type="checkbox" name="delet[]" id="delet" 
					value=<?php echo $v ; ?> />
			 </td>

<?php
			}
			?>
			 <?php 
			 if(isset($input)){
			$inputVal = explode('-',$input);
			
			 if($inputVal[0] == 'input'){
				
				?>
			<td>
			<input type="text" name="mark[<?php echo $v; ?>]" value="">		
			<input type="hidden" name="academicNo[]" value="<?php echo $c ;?>">
			<input type="hidden" name="id_course" value="<?php echo $inputVal[1]; ?>">
			<input type="hidden" name="year" value="<?php echo $inputVal[2]; ?>">
			<input type="hidden" name="semester" value="<?php echo $inputVal[3]; ?>">
			</td>
			<?php }
			
			
			}?>
			
			<?php } ?>
			</tr>
	</tbody>
</table>
</div>
<?php if ($button != null){ ?>

<div class="well_tb">	

<table class="viewData_tb table " >
	<tr >
		<td class="text-center col-md-11"> 
		<?php echo $pager; ?>
		</td>
		<td class="text-left col-md-1" >
			 <a href="<?php echo base_url($controller.'/delet_array') ?>">
				
                            <button class="btn btn-default btn-sm" onclick="if (confirm('هل أنت متأكد من الحذف !') == false) {
				return false;}">
								<i class="fa fa-trash-o"></i>
							</button>
						 <a/>
			  
			</div>
			
	   </td>
	</tr>
	
</table>

</div><?php } ?>
<?php if($input != null){
$data = array(
               'name'        => 'submit',
               'id'          => 'submit',
               'value'       => 'حفظ',
               'maxlength'   => '100',
               'size'        => '50',
               'class'       => 'btn btn-info',
               'style'       => 'width:50%',
             );
 echo form_submit($data);

}
?>
</form>

			<?php
			}
}
//--------------------------------------------------------------------------------------------

