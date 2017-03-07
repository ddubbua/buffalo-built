<?php
global $novaTeamMembers;
$novaTeamMembers = new novaSection;
$novaTeamMembers->set_group_name('Team Members')
    ->set_group_name_slug('team-members')
    ->set_single_name('Team Member')
    ->set_single_name_slug('team_member')
    ->set_fixed_column_num(0)
    ->set_admin_column_classes('xs-span12')
    ->set_options(array(
        'headline'          => array(
            'name'          => 'Headline',
            'input_type'    => 'text'
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
        'padding_top'       => array(
            'name'          => 'Top Padding',
            'width'         => 'xs span12 sm-span2 sm-left2',
            'input_type'    => 'select',
            'options'       => array(
                'Image'    =>  'image',
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
        'main_content'      => array(
            'name'          => 'Main Content',
            'input_type'    => 'textarea',
            'rows'          => 10
        )
    ));
?>