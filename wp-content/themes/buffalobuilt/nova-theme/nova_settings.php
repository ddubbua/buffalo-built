<?php

/*
 * NOVA
 * Admin Settings
 */

function nova_settings_page() {
    add_menu_page('Theme Options', 'Theme Options', 'manage_options', 'nova_settings', 'nova_settings_page_content');
}
add_action('admin_menu', 'nova_settings_page');

function nova_settings_page_content() {
    global $nova_default_colors;
    wp_enqueue_media();
    wp_enqueue_style('wp-color-picker');
    wp_enqueue_script('wp-color-picker');
    
    if (!current_user_can('manage_options')) {
        wp_die('You do not have sufficient permissions to access this page.');
    }
    
    if(isset($_POST['update_settings']) && $_POST['update_settings'] == 'Y') {
        update_option('nova_website_logo', $_POST['nova_website_logo']);
        
        foreach ($_POST['nova_colors'] as $key => $value) {
            if (empty($value)) {
                $_POST['nova_colors'][$key] = $nova_default_colors[$key];
            }
        }
        update_option('nova_colors', $_POST['nova_colors']);
        
        update_option('nova_nav', $_POST['nova_nav']);
        update_option('nova_footer', $_POST['nova_footer']);
        update_option('nova_disable_smooth_scroll', $_POST['nova_disable_smooth_scroll']);
        
        // Create/modify custom stylesheet from user options
        ob_start();
        require(get_stylesheet_directory() . '/nova-theme/nova_custom_style.php');
        $css = ob_get_clean();
        file_put_contents(get_stylesheet_directory() . '/css/custom.css', $css, LOCK_EX);
        
        echo '<div id="nova_settings_saved" class="wrap"><h4>Options saved &mdash; ' . date_i18n('m/j/y h:i:s A') . '</h4></div>';
    }
    
    $logo = get_option('nova_website_logo');
    $colors = get_option('nova_colors', $nova_default_colors);
    $nav = get_option('nova_nav');
    $footer = get_option('nova_footer');
    $footer_content = stripslashes_deep($footer['content']);
    $disable_smooth_scroll = get_option('nova_disable_smooth_scroll');
    $footer_left = stripslashes_deep($footer['footer_left']);
    $footer_right = stripslashes_deep($footer['footer_right']);
    $footer_disclaimer = stripslashes_deep($footer['disclaimer']);
    
    ?>
    
    <div class="wrap">
        <h2>Theme Options</h2>
        <form name="nova_settings_form" method="post" action="">
            <input type="hidden" name="update_settings" value="Y" />
            
            <div class="nova_settings_form_section">
                <h3>Logo</h3>
                <p>
                    Add your logo. We recommend a PNG with a transparent background.<br />
                    <?php
                    if (!empty($logo)) {
                        echo wp_get_attachment_image($logo, 'large');
                    } else {
                        echo '<img src="" />';
                    }
                    ?><br />
                    <input name="nova_website_logo" type="hidden" value="<?php echo $logo; ?>" readonly />
                    <a href="#" class="nova_add_image_button button" data-editor="content" title="Add Image">Add Image</a> <a href="#" class="nova_remove_image_button button">Remove Image</a>
                </p>
            </div>
            
            <div class="nova_settings_form_section">
                <h2>Colors</h2>
                
                <div class="row">
                    <div class="column xs-span12 sm-span4">
                        <h3>General</h3>
                
                        <h5>Primary Color</h5>
                        <input type="text" name="nova_colors[primary]" value="<?php echo $colors['primary']; ?>" class="color-field" />
                
                        <h5>Secondary Color</h5>
                        <input type="text" name="nova_colors[secondary]" value="<?php echo $colors['secondary']; ?>" class="color-field" />
                        
                        <h5>Tertiary Color</h5>
                        <input type="text" name="nova_colors[tertiary]" value="<?php echo $colors['tertiary']; ?>" class="color-field" />
                    </div>
                    <div class="column xs-span12 sm-span4">
                        <h3>Dark Text Settings</h3>
                
                        <h5>Headline Color</h5>
                        <input type="text" name="nova_colors[headline_dark]" value="<?php echo $colors['headline_dark']; ?>" class="color-field" />
                
                        <h5>Body Text Color</h5>
                        <input type="text" name="nova_colors[text_dark]" value="<?php echo $colors['text_dark']; ?>" class="color-field" />

                        <p>These are the default text colors. These colors will also be used if you select the "Dark" text color scheme for a section.</p>
                    </div>
                    <div class="column xs-span12 sm-span4">
                        <h3>Light Text Settings</h3>
                
                        <h5>Headline Color</h5>
                        <input type="text" name="nova_colors[headline_light]" value="<?php echo $colors['headline_light']; ?>" class="color-field" />
                
                        <h5>Body Text Color</h5>
                        <input type="text" name="nova_colors[text_light]" value="<?php echo $colors['text_light']; ?>" class="color-field" />

                        <p>These colors will be used if you select the "Light" text color scheme for a section.</p>
                    </div>
                </div>
            </div>
            
            <div class="nova_settings_form_section">
                <h2>Navigation Bar</h2>
                
                <hr />
                
                <div class="row">
                    <div class="column xs-span12 sm-span6">
                        <h3>Background Color</h3>
                        <?php
                        $bg_colors = array(
                            'Primary Color'     => 'background-primary',
                            'Secondary Color'   => 'background-secondary',
                            'Tertiary Color'    => 'background-tertiary',
                            'White'             => 'background-white',
                            'Gray'              => 'background-gray'
                        );
                        ?>
                        <select name="nova_nav[background_color]">
                        <?php foreach ($bg_colors as $text => $value) : ?>
                            <option value="<?php echo $value; ?>"<?php echo (!empty($nav['background_color']) && $nav['background_color'] == $value ? ' selected' : ''); ?>>
                                <?php echo $text; ?>
                            </option>
                        <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="column xs-span12 sm-span6">
                        <h3>Link Color</h3>
                        <?php
                        $link_colors = array(
                            'Primary Color'     => 'text-primary',
                            'Secondary Color'   => 'text-secondary',
                            'Tertiary Color'    => 'text-tertiary',
                            'Light Text Color'  => 'text-light',
                            'Dark Text Color'   => 'text-dark'
                        );
                        ?>
                        <select name="nova_nav[link_color]">
                        <?php foreach ($link_colors as $text => $value) : ?>
                            <option value="<?php echo $value; ?>"<?php echo (!empty($nav['link_color']) && $nav['link_color'] == $value ? ' selected' : ''); ?>>
                                <?php echo $text; ?>
                            </option>
                        <?php endforeach; ?>
                        </select>
                    </div>
                </div>
            </div>
            
            <div class="nova_settings_form_section">
                <h2>Footer</h2>
                
                <hr />
                
                <div class="row">
                    <div class="column xs-span12 sm-span6">
                        <h3>Background Color</h3>
                        <?php
                        $bg_colors = array(
                            'Primary Color'     => 'primary-color-background',
                            'Secondary Color'   => 'secondary-color-background',
                            'White'             => 'white-background',
                            'Gray'              => 'gray-background'
                        );
                        ?>
                        <select name="nova_footer[background_color]">
                        <?php foreach ($bg_colors as $text => $value) : ?>
                            <option value="<?php echo $value; ?>"<?php echo (!empty($footer['background_color']) && $footer['background_color'] == $value ? ' selected' : ''); ?>>
                                <?php echo $text; ?>
                            </option>
                        <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                
                <hr />
                
                <div class="row">
                    <div class="column xs-span12">
                        <h3>Footer</h3>
                        <?php
                        $wp_editor_settings = array(
                            'textarea_name' => 'nova_footer[footer_left]',
                            'textarea_rows' => 10
                        );
                        wp_editor($footer_left, 'nova_footer_left', $wp_editor_settings);
                        ?>
                    </div>
                </div>     
                
                <hr />
                
                <div class="row">
                    <div class="column xs-span12">
                        <h3>Disclaimer</h3>
                        <?php
                        $wp_editor_settings = array(
                            'textarea_name' => 'nova_footer[disclaimer]',
                            'textarea_rows' => 10
                        );
                        wp_editor($footer_disclaimer, 'nova_footer_disclaimer', $wp_editor_settings);
                        ?>
                    </div>
                </div>
            </div>
            
            <div class="nova_settings_form_section">
                <h3>Miscellaneous Settings</h3>
                <input type="checkbox" name="nova_disable_smooth_scroll"<?php echo (!empty($disable_smooth_scroll) ? ' checked' : ''); ?>> Disable smooth scrolling
                <p>Checking this box will turn off the scrolling animation when a user clicks on a link that takes them to another part of the page.</p>
            </div>
            
            <p class="submit">
                <input type="submit" name="Submit" class="button-primary" value="<?php esc_attr_e('Save Changes') ?>" />
            </p>
        </form>
    </div>
    <?php
}
?>