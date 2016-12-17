<?php

/*
 * NOVA Core
 * Version 2.0
 *
 * Version 2.0 of Nova Core improves upon the functionality of the original
 * Nova Core submodule by removing the need for using child pages as sections
 * of their parent page. Page sections now reside in the page's post meta. 
 */

require_once('php/nova_constants.php');
require_once('php/nova_helpers.php');
require_once('php/nova_section.php');

if (NOVA_SHORTCODES) {
    require_once('php/nova_shortcodes.php');
}

if (ICON_LIBRARY) {
    require_once('php/nova_icon_library.php');
}

require_once('php/nova_page-builder.php');
require_once('php/nova_assets.php');
require_once('php/nova_miscellaneous.php');

?>