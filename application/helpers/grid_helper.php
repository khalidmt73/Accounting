<?php

defined('BASEPATH') OR exit('No direct script access allowed');

// ------------------------------------------------------------------------

if (!function_exists('grd_col')) {

    function grd_col($cols) {
        $grid = explode(' ', $cols);
        $num = count($grid);
        $num = $num - 1;
        $g = '';
        for ($i = 0; $i <= $num; $i++) {
            $col = explode('-', $grid[$i]);
            for ($n = 0; $n <= 0; $n++) {
                if ($col[0] == 'x') {
                    $g .= 'col-xs-' . $col[1] . ' ';
                }
                if ($col[0] == 'xh') {
                    $g .= 'col-xs-push-' . $col[1] . ' ';
                }
                if ($col[0] == 'xl') {
                    $g .= 'col-xs-pull-' . $col[1] . ' ';
                }
                if ($col[0] == 's') {
                    $g .= 'col-sm-' . $col[1] . ' ';
                }
                if ($col[0] == 'sh') {
                    $g .= 'col-sm-push-' . $col[1] . ' ';
                }
                if ($col[0] == 'sl') {
                    $g .= 'col-sm-pull-' . $col[1] . ' ';
                }
                if ($col[0] == 'd') {
                    $g .= 'col-md-' . $col[1] . ' ';
                }
                if ($col[0] == 'dh') {
                    $g .= 'col-md-push-' . $col[1] . ' ';
                }
                if ($col[0] == 'dl') {
                    $g .= 'col-md-pull-' . $col[1] . ' ';
                }
                if ($col[0] == 'g') {
                    $g .= 'col-lg-' . $col[1] . ' ';
                }
                if ($col[0] == 'gh') {
                    $g .= 'col-lg-push-' . $col[1] . ' ';
                }
                if ($col[0] == 'gl') {
                    $g .= 'col-lg-pull-' . $col[1] . ' ';
                }
            }
        }
        echo '<div class="';
        echo $g .='';
        echo '">';
    }

}
// ------------------------------------------------------------------------
if (!function_exists('grd_x')) {

    function grd_x($n) {

        for ($i = 1; $i <= $n; $i++)
            echo '</div>';
    }

}
// ------------------------------------------------------------------------
if (!function_exists('grd_con')) {

    function grd_con() {
        echo '<div class="container">';
    }

}
// ------------------------------------------------------------------------
if (!function_exists('grd_row')) {

    function grd_row() {
        echo '<div class="row">';
    }

}
