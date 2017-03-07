<?php
$background_image = (!empty($nova_column['background_image']) ? ' style="background-image: url(' . wp_get_attachment_url($nova_column['background_image'], 'large') . ');"' : '');

$span_classes = 'xs-span12';

if (!empty($nova_options['max_width']) && $nova_options['max_width'] == 3) {
    if ($nova_column['width'] == 3) {
        $span_classes .= ' md-span4';
    } else if ($nova_column['width'] == 6) {
        $span_classes .= ' md-span8';
    }
} else {
    if ($nova_column['width'] <= 3) {
        $span_classes .= ' sm-span' . $nova_column['width'] * 2;
    }

    if ($nova_column['width'] < 12) {
        $span_classes .= ' lg-span' . $nova_column['width'];
    }
}

$wistia_link = false;

if (!empty($nova_column['wistia']) && !empty($nova_column['link'])) {
    preg_match('/https?:\/\/(.+)?(wistia.com|wi.st)\/(medias|embed)\/([^?]+)/', $nova_column['link'], $matches);
    
    if (!empty($matches[4])) {
        $wistia_link = '<a href="//fast.wistia.net/embed/iframe/' . $matches[4] . '?popover=true" class="nova-full-cover-link wistia-popover[height=450,width=800]"></a><script charset="ISO-8859-1" src="//fast.wistia.com/assets/external/popover-v1.js"></script>';
    }
}
?>
<div class="column <?php echo $span_classes; ?> height-<?php echo $nova_column['height']; ?>">
    <div class="column-inner <?php echo $nova_column['background_color'] . (!empty($nova_column['link']) ? ' has-link' : ''); ?>"<?php echo $background_image; ?>>
        <?php if (!empty($background_image)) : ?>
        <div class="nova-background-overlay <?php echo $nova_column['background_color']; ?>"></div>
        <?php endif; ?>
        
        <?php if (!empty($nova_column['headline']) || !empty($nova_column['content'])) : ?>
        <div class="nova-box-content">
            <?php if (!empty($nova_column['headline'])) : ?>
            <h3><?php echo $nova_column['headline']; ?></h3>
            <?php endif; ?>
            
            <?php
            if (!empty($nova_column['headline']) && !empty($nova_column['content'])) {
                echo '<hr />';
            }
            
            if (!empty($nova_column['content'])) {
                echo apply_filters('the_content', $nova_column['content']);
            }
            ?>
        </div>
        <?php endif; ?>
        
        <?php
        if (!empty($nova_column['link'])) :
            if ($wistia_link) :
                echo $wistia_link;
            else : ?>
            <a class="nova-full-cover-link" href="<?php echo $nova_column['link']; ?>"<?php echo (!empty($nova_column['open_link_in_new_tab']) ? ' target="_blank"' : ''); ?>></a>
            <?php
            endif;
        endif;
        ?>
    </div>
    <?php
    if (current_user_can('manage_options') && !empty($nova_column['post_id'])) {
        echo '<a class="nova-edit-button" href="' . get_site_url() . '/wp-admin/post.php?post=' . $nova_column['post_id'] . '&action=edit"><i class="fa fa-pencil"></i> Edit</a>';
    }
    ?>
</div>