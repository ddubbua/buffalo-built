<?php

/*
 * NOVA
 * Section Class
 */

class novaSection {
    // String: the user-friendly name of the section
    // e.g. 'Team Members'
    private $group_name;
    function set_group_name($new_group_name) {
        $this->group_name = $new_group_name;
        return $this;
    }
    function get_group_name() {
        return $this->group_name;
    }
    
    // String: the slug of the section name
    // Only needs to be CSS friendly, so it can have dashes, letters, numbers, and underscores.
    // e.g. 'team-members'
    private $group_name_slug;
    function set_group_name_slug($new_group_name_slug) {
        $this->group_name_slug = $new_group_name_slug;
        return $this;
    }
    function get_group_name_slug() {
        return $this->group_name_slug;
    }
    
    // String: the user-friendly name of a single column in the section
    // e.g. 'Team Member'
    private $single_name;
    function set_single_name($new_single_name) {
        $this->single_name = $new_single_name;
        return $this;
    }
    function get_single_name() {
        return $this->single_name;
    }
    
    // String: the slug of a single column in the section
    // This MUST be php safe, so only letters, numbers, and underscores.
    // e.g. 'team_member'
    private $single_name_slug;
    function set_single_name_slug($new_single_name_slug) {
        $this->single_name_slug = $new_single_name_slug;
        return $this;
    }
    function get_single_name_slug() {
        return $this->single_name_slug;
    }
    
    // Boolean: whether or not the section has multiple sub-sections
    private $multiple = false;
    function set_multiple($new_multiple) {
        $this->multiple = $new_multiple;
        return $this;
    }
    function has_multiple() {
        return $this->multiple;
    }
    
    // Integer: the fixed number of columns
    // This property is only used for sections where has_multiple returns false.
    private $fixed_column_num = null;
    function set_fixed_column_num($new_fixed_column_num) {
        $this->fixed_column_num = $new_fixed_column_num;
        return $this;
    }
    function get_fixed_column_num() {
        return $this->fixed_column_num;
    }
    
    // String: the width of the columns in the admin view
    private $admin_column_classes;
    function set_admin_column_classes($new_admin_column_classes) {
        $this->admin_column_classes = $new_admin_column_classes;
        return $this;
    }
    function get_admin_column_classes() {
        return $this->admin_column_classes;
    }
    
    // Array: multidimensional array of the unique attributes of the section,
    //        needed for admin fields and front-end markup
    //
    // Available input types: text, textarea, checkbox, select, icon, image, and hidden.
    private $markup_attr;
    function set_markup_attr($new_markup_attr) {
        $this->markup_attr = $new_markup_attr;
        return $this;
    }
    function get_markup_attr() {
        return $this->markup_attr;
    }
    
    // Array: multidimensional array of the section options
    // Setting this variable is optional. Use if a section needs more options.
    //
    // Available input types: text, textarea, checkbox, select, icon, image, and hidden.
    private $options;
    function set_options($new_options) {
        $this->options = $new_options;
        return $this;
    }
    function get_options() {
        return $this->options;
    }
    
    // Function: returns the markup for fields
    //
    // $array - the array that the field is being saved to
    // $attrs - the fields to loop through
    // $input_name_prefix - the prefix for the name attribute in the input field
    private function fields_markup($array, $attrs, $input_name_prefix) {
        $output = '';
            
        foreach($attrs as $key => $attr) {
            $input_name = $input_name_prefix . '[' . $key . ']';
            $input_width = (isset($attr['width']) ? $attr['width'] : 'xs-span12');
            
            $tip = '';
            if (!empty($attr['tip'])) {
                $tip = '<i class="nova-field-tip-button fa fa-question-circle"></i><div class="nova-field-tip-content">' . $attr['tip'] . '</div>';
            }
            
            $output .= '<div class="column ' . $input_width . ($attr['input_type'] == 'icon' ? ' nova-icon-preview' : '') . '">';
            
            if (!isset($array[$key])) {
                $array[$key] = '';
            }
        
            if ($attr['input_type'] == 'textarea') {
                $output .= $attr['name'] . $tip;
                $output .= '<textarea name="' . $input_name . '" rows="' . (!empty($attr['rows']) ? $attr['rows'] : '5') . '">' . $array[$key] . '</textarea><br />';
                $output .= '<a class="button open-editor-button" href="#">Open Editor</a>';
            } elseif ($attr['input_type'] == 'checkbox') {
                $output .= '<input type="checkbox" name="' . $input_name . '"' . (!empty($array[$key]) ? ' checked' : '') . '> ' . $attr['name'] . $tip;
            } elseif ($attr['input_type'] == 'select') {
                $output .= $attr['name'] . $tip;
                $output .= '<select name="' . $input_name . '">';
                foreach ($attr['options'] as $option_key => $option) {
                    $output .= '<option value="' . $option . '"' . ($array[$key] == $option || (empty($array[$key]) && !empty($attr['selected']) && $attr['selected'] == $option) ? ' selected' : '') . '>' . $option_key . '</option>';
                }
                $output .= '</select>';
            } elseif ($attr['input_type'] == 'icon') {
                $icon_value = (!empty($array[$key]) ? $array[$key] : ICON_DEFAULT);
            
                $output .= $attr['name'] . $tip;
                $output .= '<i class="' . $icon_value . '"></i><br />';
                $output .= '<input name="' . $input_name . '" type="hidden" value="' . $icon_value . '" readonly />';
                $output .= '<a class="button nova-add-icon" href="#">Choose Icon</a>';
            } elseif ($attr['input_type'] == 'image') {
                $image_id = $array[$key];
                $image = '<img src="" />';
                
                if (!empty($image_id)) {
                    $image = wp_get_attachment_image($image_id, 'large');
                }
                
                $output .= $attr['name'] . $tip;
                $output .= $image . '<br />';
                $output .= '<input name="' . $input_name . '" type="hidden" value="' . $image_id . '" readonly />';
                $output .= '<a href="#" class="nova_add_image_button button" data-editor="content" title="Add Image">Add Image</a> ';
                $output .= '<a href="#" class="nova_remove_image_button button">Remove Image</a>';
            } elseif ($attr['input_type'] == 'color') {
                $output .= $attr['name'] . $tip;
                $output .= '<input class="color-field" name="' . $input_name . '" value="' . esc_attr($array[$key]) . '" type="text" />';
            } else {
                $output .= $attr['name'] . $tip;
                $output .= '<input name="' . $input_name . '" value="' . esc_attr($array[$key]) . '" type="' . $attr['input_type'] . '"' . (isset($attr['placeholder']) ? ' placeholder="' . $attr['placeholder'] . '"' : '') . ' />';
            }
            
            $output .= '</div>';
        }
        
        return $output;
    }
    
    // Function: returns the admin markup for a section's column
    //
    // $s - the counter keeping track of what section we are on
    // $c - the counter keeping track of what column we are on
    // $nova_column - the array containing the column's data
    function admin_column_markup($s, $c, $nova_column = array('show' => 'show')) {
        $output = '<div class="column ' . $this->get_admin_column_classes() . '">';

        if ($this->has_multiple()) {
            $output .= '<div class="nova-collapsable-menu' . ($nova_column['show'] != 'hide' ? '' : ' collapsed-state') . '">';
            $output .= '<i class="fa fa-chevron-' . ($nova_column['show'] != 'hide' ? 'down' : 'up') . ' nova-collapse"></i>';
            $output .= '<h5>' . $this->get_single_name() . '</h5>';
            $output .= '<i class="fa fa-close nova-remove-section"></i>';
            $output .= '<input name="nova_page_sections[' . $s . '][columns][' . $c . '][show]" type="hidden" value="' . ($nova_column['show'] != 'hide' ? 'show' : 'hide') . '"></input>';
            $output .= '</div>';
            $output .= '<div class="nova-collapsable-content' . ($nova_column['show'] != 'hide' ? ' show' : '') . '">';
        }
    
        $output .= '<h4>' . $this->get_single_name() . '</h4>';
        $output .= $this->fields_markup($nova_column, $this->get_markup_attr(), 'nova_page_sections[' . $s . '][columns][' . $c . ']');
    
        if ($this->has_multiple()) {
            $output .= '</div>';
        }
    
        $output .= '</div>';
    
        return $output;
    }
    
    // Function: returns the admin markup for a section's options
    //
    // $s - the counter keeping track of what section we are on
    // $nova_options - the array containing the secttion's options data
    function options_markup($s, $nova_options = array()) {
        $output = $this->fields_markup($nova_options, $this->get_options(), 'nova_page_sections[' . $s . '][options]');
        return $output;
    }
    
    // Function: returns the admin markup for a section
    //
    // $s - the counter keeping track of what section we are on
    // $nova_options - the array containing the section's options data
    // $nova_columns - the array containing the section's columns data
    // $show - whether or not the section is collapsed in the admin view
    function admin_section_markup($s, $nova_options = array(), $nova_columns = array(), $show = 'show') {
        $c = 0;
        
        $output  = '<div class="nova-section nova-' . $this->get_group_name_slug() . '-area">';
        
        $output .= '<div class="nova-collapsable-menu' . ($show != 'hide' ? '' : ' collapsed-state') . '">';
        $output .= '<i class="fa fa-chevron-' . ($show != 'hide' ? 'down' : 'up') . ' nova-collapse"></i>';
        $output .= '<h5>' . $this->get_group_name() . '</h5>';
        $output .= '<i class="fa fa-close nova-remove-section"></i>';
        $output .= '<input name="nova_page_sections[' . $s . '][show]" type="hidden" value="' . ($show != 'hide' ? 'show' : 'hide') . '"></input>';
        $output .= '</div>';

        $output .= '<div class="nova-collapsable-content' . ($show != 'hide' ? ' show' : '') . '">';
        $output .= '<h3>' . $this->get_group_name() . ' Section</h3>';
        
        if ($this->get_options()) {
            $output .= '<div class="row general-options-area">';
            $output .= '<div class="column xs-span12">';
            $output .= '<h4>General Options</h4>';
            $output .= $this->options_markup($s, $nova_options);
            $output .= '</div>';
            $output .= '</div>';
        }
        
        if ($this->has_multiple()) {
            $output .= '<div class="nova-add-column-area">';
            $output .= '<a class="button nova-add-section">Add ' . $this->get_single_name() . '</a>';
            $output .= '</div>';
        }
        
        $output .= '<div class="row columns-area' . ($this->has_multiple() ? ' added-columns' : '') . '">';

        // Gets the max number of columns for sections with fixed column numbers
        // e.g. one-column section, two-column section, etc.
        $max_columns = null;
        if ($this->get_fixed_column_num() != null) {
            $max_columns = $c + $this->get_fixed_column_num();
        }
        
        // Adds necessary number of columns if there is previously saved data,
        // or just adds one column with empty fields if this is a new section.
        if (!empty($nova_columns)) {
            foreach ($nova_columns as $nova_column) {
                if (!$max_columns || $c < $max_columns) {
                    $output .= $this->admin_column_markup($s, $c, $nova_column);
                    $c++;
                }
            }
        } else if ($this->has_multiple() && is_array($nova_columns)) {
            $output .= $this->admin_column_markup($s, $c);
            $c++;
        }
            
        // Adds more sections equal to the fixed column number
        // if the section has a fixed number of columns.
        while ($max_columns && $c < $max_columns) {
            $output .= $this->admin_column_markup($s, $c);
            $c++;
        }
        
        $output .= '</div>';
        
        if ($this->has_multiple()) {
            $output .= '<div class="nova-add-column-area">';
            $output .= '<a class="button nova-add-section">Add ' . $this->get_single_name() . '</a>';
            $output .= '</div>';
        }
        
        $output .= '<input class="nova-section-type-field" name="nova_page_sections[' . $s . '][type]" type="hidden" value="' . $this->get_group_name_slug() . '" />';
        $output .= '</div>';
        $output .= '</div>';
        
        return $output;
    }
}

?>