<?php

/**
 * Element Controls : Instagram Feed
 */

return array(


	// Access Token

	'access_token' => array(
		'type'    => 'text',
		'ui' => array(
			'title'   => __( 'Access Token <a href="http://instagramwordpress.rafsegat.com/docs/get-access-token/" class="eacs-btn" target="_blank">Get Token</a>', 'essential-addons-cs' ),
			'tooltip' => __( 'Provide Access token in your Instagram account.', 'essential-addons-cs' ),
		),
		'context' => 'content',
    'suggest' => __( '', 'essential-addons-cs' ),
	),

	// User ID

	'user_id' => array(
		'type'    => 'text',
		'ui' => array(
			'title'   => __( 'User ID <a href="https://smashballoon.com/instagram-feed/find-instagram-user-id/" class="eacs-btn" target="_blank">Get User ID</a>', 'essential-addons-cs' ),
			'tooltip' => __( 'Provide User ID to get feed.', 'essential-addons-cs' ),
		),
		'context' => 'content',
    'suggest' => __( '', 'essential-addons-cs' ),
	),


	// Client ID

	'client_id' => array(
	'type' => 'text',
	'ui' => array(
	  'title' => __( 'Client ID <a href="https://www.instagram.com/developer/clients/manage/" class="eacs-btn" target="_blank">Get Client ID</a>', 'essential-addons-cs' ),
	  'tooltip' => __( 'Provide Client ID', 'essential-addons-cs' )
	),
	'context' => 'content',
	'suggest' => __( '', 'essential-addons-cs' )
	),

	// Feed Source

	'feed_source' => array(
		'type' => 'select',
		'ui'   => array(
			'title' => __( 'Instagram Feed Source', 'essential-addons-cs' ),
      'tooltip' => __( 'Select either user or hastag', 'essential-addons-cs' ),
		),
		'options' => array(
			'choices' => array(
        array( 'value' => 'user',        'label' => __( 'User', 'essential-addons-cs' ) ),
        array( 'value' => 'tagged',      'label' => __( 'Hashtag', 'essential-addons-cs' ) )
      ),
		),
	),


	// Tag Name

	'hashtag' => array(
		'type'    => 'text',
		'ui' => array(
			'title'   => __( 'Hashtag', 'essential-addons-cs' ),
			'tooltip' => __( 'Provide the hashtag you want to display.', 'essential-addons-cs' ),
		),
		'context' => 'content',
    'suggest' => __( 'cars', 'essential-addons-cs' ),
		'condition' => array(
      'feed_source' => 'tagged'
    )
	),


	// Max Images

	'max_visible_images' => array(
		'type'    => 'number',
		'ui' => array(
			'title'   => __( 'Max visible images', 'essential-addons-cs' ),
			'tooltip' => __( 'Select how many images you want to show in feed', 'essential-addons-cs' ),
		),
    'suggest' => __( '12', 'essential-addons-cs' ),
	),


	// Number of Columns

	'image_columns' => array(
		'type' => 'select',
		'ui'   => array(
			'title' => __( 'Number of Columns', 'essential-addons-cs' ),
      'tooltip' => __( 'Set the column numbers', 'essential-addons-cs' ),
		),
		'options' => array(
			'choices' => array(
        array( 'value' => 'single_column',      'label' => __( 'Single Column', 'essential-addons-cs' ) ),
        array( 'value' => 'two_columns',        'label' => __( 'Two Columns', 'essential-addons-cs' ) ),
        array( 'value' => 'three_columns',      'label' => __( 'Three Columns', 'essential-addons-cs' ) ),
        array( 'value' => 'four_columns',       'label' => __( 'Four Columns', 'essential-addons-cs' ) ),
        array( 'value' => 'five_columns',       'label' => __( 'Five Columns', 'essential-addons-cs' ) ),
        array( 'value' => 'six_columns', 		'label' => __( 'Six Columns', 'essential-addons-cs' ) )
      ),
		),
	),

	// Item Padding

	'image_padding' => array(
	 	'type' => 'dimensions',
	 	'ui' => array(
			'title'   => __( 'Spacing between items', 'essential-addons-cs' )
		)
	),

	// Image Resolution

	'image_resolution' => array(
		'type' => 'select',
		'ui'   => array(
			'title' => __( 'Image Resolution', 'essential-addons-cs' ),
      'tooltip' => __( 'Set the image resolution you want to pull from Instagram', 'essential-addons-cs' ),
		),
		'options' => array(
			'choices' => array(
        array( 'value' => 'thumbnail',        'label' => __( 'Thumbnail (150x150)', 'essential-addons-cs' ) ),
        array( 'value' => 'low_resolution',       'label' => __( 'Low Res (306x306)', 'essential-addons-cs' ) ),
        array( 'value' => 'standard_resolution',        'label' => __( 'Standard (612x612)', 'essential-addons-cs' ) )
      ),
		),
	),

	// Sort by
	'sort_images' => array(
		'type' => 'select',
		'ui'   => array(
			'title' => __( 'Sort by', 'essential-addons-cs' ),
      'tooltip' => __( 'Sort images by type.', 'essential-addons-cs' ),
		),
		'options' => array(
			'choices' => array(
        array( 'value' => 'none',        'label' => __( 'None', 'essential-addons-cs' ) ),
        array( 'value' => 'most-recent',        'label' => __( 'Most Recent', 'essential-addons-cs' ) ),
        array( 'value' => 'least-recent',       'label' => __( 'Least Recent', 'essential-addons-cs' ) ),
        array( 'value' => 'most-liked',       'label' => __( 'Most Likes', 'essential-addons-cs' ) ),
        array( 'value' => 'least-liked',       'label' => __( 'Least Likes', 'essential-addons-cs' ) ),
        array( 'value' => 'most-commented',       'label' => __( 'Most Commented', 'essential-addons-cs' ) ),
        array( 'value' => 'least-commented',       'label' => __( 'Least Commented', 'essential-addons-cs' ) ),
        array( 'value' => 'random',        'label' => __( 'Random', 'essential-addons-cs' ) )
      ),
		),
	),


	// Enable Link

	'enable_link' => array(
		'type'    => 'toggle',
		'ui' => array(
			'title'   => __( 'Enable Link?', 'essential-addons-cs' ),
			'tooltip' => __( 'Enable link to the images to original Instagram post.', 'essential-addons-cs' ),
		)
	),


	// Link Target

	'link_target' => array(
		'type'    => 'toggle',
		'ui' => array(
			'title'   => __( 'Open in new window?', 'essential-addons-cs' ),
			'tooltip' => __( 'Enable if you want to open the link in new tab', 'essential-addons-cs' ),
		),
		'condition' => array(
      'enable_link' => true
    )
	),


	// Show Caption

	'show_caption' => array(
		'type'    => 'toggle',
		'ui' => array(
			'title'   => __( 'Show Caption?', 'essential-addons-cs' ),
			'tooltip' => __( 'Show or hide image caption', 'essential-addons-cs' ),
		)
	),

	// Caption Text Color

	'caption_text_color' => array(
	 	'type' => 'color',
	 	'ui' => array(
			'title'   => __( 'Caption Text Color', 'essential-addons-cs' )
		)
	),

	// Like Comments Color

	'like_comments_color' => array(
	 	'type' => 'color',
	 	'ui' => array(
			'title'   => __( 'Like Comments Color', 'essential-addons-cs' )
		)
	),

	// Overlay Color

	'overlay_color' => array(
	 	'type' => 'color',
	 	'ui' => array(
			'title'   => __( 'Overlay Color', 'essential-addons-cs' )
		)
	),	

);