<?php
global $novaOneColumn;
$novaOneColumn = new novaSection;
$novaOneColumn->set_group_name('One Column')
    ->set_group_name_slug('one-column')
    ->set_single_name('Column')
    ->set_single_name_slug('one_column')
    ->set_fixed_column_num(1)
    ->set_admin_column_classes('xs-span12')
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
        'padding_top'       => array(
            'name'          => 'Top Padding',
            'width'         => 'xs span12 sm-span2 sm-left2',
            'input_type'    => 'select',
            'options'       => array(
                'Image'    => 'image',
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
                'Image'     => 'image',
                'Large'     => 'large',
                'Normal'    => 'normal',
                'None'      => 'no'
            ),
            'selected'      => 'normal'
        ),
        'border_image'      => array(
            'name'          => 'Border Images',
            'input_type'    => 'select',
            'options'       => array(
                    'None'           => '',
                    'Swoosh Top'     => 'swoosh-top',
                    'Swoosh Bot'     => 'swoosh-bot',
                    'Swoosh Both'    => 'swoosh-both',
                    'Splatter Top'   => 'splatter-top',
                    'Splatter Bot'   => 'splatter-bot',
                    'Splatter Both'  => 'splatter-both',
                    'Splatter Top (White)'  => 'splatter-top-white'
            ),
            'selected'      => ''
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
        'background_attachment'  => array(
            'name'          => 'Background Attachment',
            'input_type'    => 'select',
            'width'         => 'xs-span12',
            'options'       => array(
                'Scroll'            => 'background-scroll',
                'Fixed'             => 'background-fixed',
                'Parallax'          => 'background-parallax',
            ),
            'selected'      => 'background-scroll'
        ),
        'overlay'           => array(
            'name'          => 'Overlay background color on background image',
            'input_type'    => 'checkbox'
        )
    ));
?>