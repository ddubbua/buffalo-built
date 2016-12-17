<?php

/*
 * NOVA
 * Page builder
 */

function nova_page_builder_admin_init() {
    add_meta_box('page_builder_options', 'Page Builder', 'nova_page_builder_meta_options', 'page', 'normal', 'high');
}

function nova_page_builder_meta_options() {
    global $post;
    global $nova_sections;
    
    // Use nonce for verification
    wp_nonce_field(plugin_basename( __FILE__ ), 'nova_page_sections_meta');
    
    $page_sections = get_post_meta($post->ID, 'nova_page_sections', true);
    $s = 0;
    
?>
    <div id="nova-page-section-options">
        <div class="nova-sections">
        <?php
        // Loops through $nova_sections to create each section's options
        if (!empty($page_sections)) {
            foreach ($page_sections as $page_section) {
                $nova_options = $page_section['options'];
                $nova_columns = (!empty($page_section['columns']) ? $page_section['columns'] : NULL);
                $nova_section_type = $page_section['type'];
                $nova_show = $page_section['show'];
            
                foreach ($nova_sections as $nova_section) {
                    if ($nova_section_type == $nova_section->get_group_name_slug()) {
                        echo $nova_section->admin_section_markup($s, $nova_options, $nova_columns, $nova_show);
                        $s++;
                    }
                }
            }
        }
        ?>
        </div>

        <div class="choose-section-area">
            <h2>Add Section</h2>
            
            <?php
            // Loops through the $nova_sections to create buttons
            foreach ($nova_sections as $nova_section) : ?>
            <a class="button nova-add-section-button nova-add-<?php echo $nova_section->get_group_name_slug(); ?>-button" href="#"><?php echo $nova_section->get_group_name(); ?></a>
            <?php endforeach; ?>
        </div>
        
        <input id="using-page-builder" name="using_page_builder" type="hidden" value="0" />
    </div>
    
    <div id="nova-text-editor-area" class="nova-pop-up-area">
        <?php wp_editor('', 'novacustomeditor'); ?>
        <div class="nova-pop-up-controls">
            <a class="button" href="#" id="nova-update-content">Update and Close <i class="fa fa-save"></i></a>
            <a class="button" href="#" id="nova-cancel-editor">Cancel <i class="fa fa-close"></i></a>
        </div>
    </div>
    
    <script>
        var $ = jQuery.noConflict();
        $(document).ready(function() {
            var $document = $(document),
                sectionCount = <?php echo $s ?>;
            
            // Add a section
            <?php foreach ($nova_sections as $nova_section) : ?>
            $document.on('click', '.nova-add-<?php echo $nova_section->get_group_name_slug(); ?>-button', function(e) {
                e.preventDefault();
                var $t = $(this);
                
                $('.nova-sections').append('<?php echo $nova_section->admin_section_markup('\'+sectionCount+\'') ?>');
                sectionCount++;
            });
            <?php endforeach; ?>
            
            // Add a column
            $document.on('click', '.nova-add-section', function(e) {
                e.preventDefault();
                
                var $t = $(this),
                    $thisSection = $t.parents('.nova-section'),
                    sectionType = $thisSection.find('.nova-section-type-field').val(),
                    $addedColumns = $thisSection.find('.added-columns'),
                    sectionCount = $thisSection.find('.nova-section-type-field').attr('name').match(/\[([0-9]+)\]/)[1],
                    columnCount = $addedColumns.children('.column').length;
                <?php
                $first_statement = true;
                
                foreach ($nova_sections as $nova_section) :
                    if ($nova_section->has_multiple()) : ?>
                        <?php echo ($first_statement == false ? ' else ' : '') ?>if (sectionType === '<?php echo $nova_section->get_group_name_slug(); ?>') {
                            $addedColumns.append('<?php echo $nova_section->admin_column_markup('\'+sectionCount+\'', '\'+columnCount+\''); ?>');
                            $('.color-field').wpColorPicker();
                        }
                    <?php
                        if ($first_statement == true) {
                            $first_statement = false;
                        }
                    endif;
                endforeach;
                ?>
                return false;
            });
        });
    </script>
<?php
}

function nova_page_builder_save_options() {
    global $post;
    
    if (!empty($post) && !empty($_POST['using_page_builder']) && $_POST['using_page_builder'] == 1) {
        $post_id = $post->ID;
        
        // Verify if this is an auto save routine. 
        // If it is our form has not been submitted, so we dont want to do anything
        if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
            return;
        }
    
        // Verify this came from the our screen and with proper authorization,
        // because save_post can be triggered at other times
        if (!isset($_POST['nova_page_sections_meta'])) {
            return;
        }

        if (!wp_verify_nonce($_POST['nova_page_sections_meta'], plugin_basename( __FILE__ ))) {
            return;
        }

        // Save the data
        update_post_meta($post_id, 'nova_page_sections', $_POST['nova_page_sections']);
        
        $page_sections = get_post_meta($post->ID, 'nova_page_sections', true);
        $content = '';
        
        foreach ($page_sections as $page_section) {
            $nova_options = $page_section['options'];
            $nova_columns = (!empty($page_section['columns']) ? $page_section['columns'] : NULL);

            $saveable_options = array(
                'title'         => array(
                    'h2' => (isset($nova_options['title']) ? $nova_options['title'] : false)
                ),
                'headline'      => array(
                    'h2' => (isset($nova_options['headline']) ? $nova_options['headline'] : false)
                ),
                'headline_bold'      => array(
                    'h2' => (isset($nova_options['headline_bold']) ? $nova_options['headline_bold'] : false)
                ),
                'tagline'       => array(
                    'h3' => (isset($nova_options['tagline']) ? $nova_options['tagline'] : false)
                ),
                'main_content'  => array(
                    ''   => (isset($nova_options['main_content']) ? $nova_options['main_content'] : false)
                )
            );
            
            foreach($saveable_options as $option) {
                foreach($option as $k => $v) {
                    if (!empty($v)) {
                        if ($k != '') {
                            $content .= '<' . $k . '>' . $v . '</' . $k . '>';
                        } else {
                            $content .= apply_filters('the_content', $v);
                        }
                    }
                }
            }
            
            if (!empty($nova_columns)) {
                foreach($nova_columns as $nova_column) {
                    $saveable_atts = array(
                        'headline'  => array(
                            'h4'    => (isset($nova_column['headline']) ? $nova_column['headline'] : false)
                        ),
                        'tagline'   => array(
                            'h5'    => (isset($nova_column['tagline']) ? $nova_column['tagline'] : false)
                        ),
                        'name'      => array(
                            'h4'    => (isset($nova_column['name']) ? $nova_column['name'] : false)
                        ),
                        'title'     => array(
                            'h6'    => (isset($nova_column['title']) ? $nova_column['title'] : false)
                        ),
                        'image'     => array(
                            'img'   => (isset($nova_column['image']) ? $nova_column['image'] : false)
                        ),
                        'content'   => array(
                            ''      => (isset($nova_column['content']) ? $nova_column['content'] : false)
                        ),
                        'hidden_content'   => array(
                            ''      => (isset($nova_column['hidden_content']) ? $nova_column['hidden_content'] : false)
                        ),
                        'phone'     => array(
                            'p'     => (isset($nova_column['phone']) ? $nova_column['phone'] : false)
                        )
                    );

                    foreach ($saveable_atts as $att) {
                        foreach ($att as $k => $v) {
                            if (!empty($v)) {
                                if ($k == 'img') {
                                    $content .= '<p><img src="' . $v . '" /></p>';
                                } else if ($k != '') {
                                    $content .= '<' . $k . '>' . $v . '</' . $k . '>';
                                } else {
                                    $content .= apply_filters('the_content', $v);
                                }
                            }
                        }
                    }

                    $saveable_links = array(
                        (isset($nova_column['button_text']) ? $nova_column['button_text'] : '') => (isset($nova_column['link']) ? $nova_column['link'] : false),
                        (isset($nova_column['email']) ? $nova_column['email'] : '') => (isset($nova_column['email']) ? $nova_column['email'] : false),
                        'facebook'                  => (isset($nova_column['facebook']) ? $nova_column['facebook'] : false),
                        'twitter'                   => (isset($nova_column['twitter']) ? $nova_column['twitter'] : false),
                        'linkedin'                  => (isset($nova_column['linkedin']) ? $nova_column['linkedin'] : false),
                        'google-plus'               => (isset($nova_column['google-plus']) ? $nova_column['google-plus'] : false)
                    );

                    foreach ($saveable_links as $text => $link) {
                        if (!empty($text) && !empty($link)) {
                            $content .= '<p><a href="' . $link . '">' . $text . '</a></p>';
                        }
                    }
                }
            }
        }

        if (!wp_is_post_revision($post_id)) {
            // unhook this function so it doesn't loop infinitely
            remove_action('save_post', 'nova_page_builder_save_options');

            // update the post, which calls save_post again
            $args = array(
                'ID'            => $post_id,
                'post_content'  => $content
            );
            wp_update_post($args);

            // re-hook this function
            add_action('save_post', 'nova_page_builder_save_options');
        }
    }
}

add_action('admin_init', 'nova_page_builder_admin_init');
add_action('save_post', 'nova_page_builder_save_options');

?>