<?php
global $novaBoxes;
$novaBoxes = new novaSection;
$novaBoxes->set_group_name('Boxes')
    ->set_group_name_slug('boxes')
    ->set_single_name('Box')
    ->set_single_name_slug('box')
    ->set_multiple(true)
    ->set_admin_column_classes('xs-span12 sm-span4 md-span6 lg-span4')
    ->set_markup_attr(array(
        'width'             => array(
            'name'          => 'Width',
            'input_type'    => 'select',
            'options'       => array(
                '1 column'  => '3',
                '2 columns' => '6',
                '3 columns' => '9',
                '4 columns' => '12'
            )
        ),
        'height'            => array(
            'name'          => 'Height',
            'input_type'    => 'select',
            'options'       => array(
                '1 row'     => '1',
                '2 rows'    => '2'
            )
        ),
        'background_image'  => array(
            'name'          => 'Background Image',
            'input_type'    => 'image'
        ),
        'background_color'  => array(
            'name'          => 'Background Color',
            'input_type'    => 'select',
            'options'       => array(
                'Primary Color'     => 'primary-color-background',
                'Secondary Color'   => 'secondary-color-background',
                'Tertiary Color'    => 'tertiary-color-background',
                'White'             => 'white-background',
                'Light Gray'        => 'light-gray-background',
                'Medium Gray'       => 'medium-gray-background',
                'Transparent'       => 'no-background'
            )
        ),
        'headline'          => array(
            'name'          => 'Headline',
            'input_type'    => 'text'
        ),
        'content'           => array(
            'name'          => 'Content',
            'input_type'    => 'textarea'
        ),
        'link'              => array(
            'name'          => 'Link',
            'input_type'    => 'text',
            'placeholder'   => 'http://'
        ),
        'open_link_in_new_tab'  => array(
            'name'          => 'Open Link in New Tab',
            'input_type'    => 'checkbox'
        ),
        'wistia'            => array(
            'name'          => 'Create Wistia video popover',
            'input_type'    => 'checkbox',
            'tip'           => 'Make sure the link looks something like <strong>http://northstar.wistia.com/medias/abcde12345</strong>. You do not need the Embed &amp; Share options.'
        )
    ))
    ->set_options(array(
        'headline'          => array(
            'name'          => 'Headline',
            'width'         => 'xs-span12 sm-span6',
            'input_type'    => 'text'
        ),
        'background_color'  => array(
            'name'          => 'Background Color',
            'width'         => 'xs-span12 sm-span6',
            'input_type'    => 'select',
            'options'       => array(
                'White'             => 'white-background',
                'Light Gray'        => 'light-gray-background',
                'Medium Gray'       => 'medium-gray-background',
                'Primary Color'     => 'primary-color-background',
                'Secondary Color'   => 'secondary-color-background'
            )
        ),
        'padding_top'       => array(
            'name'          => 'Top Padding',
            'width'         => 'xs-span12 sm-span6',
            'input_type'    => 'select',
            'options'       => array(
                'Large'     => 'large',
                'Normal'    => 'normal',
                'None'      => 'no'
            ),
            'selected'      => 'normal'
        ),
        'padding_bottom'    => array(
            'name'          => 'Bottom Padding',
            'width'         => 'xs-span12 sm-span6',
            'input_type'    => 'select',
            'options'       => array(
                'Large'     => 'large',
                'Normal'    => 'normal',
                'None'      => 'no'
            ),
            'selected'      => 'normal'
        ),
        'max_width'         => array(
            'name'          => 'Max Width',
            'width'         => 'xs-span12 sm-span6',
            'input_type'    => 'select',
            'options'       => array(
                '4 columns' => '4',
                '3 columns' => '3'
            ),
            'tip'           => 'Boxes set to be 4 columns wide will be shortened to 3.'
        ),
        'main_content'      => array(
            'name'          => 'Main Content',
            'input_type'    => 'textarea',
            'rows'          => 10
        )
    ));
?>