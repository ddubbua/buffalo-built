<?php

/*
 * NOVA Config
 */

/*
 * Choose which sections to include in this theme from the available global variables.
 *
 * $nova_sections - a global array used throughout the theme to set up available section types
 * The items in this array MUST be REFERENCES to the sections' variables, not the actual variables,
 * so that section global variables can be updated as needed in the theme.
 */

global $novaAccordions;
global $novaCTA;
global $novaFeatures;
global $novaFeaturesHidden;
global $novaBoxes;
global $novaHeader;
global $novaOneColumn;
global $novaTeamMembers;
global $novaThreeColumn;
global $novaTwoColumn;

$nova_sections = array(
    &$novaHeader,
    &$novaOneColumn,
    &$novaTwoColumn,
    &$novaThreeColumn,
    &$novaFeatures,
    &$novaFeaturesHidden,
    &$novaBoxes,
    &$novaTeamMembers,
    &$novaAccordions,
    &$novaCTA
);

/* Set default colors */
$nova_default_colors = array(
    'primary'           => '#314887',
    'secondary'         => '#4b97e3',
    'headline_dark'     => '#333',
    'text_dark'         => '#555',
    'headline_light'    => '#fff',
    'text_light'        => '#fff'
);

/* Add shortcode buttons to WYSIWYG editor */
define('NOVA_SHORTCODES', true);

/* Add Icon Library to page builder */
define('ICON_LIBRARY', true);

/*
 * Set default icon in page builder
 * This will only take effect if ICON_LIBRARY is set to true.
 */
define('ICON_DEFAULT', 'fa fa-star');

/*
 * Add FontAwesome library to Icon Library
 * This will only take effect if ICON_LIBRARY is set to true.
 */
define('FONT_AWESOME_LIBRARY', true);

/*
 * Add custom icon libraries before and after Font Awesome library
 * ICON_LIBRARY must be set to true.
 * FONT_AWESOME_LIBRARY does not have to be true for these to load.
 */
$nova_custom_icon_libraries_before = false;
$nova_custom_icon_libraries_after = false;

/*
 * Add a "no icon" choice to Icon Library
 * This will only take effect if ICON_LIBRARY is set to true.
 */
define('ICON_LIBRARY_CHOICE_NONE', false);

?>