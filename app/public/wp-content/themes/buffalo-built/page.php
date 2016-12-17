<?php

if (have_posts()) {
    while (have_posts()) {
        the_post();
        get_header();
        ?>
        <main>
            <section>
                <div class="row">
                    <div class="column xs-span12">
                        <div class="column-inner">
                            <?php the_content(); ?>
                        </div>
                    </div>
                </div>
            </section>
        </main>
        <?php
        get_footer();
    }
}
?>