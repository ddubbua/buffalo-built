<?php
/*
 * Gemini Theme
 * Single team member page
 */

$team_member_title = get_post_meta($post->ID, 'gemini_team_member_title', true);
$team_member_linkedin = get_post_meta($post->ID, 'gemini_team_member_linkedin', true);
$team_member_region = get_post_meta($post->ID, 'gemini_team_member_region', true);
$team_member_phone = get_post_meta($post->ID, 'gemini_team_member_phone', true);
$team_member_email = get_post_meta($post->ID, 'gemini_team_member_email', true);
$team_member_region_map = get_post_meta($post->ID, 'gemini_team_member_region_map', true);

?>

<?php get_header(); ?>
<main>
    <section>
        <div class="row">
            <div class="column xs-span12 lg-span8">
                <div class="column-inner">
                <?php
                if (have_posts()) {
                    while (have_posts()) {
                        the_post(); ?>
                        <h1><?php the_title(); ?></h1>
                        <h5><?php echo $team_member_title; ?></h5>
                        <hr class="bold-hr" />
                        <?php echo the_content(); ?>
                    </div>
                </div>
                    <div class="column xs-span12 lg-span4 gemini-team-member-right-column">
                        <div class="row">
                            <div class="column xs-span12 sm-span6 lg-span12<?php echo (empty($team_member_region_map) ? ' center' : ''); ?>">
                                <?php
                                $attr = array(
                                    'class' => 'gemini-team-member-image aligncenter'
                                );
                                the_post_thumbnail('large', $attr);
                                ?>
                                
                                <?php if (empty($team_member_region_map) && (!empty($team_member_phone) || !empty($team_member_email) || !empty($team_member_linkedin))) : ?>
                                    <?php if (!empty($team_member_phone) || !empty($team_member_email)) : ?>
                                        <h3>Contact <?php the_title(); ?>:</h3>
                                    
                                        <?php if (!empty($team_member_phone)) : ?>
                                        <h4><?php echo $team_member_phone; ?></h4>
                                        <?php endif; ?>
                                    
                                        <?php if (!empty($team_member_email)) : ?>
                                        <h4><a href="mailto:<?php echo $team_member_email; ?>"><?php echo $team_member_email; ?></a></h4>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                
                                    <?php if (!empty($team_member_linkedin)) : ?>
                                        <a class="gemini-button" href="<?php echo $team_member_linkedin; ?>" target="_blank">Visit LinkedIn Page</a>
                                    <?php endif; ?>
                                <?php endif; ?>
                            </div>
                            
                            <?php if (!empty($team_member_region_map)) : ?>
                            <div class="column xs-span12 sm-span6 lg-span12">
                                <?php if (!empty($team_member_region)) : ?>
                                <h3>Region: <?php echo $team_member_region; ?></h3>
                                <?php endif; ?>
                                
                                <img class="aligncenter gemini-team-member-region-map" src="<?php echo $team_member_region_map; ?>" alt="<?php echo $team_member_region; ?> Region Map" />
                                
                                <?php if (!empty($team_member_phone) || !empty($team_member_email)) : ?>
                                    <h3>Contact <?php the_title(); ?>:</h3>
                                    
                                    <?php if (!empty($team_member_phone)) : ?>
                                    <h2><?php echo $team_member_phone; ?></h2>
                                    <?php endif; ?>
                                    
                                    <?php if (!empty($team_member_email)) : ?>
                                    <h4><a href="mailto:<?php echo $team_member_email; ?>"><?php echo $team_member_email; ?></a></h4>
                                    <?php endif; ?>
                                <?php endif; ?>
                                
                                <?php if (!empty($team_member_linkedin)) : ?>
                                    <a class="gemini-button" href="<?php echo $team_member_linkedin; ?>" target="_blank">Visit LinkedIn Page</a>
                                <?php endif; ?>
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <?php
                    }
                }
            ?>
        </div>
    </section>
</main>
<?php get_footer(); ?>