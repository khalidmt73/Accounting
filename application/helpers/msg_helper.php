<?php
defined('BASEPATH') OR exit('No direct script access allowed');


// ------------------------------------------------------------------------

if (!function_exists('msq_xinp')) {

    function msq_xinp($inp) {
        ?>
        <div class="msg" ><?php echo form_error($inp); ?></div>
        <?php
    }

}