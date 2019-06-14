<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// ------------------------------------------------------------------------

if (!function_exists('Myform_post')) {

    function Myform_post($action = '', $data = '') {
        ?>
        <form action="<?php echo base_url($action); ?>" method="post" accept-charset="utf-8" <?php echo $data; ?> >
        <?php
    }

}
// ------------------------------------------------------------------------

if (!function_exists('Myform_postIn')) {

    function Myform_postIn($action = '', $data = '') {
        ?>
            <form action="<?php echo base_url($action); ?>" class="form-inline" role="form" method="post" accept-charset="utf-8" <?php $data; ?> >

            <?php
        }

    }
// ------------------------------------------------------------------------

    if (!function_exists('inp_text')) {

        function inp_text($name = 'name', $value = '', $placeholder = '', $data, $req = TRUE) {
            ?>
                <input class="form-control input-sm" <?php echo $data; ?> type="text" name="<?php echo $name; ?>" value="<?php echo $value; ?>"
                       placeholder="<?php echo $placeholder; ?>" <?php if ($req == true) echo 'required'; ?> />
                <?php
            }

        }
// ------------------------------------------------------------------------

        if (!function_exists('inp_pass')) {

            function inp_pass($name = 'name', $value = '', $placeholder = '', $data, $req = TRUE) {
                ?>
                <input <?php echo $data; ?> type="password" name="<?php echo $name; ?>" value="<?php echo $value; ?>"
                                            placeholder="<?php echo $placeholder; ?>" <?php if ($req == true) echo 'required'; ?> />
                       <?php
                   }

               }
// ------------------------------------------------------------------------

               if (!function_exists('inp_email')) {

                   function inp_email($name = 'name', $value = '', $placeholder = '', $data, $req = TRUE) {
                       ?>
                <input <?php echo $data; ?> type="email" name="<?php echo $name; ?>" value="<?php echo $value; ?>"
                                            placeholder="<?php echo $placeholder; ?>" <?php if ($req == true) echo 'required'; ?> />
                                            <?php
                                        }

                                    }

// ------------------------------------------------------------------------

                                    if (!function_exists('inp_sub')) {

                                        function inp_sub($name = 'name', $value = '', $data) {
                                            ?>
                <input	type="submit" name="<?php echo $name; ?>" value="<?php echo $value; ?>" <?php echo $data; ?> />
                                            <?php
                                        }

                                    }
// ------------------------------------------------------------------------

                                    if (!function_exists('button')) {

                                        function button($type, $class = '') {
                                            ?>
                <button type = "<?php echo $type; ?>"  <?php echo $class; ?>>
                <?php
            }

        }
// -----------------------------

        if (!function_exists('button_close')) {

            function button_close() {
                ?>
                </button> 
                    <?php
                }
            }
// ------------------------------------------------------------------------

            if (!function_exists('label')) {

                function label($value = '') {
                    ?>
                <label ><?php echo $value; ?></label>
                <?php
            }
        }
// ------------------------------------------------------------------------

        if (!function_exists('Myform_close')) {

            function Myform_close() {
                ?>
            </form>
                <?php
            }

        }
// ------------------------------------------------------------------------

        if (!function_exists('Myform_Head')) {

            function Myform_Head($headline, $class) {
                ?>
            <h4 class="<?php echo $class; ?>"><?php echo $headline; ?></h4>
            <?php
        }
    }
// ------------------------------------------------------------------------

    if (!function_exists('Myform_Head')) {

        function Myform_Head($headline, $class) {
            ?>
            <h4 class="<?php echo $class; ?>"><?php echo $headline; ?></h4>
            <?php
        }
    }
// ------------------------------------------------------------------------

    if (!function_exists('Myform_grp')) {

        function Myform_grp() {
            ?>
            <div class="form-group">
            <?php
        }
    }






