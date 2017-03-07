<?php
global $nova_default_colors;
$colors = get_option('nova_colors', $nova_default_colors);

global $novaFeaturesHidden;
$novaFeaturesHidden = new novaSection;
$novaFeaturesHidden->set_group_name('Hidden Content Features')
    ->set_group_name_slug('features-hidden')
    ->set_single_name('Hidden Feature')
    ->set_single_name_slug('feature_hidden')
    ->set_multiple(true)
    ->set_admin_column_classes('xs-span12 sm-span4 md-span6 lg-span4')
    ->set_markup_attr(array(
        'icon'              => array(
            'name'          => 'Icon',
            'input_type'    => 'icon'
        ),
        'headline'          => array(
            'name'          => 'Headline',
            'input_type'    => 'text'
        ),
        'description'          => array(
            'name'          => 'Description',
            'input_type'    => 'textarea',
            'rows'          => 3
        ),
        'hidden_content'    => array(
            'name'          => 'Hidden Content',
            'input_type'    => 'textarea',
            'rows'          => 5
        )
    ))
    ->set_options(array(
        'headline'          => array(
            'name'          => 'Headline',
            'width'         => 'xs-span12 sm-span6',
            'input_type'    => 'text'
        ),
        'text_color_scheme' => array(
            'name'          => 'Text Color Scheme',
            'width'         => 'xs-span12 sm-span6',
            'input_type'    => 'select',
            'options'       => array(
                'Dark'      => 'dark-text-color-scheme',
                'Light'     => 'light-text-color-scheme'
            )
        ),
        'background_color'  => array(
            'name'          => 'Background Color',
            'width'         => 'xs-span12 sm-span6',
            'input_type'    => 'select',
            'options'       => array(
                'White'             => 'white-background',
                'Primary Color'     => 'primary-color-background',
                'Secondary Color'   => 'secondary-color-background',
                'Orange'            => 'orange-background'
            )
        ),
        'padding_top'         => array(
            'name'          => 'Top Space',
            'width'         => 'xs-span12 sm-span4',
            'input_type'    => 'select',
            'options'       => array(
                'Large'     => 'large',
                'Normal'    => 'normal',
                'None'      => 'no',
                'Overlap'   => 'overlap'
            ),
            'selected'      => 'normal'
        ),
        'padding_bottom'      => array(
            'name'          => 'Bottom Space',
            'width'         => 'xs-span12 sm-span4',
            'input_type'    => 'select',
            'options'       => array(
                'Large'     => 'large',
                'Normal'    => 'normal',
                'None'      => 'no'
            ),
            'selected'      => 'normal'
        ),
        'size'              => array(
            'name'          => 'Feature Size',
            'width'         => 'xs-span12 sm-span4',
            'input_type'    => 'select',
            'options'       => array(
                'Large'     => 'large',
                'Medium'    => 'medium',
                'Small'     => 'small'
            )
        ),
        'style'              => array(
            'name'          => 'Style',
            'width'         => 'xs-span12 sm-span4',
            'input_type'    => 'select',
            'options'       => array(
                'Plain'     => 'plain',
                'Numbered'     => 'numbered'
            )
        ),
        'main_content'      => array(
            'name'          => 'Main Content',
            'input_type'    => 'textarea',
            'rows'          => 5
        )
    ));
?>