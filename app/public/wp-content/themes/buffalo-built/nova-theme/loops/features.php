<?php
$link_target = (!empty($nova_column['open_link_in_new_tab']) ? ' target="_blank"' : '');

$span_classes = '';
if ($nova_options['layout'] == 'columns') {
    $span_classes = span_classes($c, $nova_columns_num) . ' icon-column';
} else {
    $span_classes = 'xs-span12 icon-row';
}

$icon_link_start = '';
$icon_link_end = '';
if (!empty($nova_column['link']) && !empty($nova_column['icon_link'])) {
    $icon_link_start = '<a class="nova-icon-link" href="' . $nova_column['link'] . '"' . $link_target . '>';
    $icon_link_end = '</a>';
}
?>
<div class="column <?php echo $span_classes; echo (!empty($nova_column['button_text']) ? ' has-button' : ''); ?>">
    <div class="column-inner">
        <?php echo $icon_link_start; ?><i class="nova-main-icon <?php echo $nova_column['icon']; ?>"></i><?php echo $icon_link_end; ?>
        <div class="nova-feature-column-content">
            <?php
            if (!empty($nova_column['headline'])) {
                $headline_tag = ($nova_options['layout'] == 'columns' ? 'h4' : 'h3');
                echo '<' . $headline_tag . '>' . $nova_column['headline'] . '</' . $headline_tag . '>';
            }
            ?>
            
            <?php echo apply_filters('the_content', $nova_column['content']); ?>
            
            <?php if (!empty($nova_column['button_text'])) : ?>
            <p><a class="nova-button" href="<?php echo $nova_column['link']; ?>"<?php echo $link_target; ?>><?php echo $nova_column['button_text']; ?></a></p>
            <?php endif; ?>
        </div>
    </div>
</div>