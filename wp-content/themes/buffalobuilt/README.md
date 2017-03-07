# README #

This is a starting theme for Nova projects. Useful for quickly getting started on a project. Gradually improving on becoming Wordpress standards compliant.

### How to set up ###

1. Create an installation of Wordpress.
1. Add contents of the starter theme into your own theme directory and delete this README (eventually).
1. Customize the theme name and description in style.css.
    - Right now most of our Nova themes are named after Twilight Zone episodes because Cara is a nerd.
        - Time Enough at Last
            - [Wikipedia article](http://en.wikipedia.org/wiki/Time_Enough_at_Last)
            - [Demo site](http://timeenoughatlast.flywheelsites.com)
        - King Nine
            - [Wikipedia article](http://en.wikipedia.org/wiki/King_Nine_Will_Not_Return)
            - [Demo site](http://kingnine.flywheelsites.com)
        - The After Hours
            - [Wikipedia article](http://en.wikipedia.org/wiki/The_After_Hours)
            - [Demo site](http://theafterhours.flywheelsites.com)
    - Christopher messed up this streak by insisting on naming one. ):<
        - Novello
            - [Youtube video of the relevant scene from White Christmas](https://www.youtube.com/watch?v=GE589gkOYz0)
            - This theme has not been coded yet, therefore it does not have a demo site yet, but it had been preemptively named.
1. The SASS/CSS is deliberately scant so that creating unique looks is relatively easy.
1. The 'nova-theme' directory contains the custom files for the theme which you may edit as needed.
    - 'models' directory - If you need sections to have different options/fields, edit their objects in these files. If you are sure you will not need a section, you can delete its related file in the 'models' directory, delete the global variable from 'nova\_config.php', and delete its related CSS.
        - If you need to create a new section, see the 'How to make a new section' section below.
    - 'loops' directory - If you need to edit the markup for columns inside sections, edit their related loops here.
        - Be wary of editing the markup of accordions. They need a certain structure and certain classes for the JavaScript opening and closing functionality to work (see 'nova-core2/js/nova-core-frontend-script.js'). If you drastically change the markup of the accordions, you will likely need to write custom JavaScript to make opening and closing work again.
    - 'nova\_config.php' - If you would like to make sections unavailable to the theme, edit the '$nova\_sections' array.
    - 'nova\_settings.php' - Edit the settings available on the 'Theme Options' page on the admin side.
1. To edit the markup of the sections as a whole, edit the code in 'section.php'.
    - Be careful of the edits you make here, because 'section.php' affects ALL sections.
1. Towards the end of the coding/design process, create a screenshot of the theme, name it 'screenshot.png', and place it in the root directory of the theme.
    - Past Nova themes have followed the convention of a screenshot of the header section with the name of the theme as the headline and 'A NOVA theme by Blu Giant' as the tagline.
    - Screenshots are 880x660 pixels.

### Nova Core ###

- All Nova themes have the Nova Core submodule in the 'nova-core2' directory, which provides many features, including the page builder, FontAwesome, mobile menu functionality, Owl Carousel, and more.
- Keep in mind that the Nova Core submodule is used by all Nova themes and even some non-Nova themes, so do not add theme-specific code to it.
- If you make commits to the Nova Core submodule, themes that use it will need to pull the repo on an individual basis and be tested to make sure the latest Nova Core update did not break them.

### How to make a new section ###

1. Create a new php file in 'nova-theme/models/' and name it 'your\_section\_name.php' where 'your\_section\_name' is the name of your new section.
1. Reference the documentation in the 'novaSection' model in 'nova-core/php/nova\_section.php' for the different attributes to set, as well as referencing already-exising objects in 'nova-theme/models/' to help you get started.
    - The nova page builder was created with [object-oriented programming](http://en.wikipedia.org/wiki/Object-oriented_programming) in mind, so there are [setter and getter functions](http://en.wikipedia.org/wiki/Mutator_method) for each variable.
1. In 'nova-theme/nova\_config.php', add the global variable for your section and add a reference to that variable to the '$nova_sections' array. Your section should now appear in the page builder.
1. Create a new php file in 'nova-theme/loops/' and name it 'your\_section\_name.php' where 'your\_section\_name' is the name of your section. This will be used by 'section.php' to output the markup for each of the section's columns on the frontend of the website.

### What's included ###

- Page builder
    - Blu Giant's in-house coded page builder
- [Sortable - jQuery UI](http://jqueryui.com/sortable/)
    - Allows for drag and drop sorting in the admin interface
- [FontAwesome](http://fortawesome.github.io/Font-Awesome/)
    - Icon library
- [Responsive Multi-Level Menu](http://tympanus.net/codrops/2013/04/19/responsive-multi-level-menu/)
    - Drop down menu for mobile
- [Owl Carousel](http://owlgraphic.com/owlcarousel/)
    - Carousel slider
    - The Owl Carousel built into the theme has been hacked slightly because of bugginess with Google Chrome, so use caution if updating this plugin.