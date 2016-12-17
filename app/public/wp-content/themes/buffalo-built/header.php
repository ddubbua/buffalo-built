<?php
$logo_id = get_option('nova_website_logo');

$disable_smooth_scroll = get_option('nova_disable_smooth_scroll');
if (!empty($disable_smooth_scroll)) {
    $smooth_scroll_class = 'smooth-scroll-disabled';
} else {
    $smooth_scroll_class = 'smooth-scroll-enabled';
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
		<script src="https://use.typekit.net/ugd0vdp.js"></script>
		<script>try{Typekit.load({ async: true });}catch(e){}</script>
</head>
<?php $description = get_bloginfo( 'description', 'display' ); ?>
<body <?php body_class($smooth_scroll_class); ?>>
    <div id="loadgraphic"></div>
	<header class="row">
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><img src="http://advisoryprivate.flywheelsites.com/wp-content/uploads/2016/11/Artboard-1.png" alt="<?php bloginfo( 'name' ); ?>" title="<?php echo $description; ?>" style="margin:auto; display:block; width:600px"></a>
	</header>
	<?php if (has_nav_menu('primary')) : ?>
    <nav id="nav">
        <div class="row">
            <?php if ($logo_id) : ?>
            <div class="column xs-span8 sm-span6 md-span4 lg-span3">
                <a href="<?php echo get_site_url(); ?>">
                    <?php echo wp_get_attachment_image($logo_id, 'full'); ?>
                </a>
            </div>
            <?php endif; ?>
            <div class="column <?php echo ($logo_id ? 'xs-span4 sm-span6 md-span8 lg-span9' : 'xs-span12'); ?>">
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
                        'items_wrap'      => '<button class="dl-trigger">Open Menu</button><ul class="dl-menu">%3$s</ul>',
                        'depth'           => 0,
                        'walker'          => ''
                    );
                    wp_nav_menu($args);
                ?>
            </div>
        </div>
    </nav>
    <?php endif; ?>
	
	<h2 class="mobile-title"><?php 
                        if (is_front_page()) {
                            
                        } else {
                            wp_title('');
                        }
                         ?></h2>