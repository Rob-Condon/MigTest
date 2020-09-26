<?php

/**
 * Element Definition: Post Block
 */

class EACS_Post_Block {

	public function ui() {
		return array(
        'name'        => 'eacs-post-block',
     		'title' => __( 'EA Post Block', 'essential-addons-cs' ),
        'icon_id' => 'block-grid',
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



