<div class="column xs-span12">
    <div class="column-inner">
        <div class="row">
            <div class="column xs-span12 md-span6 lg-span9">
                <?php if (!empty($nova_column['headline'])) : ?>
                <h3><?php echo $nova_column['headline']; ?></h3>
                <?php endif; ?>
                <?php echo apply_filters('the_content', $nova_column['content']); ?>
            </div>
            <div class="column xs-span12 md-span6 lg-span3">
                <p><a class="nova-button" href="<?php echo $nova_column['link']; ?>"<?php echo (!empty($nova_column['open_link_in_new_tab']) ? ' target="_blank"' : ''); ?>><?php echo $nova_column['button_text']; ?></a></p>
            </div>
        </div>
    </div>
</div>