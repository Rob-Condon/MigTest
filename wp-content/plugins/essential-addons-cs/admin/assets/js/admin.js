( function( $ ) {
	'use strict';
	// Init jQuery Ui Tabs
	$( ".eacs-settings-tabs" ).tabs();

	// Adding link id after the url
	$('.eacs-settings-tabs ul li a').click(function () {
		var tabUrl = $(this).attr( 'href' );
	   	window.location.hash = tabUrl;
	   	$('html, body').scrollTop(tabUrl);
	});

	// Saving Data With Ajax Request
	$( 'form#eacs-settings' ).on( 'submit', function(e) {
		e.preventDefault();

		// var countDown 			= $( '#count-down' ).attr( 'checked' ) ? 1 : 0;
		// var creativeBtn 		= $( '#creative-btn' ).attr( 'checked' ) ? 1 : 0;
		// var imgComparison 		= $( '#img-comparison' ).attr( 'checked' ) ? 1 : 0;
		// var instagramFeed 		= $( '#instagram-feed' ).attr( 'checked' ) ? 1 : 0;
		// var interactivePromo 	= $( '#interactive-promo' ).attr( 'checked' ) ? 1 : 0;
		// var lightBox 			= $( '#lightbox' ).attr( 'checked' ) ? 1 : 0;
		// var logoCarousel 		= $( '#logo-carousel' ).attr( 'checked' ) ? 1 : 0;
		// var logoCarouselItem 	= $( '#logo-carousel-item' ).attr( 'checked' ) ? 1 : 0;
		// var postBlock 			= $( '#post-block' ).attr( 'checked' ) ? 1 : 0;
		// var postCarousel 		= $( '#post-carousel' ).attr( 'checked' ) ? 1 : 0;
		// var postGrid 			= $( '#post-grid' ).attr( 'checked' ) ? 1 : 0;
		// var postTimeline 		= $( '#post-timeline' ).attr( 'checked' ) ? 1 : 0;
		// var productCarousel 	= $( '#product-carousel' ).attr( 'checked' ) ? 1 : 0;
		// var productGrid 		= $( '#product-grid' ).attr( 'checked' ) ? 1 : 0;
		// var socialIcons 		= $( '#social-icons' ).attr( 'checked' ) ? 1 : 0;
		// var socialIconsItem 	= $( '#social-icons-item' ).attr( 'checked' ) ? 1 : 0;
		// var teamMembers 		= $( '#team-members' ).attr( 'checked' ) ? 1 : 0;
		// var teamMembersItem 	= $( '#team-members-item' ).attr( 'checked' ) ? 1 : 0;
		// var testimonialItem 	= $( '#testimonial-item' ).attr( 'checked' ) ? 1 : 0;
		// var testimonialSlider 	= $( '#testimonial-slider' ).attr( 'checked' ) ? 1 : 0;

		$.ajax( {
			url: settings.ajaxurl,
			type: 'post',
			data: {
				action: 'save_settings_with_ajax',
				fields: $( 'form#eacs-settings' ).serialize(),
			},
			success: function( response ) {
				swal(
				  'Settings Saved!',
				  'Click OK to continue',
				  'success'
				);
			},
			error: function() {
				swal(
				  'Oops...',
				  'Something went wrong!',
				  'error'
				);
			}
		} );

	} );

} )( jQuery );
