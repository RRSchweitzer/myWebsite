/**
 * Created by Ryan1 on 11/30/16.
 */
console.log("hello");
(function(window) {
    'use strict';

    function extend(a, b) {
        for (var key in b) {
            if (b.hasOwnProperty(key)) {
                a[key] = b[key];
            }
        }
        return a;
    }

    function DotNav(el, options) {
        this.nav = el;
        this.options = extend({}, this.options);
        extend(this.options, options);
        this._init();
    }

    DotNav.prototype.options = {};

    DotNav.prototype._init = function() {
        // special case "dotstyle-hop"
        var hop = this.nav.parentNode.className.indexOf('dotstyle-hop') !== -1;

        var dots = [].slice.call(this.nav.querySelectorAll('li')),
            current = 0,
            self = this;

        dots.forEach(function(dot, idx) {
            dot.addEventListener('click', function(ev) {
                // ev.preventDefault();
                if (idx !== current) {
                    dots[current].className = '';

                    // special case
                    if (hop && idx < current) {
                        dot.className += ' current-from-right';
                    }

                    setTimeout(function() {
                        dot.className += ' current';
                        current = idx;
                        if (typeof self.options.callback === 'function') {
                            self.options.callback(current);
                            ev.preventDefault();
                        }
                    }, 25);
                }
            });
        });
    }
    // add to global namespace
    window.DotNav = DotNav;

})(window);

[].slice.call(document.querySelectorAll('.dotstyle > ul')).forEach(function(nav) {
    new DotNav(nav, {
        callback: function(idx) {
            // console.log( nav )
        }
    });
});

// Nav Scroll
$(document).on('click', '.scroll', function(event) {
    // event.preventDefault();
    var target = "#" + this.getAttribute('data-target');
    $('html, body').animate({
        scrollTop: $(target).offset().top
    }, 1000);
});

// burger-nav
$('.burger').on('click', function() {
    $('#burger-nav').addClass('active')
})
$('.close-button').on('click', function() {
    $('#burger-nav').removeClass('active')
})
if ( $(window).width() > 720) {
    $('#burger-nav').removeClass('active')
}

// Remove Side Menu when desktop if open
(function($) {
    var $window = $(window),
        $id = $('#burger-nav');

    $window.resize(function resize(){
        if ($window.width() > 720) {
            return $id.removeClass('active');
        }

        $html.removeClass('active');
    }).trigger('resize');
})(jQuery);





// var didScroll;
// // on scroll, let the interval function know the user has scrolled
// $(document).scroll(function(event) {
//   didScroll = true;
// });
// // run hasScrolled() and reset didScroll status
// setInterval(function() {
//   if (didScroll) {
//     hasScrolled();
//     didScroll = false;
//   }
// }, 250);

// var lastScrollTop = 0;
// var delta = 5;
// var navbarHeight = $('#header').outerHeight();

// function hasScrolled() {
//   scrollPosition = $(this).scrollTop();

//   if (Math.abs(lastScrollTop - scrollPosition) <= delta) {
//     return;
//   }
//   // If current position > last position AND scrolled past navbar...
//   if (scrollPosition > lastScrollTop && scrollPosition > navbarHeight) {
//     $('#header').removeClass('nav-up').addClass('nav-up');
//   } else {
//     if (scrollPosition + $(window).height() < $(document).height()) {
//       $('#header').removeClass('nav-up').addClass('nav-up');
//     }
//   }
//   lastScrollTop = scrollPosition;
// }