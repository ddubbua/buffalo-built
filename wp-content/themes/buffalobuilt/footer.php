<?php
$footer = get_option('nova_footer');
$footer_left = stripslashes_deep($footer['footer_left']);
$footer_right = stripslashes_deep($footer['footer_right']);
$footer_disclaimer = stripslashes_deep($footer['disclaimer']);
?>
    <footer id="footer">
        <div class="footer-top">
        <div class="ahead"></div>
        <a class="back-top" href="#"></a>
            <div class="row">
                <?php if ($footer_left) : ?>
                <div id="footer-left" class="column xs-span12">
					<div class="column-inner">
                        <?php echo do_shortcode(apply_filters('like_the_content', $footer_left)); ?>
					</div>
                </div>
                <?php endif; ?>
			</div>
		</div>
        	
		<div class="footer-bottom">
           
            <div class="row">
                <div class="column xs-span12 disclaimer-content">
					<div class="column-inner">
                        <?php echo apply_filters('like_the_content', $footer_disclaimer); ?>
					</div>
                </div>
			</div>
        </div>
    </footer>
	<?php if (is_front_page()): ?>
	</div>
	<?php endif; ?>
	<?php wp_footer(); ?>
    <script type="text/javascript">
    if(!(/Android|iPhone|iPad|iPod|BlackBerry|Windows Phone/i).test(navigator.userAgent || navigator.vendor || window.opera)){
        skrollr.init({ forceHeight: false });
    }
    </script>
	
</body>
</html>