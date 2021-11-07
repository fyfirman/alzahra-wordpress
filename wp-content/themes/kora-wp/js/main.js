/*-----------------------------------------------------------------------------------*/
/* 		Mian Js Start 
/*-----------------------------------------------------------------------------------*/
jQuery(document).ready(function(jQuery) {
"use strict"
/*-----------------------------------------------------------------------------------*/
/* 	LOADER
/*-----------------------------------------------------------------------------------*/
jQuery("#loader").delay(500).fadeOut("slow");
/*-----------------------------------------------------------------------------------
    Animated progress bars
/*-----------------------------------------------------------------------------------*/
jQuery('.progress-bars').waypoint(function() {
  jQuery('.progress').each(function(){
    jQuery(this).find('.progress-bar').animate({
      width:jQuery(this).attr('data-percent')
     },500);
});},
	{ 
	offset: '100%',
    triggerOnce: true 
});
/*-----------------------------------------------------------------------------------*/
/* 	ANIMATION
/*-----------------------------------------------------------------------------------*/
var wow = new WOW({
    boxClass:     'animate',      // animated element css class (default is wow)
    animateClass: 'animated', // animation css class (default is animated)
    offset:       100,          // distance to the element when triggering the animation (default is 0)
    mobile:       false        // trigger animations on mobile devices (true is default)
});
wow.init();
/*-----------------------------------------------------------------------------------*/
/* 	SINGLE SLIDE
/*-----------------------------------------------------------------------------------*/
jQuery('.single-slides').owlCarousel({
	items : 1,
	autoplay:false,
	singleItem	: true,
	navText: ["<i class='fa fa-angle-left'></i>","<i class='fa fa-angle-right'></i>"],
	lazyLoad:true,
	nav: true,
	loop:true,
	animateOut: 'fadeOut'	
});
/*-----------------------------------------------------------------------------------*/
/*	LEFT MENU
/*-----------------------------------------------------------------------------------*/
var jQuerylateral_menu_trigger = jQuery('#cd-menu-trigger'),
		jQuerycontent_wrapper = jQuery('.cd-main-content'),
		jQuerynavigation = jQuery('header');

	//open-close lateral menu clicking on the menu icon
	jQuerylateral_menu_trigger.on('click', function(event){
		event.preventDefault();
		
		jQuerylateral_menu_trigger.toggleClass('is-clicked');
		jQuerynavigation.toggleClass('lateral-menu-is-open');
		jQuerycontent_wrapper.toggleClass('lateral-menu-is-open').one('webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend', function(){
			// firefox transitions break when parent overflow is changed, so we need to wait for the end of the trasition to give the body an overflow hidden
			jQuery('body').toggleClass('overflow-hidden');
		});
		jQuery('#cd-lateral-nav').toggleClass('lateral-menu-is-open');
		
		//check if transitions are not supported - i.e. in IE9
		if(jQuery('html').hasClass('no-csstransitions')) {
			jQuery('body').toggleClass('overflow-hidden');
		}
	});

	//close lateral menu clicking outside the menu itself
	jQuerycontent_wrapper.on('click', function(event){
		if( !jQuery(event.target).is('#cd-menu-trigger, #cd-menu-trigger span') ) {
			jQuerylateral_menu_trigger.removeClass('is-clicked');
			jQuerynavigation.removeClass('lateral-menu-is-open');
			jQuerycontent_wrapper.removeClass('lateral-menu-is-open').one('webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend', function(){
				jQuery('body').removeClass('overflow-hidden');
			});
			jQuery('#cd-lateral-nav').removeClass('lateral-menu-is-open');
			//check if transitions are not supported
			if(jQuery('html').hasClass('no-csstransitions')) {
				jQuery('body').removeClass('overflow-hidden');
			}}
	});
	//open (or close) submenu items in the lateral menu. Close all the other open submenu items.
	jQuery('.menu-item-has-children').children('a').on('click', function(event){
		event.preventDefault();
		jQuery(this).toggleClass('submenu-open').next('.sub-menu').slideToggle(200).end().parent('.menu-item-has-children').siblings('.menu-item-has-children').children('a').removeClass('submenu-open').next('.sub-menu').slideUp(200);
	});
});
// Strings & Classes Replacements
jQuery(document).ready(function(){
    // Categories Widget
    jQuery('.widget.widget_categories').each(function(){
        jQuery(this).find('ul').addClass('cate');
    });
    // DropDown Menu
    jQuery('header .simpleNav ul.sub-menu').each(function(){
        jQuery(this).addClass('dropdown');
    });
    jQuery('header .simpleNav ul.sub-menu .menu-item-has-children > a').each(function(){
        jQuery(this).append('<span class="indicator"><i class="fa fa-angle-right"></i></span>');
    });
});



