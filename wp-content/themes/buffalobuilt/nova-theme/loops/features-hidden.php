<?php
$nova_column['link'] = '#';
include(locate_template('/nova-theme/loops/features.php'));
?>
<div class="column xs-span12 nova-hidden-content">
    <div class="nova-area">
        <a class="nova-hidden-content-close" href="#"><img src="<?php echo get_template_directory_uri(); ?>/images/X_icon.png"></a>
        	<div class="column-inner">
            <?php echo apply_filters('the_content', $nova_column['hidden_content']); ?>        
            </div>
    </div>
</div>