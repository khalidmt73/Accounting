<?php
defined('BASEPATH') OR exit('No direct script access allowed');


// ------------------------------------------------------------------------

if (!function_exists('editor_tools')) {

    function editor_tools($id,$style='') {
        ?>
			<div id="menu"style="<?php echo $style; ?>">
				<button class="btn" id="bold_<?php echo $id; ?>2" href="#"><i class="fa fa-bold"></i></button>
				<button class="btn" id="italic_<?php echo $id; ?>2" href="#"><i class="fa fa-italic"></i></button>
				<button class="btn" id="underline_<?php echo $id; ?>2" href="#"><i class="fa fa-underline"></i></button>
				&nbsp;&nbsp;&nbsp;	
				<button class="btn" id="justify_<?php echo $id; ?>2" href="#"><i class="fa fa-align-justify"></i></button>
				<button class="btn" id="right_<?php echo $id; ?>2" href="#"><i class="fa fa-align-right"></i>
				</button>
				<button class="btn" id="center_<?php echo $id; ?>2" href="#">
				<i class="fa fa-align-center"></i>
				</button>
				<button class="btn" id="left_<?php echo $id; ?>2" href="#"><i class="fa fa-align-left"></i></button>
				<button class="btn" id="insertOrderedList_<?php echo $id; ?>2" href="#">
				<i class="fa fa-list-ol"></i>
				</button>
				<button class="btn" id="insertUnorderedList_<?php echo $id; ?>2" href="#">
				<i class="fa fa-list-ul"></i>
				</button>
				<select class="" name="fontsize" id="fontsize_<?php echo $id; ?>2" style="">
					<option value="" >حجم الخط
					<option value="1" style="font-size:10px;">حجم الخط
					<option value="3" style="font-size:15px;">حجم الخط
					<option value="4" style="font-size:20px;">حجم الخط
					<option value="6" style="font-size:25px;">حجم الخط
				</select>
				<select class="" name="fontname" id="fontname_<?php echo $id; ?>2" style="">
					<option value="" >نوع الخط
					<option value="myfont" style="font-family:myfont;">نوع الخط
					<option value="tahoma" style="font-family:tahoma;">نوع الخط
					<option value="arial"  style="font-family:arial;">نوع الخط
					<option value="sans-serif"  style="font-family:sans-serif;">نوع الخط
				</select>
				<select class="" name="forecolor" id="forecolor_<?php echo $id; ?>2" style="">
					<option value="" >لون الخط
					<option value="black" style="background:black;">
					<option value="red" style="background:red;">
					<option value="blue" style="background:blue;">
					<option value="green" style="background:green;">
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
}
//------------------------------------------------------------------------------------------------------
if (!function_exists('editor_text')) {

    function editor_text($id = '',$value='',$style) {
        ?>
		 <div style="<?php echo $style ?>" class="rte" id="<?php echo $id; ?>2" contenteditable="true" unselectable="off"><?php echo $value ;?></div>
        <textarea class="form-control" style="display:none;" name="<?php echo $id ?>" id="<?php echo $id ?>" class="textarea" cols="100" rows="14">
		</textarea>
        <?php
    }

}

//------------------------------------------------------------------------------------------------------
