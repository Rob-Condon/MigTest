<?php

/**
 * Element Definition: Post Timeline
 */

class EACS_Post_Timeline {

	public function ui() {
		return array(
        'name'        => 'eacs-post-timeline',
     		'title' => __( 'EA Post Timeline', 'essential-addons-cs' ),
        'icon_id' => 'feature-list',
    );
	}

	public function flags() {
		// dynamic_child allows child elements to render individually, but may cause
		// styling or behavioral issues in the page builder depending on how your
		// shortcodes work. If you have trouble with element presentation, try
		// removing this flag.
		return array(
			'dynamic_child' => false
		);
	}

}


?>
