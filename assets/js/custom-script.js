/*Geyer-Custom-Script*/
/*window.onbeforeunload = function (e) {
    window.onunload = function () {
            window.localStorage.isAnnouncementActive = false;
    }
    return undefined;
};*/

window.onload = function () {
						if (window.localStorage.isAnnouncementActive == undefined || window.localStorage.isAnnouncementActive == "true"){
							window.localStorage.isAnnouncementActive = true;
							jQuery('.announcement').css('right','0');
						}
};

jQuery(".announcement .close").on('click',function(){
   window.localStorage.isAnnouncementActive = false;
	 jQuery('.announcement').css('right','-600px');
});

jQuery( document ).ready( function( $ ) {
		$('section .stickybar').theiaStickySidebar({additionalMarginTop: 100});
		var logo_url = jQuery('header .logo img').attr('src');
        $('#primary-menu').cookcodesmenu({
			display: 990,
			label:'',
            brand: '<a href="'+site_url+'"><img src="'+logo_url+'" alt="Sennovate Logo"></a>'
        });
				jQuery('.cookcodesmenu_nav').append('<div class="cta"></div>');
				jQuery('.cookcodesmenu_nav .cta').html(jQuery('header .btn').clone());
	/*sticky-menu*/
	var nav = $('.site-header');
	if ( $(window).width() > 768) {
		$(window).scroll(function () {
			if ($(this).scrollTop() > 80)
			{
				nav.addClass("f-nav");
			} else
			{
				nav.removeClass("f-nav");}
		});
	}
	else {

	}


	// Back to top button
  $(window).scroll(function() {
    if ($(this).scrollTop() > 100) {
      $('.back-to-top').fadeIn('slow');
    } else {
      $('.back-to-top').fadeOut('slow');
    }
  });

  $('.back-to-top').click(function() {
    $('html, body').animate({
      scrollTop: 0
    }, 1500);
    return false;
  });


});/*ready-funtion-end*/


//custom-js
!(function($) {
  "use strict";

  // Preloader
  $(window).on('load', function() {
    if ($('#preloader').length) {
      $('#preloader').delay(100).fadeOut('slow', function() {
        //$(this).remove();
      });
    }
  });

  // Smooth scroll for the navigation menu
  var scrolltoOffset = $('#header').outerHeight() - 1;
  $(document).on('click', '.nav-menu a, .mobile-nav a, .scrollto', function(e) {
    if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
      var target = $(this.hash);
      if (target.length) {
        e.preventDefault();

        var scrollto = target.offset().top - scrolltoOffset;

        if ($(this).attr("href") == '#header') {
          scrollto = 0;
        }

        $('html, body').animate({
          scrollTop: scrollto
        }, 1500, 'easeInOutExpo');

        return false;
      }
    }
  });

  // Activate smooth scroll
  $(document).ready(function() {
    if (window.location.hash) {
      var initial_nav = window.location.hash;
      if ($(initial_nav).length) {
        var scrollto = $(initial_nav).offset().top - scrolltoOffset;
        $('html, body').animate({
          scrollTop: scrollto
        }, 1500, 'easeInOutExpo');
      }
    }
  });

  // Toggle
  $(window).scroll(function() {
    if ($(this).scrollTop() > 100) {
      $('#header').addClass('header-scrolled');
      $('#topbar').addClass('topbar-scrolled');
    } else {
      $('#header').removeClass('header-scrolled');
      $('#topbar').removeClass('topbar-scrolled');
    }
  });

  if ($(window).scrollTop() > 100) {
    $('#header').addClass('header-scrolled');
    $('#topbar').addClass('topbar-scrolled');
  }


jQuery('img.svg').each(function(){
    var $img = jQuery(this);
    var imgID = $img.attr('id');
    var imgClass = $img.attr('class');
    var imgURL = $img.attr('src');

    jQuery.get(imgURL, function(data) {
        var $svg = jQuery(data).find('svg');
        if(typeof imgID !== 'undefined') {
            $svg = $svg.attr('id', imgID);
        }
        if(typeof imgClass !== 'undefined') {
            $svg = $svg.attr('class', imgClass+' replaced-svg');
        }
        $svg = $svg.removeAttr('xmlns:a');
        if(!$svg.attr('viewBox') && $svg.attr('height') && $svg.attr('width')) {
            $svg.attr('viewBox', '0 0 ' + $svg.attr('height') + ' ' + $svg.attr('width'))
        }
        $img.replaceWith($svg);

    }, 'xml');

});

})(jQuery);

/*owl-slider*/

jQuery('#home_banner').owlCarousel({
    loop:true,
		items:1,
		nav:true,
		dots:false,
    margin:10
})

jQuery('#testimonial_slider').owlCarousel({
	loop:true,
	nav:false,
	items:1,
	dots: true,
	lazyLoad: true,
	animateOut: 'fadeOut',
	autoplay:true
})

jQuery('.gallery').owlCarousel({
	loop:true,
	nav:false,
	items:2,
	dots: true,
	lazyLoad: true,
	animateOut: 'fadeOut',
	autoplay:false
})


jQuery(document).on('click', '[data-toggle="lightbox"]', function(event) {
      event.preventDefault();
      jQuery(this).ekkoLightbox({
				alwaysShowClose:true
			});
});
