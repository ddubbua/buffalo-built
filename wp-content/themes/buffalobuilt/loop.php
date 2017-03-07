<div id="post-<?php the_ID(); ?>" <?php post_class('nova-loop'); ?>>
    <h2><a href="<?php echo get_the_permalink($post->ID);?>"><?php the_title(); ?></a></h2>

    <?php if (get_post_type($post) == 'post') : ?>
    <h5><?php the_time('F j, Y'); ?></h5>
    <?php endif; ?>

    <?php
    if (has_post_thumbnail()) {
        $args = array(
            'class' => 'alignright'
        );
        the_post_thumbnail('small', $args);
    }
    ?>

    <?php the_excerpt(); ?>
    <p><a class="nova-button nova-button-secondary-color" href="<?php echo get_the_permalink($post->ID); ?>">Read More</a></p>
</div>