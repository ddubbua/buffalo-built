<?php

/*
 * Template Name: Page Builder
 */

?>

<?php

if (have_posts()) {
    while (have_posts()) {
        the_post();
        get_header();
        ?>
        <main>
            <?php get_template_part('sections'); ?>
        </main>
        <?php
        get_footer();
    }
}

?>