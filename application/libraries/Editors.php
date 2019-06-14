<?php
defined('BASEPATH') OR exit('No direct script access allowed');


// ------------------------------------------------------------------------

class Editors
{
		
public function __construct()
	{
	}
// ------------------------------------------------------------------------
    function editor_tools($id,$style='') {
        ?>
			
			<div id="menu"style="<?php echo $style; ?>">
				<button class="btn btn_editor" id="bold_<?php echo $id; ?>2" href="#"><i class="fa fa_editor fa-bold"></i></button>
				<button class="btn btn_editor" id="italic_<?php echo $id; ?>2" href="#"><i class="fa fa_editor fa-italic"></i></button>
				<button class="btn btn_editor" id="underline_<?php echo $id; ?>2" href="#"><i class="fa fa_editor fa-underline"></i></button>
				&nbsp;&nbsp;&nbsp;	
				<button class="btn btn_editor" id="justify_<?php echo $id; ?>2" href="#"><i class="fa fa_editor fa-align-justify"></i></button>
				<button class="btn btn_editor" id="right_<?php echo $id; ?>2" href="#"><i class="fa fa_editor fa-align-right"></i>
				</button>
				<button class="btn btn_editor" id="center_<?php echo $id; ?>2" href="#">
				<i class="fa fa_editor fa-align-center"></i>
				</button>
				<button class="btn btn_editor" id="left_<?php echo $id; ?>2" href="#"><i class="fa fa_editor fa-align-left"></i></button>
				<button class="btn btn_editor" id="insertOrderedList_<?php echo $id; ?>2" href="#">
				<i class="fa fa_editor fa-list-ol"></i>
				</button>
				<button class="btn btn_editor" id="insertUnorderedList_<?php echo $id; ?>2" href="#">
				<i class="fa fa_editor fa-list-ul"></i>
				</button>
				<select  class="selecter"   name="fontsize" id="fontsize_<?php echo $id; ?>2" style="">
					<option value="" >حجم الخط </option>
					<option value="1" style="font-size:10px;">10</option>
					<option value="3" style="font-size:15px;">15</option>
					<option value="4" style="font-size:20px;">20</option>
					<option value="6" style="font-size:25px;">25</option>
				</select>
				<select class="selecter" name="fontname" id="fontname_<?php echo $id; ?>2" style="">
					<option value="" >نوع الخط </option>
					<option value="myfont" style="font-family:myfont;">myfont</option>
					<option value="tahoma" style="font-family:tahoma;">tahoma</option>
					<option value="arial"  style="font-family:arial;">arial </option>
					<option value="sans-serif"  style="font-family:sans-serif;">sans-serif</option>
				</select>
				<select class="selecter" name="forecolor" id="forecolor_<?php echo $id; ?>2" style="">
					<option value="" >لون الخط </option>
					<option value="black" style="background:black;">اسود </option>
					<option value="red" style="background:red;">احمر </option>
					<option value="blue" style="background:blue;">ازرق </option>
					<option value="green" style="background:green;">الاخضر </option>
				</select>
			</div>
       
        <script type="text/javascript">
           $(function(){
				 $('#<?php echo $id; ?>2').focus();
				 $('#bold_<?php echo $id; ?>2').click(function(){document.execCommand('bold', false, null);$('#<?php echo $id; ?>2').focus();return false;});
				 $('#italic_<?php echo $id; ?>2').click(function(){document.execCommand('italic', false, null);$('#<?php echo $id; ?>2').focus();return false;});
				 $('#underline_<?php echo $id; ?>2').click(function(){document.execCommand('underline', false, null);$('#<?php echo $id; ?>2').focus();return false;});

				$('#justify_<?php echo $id; ?>2').click(function(){document.execCommand('justifyFull', false, null);$('#<?php echo $id; ?>2').focus();return false;});
				 $('#center_<?php echo $id; ?>2').click(function(){document.execCommand('justifyCenter', false, null);$('#<?php echo $id; ?>2').focus();return false;});
				 $('#right_<?php echo $id; ?>2').click(function(){document.execCommand('justifyRight', false, null);$('#<?php echo $id; ?>2').focus();return false;});
				$('#left_<?php echo $id; ?>2').click(function(){document.execCommand('justifyLeft', false, null);$('#<?php echo $id; ?>2').focus();return false;});


				$('#insertUnorderedList_<?php echo $id; ?>2').click(function(){document.execCommand('insertUnorderedList', false,this.value);$('#<?php echo $id; ?>2').focus();return false;});

				$('#insertOrderedList_<?php echo $id; ?>2').click(function(){document.execCommand('insertOrderedList', false,this.value);$('#<?php echo $id; ?>2').focus();return false;});


				$('#forecolor_<?php echo $id; ?>2').change(function(){document.execCommand('foreColor', false,this.value);$('#<?php echo $id; ?>2').focus();return false;});
				$('#forecolor').change(function(){$('#forecolor').css('background',this.value)});

				$('#fontname_<?php echo $id; ?>2').change(function(){document.execCommand('fontName', false,this.value);$('#<?php echo $id; ?>2').focus();return false;});
				$('#fontname_<?php echo $id; ?>2').change(function(){$('#fontname_<?php echo $id; ?>2').css('font-family',this.value)});

				$('#fontsize_<?php echo $id; ?>2').change(function(){document.execCommand('fontSize', false,this.value);$('#<?php echo $id; ?>2').focus();return false;});
				$('#fontsize_<?php echo $id; ?>2').change(function(){$('#fontsize_<?php echo $id; ?>2').css('font-size',this.value)});

				});

				$(document).ready(function(){
				$('#<?php echo $id; ?>2').keyup(function() {
					  var  htmlRte =  $("#<?php echo $id; ?>2").html();

					$("#<?php echo $id; ?>").val(htmlRte);
				});

				$('button').click(function() {
					  var  htmlRte =  $("#<?php echo $id; ?>2").html();

					$("#<?php echo $id; ?>").val(htmlRte);
				});

				$('select').change(function() {
					  var  htmlRte =  $("#<?php echo $id; ?>2").html();

					$("#<?php echo $id; ?>").val(htmlRte);
				});

				$('body').click(function() {
					  var  htmlRte =  $("#<?php echo $id; ?>2").html();

					$("#<?php echo $id; ?>").val(htmlRte);
				});

				});

        </script>
 <?php 
	
}
//------------------------------------------------------------------------------------------------------

function editor_text($id = '',$value='',$style) {
        ?>
		 <div style="<?php echo $style ?>" class="rte" id="<?php echo $id; ?>2" contenteditable="true" unselectable="off"><?php echo $value ;?></div>
        <textarea class="form-control" style="display:none;" name="<?php echo $id ?>" id="<?php echo $id ?>" class="textarea" cols="100" rows="14">
		</textarea>
        <?php
	}
}
//------------------------------------------------------------------------------------------------------
