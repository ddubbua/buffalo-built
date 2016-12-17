<?php
$span_classes = 'xs-span12';

if ($nova_options['column_widths'] == '1-3_1-3_1-3') {
    $span_classes .= ' lg-span4';
} elseif (($nova_options['column_widths'] == '1-2_1-4_1-4' && $c == 0) ||
          ($nova_options['column_widths'] == '1-4_1-2_1-4' && $c == 1) ||
          ($nova_options['column_widths'] == '1-4_1-4_1-2' && $c == 2)) {
    $span_classes .= ' lg-span6';
} elseif (($nova_options['column_widths'] == '1-2_1-4_1-4' && $c == 1) ||
          ($nova_options['column_widths'] == '1-2_1-4_1-4' && $c == 2) ||
          ($nova_options['column_widths'] == '1-4_1-2_1-4' && $c == 0) ||
          ($nova_options['column_widths'] == '1-4_1-2_1-4' && $c == 2) ||
          ($nova_options['column_widths'] == '1-4_1-4_1-2' && $c == 0) ||
          ($nova_options['column_widths'] == '1-4_1-4_1-2' && $c == 1)) {
    $span_classes .= ' lg-span3';
}
?>
<div class="column <?php echo $span_classes; ?>">
    <div class="column-inner">
        <?php echo apply_filters('the_content', $nova_column['content']); ?>
    </div>
</div>