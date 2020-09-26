<?php
/**
 * Admin Settings Page
 */

if( ! defined( 'ABSPATH' ) ) exit(); // Exit if accessed directly

class Eacs_Admin_Settings {

	private $eacs_default_keys = array( 'count-down', 'creative-btn', 'img-comparison', 'instagram-feed', 'interactive-promo', 'lightbox', 'logo-carousel', 'post-block', 'post-carousel', 'post-grid', 'post-timeline', 'product-carousel', 'product-grid', 'social-icons', 'team-members', 'testimonial-slider' );

	private $eacs_settings;
	private $eacs_get_settings;

	/**
	 * Initializing all default hooks and functions
	 * @param
	 * @return void
	 * @since 2.4.0
	 */
	public function __construct() {

		add_action( 'admin_menu', array( $this, 'create_eacs_admin_menu' ) );
		add_action( 'init', array( $this, 'enqueue_eacs_admin_scripts' ) );
		add_action( 'wp_ajax_save_settings_with_ajax', array( $this, 'eacs_save_settings_with_ajax' ) );

	}

	/**
	 * Loading all essential scripts
	 * @param
	 * @return void
	 * @since 2.4.0
	 */
	public function enqueue_eacs_admin_scripts() {

		if( isset( $_GET['page'] ) && $_GET['page'] == 'eacs-settings' ) {
			wp_enqueue_style( 'essential_addons_elementor-admin-css', plugins_url( '/', __FILE__ ).'assets/css/admin.css' );
			wp_enqueue_style( 'font-awesome-css', plugins_url( '/', __FILE__ ).'assets/vendor/font-awesome/css/font-awesome.min.css' );
			wp_enqueue_style( 'essential_addons_elementor-sweetalert2-css', plugins_url( '/', __FILE__ ).'assets/vendor/sweetalert2/css/sweetalert2.min.css' );

			wp_enqueue_script( "jquery-ui-tabs" );
			wp_enqueue_script( 'essential_addons_elementor-admin-js', plugins_url( '/', __FILE__ ).'assets/js/admin.js', array( 'jquery', 'jquery-ui-tabs' ), '1.0', true );
			wp_enqueue_script( 'essential_addons_core-js', plugins_url( '/', __FILE__ ).'assets/vendor/sweetalert2/js/core.js', array( 'jquery' ), '1.0', true );
			wp_enqueue_script( 'essential_addons_sweetalert2-js', plugins_url( '/', __FILE__ ).'assets/vendor/sweetalert2/js/sweetalert2.min.js', array( 'jquery', 'essential_addons_core-js' ), '1.0', true );
		}

	}

	/**
	 * Create an admin menu.
	 * @param
	 * @return void
	 * @since 2.4.0
	 */
	public function create_eacs_admin_menu() {

		add_menu_page(
			'Essential Addons Cornerstone',
			'Essential Addons Cornerstone',
			'manage_options',
			'eacs-settings',
			array( $this, 'eacs_admin_settings_page' ),
			plugins_url( '/', __FILE__ ).'/assets/images/ea-icon.png',
			199
		);

	}


	/**
	 * Create settings page.
	 * @param
	 * @return void
	 * @since 2.4.0
	 */
	public function eacs_admin_settings_page() {

		$js_info = array(
			'ajaxurl' => admin_url( 'admin-ajax.php' )
		);
		wp_localize_script( 'essential_addons_elementor-admin-js', 'settings', $js_info );

	   /**
	    * This section will handle the "eacs_save_settings" array. If any new settings options is added
	    * then it will matches with the older array and then if it founds anything new then it will update the entire array.
	    */
	    $this->eacs_default_settings = array_fill_keys( $this->eacs_default_keys, true );
	   	$this->eacs_get_settings = get_option( 'eacs_save_settings', $this->eacs_default_settings );
	   	$eacs_new_settings = array_diff_key( $this->eacs_default_settings, $this->eacs_get_settings );
	   	if( ! empty( $eacs_new_settings ) ) {
	   		$eacs_updated_settings = array_merge( $this->eacs_get_settings, $eacs_new_settings );
	   		update_option( 'eacs_save_settings', $eacs_updated_settings );
	   	}
	   	$this->eacs_get_settings = get_option( 'eacs_save_settings', $this->eacs_default_settings );
		?>
		<div class="wrap">
		  	<h2><?php _e( 'Essential Addons for Cornerstone Settings', 'essential-addons-cs' ); ?></h2> <hr>
		  	<div class="response-wrap"></div>
		  	<form action="" method="POST" id="eacs-settings" name="eacs-settings">
			  	<div class="eacs-settings-tabs">
			    	<ul>
				      <li><a href="#general"><span class="dashicons dashicons-dashboard"></span> General</a></li>
				      <li><a href="#elements"><span class="dashicons dashicons-admin-settings"></span> Elements</a></li>
				      <li><a href="#support"><span class="dashicons dashicons-sos"></span> Support</a></li>
			    	</ul>
			    	<div id="general" class="eacs-settings-tab">
						<div class="row general-row">

			      			<div class="col-half">
			      				<a href="https://essential-addons.com/cornerstone/" target="_blank" class="button eacs-btn eacs-demo-btn">Explore Demos</a>
			      				<a href="https://essential-addons.com/cornerstone/buy.php" target="_blank" class="button eacs-btn eacs-license-btn">Get another License</a>

			      				<div class="eacs-notice">
			      					<h5>Troubleshooting Info</h5>
			      					<p>After update, if you see any element is not working properly, go to <strong>Elements</strong> Tab, toggle the element and save changes.</p>
			      				</div>
			    			</div>
			      			<div class="col-half">

			      				<img class="eacs-logo-admin" src="<?php echo plugins_url( '/', __FILE__ ).'assets/images/eacs-logo.png'; ?>">
			      			</div>
			    		</div>
			    	</div>
			    	<div id="elements" class="eacs-settings-tab">
			      	<div class="row">
			      		<div class="col-full">
			      			<h4>Activate what you are only using!</h4>
			      			<p>You can only enable the elements you need. This will help you to optimize your site's performance by not loading the associated scripts.</p>
			      			<table class="form-table" style="margin-top: 25px;">
									<tr>
										<td>
											<div class="eacs-checkbox">
												<p class="title"><?php _e( 'Countdown', 'essential-addons-cs' ); ?></p>
												<p class="desc"><?php _e( 'Activate / Deactivate Count Down', 'essential-addons-cs' ); ?></p>
				                        <input type="checkbox" id="count-down" name="count-down" <?php checked( 1, $this->eacs_get_settings['count-down'], true ); ?> >
				                        <label for="count-down"></label>
				                    	</div>
										</td>
										<td>
											<div class="eacs-checkbox">
												<p class="title"><?php _e( 'Creative Button', 'essential-addons-cs' ); ?></p>
												<p class="desc"><?php _e( 'Activate / Deactivate Creative Button', 'essential-addons-cs' ); ?></p>
				                        <input type="checkbox" id="creative-btn" name="creative-btn" <?php checked( 1, $this->eacs_get_settings['creative-btn'], true ); ?> >
				                        <label for="creative-btn"></label>
				                    	</div>
										</td>
										<td>
											<div class="eacs-checkbox">
												<p class="title"><?php _e( 'Image Comparison', 'essential-addons-cs' ); ?></p>
												<p class="desc"><?php _e( 'Activate / Deactivate Image Comparison', 'essential-addons-cs' ); ?></p>
				                        <input type="checkbox" id="img-comparison" name="img-comparison" <?php checked( 1, $this->eacs_get_settings['img-comparison'], true ); ?> >
				                        <label for="img-comparison"></label>
				                    	</div>
										</td>
										<td>
											<div class="eacs-checkbox">
												<p class="title"><?php _e( 'Instagram Feed', 'essential-addons-cs' ); ?></p>
												<p class="desc"><?php _e( 'Activate / Deactivate Instagram Feed', 'essential-addons-cs' ); ?></p>
				                        <input type="checkbox" id="instagram-feed" name="instagram-feed" <?php checked( 1, $this->eacs_get_settings['instagram-feed'], true ); ?> >
				                        <label for="instagram-feed"></label>
				                    	</div>
										</td>
										<td>
											<div class="eacs-checkbox">
												<p class="title"><?php _e( 'Interactive Promo', 'essential-addons-cs' ); ?></p>
												<p class="desc"><?php _e( 'Activate / Deactivate Interactive Promo', 'essential-addons-cs' ); ?></p>
				                        <input type="checkbox" id="interactive-promo" name="interactive-promo" <?php checked( 1, $this->eacs_get_settings['interactive-promo'], true ); ?> >
				                        <label for="interactive-promo"></label>
				                    	</div>
										</td>
									</tr>
									<tr>
										<td>
											<div class="eacs-checkbox">
												<p class="title"><?php _e( 'Lightbox', 'essential-addons-cs' ); ?></p>
												<p class="desc"><?php _e( 'Activate / Deactivate Lightbox', 'essential-addons-cs' ); ?></p>
				                        <input type="checkbox" id="lightbox" name="lightbox" <?php checked( 1, $this->eacs_get_settings['lightbox'], true ); ?> >
				                        <label for="lightbox"></label>
				                    	</div>
										</td>
										<td>
											<div class="eacs-checkbox">
												<p class="title"><?php _e( 'Logo Carousel', 'essential-addons-cs' ); ?></p>
												<p class="desc"><?php _e( 'Activate / Deactivate Logo Carousel', 'essential-addons-cs' ); ?></p>
				                        <input type="checkbox" id="logo-carousel" name="logo-carousel" <?php checked( 1, $this->eacs_get_settings['logo-carousel'], true ); ?> >
				                        <label for="logo-carousel"></label>
				                    	</div>
										</td>
										<td>
											<div class="eacs-checkbox">
												<p class="title"><?php _e( 'Post Block', 'essential-addons-cs' ); ?></p>
												<p class="desc"><?php _e( 'Activate / Deactivate Post Block', 'essential-addons-cs' ); ?></p>
				                        <input type="checkbox" id="post-block" name="post-block" <?php checked( 1, $this->eacs_get_settings['post-block'], true ); ?> >
				                        <label for="post-block"></label>
				                    	</div>
										</td>
										<td>
											<div class="eacs-checkbox">
												<p class="title"><?php _e( 'Post Carousel', 'essential-addons-cs' ); ?></p>
												<p class="desc"><?php _e( 'Activate / Deactivate Post Carousel', 'essential-addons-cs' ); ?></p>
				                        <input type="checkbox" id="post-carousel" name="post-carousel" <?php checked( 1, $this->eacs_get_settings['post-carousel'], true ); ?> >
				                        <label for="post-carousel"></label>
				                    	</div>
										</td>
										<td>
											<div class="eacs-checkbox">
												<p class="title"><?php _e( 'Testimonial Slider', 'essential-addons-cs' ) ?></p>
												<p class="desc"><?php _e( 'Activate / Deactivate Testimonial Slider', 'essential-addons-cs' ); ?></p>
				                        <input type="checkbox" id="testimonial-slider" name="testimonial-slider" <?php checked( 1, $this->eacs_get_settings['testimonial-slider'], true ); ?> >
				                        <label for="testimonial-slider"></label>
				                    	</div>
										</td>
									</tr>
									<tr>
										<td>
											<div class="eacs-checkbox">
												<p class="title"><?php _e( 'Post Grid', 'essential-addons-cs' ); ?></p>
												<p class="desc"><?php _e( 'Activate / Deactivate Post Grid', 'essential-addons-cs' ); ?></p>
				                        <input type="checkbox" id="post-grid" name="post-grid" <?php checked( 1, $this->eacs_get_settings['post-grid'], true ); ?> >
				                        <label for="post-grid"></label>
				                    	</div>
										</td>
										<td>
											<div class="eacs-checkbox">
												<p class="title"><?php _e( 'Post Timeline', 'essential-addons-cs' ) ?></p>
												<p class="desc"><?php _e( 'Activate / Deactivate Post Timeline', 'essential-addons-cs' ); ?></p>
				                        <input type="checkbox" id="post-timeline" name="post-timeline" <?php checked( 1, $this->eacs_get_settings['post-timeline'], true ); ?> >
				                        <label for="post-timeline"></label>
				                    	</div>
										</td>
										<td>
											<div class="eacs-checkbox">
												<p class="title"><?php _e( 'Product Carousel', 'essential-addons-cs' ) ?></p>
												<p class="desc"><?php _e( 'Activate / Deactivate Product Carousel', 'essential-addons-cs' ); ?></p>
				                        <input type="checkbox" id="product-carousel" name="product-carousel" <?php checked( 1, $this->eacs_get_settings['product-carousel'], true ); ?> >
				                        <label for="product-carousel"></label>
				                    	</div>
										</td>
										<td>
											<div class="eacs-checkbox">
												<p class="title"><?php _e( 'Product Grid', 'essential-addons-cs' ) ?></p>
												<p class="desc"><?php _e( 'Activate / Deactivate Product Grid', 'essential-addons-cs' ); ?></p>
				                        <input type="checkbox" id="product-grid" name="product-grid" <?php checked( 1, $this->eacs_get_settings['product-grid'], true ); ?> >
				                        <label for="product-grid"></label>
				                    	</div>
										</td>
										<td>
											<div class="eacs-checkbox">
												<p class="title"><?php _e( 'Social Icons', 'essential-addons-cs' ) ?></p>
												<p class="desc"><?php _e( 'Activate / Deactivate Social Icons', 'essential-addons-cs' ); ?></p>
				                        <input type="checkbox" id="social-icons" name="social-icons" <?php checked( 1, $this->eacs_get_settings['social-icons'], true ); ?> >
				                        <label for="social-icons"></label>
				                    	</div>
										</td>
									</tr>
									<tr>
										<td>
											<div class="eacs-checkbox">
												<p class="title"><?php _e( 'Team Members', 'essential-addons-cs' ) ?></p>
												<p class="desc"><?php _e( 'Activate / Deactivate Team Members', 'essential-addons-cs' ); ?></p>
				                        <input type="checkbox" id="team-members" name="team-members" <?php checked( 1, $this->eacs_get_settings['team-members'], true ); ?> >
				                        <label for="team-members"></label>
				                    	</div>
										</td>
									</tr>
					      	</table>
						  	<div class="eacs-save-btn-wrap">
						  		<input type="submit" value="Save settings" class="button eacs-btn"/>
						  	</div>
			      		</div>
			      	</div>
			    	</div>
			    	<div id="support" class="eacs-settings-tab">
			      	<div class="row">
			      		<div class="col-half">
				      		<h4>Need any help? Open a ticket!</h4>
				      		<p>Purchasing a license entitles you to receive premium support. Feel free to get in touch if you need any assistance.</p>
				      		<a href="https://essential-addons.com/cornerstone/support/" target="_blank" class="button eacs-btn">Get Help</a>
				      	</div>
			      	<div class="row">
			      		<div class="col-half">
			      			<div class="essential-addons-community-link">
			      				<a href="https://www.facebook.com/groups/essentialaddons/" target="_blank"><span class="dashicons dashicons-facebook"></span> <span>Join the Facebook Community</span></a>
			      			</div>
			      		</div>
			      	</div>
			      	</div>
			    	</div>
			  	</div>
		  	</form>
		</div>
		<?php

	}

	/**
	 * Saving data with ajax request
	 * @param
	 * @return  array in json
	 * @since 2.4.0
	 */
	public function eacs_save_settings_with_ajax() {

		if( isset( $_POST['fields'] ) ) {
			parse_str( $_POST['fields'], $settings );
		}else {
			return;
		}
		$this->eacs_settings = array(
			'count-down' 			=> intval( $settings['count-down'] ? 1 : 0 ),
			'creative-btn' 			=> intval( $settings['creative-btn'] ? 1 : 0 ),
			'img-comparison' 		=> intval( $settings['img-comparison'] ? 1 : 0 ),
			'instagram-feed' 		=> intval( $settings['instagram-feed'] ? 1 : 0 ),
			'interactive-promo' 	=> intval( $settings['interactive-promo'] ? 1 : 0 ),
			'lightbox' 				=> intval( $settings['lightbox'] ? 1 : 0 ),
			'logo-carousel' 		=> intval( $settings['logo-carousel'] ? 1 : 0 ),
			'post-block' 			=> intval( $settings['post-block'] ? 1 : 0 ),
			'post-carousel' 		=> intval( $settings['post-carousel'] ? 1 : 0 ),
			'post-grid' 			=> intval( $settings['post-grid'] ? 1 : 0 ),
			'post-timeline' 		=> intval( $settings['post-timeline'] ? 1 : 0 ),
			'product-carousel' 		=> intval( $settings['product-carousel'] ? 1 : 0 ),
			'product-grid' 			=> intval( $settings['product-grid'] ? 1 : 0 ),
			'social-icons' 			=> intval( $settings['social-icons'] ? 1 : 0 ),
			'team-members' 			=> intval( $settings['team-members'] ? 1 : 0 ),
			'testimonial-slider' 	=> intval( $settings['testimonial-slider'] ? 1 : 0 ),
		);
		update_option( 'eacs_save_settings', $this->eacs_settings );
		return true;
		die();
	}

}

new Eacs_Admin_Settings();




