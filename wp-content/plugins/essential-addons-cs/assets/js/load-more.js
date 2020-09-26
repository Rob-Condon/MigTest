/**
 * Load More js
 */
;(function($) {
	'use strict';

	window.loadMore = function( options, settings ) {

		// Default Values for Load More Js
		var optionsValue = {
			siteUrl: options.siteUrl,
			totalPosts: options.totalPosts,
			loadMoreBtn: options.loadMoreBtn,
			postContainer: options.postContainer,
			postStyle: options.postStyle, // block, grid, timeline
		}

		// Settings Values
		var settingsValue = {
			stylePreset: settings.stylePreset,
			postType: settings.postType,
			perPage: settings.perPage,
			postOrder: settings.postOrder,
			showImage: settings.showImage,
			showTitle: settings.showTitle,
			showExcerpt: settings.showExcerpt,
			showMeta: settings.showMeta,
			metaPosition: settings.metaPosition,
			excerptLength: settings.excerptLength,
			btnText: settings.btnText,
			categories: settings.categories,
		}

		var offset = settingsValue.perPage;

		$( '#'+optionsValue.loadMoreBtn ).on( 'click', function( e ) {
			// e.preventDefault();
			$(this).addClass( 'button--loading' );
			$(this).find( 'span' ).html( 'Loading...' );

			// Rest Api Url Settings
			if( settingsValue.postType == 'post' ) {
				if( settings.categories == '' ) {
					var restUrl = optionsValue.siteUrl+'wp-json/wp/v2/'+settings.postType+'s?per_page='+settingsValue.perPage+'&offset='+offset+'&_embed';
				}else {
					var restUrl = optionsValue.siteUrl+'wp-json/wp/v2/'+settings.postType+'s?categories='+settingsValue.categories+'&per_page='+settingsValue.perPage+'&offset='+offset+'&_embed';
				}
			}else {
				if( settings.categories == '' ) {
					var restUrl = optionsValue.siteUrl+'wp-json/wp/v2/'+settings.postType+'?per_page='+settingsValue.perPage+'&offset='+offset+'&_embed';
				}else {
					var restUrl = optionsValue.siteUrl+'wp-json/wp/v2/'+settings.postType+'?categories='+settingsValue.categories+'&per_page='+settingsValue.perPage+'&offset='+offset+'&_embed';
				}
			}

			$.ajax({
				url: restUrl,
				type: 'GET',
				success: function( res ) {
					createPostHtml( res );
					if( optionsValue.postStyle === 'grid' ) {
						$( '.eacs-post-grid:not(.eacs-post-carousel)' ).masonry( 'destroy' );
						$('.eacs-post-grid:not(.eacs-post-carousel)').masonry({
					      itemSelector: '.eacs-grid-post',
					      percentPosition: true,
					      columnWidth: '.eacs-post-grid-column'
					    });
					}
					$( '#'+optionsValue.loadMoreBtn ).removeClass( 'button--loading' );
					$( '#'+optionsValue.loadMoreBtn ).find( 'span' ).html( settingsValue.btnText );

					offset = offset + settingsValue.perPage;
					if( offset >= optionsValue.totalPosts ) {
						$( '#'+optionsValue.loadMoreBtn ).remove();
					}
				},
				error: function( err ) {
					console.log( 'Something went wrong!' );
				}
			});
		} );

		/**
		 * Create Html Post Block
		 */
		function createPostHtml( data ) {

			if( optionsValue.postStyle === 'timeline' ) {
				var html = '';
				for (var i = 0; i < data.length; i++) {
				    // Get Image
				    if (data[i]._links['wp:featuredmedia'] && settingsValue.showImage == false) {
				        var feature_image = 'style="background-image: url(' + data[i]._embedded['wp:featuredmedia'][0].source_url + ');"';
				    } else {
				        var feature_image = '';
				    }
				    // Get Date
				    var getPostDate = new Date(data[i].date);

				    html += '<article id="post-'+data[i].id+'" class="eacs-timeline-post eacs-timeline-column post-'+data[i].id+' post type-post status-publish format-standard has-post-thumbnail hentry category-travel">';
				    	html += '<div class="eacs-timeline-bullet"></div>';
				    	html += '<div class="eacs-timeline-post-inner">';
				    		html += '<a class="eacs-timeline-post-link" href="'+data[i].link+'" title="Permalink to: &quot;Post Title 7&quot;" target="_blank">';
				    			html += '<time datetime="'+get_post_date( getPostDate )+'">'+get_post_date( getPostDate )+'</time>';
				    			html += '<div class="eacs-timeline-post-image" '+feature_image+'"></div>';
				    			if( settingsValue.showExcerpt == true ) {
					    			html += '<div class="eacs-timeline-post-excerpt">';
					    				html += ''+data[i].excerpt.rendered.split( /\s+/ ).slice( 0, settingsValue.excerptLength ).join( " " )+'';
					    			html += '</div>';
				    			}
				    			html += '<div class="eacs-timeline-post-title">';
				    				html += '<h2>'+data[i].title.rendered+'</h2>';
				    			html += '</div>';
				    		html += '</a>';
				    	html += '</div>';
				    html += '</article>';
				}
				$( '.'+optionsValue.postContainer ).append( html );
			}else if( optionsValue.postStyle === 'grid' ) {
				var html = '';
				for( var i = 0; i < data.length; i++ ) {
					// Get Image
					if( data[i]._links['wp:featuredmedia'] ) {
						var feature_image = '<img src="'+data[i]._embedded['wp:featuredmedia'][0].source_url+'" />';
					}else {
						var feature_image = '';
					}
					// Get Date
					var getPostDate = new Date( data[i].date );

					html += '<article id="post-'+data[i].id+'" class="eacs-grid-post eacs-post-grid-column" style="position: absolute; left: 0%; top: 0px;">';
						html += '<div class="eacs-grid-post-holder">';
							html += '<div class="eacs-grid-post-holder-inner">';
								if( settingsValue.showImage == false  ) {
								html += '<div class="eacs-entry-media">';
									html += '<div class="eacs-entry-overlay"><i class="fa fa-long-arrow-right" aria-hidden="true"></i>';
										html += '<a href="'+data[i].link+'"></a>';
									html += '</div>';
									html += '<div class="eacs-entry-thumbnail">'+feature_image+'</div>';
								html += '</div>';
								}
								html += '<div class="eacs-entry-wrapper">';
									html += '<header class="eacs-entry-header">';
										html += '<h2 class="eacs-entry-title"><a class="eacs-grid-post-link" href="'+data[i].link+'" title="'+data[i].title.rendered+'">'+data[i].title.rendered+'</a></h2>';
										if( settingsValue.showMeta != 'hide-post-meta' && settingsValue.metaPosition === 'entry-header' ) {
										html += '<div class="eacs-entry-meta">';
											html += '<span class="eacs-posted-by"><a href="'+data[i]._embedded.author[0].link+'">'+data[i]._embedded.author[0].name+'</a></span>';
											html += '<span class="eacs-posted-on"><time datetime="'+get_post_date( getPostDate )+'">'+get_post_date( getPostDate )+'</time></span>';
										html += '</div>';
										}
									html += '</header>';
									html += '<div class="eacs-entry-content">';
										html += '<div class="eacs-grid-post-excerpt">';
											html += '<p>'+data[i].excerpt.rendered.split( /\s+/ ).slice( 0, settingsValue.excerptLength ).join( " " )+'</p>';
										html += '</div>';
									html += '</div>';
								html += '</div>';
								if( settingsValue.metaPosition == 'entry-footer' ) {
								html += '<div class="eacs-entry-footer">';
									html += '<div class="eacs-author-avatar">';
										html += '<a href="'+data[i]._embedded.author[0].link+'"><img alt="" src="'+data[i]._embedded.author[0].avatar_urls[96]+'" srcset="'+data[i]._embedded.author[0].avatar_urls[96]+'" class="avatar avatar-96 photo" height="96" width="96"></a>';
									html += '</div>';
									html += '<div class="eacs-entry-meta">';
										html += '<div class="eacs-posted-by"><a href="'+data[i]._embedded.author[0].link+'">'+data[i]._embedded.author[0].name+'</a></div>';
										html += '<div class="eacs-posted-on">';
											html += '<time datetime="'+get_post_date( getPostDate )+'">'+get_post_date( getPostDate )+'</time>';
										html += '</div>';
									html += '</div>';
								html += '</div>';
								}
							html += '</div>';
						html += '</div>';
					html += '</article>';
				}
				$( '.'+optionsValue.postContainer ).append( html );
			}else if( optionsValue.postStyle === 'block' ) {
				var html = '';
				for ( var i = 0; i < data.length; i++ ) {
				    // Get Image
				    if ( data[i]._links['wp:featuredmedia'] ) {
				        var feature_image = '<img src="' + data[i]._embedded['wp:featuredmedia'][0].source_url + '" />';
				    } else {
				        var feature_image = '';
				    }
				    // Get Date
				    var getPostDate = new Date( data[i].date );

				    html += '<article id="post-'+data[i].id+'" class="eacs-post-block-item">';
					    html += '<div class="eacs-post-block-item-holder">';
					    	html += '<div class="eacs-post-block-item-holder-inner">';

					    		if( settingsValue.showImage == false  ) {
					    		html += '<div class="eacs-entry-media">';
					    			html += '<div class="eacs-entry-overlay">';
					    				html += '<i class="fa fa-long-arrow-right" aria-hidden="true"></i>';
					    				html += '<a href="'+data[i].link+'" target="_blank"></a>';
					    			html += '</div>';
					    			html += '<div class="eacs-entry-thumbnail">'+feature_image+'</div>';
					    		html += '</div>';
					    		}

					    		html += '<div class="eacs-entry-wrapper">';
					    			html += '<header class="eacs-entry-header">';
					    				html += '<h2 class="eacs-entry-title"><a class="eacs-grid-post-link" href="'+data[i].link+'" title="'+data[i].title.rendered+'">'+data[i].title.rendered+'</a></h2>';
					    				if( settingsValue.showMeta != 'hide-post-meta' && settingsValue.metaPosition === 'entry-header' ) {
						    			html += '<div class="eacs-entry-meta">';
						    				html += '<span class="eacs-posted-by"><a href="'+data[i]._embedded.author[0].link+'" target="_blank">'+data[i]._embedded.author[0].name+'</a></span>';
						    				html += '<span class="eacs-posted-on"><time datetime="'+get_post_date( getPostDate )+'">'+get_post_date( getPostDate )+'</time></span>';
						    			html += '</div>';
						    			}
					    			html += '</header>';

					    			html += '<div class="eacs-entry-content">';
					    				html += '<div class="eacs-grid-post-excerpt">';
					    					html += '<p>'+data[i].excerpt.rendered.split( /\s+/ ).slice( 0, settingsValue.excerptLength ).join( " " )+'</p>';
					    				html += '</div>';
					    			html += '</div>';

					    			if( settingsValue.stylePreset == 'post-block-style-overlay' ) {
					    			html += '<div class="eacs-entry-overlay">';
					    				html += '<i class="fa fa-long-arrow-right" aria-hidden="true"></i>';
					    				html += '<a href="'+data[i].link+'"></a>';
					    			html += '</div>';
					    			}

					    			if( settingsValue.metaPosition == 'entry-footer' ) {
					    			html += '<div class="eacs-entry-footer">';
					    				html += '<div class="eacs-author-avatar">';
					    					html += '<a href="'+data[i]._embedded.author[0].link+'"><img alt="" src="'+data[i]._embedded.author[0].avatar_urls[96]+'" srcset="'+data[i]._embedded.author[0].avatar_urls[96]+'" class="avatar avatar-96 photo" height="96" width="96"></a>';
					    				html += '</div>';
						    			html += '<div class="eacs-entry-meta">';
						    				html += '<div class="eacs-posted-by"><a href="'+data[i]._embedded.author[0].link+'">'+data[i]._embedded.author[0].name+'</a></div>';
						   	 				html += '<div class="eacs-posted-on">';
						    					html += '<time datetime="'+get_post_date( getPostDate )+'">'+get_post_date( getPostDate )+'</time>';
						    				html += '</div>';
						    			html += '</div>';
					    			html += '</div>';
						    		}

					    		html += '</div>';
					    		if( settingsValue.metaPosition == 'entry-footer' ) {
					    		html += '<div class="eacs-entry-footer">';
					    			html += '<div class="eacs-author-avatar">';
					    				html += '<a href="'+data[i]._embedded.author[0].link+'"><img alt="" src="'+data[i]._embedded.author[0].avatar_urls[96]+'" srcset="'+data[i]._embedded.author[0].avatar_urls[96]+'" class="avatar avatar-96 photo" height="96" width="96"></a>';
					    			html += '</div>';
					    			html += '<div class="eacs-entry-meta">';
					    				html += '<div class="eacs-posted-by"><a href="'+data[i]._embedded.author[0].link+'">'+data[i]._embedded.author[0].name+'</a></div>';
					    				html += '<div class="eacs-posted-on">';
					    					html += '<time datetime="'+get_post_date( getPostDate )+'">'+get_post_date( getPostDate )+'</time>';
					    				html += '</div>';
					    		html += '</div>';
					    		}

					    	html += '</div>';
					    html += '</div>';
				    html += '</article>';
				}
				$( '.'+optionsValue.postContainer ).append( html );
			}

		}

	}

	/**
	 * Get Date
	 */
	function get_post_date( date ) {
		var getDate = new Date( date );
		var month = new Array();
		month[0] = "January";
		month[1] = "February";
		month[2] = "March";
		month[3] = "April";
		month[4] = "May";
		month[5] = "June";
		month[6] = "July";
		month[7] = "August";
		month[8] = "September";
		month[9] = "October";
		month[10] = "November";
		month[11] = "December";
		var dayNum = getDate.getDate();
		var monthName = month[ getDate.getMonth() ];
		var getYear = getDate.getFullYear();

		var returnYear = monthName + ' ' + dayNum + ', ' + getYear;
		return returnYear;
	}

})(jQuery);