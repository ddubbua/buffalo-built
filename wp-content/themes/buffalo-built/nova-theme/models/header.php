<?php
global $novaHeader;
$novaHeader = new novaSection;
$novaHeader->set_group_name('Header')
    ->set_group_name_slug('header')
    ->set_single_name('Slide')
    ->set_single_name_slug('slide')
    ->set_multiple(true)
    ->set_admin_column_classes('xs-span12 sm-span4 md-span6 lg-span4')
    ->set_markup_attr(array(
        'background_image'  => array(
            'name'          => 'Background Image',
            'input_type'    => 'image'
        ),
        'background_color'  => array(
            'name'          => 'Background Color',
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
        ),
        'align_text'        => array(
            'name'          => 'Align Text',
            'input_type'    => 'select',
            'options'       => array(
                'Center'    => 'center',
                'Left'      => 'left',
                'Right'     => 'right'
            )
        ),
        'headline'          => array(
            'name'          => 'Headline',
            'input_type'    => 'text'
        ),
        'headline_color'    => array(
            'name'          => 'Headline Color',
            'width'         => 'xs-span6',
            'input_type'    => 'select',
            'options'       => array(
                'Default Headline Color'    => 'nova-header-text-default',
                'White'                     => 'nova-header-text-white',
                'Black'                     => 'nova-header-text-black',
                'Primary Color'             => 'nova-header-text-primary-color',
                'Secondary Color'           => 'nova-header-text-secondary-color'
            )
        ),
        'headline_background_color' => array(
            'name'          => 'Headline BG Color',
            'width'         => 'xs-span6',
            'input_type'    => 'select',
            'options'       => array(
                'Black'             => 'nova-header-text-background-black',
                'White'             => 'nova-header-text-background-white',
                'Primary Color'     => 'nova-header-text-background-primary-color',
                'Secondary Color'   => 'nova-header-text-background-secondary-color',
                'None'              => 'nova-header-text-background-transparent'
            )
        ),
        'tagline'           => array(
            'name'          => 'Tagline',
            'input_type'    => 'text'
        ),
        'tagline_color' => array(
            'name'          => 'Tagline Color',
            'width'         => 'xs-span6',
            'input_type'    => 'select',
            'options'       => array(
                'Default Headline Color'    => 'nova-header-text-default',
                'White'                     => 'nova-header-text-white',
                'Black'                     => 'nova-header-text-black',
                'Primary Color'             => 'nova-header-text-primary-color',
                'Secondary Color'           => 'nova-header-text-secondary-color'
            )
        ),
        'tagline_background_color'  => array(
            'name'          => 'Tagline BG Color',
            'width'         => 'xs-span6',
            'input_type'    => 'select',
            'options'       => array(
                'Black'             => 'nova-header-text-background-black',
                'White'             => 'nova-header-text-background-white',
                'Primary Color'     => 'nova-header-text-background-primary-color',
                'Secondary Color'   => 'nova-header-text-background-secondary-color',
                'None'              => 'nova-header-text-background-transparent'
            )
        ),
        'content'       => array(
            'name'          => 'Content',
            'input_type'    => 'textarea',
            'rows'          => 5
        )
    ))
    ->set_options(array(
        'id'                => array(
            'name'          => 'Section Slug',
            'width'         => 'xs-span12 sm-span6 sm-right6',
            'tip'           => '<strong>Use this for linking directly to a section. Lowercase letters, numbers, dashes, and underscores only.</strong> If left blank, the section slug will be "section-n" where "n" is the place that the section is in on the page (e.g. the 4th section on the page will be "section-4").',
            'input_type'    => 'text'
        ),
        'speed'         => array(
            'name'          => 'Slider Speed',
            'tip'           => 'Enter in milliseconds, or "false" if you do not want the slider to play automatically. Defaults to 10000 (10 seconds between each slide) if left blank.',
            'input_type'    => 'text',
            'placeholder'   => '10000'
        ),
        'hide_arrows'   => array(
            'name'          => 'Hide Arrows',
            'input_type'    => 'checkbox'
        ),
        'hide_pagination'   => array(
            'name'          => 'Hide Pagination',
            'input_type'    => 'checkbox'
        )
    ));
?>