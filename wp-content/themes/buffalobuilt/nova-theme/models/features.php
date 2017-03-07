<?php
global $novaFeatures;
$novaFeatures = new novaSection;
$novaFeatures->set_group_name('Features')
    ->set_group_name_slug('features')
    ->set_single_name('Feature')
    ->set_single_name_slug('feature')
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
        'content'           => array(
            'name'          => 'Content',
            'input_type'    => 'textarea',
            'rows'          => 5
        ),
        'button_text'       => array(
            'name'          => 'Button Text',
            'input_type'    => 'text'
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
        'icon_link'         => array(
            'name'          => 'Make icon into link',
            'input_type'    => 'checkbox'
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
        'layout'            => array(
            'name'          => 'Layout',
            'width'         => 'xs-span12 sm-span2',
            'input_type'    => 'select',
            'options'       => array(
                'Columns'   => 'columns',
                'Rows'      => 'rows'
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
        'size'              => array(
            'name'          => 'Feature Size',
            'width'         => 'xs-span12 sm-span6',
            'input_type'    => 'select',
            'options'       => array(
                'Large'             => 'large',
                'Medium'            => 'medium',
                'Small'             => 'small'
            )
        ),
        'overlay'           => array(
            'name'          => 'Overlay background color on background image',
            'width'         => 'xs-span12 sm-span6',
            'input_type'    => 'checkbox'
        ),
        'main_content'      => array(
            'name'          => 'Main Content',
            'input_type'    => 'textarea',
            'rows'          => 10
        )
    ));
?>