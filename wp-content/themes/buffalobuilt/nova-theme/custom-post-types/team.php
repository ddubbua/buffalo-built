<?php

/*
 * Team Custom Post Type
*/

// Register post type
function register_team() {
    register_post_type('team', array(
        'labels'            => array(
            'name' => __('Team Members'),
            'singular_name' => __('Team Member')
        ),
        'menu_icon'         => 'dashicons-smiley',
        'public'            => true,
        'show_ui'           => true,
        'supports'          => array(
            'title',
            'editor',
            'thumbnail',
            'page-attributes'
        )
    ));
}
add_action('init', 'register_team');

// Add custom fields
function admin_init_team() {
    add_meta_box('team_options', 'Team Member Options', 'meta_options_team', 'team', 'normal', 'low');
}

function meta_options_team() {
    global $post;
    
    $team_categories = arlington_team_categories();
    $team_member_title = get_post_meta($post->ID, 'arlington_team_member_title', true);
    $team_member_linkedin = get_post_meta($post->ID, 'arlington_team_member_linkedin', true);
    $team_member_phone = get_post_meta($post->ID, 'arlington_team_member_phone', true);
    $team_member_email = get_post_meta($post->ID, 'arlington_team_member_email', true);
    $old_title = get_post_meta($post->ID, 'arlington_team', true);

?>
<div class="row">
    <div class="column xs-span12 md-span6">
        <div class="column-inner">
    <p>
        Title<br />
        <input name="arlington_team_member_title" value="<?php echo $team_member_title; ?>" style="width: 90%;" />
    </p>
    </div>
    </div>
    <div class="column xs-span12 md-span6">
    <div class="column-inner">
    <p>
            LinkedIn Profile Link<br />
            <input name="arlington_team_member_linkedin" value="<?php echo $team_member_linkedin; ?>" placeholder="http://" style="width: 90%;" />
        </p>
    </p>
    </div>
    </div>
    <div class="column xs-span12 md-span6">
    <div class="column-inner">
    <p>
        Phone Number<br />
        <input name="arlington_team_member_phone" value="<?php echo $team_member_phone; ?>" style="width: 90%;" />
    </p>
    </div>
    </div>
    <div class="column xs-span12 md-span6">
    <div class="column-inner">
    <p>
        Email Address<br />
        <input name="arlington_team_member_email" value="<?php echo $team_member_email; ?>" style="width: 90%;" />
    </p>
    </div>
    </div>
    <div class="column xs-span12 md-span6">
    <div class="column-inner">
        <p>
            Category<br />
            <select name="arlington_team[category]" type="text" value="<?php echo $old_title['category']; ?>" />
                <option value=""<?php echo (empty($old_title['category']) ? ' selected' : ''); ?>>--</option>
                <?php foreach ($team_categories as $option_text => $value) : ?>
                <option value="<?php echo $value; ?>"<?php echo ($old_title['category'] == $value ? ' selected' : ''); ?>><?php echo $option_text; ?></option>
                <?php endforeach; ?>
            </select>
        </p>
    </div>
    </div>
</div>
<?php
}

function save_options_team() {
    global $post;
    
    if (!empty($post) && $post->post_type == 'team') {
        update_post_meta($post->ID, 'arlington_team', $_POST['arlington_team']);
        update_post_meta($post->ID, 'arlington_team_member_title', $_POST['arlington_team_member_title']);
        update_post_meta($post->ID, 'arlington_team_member_linkedin', $_POST['arlington_team_member_linkedin']);
        update_post_meta($post->ID, 'arlington_team_member_phone', $_POST['arlington_team_member_phone']);
        update_post_meta($post->ID, 'arlington_team_member_email', $_POST['arlington_team_member_email']);
    }
}

add_action('admin_init', 'admin_init_team');
add_action('save_post', 'save_options_team');

// Add menu order column and team category column
function add_team_columns($defaults) {
    $defaults['team_category'] = 'Category';
    $defaults['menu_order'] = 'Order';
    return $defaults;
}
add_filter('manage_team_posts_columns', 'add_team_columns');

function show_team_columns($name){
    global $post;
    
    $team_categories = arlington_team_categories();
    $team_meta = get_post_meta($post->ID, 'arlington_team', true);

    switch ($name) {
        case 'team_category':
            if (!empty($team_meta['category'])) {
                foreach ($team_categories as $option_text => $value) {
                    if ($team_meta['category'] == $value) {
                        echo $option_text;
                        return;
                    }
                }
            }
            break;
        case 'menu_order':
            $order = $post->menu_order;
            echo $order;
            break;
        default:
            break;
    }
}
add_action('manage_team_posts_custom_column', 'show_team_columns');

function register_sortable_team_columns($columns) {
    // $columns['team_category'] = 'team_category_order';
    $columns['menu_order'] = 'menu_order';
    return $columns;
}
add_filter('manage_edit-team_sortable_columns', 'register_sortable_team_columns');

// Can't get this working for some reason
// function team_category_orderby($query) {
//     if (is_admin() && $query->is_main_query()) {
//         $orderby = $query->get('orderby');
//
//         switch ($orderby) {
//             case 'team_category_order':
//                 $query->set('meta_key', 'team_category');
//                 $query->set('orderby', 'meta_value');
//                 break;
//         }
//     }
// }
// add_action('pre_get_posts', 'team_category_orderby');

?>