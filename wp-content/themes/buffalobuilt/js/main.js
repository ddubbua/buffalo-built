jQuery(document).ready(function($) {
    var $window = $(window),
        $adminBar = $('#wpadminbar'),
        $header = $('#header'),
        $main = $('main'),
        $footer = $('#footer');
      
        $('.nova-scroll.primary').hide();
	  
		$( window ).load(function() {
            setTimeout(function(){ 
                $('.nova-scroll.primary').show('slow');
            }, 3000);
       });
			   
	  
	   
	    
    // Sticky footer
    var pushFooterDown = function() {
        $main.css('min-height', '');
    
        windowHeight = $window.height();
        mainHeight = $main.outerHeight();
        mainTop = $main.offset().top;
        footerHeight = $footer.outerHeight();
    
        mainMinHeight = windowHeight - mainTop - footerHeight;
    
        if (mainHeight < mainMinHeight) {
            $main.css('min-height', mainMinHeight);
        }
    }
	
	$( ".dl-trigger" ).click(function() {
	$( "body" ).toggleClass( 'menu-active' );
	});
	pushFooterDown();
    $window.resize(pushFooterDown);

    // Check if mobile width
    var isMobileWidth = function() {
        if ( $(window).width() >= 850) {
            return false;
        } else {
            return true;
        }
    }
    
    /*-----------------*/
    /* Navbar Position */
    /*-----------------*/
// Sticky navigation bar
    var adminBarHeight = 0,
		$homeNavIcon = $('#nova-menu-icon-home'),
        $mainNavIcon = $('#nova-menu-icon-main'),
        navIsSticky = false;
		
      //change the integers below to match the height of your upper dive, which I called
      //banner.  Just add a 1 to the last number.  console.log($(window).scrollTop())
      //to figure out what the scroll position is when exactly you want to fix the nav
      //bar or div or whatever.  I stuck in the console.log for you.  Just remove when
      //you know the position.
      
    var navsize = $(window).height() - 70;
    
    $(window).scroll(function () { 

    console.log($(window).scrollTop());
        if ($(window).scrollTop() > navsize) {
          $('#nav').addClass('nav-fixed');
          navIsSticky = true;
		  
        }

        if ($(window).scrollTop() < (navsize + 1)) {
          $('#nav').removeClass('nav-fixed');
          navIsSticky = false;
		  
        }
    });
	

    var changeNavIcons = function(navIsSticky) {
        if ($body.hasClass('home')) {
            if (navIsSticky) {
                $mainNavIcon.removeClass('nova-menu-icon-hidden');
                $homeNavIcon.addClass('nova-menu-icon-hidden');
            } else {
                $mainNavIcon.addClass('nova-menu-icon-hidden');
                $homeNavIcon.removeClass('nova-menu-icon-hidden');
            }
        }
    }

  


    /*----------------*/
    /* Hidden Content */
    /*----------------*/

    var $hiddenContentSections = $('.nova-features-hidden');

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
                   * On small screens, scroll so that the top of the new
                   * content is visible. Else, scroll just far enough that
                   * the bottom of the new content is visible.
                   */
                  if (isMobileWidth()) {
                      scrollPosition -= 150;
                  } else {
                      scrollPosition -= 150;
                  }

                  $('html, body').animate({
                     scrollTop: scrollPosition
                  }, 1000);
              }
          }, time);
      };

      /* Checks to see if content needs to be moved, depending on screen size */
      var moveContentCheck = function($hiddenContentSections) {
          $.each($hiddenContentSections, function() {
              var $t = $(this),
                  $icons = $t.find('.nova-icon-link'),
                  $features = $t.find('.nova-features-hidden-content .column:not(.nova-hidden-content)'),
                  $hiddenContents = '',
                  $hiddenContentContainer = $t.find('.nova-hidden-content-container');

              /*
               * The hidden content originally starts directly below its related icon.
               * If desktop size, move all the content to the hidden content container.
               */
              if (!isMobileWidth()) {
                $('.nova-features-hidden-content').each(function(){
                   var $lis = $(this).children('.sm-span4');
                   for(var i = 0, len = $lis.length; i < len; i+=3){          
                     $lis.slice(i, i+3).wrapAll("<div class='flexrow'></div>");
                  }
                });
                  $hiddenContents = $t.find('.nova-hidden-content');

                  $.each($hiddenContents, function() {
                      var $thisContent = $(this);
                      $thisContent.detach();
                      $hiddenContentContainer.append($thisContent);
                  });
              /*
               * If mobile size and the content had been moved to the hidden content container,
               * move it back below its related icon.
               */
              } else if (isMobileWidth() && $hiddenContentContainer.find('.nova-hidden-content').length > 0) {
                  $hiddenContents = $hiddenContentContainer.find('.nova-hidden-content');

                  $.each($hiddenContents, function() {
                      var $thisContent = $(this),
                          $index = $hiddenContents.index($thisContent),
                          $relatedFeature = $features.eq($index);

                      $thisContent.detach();
                      $relatedFeature.after($thisContent);
                  });
              }
          });
      }

      /*
       * Checks to see if content needs to be moved
       * on page load and window resize.
       */
      moveContentCheck($hiddenContentSections);
      $window.resize(function() {
          moveContentCheck($hiddenContentSections);
      });

      /* Hidden content opening logic */
      $.each($hiddenContentSections, function() {
          var $t = $(this),
              $links = $t.find('.nova-full-cover-link'),
              $hiddenContents = $t.find('.nova-hidden-content'),
              $hiddenContentContainer = $t.find('.nova-hidden-content-container'),
              $closeButtons = $t.find('.nova-hidden-content-close'),
              duration = 600;

          $links.click(function(e) {
              e.preventDefault();

              var $thisLink = $(this),
                  $relatedContent = '';

              /*
               * If mobile size, the content is in the next column.
               * else it is the content in the hidden content container.
               */
              if (isMobileWidth()) {
                  $relatedContent = $thisLink.parents('.column').next();
              } else {
                  var $index = $links.index($thisLink);
                  $relatedContent = $hiddenContents.eq($index);
              }

              var $otherHiddenContents = $hiddenContents.not($relatedContent);

              /*
               * If other hidden contents are open,
               * close them before opening the new content and scrolling to it.
               */
              if ($otherHiddenContents.filter(':visible').length > 0) {
                  $otherHiddenContents.slideUp(duration);
                  setTimeout(function() {
                      $relatedContent.slideToggle(duration);
                      scrollToContent($relatedContent, duration);
                  }, duration);
              /* Else simply open the content and scroll to it */
              } else {
                  $relatedContent.slideToggle(duration);
                  scrollToContent($relatedContent, duration);
              }
          });

          /* Close buttons functionality */
          $closeButtons.click(function(e) {
              e.preventDefault();
              $links.parent('.nova-area').removeClass('nova-link-active');
              $(this).parents('.nova-hidden-content').slideUp();
              $('html, body').animate({
                 scrollTop: $(window).scrollTop() - 200
              }, 500);
          });
      });
	  
	  
var support = { animations : Modernizr.cssanimations },
	container = document.getElementById( 'ip-container' ),
	header = container.querySelector( 'header.ip-header' ),
	loader = new PathLoader( document.getElementById( 'ip-loader-circle' ) ),
	animEndEventNames = { 'WebkitAnimation' : 'webkitAnimationEnd', 'OAnimation' : 'oAnimationEnd', 'msAnimation' : 'MSAnimationEnd', 'animation' : 'animationend' },
	// animation end event name
	animEndEventName = animEndEventNames[ Modernizr.prefixed( 'animation' ) ];

function init() {
	var onEndInitialAnimation = function() {
		if( support.animations ) {
			this.removeEventListener( animEndEventName, onEndInitialAnimation );
		}

		startLoading();
	};

	// disable scrolling
	window.addEventListener( 'scroll', noscroll );

	// initial animation
	classie.add( container, 'loading' );

	if( support.animations ) {
		container.addEventListener( animEndEventName, onEndInitialAnimation );
	}
	else {
		onEndInitialAnimation();
	}
}

function startLoading() {
	// simulate loading something..
	var simulationFn = function(instance) {
		var progress = 0,
			interval = setInterval( function() {
				progress = Math.min( progress + Math.random() * 0.1, 1 );

				instance.setProgress( progress );

				// reached the end
				if( progress === 1 ) {
					classie.remove( container, 'loading' );
					classie.add( container, 'loaded' );
					clearInterval( interval );

					var onEndHeaderAnimation = function(ev) {
						if( support.animations ) {
							if( ev.target !== header ) return;
							this.removeEventListener( animEndEventName, onEndHeaderAnimation );
						}

						classie.add( document.body, 'layout-switch' );
						window.removeEventListener( 'scroll', noscroll );
					};

					if( support.animations ) {
						header.addEventListener( animEndEventName, onEndHeaderAnimation );
					}
					else {
						onEndHeaderAnimation();
					}
				}
			}, 80 );
	};

	loader.setProgressFn( simulationFn );
}

function noscroll() {
	window.scrollTo( 0, 0 );
}

init();
});