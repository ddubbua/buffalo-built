<?php
$span_classes = 'xs-span12';
$background_image = (!empty($nova_column['background_image']) ? ' ' . wp_get_attachment_url($nova_column['background_image']) : false);

if ($nova_options['column_widths'] == '1-2_1-2') {
    $span_classes .= ' lg-span6';
} elseif (($nova_options['column_widths'] == '1-3_2-3' && $c == 0) || ($nova_options['column_widths'] == '2-3_1-3' && $c == 1)) {
    $span_classes .= ' lg-span4';
} elseif (($nova_options['column_widths'] == '1-3_2-3' && $c == 1) || ($nova_options['column_widths'] == '2-3_1-3' && $c == 0)) {
    $span_classes .= ' lg-span8';
}
?>
<div class="column <?php echo $span_classes; ?>" <?php echo ($background_image ? ' style="background-image: url(' . $background_image . ');"' : ''); ?>>
    <div class="column-inner">
        <?php echo apply_filters('the_content', $nova_column['content']); ?>
    </div>
</div>