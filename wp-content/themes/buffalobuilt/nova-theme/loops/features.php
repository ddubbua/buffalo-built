<?php
$link_target = (!empty($nova_column['open_link_in_new_tab']) ? ' target="_blank"' : false);
$background_image = (!empty($nova_column['background_image']) ? ' style="background-image: url(' . wp_get_attachment_url($nova_column['background_image'], 'large') . ');"' : '');

if ($nova_options['size'] == 'large') {
    $span_classes = 'xs-span12 sm-span4';
}
else if ($nova_options['size'] == 'medium') {
    $span_classes = 'xs-span12 sm-span4';
}
else if ($nova_options['size'] == 'small') {
    $span_classes = 'xs-span12 sm-span3';
}
?>
<div class="column <?php echo $span_classes; ?> nova-feature-size-<?php echo $nova_options['size']; ?><?php if ($nova_options['size'] == 'large' && !empty($nova_column['background_image'])) : ?> feature-photo <?php endif;?><?php echo $nova_column['align']; ?>">
        <?php if (!empty($nova_column['headline'])) : ?>
			<div class="nova-area <?php echo 'background-'. $c; echo (!empty($nova_column['link']) ? ' has-link' : ''); ?>" <?php echo $background_image;?>>
        		<div class="nova-feature-column-content">
            		<h3><?php echo $nova_column['headline']; ?>
            			<?php if ($nova_options['size'] == 'large' && !empty($nova_column['background_image'])) : ?> 						
							<i class="fa fa-angle-right" aria-hidden="true"></i>
						<?php endif;  ?>
					</h3>
        			<div class="active-line<?php echo ' background-'. $c; ?>">
						<?php if ($nova_options['size'] == 'medium') : ?><i class="fa fa-angle-down" aria-hidden="true"></i><?php endif;  ?>
					</div>
					<?php echo $nova_column['content'] ?>
        		</div>
		        <?php if (!empty($nova_column['link'])) : ?>
		        <a class="nova-full-cover-link" id="link-<?php echo strtolower(preg_replace('/[^A-Za-z0-9]/', '', $nova_column['headline'])); ?>" href="<?php echo $nova_column['link']; ?>"<?php echo $link_target; ?>></a>
		        <?php endif;  ?>
    		</div>
		<?php else: ?>
	    <?php echo apply_filters('the_content', $nova_column['description']); ?>
		<?php endif;  ?>
</div>