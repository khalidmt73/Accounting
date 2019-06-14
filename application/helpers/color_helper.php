<?php
defined('BASEPATH') OR exit('No direct script access allowed');


// ------------------------------------------------------------------------

if (!function_exists('color')) {

    function color($size = '5') {
        ?>
        <input class="form-control col-sm-<?php echo $size; ?>" type="text" name="fontColorManager"  id="color1"  value="color" />
        <div id="colorpicker1" style="display:none;">
        </div>
        <?php
    }

}

