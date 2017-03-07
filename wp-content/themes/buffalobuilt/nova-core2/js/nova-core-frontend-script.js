jQuery('document').ready(function($){
    var $document = $(document),
        $window = $(window),
        $body = $('body'),
        $header = $('#header'),
        $adminBar = $('#wpadminbar'),
        $nav = $('#nav'),
        $mobileMenu = $('#dl-menu');
        
    // Check for valid jQuery selector
    function isValidSelector(selector) {
        try {
            var $element = $(selector);
        } catch(error) {
            return false;
        }
        return true;
    }
    
    // Check if mobile width
    var isMobileWidth = function() {
        if ($mobileMenu.css('display') === 'block') {
            return true;
        } else {
            return false;
        }
    }
    
    // Adds parent links to their own submenus in DL Menu if they have a link
    // because the parent link no longer functions as an actual link.
    $('#dl-menu li.menu-item-has-children').each(function() {
        t = $(this);
        
        if (!!t.children('a').attr('href') && t.children('a').attr('href') !== '#') {
            $clone = t.clone();
            $clone.children('ul').remove();
            $clone.removeClass('menu-item-has-children current-menu-ancestor current-menu-parent current_page_parent current_page_ancestor');
            t.children('ul').prepend($clone);
        }
    });
    
    // DL Menu initialization
    $('#dl-menu ul ul').addClass('dl-submenu');
    $('#dl-menu').dlmenu({
        animationClasses: {
            classin: 'dl-animate-in-1',
            classout: 'dl-animate-out-1'
        }
    });
    
    // Make DL Menu dropdowns scrollable on small screens
    // This isn't fully functional yet
    //
    // var adjustMobileMenuHeight = function() {
    //     var windowHeight = $window.height();
    //
    //     $('#dl-menu ul').each(function() {
    //         var $t = $(this);
    //
    //         $t.css('max-height', 'none');
    //
    //         var menuTop = $t.offset().top - $window.scrollTop(),
    //             menuHeight = $t.height(),
    //             maxMenuHeight = windowHeight - menuTop - 10;
    //
    //         if (maxMenuHeight < menuHeight) {
    //             $t.css('max-height', maxMenuHeight);
    //         }
    //     });
    // };
    //
    // adjustMobileMenuHeight();
    // $window.resize(adjustMobileMenuHeight);
    
    // Adjust nav position if admin bar is present
    var adjustNavPosition = function() {
        if ($nav.css('position') === 'fixed' && $adminBar.css('position') === 'absolute') {
            scrollTop = $window.scrollTop();
            adminBarHeight = $adminBar.height();
            
            if (scrollTop < adminBarHeight) {
                $nav.css('top', adminBarHeight - scrollTop);
            } else {
                $nav.css('top', 0);
            }
        } else {
            $nav.css('top', '');
        }
    }
    
    adjustNavPosition();
    $window.scroll(adjustNavPosition);
    $window.resize(adjustNavPosition);
    
    // Fix anchor links causing a section to be covered by the nav on page load
    var anchorLinkSection = window.location.hash;

    if (anchorLinkSection && isValidSelector(anchorLinkSection) && $(anchorLinkSection).length > 0) {
        var navHeight = 0,
            adminBarHeight = 0;

        if ($nav.css('bottom') !== '0px') {
            navHeight = $nav.outerHeight();
        }

        if ($adminBar.length > 0 && $adminBar.css('position') === 'fixed') {
            adminBarHeight = $adminBar.height();
        }

        $window.load(function() {
            $('html, body').animate({
               scrollTop: $(anchorLinkSection).offset().top - navHeight - adminBarHeight
            }, 0);
        });
    }
    
    // Submenu appearance
    var $navSubMenuParent = $('#nav-menu .menu-item-has-children');
    
    var adjustSubMenuPosition = function(navSubMenuParent) {
        var windowWidth = $window.width(),
            $navSubMenu = navSubMenuParent.children('.sub-menu');
        
        $navSubMenu.removeClass('show-adjust');
        
        var navSubMenuLeft = $navSubMenu.offset().left,
            navSubMenuWidth = $navSubMenu.width(),
            spaceLeft = windowWidth - navSubMenuLeft - navSubMenuWidth;
            
        if (spaceLeft < 0) {
            $navSubMenu.addClass('show-adjust');
        }
    };
    
    $navSubMenuParent.each(function() {
        var $t = $(this);
        
        adjustSubMenuPosition($t);
        $window.resize(function() {
            adjustSubMenuPosition($t);
        });
    });
    
    $navSubMenuParent.mouseenter(function() {
        var t = $(this),
            $otherSubMenuParents = t.siblings('.menu-item-has-children');

        setTimeout(function() {
            t.children('ul').addClass('show');
            t.siblings('.menu-item-has-children').find('ul').removeClass('show');
        }, 100);
    }).mouseleave(function() {
        var t = $(this);

        setTimeout(function() {
            t.find('ul').removeClass('show');
        }, 100);
    });
    
    $navSubMenuParent.on('touchstart', function(e) {
        t = $(this);

        if (!t.children('ul').hasClass('show')) {
            e.preventDefault();
            t.children('ul').addClass('show');
        }
    });
    
    $document.on('touchstart', function(e) {
        $navSubMenuParent.each(function() {
            var t = $(this);
            
            if (t.children('ul').hasClass('show') && !t.is($(e.target)) && t.has($(e.target)).length === 0) {
                t.children('ul').removeClass('show');
            }
        });
    });
    
    // Smooth scrolling
    $('a[href]').click(function(e) {
        var t = $(this),
            link = t.attr('href'),
            linkPath = link.split('#')[0],
            section = '#' + link.split('#')[1],
            currentPage = window.location.pathname;
            
        if (isValidSelector(section) && $(section).length > 0 && (linkPath === '' || linkPath === currentPage) && t.parents('.no-auto-scroll').length === 0) {
            e.preventDefault();
            
            var navHeight = 0,
                adminBarHeight = 0;
            
            if ($nav.css('bottom') !== '0px') {
                navHeight = $nav.outerHeight();
            }
            
            if ($adminBar.length > 0 && $adminBar.css('position') === 'fixed') {
                adminBarHeight = $adminBar.height();
            }
            
            var animateTime = 0;
            
            if ($body.hasClass('smooth-scroll-enabled')) {
                animateTime = 1500;
            }
            
            $('html, body').animate({
               scrollTop: $(section).offset().top - navHeight - adminBarHeight
            }, animateTime);
        }
    });
    
    // Proportional iframe resizing
    var iframes = $('iframe');
    var resizeIframes = function() {
        $.map(iframes, function(f) {
            var iframe = $(f);
            var iframeWidth = iframe.attr('width');
            var iframeHeight = iframe.attr('height');
            var iframeScaledWidth = iframe.width();
            var newHeight = iframeHeight/iframeWidth * iframeScaledWidth;
            iframe.css('height', newHeight + 'px');
        });
    };

    resizeIframes();
    $window.resize(resizeIframes);
    
    // Accordion hide and reveal
    var $accordionHeadlines = $('.nova-accordion-headline'),
        $accordionButtons = $accordionHeadlines.find('.fa');

    var scrollToContent = function($content, time) {
        setTimeout(function() {
            var windowTop = $window.scrollTop(),
                windowHeight = $window.height(),
                windowBottom = windowTop + windowHeight,
                contentHeight = $content.outerHeight(),
                contentBottom = $content.offset().top + contentHeight;
        
            /*
             * If the user cannot see all of the new content,
             * scroll to a point where it is visible.
             */
            if (windowBottom < contentBottom) {
                var scrollPosition = $content.offset().top;
            
                /*
                 * On small screens or when the content is tall relative to the window,
                 * scroll so that the top of the new content is visible.
                 * Else, scroll far enough that the bottom of the new content is visible.
                 */
                if (isMobileWidth() || contentHeight > windowHeight - 150) {
                    scrollPosition -= 150;
                } else {
                    scrollPosition += contentHeight - windowHeight + 100;
                }
            
                $('html, body').animate({
                   scrollTop: scrollPosition
                }, 1000);
            }
        }, time);
    };

    $accordionHeadlines.click(function() {
        var $area = $(this).parents('.nova-accordions-content > .column > div'),
            $content = $area.find('.nova-accordion-content'),
            $siblingAccordionAreas = $area.parents('.nova-accordions-content').find('.column > div').not($area),
            $siblingAccordionContents = $area.parents('.nova-accordions-content').find('.nova-accordion-content').not($content),
            duration = 500;
            
        if ($siblingAccordionContents.filter(':visible').length > 0) {
            $siblingAccordionContents.slideUp(duration);
            $siblingAccordionAreas.removeClass('active-accordion');
            
            setTimeout(function() {
                $content.slideToggle(duration);
                $area.toggleClass('active-accordion');
                scrollToContent($area, duration);
            }, duration);
        } else {
            $content.slideToggle(duration);
            $area.toggleClass('active-accordion');
            scrollToContent($area, duration);
        }
    });
});