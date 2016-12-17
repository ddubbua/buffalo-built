<?php

/*
 * NOVA
 * Shortcodes
 */

// Add NOVA button shortcode
function nova_button_shortcode($atts) {
    $a = shortcode_atts(array(
        'color'                 => 'primary-color',
        'icon'                  => 'false',
        'link'                  => '#',
        'open_link_in_new_tab'  => 'false',
        'text'                  => 'Click Here'
    ), $atts);
    
    $icon_class = '';
    if ($a['icon'] == 'true') {
        $icon_class = ' nova-button-has-icon';
    }
    
    $open_link_in_new_tab = '';
    if ($a['open_link_in_new_tab'] == 'true') {
        $open_link_in_new_tab = 'target="_blank"';
    }
        
    $output  = '<a class="nova-button nova-button-' . $a['color'] . $icon_class . '"';
    $output .= ' href="' . $a['link'] . '"';
    $output .= ' ' . $open_link_in_new_tab . '>';
    $output .= $a['text'];
    $output .= '</a>';
    
    return $output;
}
add_shortcode('nova_button', 'nova_button_shortcode');

// Add NOVA contact info shortcode
function nova_contact_info_shortcode($atts) {
    $a = shortcode_atts(array(
        'location_name'             => '',
        'location_address'          => '',
        'location_address2'         => '',
        'location_city_state_zip'   => '',
        'phone'                     => '',
        'email'                     => '',
        'email2'                    => ''
    ), $atts);
    
    $location = array_filter(array(
        $a['location_name'],
        $a['location_address'],
        $a['location_address2'],
        $a['location_city_state_zip']
    ));
    $total_lines_num = count($location);
    
    $output  = '<div class="nova-contact-info">';
    
    if (!empty($location)) {
        $output .= '<div class="row">';
        $output .= '<div class="column nova-contact-info-icon">';
        $output .= '<i class="fa nova-contact-info-location-icon"></i>';
        $output .= '</div>';
        $output .= '<div class="column nova-contact-info-content">';
        
        $line_num = 1;
        foreach ($location as $line) {
            $output .= $line;
            $output .= ($line_num < $total_lines_num ? '<br />' : '');
            $line_num++;
        }
        
        $output .= '</div>';
        $output .= '</div>';
    }
    
    if (!empty($a['phone'])) {
        $output .= '<div class="row">';
        $output .= '<div class="column nova-contact-info-icon">';
        $output .= '<i class="fa nova-contact-info-phone-icon"></i>';
        $output .= '</div>';
        $output .= '<div class="column nova-contact-info-content">';
        $output .= $a['phone'];
        $output .= '</div>';
        $output .= '</div>';
    }
    
    if (!empty($a['email']) || !empty($a['email2'])) {
        $output .= '<div class="row">';
        $output .= '<div class="column nova-contact-info-icon">';
        $output .= '<i class="fa nova-contact-info-email-icon"></i>';
        $output .= '</div>';
        $output .= '<div class="column nova-contact-info-content">';
        
        if (!empty($a['email'])) {
            $output .= '<a href="mailto:' . $a['email'] . '">' . $a['email'] . '</a>';
            
            if (!empty($a['email2'])) {
                $output .= ' / ';
            }
        }
        
        if (!empty($a['email2'])) {
            $output .= '<a href="mailto:' . $a['email2'] . '">' . $a['email2'] . '</a>';
        }
        
        $output .= '</div>';
        $output .= '</div>';
    }
    
    $output .= '</div>';
    
    return $output;
}
add_shortcode('nova_contact_info', 'nova_contact_info_shortcode');

// Add NOVA contact info shortcode button to WYSIWYG editor
function add_nova_btns() {
    if (!current_user_can('edit_posts') && !current_user_can('edit_pages'))
        return;
    if (get_user_option('rich_editing') == 'true') {
        add_filter('mce_external_plugins', 'add_nova_custom_tinymce_js');
        add_filter('mce_buttons', 'register_nova_btns');
    }
}
add_action('init', 'add_nova_btns');

function register_nova_btns($buttons) {
    array_push($buttons, "|", "novabutton");
    array_push($buttons, "|", "novacontactinfo");
    return $buttons;
}

function add_nova_custom_tinymce_js($plugin_array) {
    $plugin_array['novabutton'] = get_template_directory_uri() . '/nova-core2/js/nova-core-custom-tinymce.js';
    $plugin_array['novacontactinfo'] = get_template_directory_uri() . '/nova-core2/js/nova-core-custom-tinymce.js';
    return $plugin_array;
}

function my_refresh_mce($ver) {
    $ver += 3;
    return $ver;
}
add_filter('tiny_mce_version', 'my_refresh_mce');

// Add hidden forms for WYSIWYG shortcode buttons
function admin_init_shortcode_forms() {
    add_meta_box('nova_shortcode_forms', 'Nova Shortcode Forms', 'meta_options_shortcode_forms', 'page', 'normal', 'low');
    add_meta_box('nova_shortcode_forms', 'Nova Shortcode Forms', 'meta_options_shortcode_forms', 'post', 'normal', 'low');
}
add_action('admin_init', 'admin_init_shortcode_forms');

function meta_options_shortcode_forms() { ?>
    <div id="nova-insert-button-shortcode-area" class="nova-pop-up-area">
        <div class="nova-insert-shortcode-inner">
            <h4>Insert Button Shortcode</h4>
            <form>
                <p>
                    Color<br />
                    <select id="nova-insert-button-color" name="nova-button-color">
                        <option value="white">White</option>
                        <option value="black">Black</option>
                        <option value="primary-color" selected>Primary Color</option>
                        <option value="secondary-color">Secondary Color</option>
                        <option value="transparent">Transparent</option>
                    </select>
                </p>
                <p>
                    Text<br />
                    <input id="nova-insert-button-text" name="nova-insert-button-text" type="text" />
                </p>
                <p>
                    Link<br />
                    <input id="nova-insert-button-link" name="nova-insert-button-link" placeholder="http://" type="text" />
                </p>
                <p>
                    <input id="nova-insert-button-icon" name="nova-insert-button-icon" type="checkbox" /> Include Icon
                </p>
                <p>
                    <input id="nova-insert-button-new-tab" name="nova-insert-button-new-tab" type="checkbox" /> Open link in new tab
                </p>
                <a class="button" id="nova-insert-button-submit" href="#">Insert Shortcode</a>
                <a class="button" id="nova-insert-button-cancel" href="#">Cancel</a>
            </form>
        </div>
    </div>
    
    <div id="nova-insert-contact-info-shortcode-area" class="nova-pop-up-area">
        <div class="nova-insert-shortcode-inner">
            <h4>Insert Contact Info Shortcode</h4>
            <form>
                <?php
                $contactInfoFields = array(
                    'location-name'             => 'Location Name',
                    'location-address'          => 'Address',
                    'location-address2'         => 'Address 2',
                    'location-city-state-zip'   => 'City, State, ZIP Code',
                    'phone'                     => 'Phone Number',
                    'email'                     => 'Email Address',
                    'email2'                    => 'Email Address 2'
                );
                    
                foreach($contactInfoFields as $field_id => $nice_name) :
                ?>
                <p>
                    <?php echo $nice_name; ?><br />
                    <input id="nova-insert-contact-info-<?php echo $field_id; ?>" name="nova-insert-contact-info-<?php echo $field_id; ?>" type="text" />
                </p>
                <?php endforeach; ?>
                
                <a class="button" id="nova-insert-contact-info-submit" href="#">Insert Shortcode</a>
                <a class="button" id="nova-insert-contact-info-cancel" href="#">Cancel</a>
            </form>
        </div>
    </div>
    <?php
}
?>