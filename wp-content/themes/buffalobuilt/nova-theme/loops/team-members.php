<?php if (!empty($nova_column['team_members'])) : ?>

<div id="<?php echo $nova_column['category_slug']; ?>-team" class="nova-team-group">
    <?php if (!empty($nova_column['title'])) : ?><h2 class="linetitle"><?php echo $nova_column['title']; ?></h2><?php endif; ?>
    <?php
    usort($nova_column['team_members'], function($a, $b) {
        return $a['order'] - $b['order'];
    });
    
    foreach ($nova_column['team_members'] as $team_member) : ?>
    <div class="nova-team-member">
        <?php
        $image_url = '';
        if (!empty($team_member['image'])) {
            $image_url = wp_get_attachment_url($team_member['image']);
        }
        ?>
        <div class="nova-team-member-picture" style="background-image: url(<?php echo $image_url; ?>);">
            <a class="nova-full-cover-link" href="<?php echo $team_member['link']; ?>"></a>
            <div class="nova-team-member-content">
            <?php if (!empty($team_member['name'])) : ?>
            <h5><?php echo $team_member['name']; ?></h5>
            <?php endif; ?>

            <?php if (!empty($team_member['title'])) : ?>
            <h6><?php echo $team_member['title']; ?></h6>
            <?php endif; ?>
            </div>
        </div>
    </div>
    <?php endforeach; ?>
</div>
<?php endif; ?>