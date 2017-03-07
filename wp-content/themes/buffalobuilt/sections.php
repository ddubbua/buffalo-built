<?php

global $nova_sections;

$page_sections = get_post_meta($post->ID, 'nova_page_sections', true);

if (!empty($page_sections)) :
    $s = 0;
    
    foreach ($page_sections as $page_section) :
        $nova_options = $page_section['options'];
        $nova_columns = $page_section['columns'];
        $nova_columns_num = count($nova_columns);
        $nova_section_type = $page_section['type'];
        if ($nova_section_type == 'team-members') {
            $team_categories = arlington_team_categories();
            
            foreach ($team_categories as $title => $value) {
                $category_slug = preg_replace('/_/', '-', $value);
                
                $nova_columns[$value] = array(
                    'title'         => $title,
                    'category_slug' => $category_slug,
                    'team_members'  => array()
                );
            }
            
            $args = array(
                'order'             => 'ASC',
                'orderby'           => 'menu_order',
                'post_type'         => 'team',
                'posts_per_page'    => -1
            );
            $team_members = get_posts($args);
        
            foreach ($team_members as $member) {
                $team_meta = get_post_meta($member->ID, 'arlington_team', true);
                $team_member_title = get_post_meta($member->ID, 'arlington_team_member_title', true);
                
                $nova_columns[$team_meta['category']]['team_members'][] = array(
                    
                    'name'      => get_the_title($member->ID),
                    'title'     => $team_member_title,
                    'category'  => $team_meta['category'],
                    'image'     => get_post_thumbnail_id($member->ID),
                    'link'      => get_permalink($member->ID),
                    'order'     => $member->menu_order
                );
            }
            
            $nova_columns_num = count($nova_columns);
        }
        $main_content = (!empty($nova_options['main_content']) ? $nova_options['main_content'] : false);
    
        $background_color = (!empty($nova_options['background_color']) ? ' ' . $nova_options['background_color'] : '');
        $background_image = (!empty($nova_options['background_image']) ? ' ' . wp_get_attachment_url($nova_options['background_image']) : false);
        $text_color_scheme = (!empty($nova_options['text_color_scheme']) ? ' ' . $nova_options['text_color_scheme'] : '');
        $padding_top = (!empty($nova_options['padding_top']) ? ' ' . $nova_options['padding_top'] . '-padding-top' : '');
        $padding_bottom = (!empty($nova_options['padding_bottom']) ? ' ' . $nova_options['padding_bottom'] . '-padding-bottom' : '');
        $border_images = (!empty($nova_options['border_image']) ? ' ' . $nova_options['border_image'] : '');
        
        if (!empty($nova_options['background_attachment'])) { 
            if ($nova_options['background_attachment'] == 'background-fixed') {
                $bg_attachment = ' background-fixed';
                $bg_parallax = '';
            } if ($nova_options['background_attachment'] == 'background-parallax') {
                $bg_attachment = ' background-fixed';
                $bg_parallax = ' data-bottom-top="background-position: 50% 100px;"
                    data-top-bottom="background-position: 50% -100px;"';
            } if ($nova_options['background_attachment'] == 'background-scroll') {
                $bg_attachment = '';
                $bg_parallax = '';
            } 
        }
        
    
        $section_classes = $nova_section_type . $background_color . $text_color_scheme . $padding_top . $padding_bottom;
        
        $section_id = (!empty($nova_options['headline']) ? to_slug($nova_options['headline']) : 'section-' . ($s + 1));
        ?>
    
<section id="<?php echo $section_id; ?>" class="nova-<?php echo $section_classes; ?><?php echo $bg_attachment; ?>"<?php echo ($background_image ? ' style="background-image: url(' . $background_image . ');"' : ''); ?><?php echo $bg_parallax; ?>>
    <?php echo (!empty($nova_options['overlay']) ? '<div class="nova-background-overlay ' . $background_color . '"></div>' : ''); ?>
    <?php echo (!empty($nova_options['border_image']) ? '<div class="nova-border-image ' . $border_images . '"></div>' : ''); ?>
        
    <?php if (!empty($nova_options['headline'])) : ?>
    <div class="row nova-section-headline">
        <div class="column xs-span12">
            <div class="column-inner">
                <h2><?php echo $nova_options['headline']; ?></h2>
            </div>
        </div>
    </div>
    <?php endif; ?>

    <?php if (!empty($main_content)) : ?>
    <div class="row nova-main-content">
        <div class="column xs-span12">
            <div class="column-inner">
                <?php echo apply_filters('the_content', $main_content); ?>
            </div>
        </div>
    </div>
    <?php endif; ?>
    
    <?php if (!empty($nova_columns)) : ?>
    <div class="row nova-<?php echo $nova_section_type; ?>-content <?php echo (!empty($nova_options['scroll']) ? 'scroll' : ''); ?>">
        <?php
        $c = 0;
        $loop_file = 'nova-theme/loops/' . $nova_section_type . '.php';
        
        foreach($nova_columns as $nova_column) {
            include(locate_template($loop_file));
            $c++;
        }
        if ($nova_section_type == 'features-hidden') {
            echo '<div class="column xs-span12 nova-hidden-content-container"></div>';
        }
        ?>
        <?php echo (!empty($nova_options['scroll']) ? '<a href="#strongwelcome-to-buffalo-built-design-costrong"><div class="nova-scroll ' . $nova_options['scroll'] . '"><p>ROAM</p></div></a>' : ''); ?>
        <?php echo (!empty($nova_options['side_button']) ? '<a href="contact/" class="nova-button side-button">Contact Us</a>' : ''); ?>
    </div>
    <?php endif; ?>
</section>
        <?php
        if ($nova_section_type == 'header' && $nova_columns_num > 1) :
            $owl_autoplay = (!empty($nova_options['speed']) ? $nova_options['speed'] : '10000');
            $owl_navigation = (!empty($nova_options['hide_arrows']) ? 'false' : 'true');
            $owl_pagination = (!empty($nova_options['hide_pagination']) ? 'false' : 'true');
            ?>
            <script id="<?php echo $section_id; ?>-carousel-script">
            jQuery('#<?php echo $section_id; ?> .nova-header-content').owlCarousel({
                items: 1,
                singleItem: true,
                autoPlay: <?php echo $owl_autoplay; ?>,
                navigation: <?php echo $owl_navigation; ?>,
                navigationText: ['<div class="arrow-left"></div>', '<div class="arrow-right"></div>'],
                pagination: <?php echo $owl_pagination; ?>,
                transitionStyle: 'fade'
            });
            jQuery('#<?php echo $section_id; ?>-carousel-script').remove();
            </script>
        <?php
        endif;
        
        $s++;
    endforeach;
endif;

?>