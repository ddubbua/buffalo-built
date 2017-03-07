<?php
$logo_id = get_option('nova_website_logo');
$smooth_scroll_class = 'skrollr-body ';
$disable_smooth_scroll = get_option('nova_disable_smooth_scroll');
if (!empty($disable_smooth_scroll)) {
    $smooth_scroll_class .= 'smooth-scroll-disabled';
} else {
    $smooth_scroll_class .= 'smooth-scroll-enabled';
}
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <title><?php wp_title(''); ?></title>
    <meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <?php wp_head(); ?>
    <!--[if (gte IE 6)&(lte IE 8)]>
        <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/nova-core/js/lib/selectivizr.min.js"></script>
        <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/nova-core/js/lib/respond.min.js"></script>
    <![endif]-->
        <script src="https://use.typekit.net/ncr6vlt.js"></script>
        <script>try{Typekit.load({ async: true });}catch(e){}</script>
</head>
<body <?php body_class($smooth_scroll_class); ?>>
		<?php if (is_front_page()): ?>
		<div id="ip-container" class="ip-container">
			<!-- initial header -->
			<header id="ip-header" class="ip-header">
				<h1 class="ip-logo">
					<img src="<?php echo get_template_directory_uri(); ?>/images/bb.png" alt="Buffalo Built" />
				</h1>
				<div class="ip-loader">
					<svg class="ip-inner" width="60px" height="60px" viewBox="0 0 80 80">
						<path class="ip-loader-circlebg" d="M40,10C57.351,10,71,23.649,71,40.5S57.351,71,40.5,71 S10,57.351,10,40.5S23.649,10,40.5,10z"/>
						<path id="ip-loader-circle" class="ip-loader-circle" d="M40,10C57.351,10,71,23.649,71,40.5S57.351,71,40.5,71 S10,57.351,10,40.5S23.649,10,40.5,10z"/>
					</svg>
				</div>
			</header>
		<?php endif; ?>
     <?php if (has_nav_menu('primary')) : ?>
    <nav id="nav">
        <div class="row">
            <?php if ($logo_id) : ?>
            <div class="column xs-span8 sm-span6 md-span4 lg-span3 nav-logo">
                <a href="<?php echo get_site_url(); ?>">
                    <?php echo wp_get_attachment_image($logo_id, 'full'); ?>
                </a>
            </div>
            <?php endif; ?>
            <div class="column <?php echo ($logo_id ? 'xs-span12 sm-span12 md-span12 lg-span12 dl-menubox' : 'xs-span12'); ?>">
                <?php
                    $args = array(
                        'theme_location'  => 'primary',
                        'menu'            => '',
                        'container'       => 'div',
                        'container_id'    => 'nav-menu',
                        'before'          => '',
                        'after'           => '',
                        'link_before'     => '',
                        'link_after'      => '',
                        'items_wrap'      => '<ul id="%1$s">%3$s</ul>',
                        'depth'           => 0,
                        'walker'          => ''
                    );
                    wp_nav_menu($args);
                    
                    $args = array(
                        'theme_location'  => 'primary',
                        'menu'            => '',
                        'container'       => 'div',
                        'container_id'    => 'dl-menu',
                        'container_class' => 'dl-menuwrapper',
                        'before'          => '',
                        'after'           => '',
                        'link_before'     => '',
                        'link_after'      => '',
                        'items_wrap'      => '<div class="dl-trigger"><i class="fa fa-bars" aria-hidden="true"></i>
</div><ul class="dl-menu">%3$s</ul>',
                        'depth'           => 0,
                        'walker'          => ''
                    );
                    wp_nav_menu($args);
                ?>
            </div>
        </div>
    </nav>
    <?php endif; ?>
