<?php

/*
 * NOVA
 * Helper functions
 */

function hex2rgb($hex) {
    $hex = str_replace('#', '', $hex);

    if(strlen($hex) == 3) {
        $r = hexdec(substr($hex,0,1).substr($hex,0,1));
        $g = hexdec(substr($hex,1,1).substr($hex,1,1));
        $b = hexdec(substr($hex,2,1).substr($hex,2,1));
    } else {
        $r = hexdec(substr($hex,0,2));
        $g = hexdec(substr($hex,2,2));
        $b = hexdec(substr($hex,4,2));
    }
    $rgb = array($r, $g, $b);
    
    return implode(',', $rgb); // returns the rgb values separated by commas
    // return $rgb; // returns an array with the rgb values
}

function span_classes($current_col_num, $total_col_num) {
    $span_classes = 'xs-span12';
    
    if ($total_col_num != 3) {
        $span_classes .= ' md-span6';
    }
    
    if ($total_col_num % 4 == 0) {
        $span_classes .= ' lg-span3';
    } elseif ($total_col_num % 3 == 0) {
        $span_classes .= ' lg-span4';
        
        if ($current_col_num == $total_col_num - 1 && $total_col_num % 2 == 1 && $total_col_num != 3) {
            $span_classes .= ' md-left3 md-right3 lg-left0 lg-right0';
        }
    } elseif ($total_col_num % 4 == 3) {
        $span_classes .= ' lg-span3';
        
        if ($current_col_num == $total_col_num - 3) {
            $span_classes .= ' lg-left1point5';
        }
        
        if ($current_col_num == $total_col_num - 1) {
            $span_classes .= ' md-left3 md-right3 lg-left0 lg-right1point5';
        }
    } elseif ($total_col_num % 3 == 2) {
        $span_classes .= ' lg-span4';
        
        if ($current_col_num == $total_col_num - 2) {
            $span_classes .= ' lg-left2';
        }
        
        if ($current_col_num == $total_col_num - 1) {
            if ($total_col_num % 2 == 1) {
                $span_classes .= ' md-left3 md-right3 lg-left0';
            }
            
            $span_classes .= ' lg-right2';
        }
    } elseif ($total_col_num % 4 == 2) {
        $span_classes .= ' lg-span3';
        
        if ($current_col_num == $total_col_num - 2) {
            $span_classes .= ' lg-left3';
        }
        
        if ($current_col_num == $total_col_num - 1) {
            $span_classes .= ' lg-right3';
        }
    } elseif ($total_col_num % 3 == 1) {
        $span_classes .= ' lg-span4';
        
        if ($current_col_num == $total_col_num - 1) {
            if ($total_col_num % 2 == 1) {
                $span_classes .= ' md-left3 md-right3';
            }
            
            $span_classes .= ' lg-left4 lg-right4';
        }
    } else {
        /*
         * Nothing should ever reach this far, because taking into account
         * the previous logic, all integers should either be divisible by 3,
         * divide by 3 and have remainder 2, or divide by 3 and have
         * remainder 1.
         *
         * But just in case... (It's good to have a catch-all)
         */
        
        $span_classes .= ' lg-span4';
        
        if ($current_col_num % 2 == 0) {
            $span_classes .= ' lg-left2';
        } else {
            if ($current_col_num == $total_col_num - 1 && $total_col_num % 2 == 1) {
                $span_classes .= ' md-left3 md-right3 lg-left0';
            }
            
            $span_classes .= ' lg-right2';
        }
    }
    
    return $span_classes;
}

function to_slug($string){
    $slug = $string;
    
    $slug = strtolower($slug);
    $slug = preg_replace('/[^a-z0-9\-\_\s]+/', '', $slug);
    $slug = trim($slug);
    $slug = preg_replace('/\s+/', '-', $slug);
    
    return $slug;
}

?>