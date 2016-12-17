<?php

/*
 * NOVA
 * Custom style colors using admin options
 *
 * The CSS here is converted into /css/custom.css by functions.php if the sheet
 * does not exist yet, and then is updated every time the user updates the
 * theme settings (see /nova-theme/nova_settings.php).
 */

global $nova_default_colors;
$colors = get_option('nova_colors', $nova_default_colors);

$nav = get_option('nova_nav');
$footer = get_option('nova_footer');
?>
/* Text */

h1, h2, h3, h4, h5, h6, th,
.dark-text-color-scheme h1,
.dark-text-color-scheme h2,
.dark-text-color-scheme h3,
.dark-text-color-scheme h4,
.dark-text-color-scheme h5,
.dark-text-color-scheme h6,
.dark-text-color-scheme th {
    color: <?php echo $colors['headline_dark']; ?>;
}

body, p, li, td,
.dark-text-color-scheme,
.dark-text-color-scheme p,
.dark-text-color-scheme li,
.dark-text-color-scheme td {
    color: <?php echo $colors['text_dark']; ?>;
}

.light-text-color-scheme h1,
.light-text-color-scheme h2,
.light-text-color-scheme h3,
.light-text-color-scheme h4,
.light-text-color-scheme h5,
.light-text-color-scheme h6,
.light-text-color-scheme th {
    color: <?php echo $colors['headline_light']; ?>;
}

.light-text-color-scheme,
.light-text-color-scheme p,
.light-text-color-scheme li,
.light-text-color-scheme td {
    color: <?php echo $colors['text_light']; ?>;
}

/* Section Backgrounds */

.primary-color-background {
    background-color: <?php echo $colors['primary']; ?>;
}

.secondary-color-background {
    background-color: <?php echo $colors['secondary']; ?>;
}

/* Links */

a {
    color: <?php echo $colors['primary']; ?>;
}

/* Navigation Bar */
<?php
$nav_secondary_color = $colors['primary'];

if (!empty($nav['background_color'])) {
    if ($nav['background_color'] == 'secondary-color-background') {
        $nav_primary_color = $colors['secondary'];
        $nav_text_color = $colors['text_light'];
    } elseif ($nav['background_color'] == 'gray-background') {
        $nav_primary_color = '#eee';
        $nav_text_color = $colors['primary'];
    } elseif ($nav['background_color'] == 'white-background') {
        $nav_primary_color = '#fff';
        $nav_text_color = $colors['primary'];
    } else {
        $nav_primary_color = $colors['primary'];
        $nav_secondary_color = $colors['secondary'];
        $nav_text_color = $colors['text_light'];
    }
} else {
    $nav_primary_color = $colors['primary'];
    $nav_secondary_color = $colors['secondary'];
    $nav_text_color = $colors['text_light'];
}
?>

#nav {
    background-color: <?php echo $nav_primary_color; ?>;
    background-color: rgba(<?php echo hex2rgb($nav_primary_color); ?>, 0.9);
}

#nav a {
    color: <?php echo $nav_text_color; ?>;
}


<?php if ($nav_primary_color == '#fff' || $nav_primary_color == '#eee') : ?>


#dl-menu.dl-menuwrapper li a {
    color: <?php echo $colors['text_light']; ?>;
}

#dl-menu.dl-menuwrapper li a:hover,
#dl-menu.dl-menuwrapper li a:active {
    color: <?php echo $colors['primary']; ?>;
}
<?php endif; ?>

#dl-menu.dl-menuwrapper button:active,
#dl-menu.dl-menuwrapper li a:hover,
#dl-menu.dl-menuwrapper li a:active {
    background: <?php echo $nav_primary_color; ?>;
}

/* Footer */
<?php
if (!empty($footer['background_color'])) {
    if ($footer['background_color'] == 'secondary-color-background') {
        $footer_primary_color = $colors['secondary'];
        $footer_text_color = $colors['text_light'];
    } elseif ($footer['background_color'] == 'gray-background') {
        $footer_primary_color = '#eee';
        $footer_text_color = $colors['text_dark'];
    } elseif ($footer['background_color'] == 'white-background') {
        $footer_primary_color = '#fff';
        $footer_text_color = $colors['text_dark'];
    } else {
        $footer_primary_color = $colors['primary'];
        $footer_text_color = $colors['text_light'];
    }
} else {
    $footer_primary_color = $colors['primary'];
    $footer_text_color = $colors['text_light'];
}
?>

#footer {
    background-color: <?php echo $footer_primary_color; ?>
}

#footer, #footer h1, #footer h2, #footer h3, #footer h4, #footer h5, #footer h6, #footer p, #footer li, #footer th, #footer td, #footer a {
    color: <?php echo $footer_text_color; ?>
}

/* Sections */

.owl-theme .owl-controls .owl-page.active span,
.owl-theme .owl-controls.clickable .owl-page:hover span {
    background-color: <?php echo $colors['secondary']; ?>;
}

.nova-header .nova-header-text-background-primary-color {
<?php
    $text_background_primary_color = 'rgba(' . hex2rgb($colors['primary']) . ', 0.8)';
    $text_background_primary_color_shadow = '10px 0 0 ' . $text_background_primary_color . ', -10px 0 0 ' . $text_background_primary_color;
?>
    background-color:   <?php echo $text_background_primary_color; ?>;
    -webkit-box-shadow: <?php echo $text_background_primary_color_shadow; ?>;
    -moz-box-shadow:    <?php echo $text_background_primary_color_shadow; ?>;
    box-shadow:         <?php echo $text_background_primary_color_shadow; ?>;
}

.nova-header .nova-header-text-background-secondary-color {
<?php
    $text_background_secondary_color = 'rgba(' . hex2rgb($colors['secondary']) . ', 0.75)';
    $text_background_secondary_color_shadow = '10px 0 0 ' . $text_background_secondary_color . ', -10px 0 0 ' . $text_background_secondary_color;
?>
    background-color:   <?php echo $text_background_secondary_color; ?>;
    -webkit-box-shadow: <?php echo $text_background_secondary_color_shadow; ?>;
    -moz-box-shadow:    <?php echo $text_background_secondary_color_shadow; ?>;
    box-shadow:         <?php echo $text_background_secondary_color_shadow; ?>;
}

.nova-header .nova-header-text-primary-color {
    color: <?php echo $colors['primary']; ?>;
}

.nova-header .nova-header-text-secondary-color {
    color: <?php echo $colors['secondary']; ?>;
}

.nova-accordions .column-inner > h5:first-child:hover .fa {
    color: <?php echo $colors['secondary']; ?>;
}

.nova-features .column-inner > i:first-child, .nova-accordions .column-inner > h5:first-child i {
    color: <?php echo $colors['primary']; ?>;
}

/* Buttons */

.nova-button,
input[type='button'],
input[type='submit'],
.nova-button.nova-button-secondary-color:hover,
.secondary-color-background .nova-button.nova-button-white:hover,
.secondary-color-background .nova-button.nova-button-secondary-color,
.categories .cat-item a,
.commentlist .comment-reply-link,
#pagination a:hover {
    background-color: <?php echo $colors['primary']; ?>;
    border-color: <?php echo $colors['primary']; ?>;
    color: #fff;
}

.white-background .nova-button.nova-button-white,
#pagination a {
    border-color: <?php echo $colors['primary']; ?>;
    color: <?php echo $colors['primary']; ?>;
}

.nova-button.nova-button-white,
.primary-color-background .nova-button.nova-button-white {
    color: <?php echo $colors['primary']; ?>;
}

.white-background .nova-button.nova-button-transparent {
    border-color: <?php echo $colors['secondary']; ?>;
    color: <?php echo $colors['secondary']; ?>;
}

.nova-button:hover,
.nova-button.nova-button-white:hover,
.nova-button.nova-button-transparent:hover,
input[type='button']:hover,
input[type='submit']:hover,
.nova-button.nova-button-secondary-color,
.primary-color-background .nova-button,
.primary-color-background input[type='button'],
.primary-color-background input[type='submit'],
.primary-color-background .nova-button.nova-button-white:hover,
.categories .cat-item a:hover,
.commentlist .comment-reply-link:hover {
    background-color: <?php echo $colors['secondary']; ?>;
    border-color: <?php echo $colors['secondary']; ?>;
    color: #fff;
}

.primary-color-background .nova-button:hover,
.primary-color-background input[type='button']:hover,
.primary-color-background input[type='submit']:hover,
.secondary-color-background .nova-button:hover,
.secondary-color-background input[type='button']:hover ,
.secondary-color-background input[type='submit']:hover {
    background-color: #fff;
    border-color: #fff;
    color: <?php echo $colors['primary']; ?>;
}

/* Blog */

.nova-loop, .single-post-content, .single-post-content.comments-open, #pagination {
    border-color: <?php echo $colors['primary']; ?>;
}

/* Contact Form 7 */

.wpcf7-form div.wpcf7-response-output.wpcf7-mail-sent-ok {
    background-color: <?php echo $colors['primary']; ?>;
    background-color: rgba(<?php echo hex2rgb($colors['primary']); ?>, 0.5);
}

.primary-color-background .wpcf7-form div.wpcf7-response-output.wpcf7-mail-sent-ok {
    background-color: <?php echo $colors['secondary']; ?>;
    background-color: rgba(<?php echo hex2rgb($colors['secondary']); ?>, 0.5);
}