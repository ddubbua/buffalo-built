<?php
$footer = get_option('nova_footer');
$footer_content = stripslashes_deep($footer['content']);
?>
    
    <footer id="footer">
        <?php if ($footer_content) : ?>
            <div class="row">
                <div class="column xs-span12">
                    <div class="column-inner">
                        <?php echo apply_filters('like_the_content', $footer_content); ?>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </footer>
    <?php wp_footer(); ?>
</body>
</html>