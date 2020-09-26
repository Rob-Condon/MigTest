<?php

/**
 * Element Definition: Social Icons Item
 */

class EACS_Social_Icons_Item {

	public function ui() {
		return array(
      'title' => __( 'Social Icons Item', 'essential-addons-cs' )
    );
	}

	public function flags() {
		return array(
      'child' => true
    );
	}

}