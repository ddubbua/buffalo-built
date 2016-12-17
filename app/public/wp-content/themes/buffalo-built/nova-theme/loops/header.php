<div class="header-content <?php echo $nova_column['background_color']; ?> align-text-<?php echo $nova_column['align_text']; ?>"<?php echo (!empty($nova_column['background_image']) ? ' style="background-image: url(' . wp_get_attachment_url($nova_column['background_image']) . ');"' : ''); ?>>
    <?php if (!empty($nova_column['overlay'])) : ?>
    <div class="<?php echo $nova_column['background_color']; ?> nova-background-overlay"></div>
    <?php endif; ?>
    
    <?php if (!empty($nova_column['headline']) || !empty($nova_column['tagline']) || !empty($nova_column['content'])) : ?>
    <div class="header-content-inner">
        <?php if (!empty($nova_column['headline'])) : ?>
        <h1><span class="<?php echo $nova_column['headline_background_color'] . ' ' . $nova_column['headline_color']; ?>"><?php echo $nova_column['headline']; ?></span></h1>
        <?php endif; ?>
        
        <?php if (!empty($nova_column['tagline'])) : ?>
        <h2><span class="<?php echo $nova_column['tagline_background_color'] . ' ' . $nova_column['tagline_color']; ?>"><?php echo $nova_column['tagline']; ?></span></h2>
        <?php endif; ?>
        
        <?php if (!empty($nova_column['content'])) : ?>
        <div class="header-content-inner-content">
            <?php echo apply_filters('the_content', $nova_column['content']); ?>
        </div>
        <?php endif; ?>
    </div>
    <?php endif; ?>
</div>