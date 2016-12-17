<?php if ($nova_options['layout'] == 'columns') : ?>
<div class="column <?php echo span_classes($c, $nova_columns_num); ?> nova-team-member-column">
<?php else : ?>
<div class="column xs-span12 nova-team-member-row">
<div class="row">
<div class="column xs-span12 md-span3">
<?php endif; ?>

<div class="column-inner">

<?php
if (!empty($nova_column['image'])) {
    $image_args = array(
        'class' => 'nova-team-member-picture'
    );
    echo wp_get_attachment_image($nova_column['image'], 'full', false, $image_args);
}
?>

<?php if ($nova_options['layout'] == 'rows') : ?>
</div>
</div>
<?php endif; ?>

<div class="<?php echo ($nova_options['layout'] == 'rows' ? 'column xs-span12 md-span9 ' : ''); ?>nova-team-member-content">

<?php if ($nova_options['layout'] == 'rows') : ?>
<div class="column-inner">
<?php endif; ?>

<?php
if (!empty($nova_column['name'])) {
    $headline_tag = ($nova_options['layout'] == 'columns' ? 'h4' : 'h3');
    echo '<' . $headline_tag . '>' . $nova_column['name'] . '</' . $headline_tag . '>';
}

if (!empty($nova_column['title'])) {
    $title_tag = ($nova_options['layout'] == 'columns' ? 'h6' : 'h4');
    echo '<' . $title_tag . '>' . $nova_column['title'] . '</' . $title_tag . '>';
}

echo apply_filters('the_content', $nova_column['content']);
?>

<?php if (!empty($nova_column['phone']) || !empty($nova_column['email'])) : ?>
    <div class="nova-team-member-contact-info">
    
        <?php if (!empty($nova_column['phone'])) : ?>
        <p><i class="fa fa-phone"></i><?php echo $nova_column['phone']; ?></p>
        <?php endif; ?>
    
        <?php if (!empty($nova_column['email'])) : ?>
        <p><i class="fa fa-envelope-o"></i><a href="mailto:<?php echo $nova_column['email']; ?>"><?php echo $nova_column['email']; ?></a></p>
        <?php endif; ?>
    
    </div>
<?php endif; ?>

<?php
$social_media = array_filter(array(
    'facebook'      => $nova_column['facebook'],
    'twitter'       => $nova_column['twitter'],
    'linkedin'      => $nova_column['linkedin'],
    'google-plus'   => $nova_column['google-plus']
));

if (!empty($social_media)) : ?>
    <div class="nova-social-links">
        <?php foreach($social_media as $key => $value) : ?>
        <a href="<?php echo $value; ?>" target="_blank"><i class="fa fa-<?php echo $key; ?>-square"></i></a>
        <?php endforeach; ?>
    </div>
<?php endif; ?>

</div>

<?php if ($nova_options['layout'] == 'rows') : ?>
</div>
<?php endif; ?>

</div>
</div>