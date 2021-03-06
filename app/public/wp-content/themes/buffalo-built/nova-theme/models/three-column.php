<?php
global $novaThreeColumn;
$novaThreeColumn = new novaSection;
$novaThreeColumn->set_group_name('Three Column')
    ->set_group_name_slug('three-column')
    ->set_single_name('Column')
    ->set_single_name_slug('three_column')
    ->set_fixed_column_num(3)
    ->set_admin_column_classes('xs-span12 sm-span4')
    ->set_markup_attr(array(
        'content'           => array(
            'name'          => 'Content',
            'input_type'    => 'textarea',
            'rows'          => 10
        )
    ))
    ->set_options(array(
        'headline'          => array(
            'name'          => 'Headline',
            'width'         => 'xs-span12 sm-span6',
            'input_type'    => 'text'
        ),
        'id'                => array(
            'name'          => 'Section Slug',
            'width'         => 'xs-span12 sm-span6',
            'tip'           => '<strong>Use this for linking directly to a section. Lowercase letters, numbers, dashes, and underscores only.</strong> If left blank, the section slug will be the headline lowercase with words separated by dashes (symbols will be deleted). If both the section slug and headline are blank, the section slug will be "section-n" where "n" is the place that the section is in on the page (e.g. the 4th section on the page will be "section-4").',
            'input_type'    => 'text'
        ),
        'column_widths'     => array(
            'name'          => 'Column Widths',
            'width'         => 'xs-span12 sm-span2',
            'input_type'    => 'select',
            'options'       => array(
                '1/3 1/3 1/3'   => '1-3_1-3_1-3',
                '1/4 1/2 1/4'   => '1-4_1-2_1-4',
                '1/2 1/4 1/4'   => '1-2_1-4_1-4',
                '1/4 1/4 1/2'   => '1-4_1-4_1-2'
            )
        ),
        'padding_top'       => array(
            'name'          => 'Top Padding',
            'width'         => 'xs span12 sm-span2',
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
            'width'         => 'xs span12 sm-span2',
            'input_type'    => 'select',
            'options'       => array(
                'Large'     => 'large',
                'Normal'    => 'normal',
                'None'      => 'no'
            ),
            'selected'      => 'normal'
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
        'background_image'  => array(
            'name'          => 'Background Image',
            'width'         => 'xs-span12 sm-span6',
            'input_type'    => 'image'
        ),
        'background_color'        => array(
            'name'          => 'Background Color',
            'width'         => 'xs-span12 sm-span6',
            'input_type'    => 'select',
            'options'       => array(
                'White'             => 'white-background',
                'Gray'              => 'gray-background',
                'Primary Color'     => 'primary-color-background',
                'Secondary Color'   => 'secondary-color-background'
            )
        ),
        'overlay'           => array(
            'name'          => 'Overlay background color on background image',
            'input_type'    => 'checkbox'
        )
    ));
?>