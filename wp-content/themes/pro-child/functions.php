<?php

// =============================================================================
// FUNCTIONS.PHP
// -----------------------------------------------------------------------------
// Overwrite or add your own custom functions to Pro in this file.
// =============================================================================

// =============================================================================
// TABLE OF CONTENTS
// -----------------------------------------------------------------------------
//   01. Enqueue Parent Stylesheet
//   02. Additional Functions
// =============================================================================

// Enqueue Parent Stylesheet
// =============================================================================

add_filter( 'x_enqueue_parent_stylesheet', '__return_true' );



// Additional Functions
// =============================================================================

function enqueue_name_scripts(){
	wp_enqueue_style('font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
}
add_action('wp_enqueue_scripts','enqueue_name_scripts');

function is_blog () {
    return ( is_archive() || is_author() || is_category() || is_home() || is_tag()) && 'post' == get_post_type();
}

// =============================================================================
function blog_page() {
	global $pagename;
	if ( is_blog() ) :
?>  

<div class="x-section">
    
	<div class="x-bg" aria-hidden="true">
		<div class="x-bg-layer-lower-image" style=" background-image: url(/wp-content/uploads/2018/07/grassbg-1800x427.jpg); background-repeat: no-repeat; background-position: center; background-size: cover;"></div>  
		<div class="x-bg-layer-upper-color" style=" background-color: hsla(144, 100%, 16%, 0.73);"></div>
	</div>
  
	<div class="x-container max width">
		<div class="x-column x-sm x-1-1">
			<h2 class="h-custom-headline mtn h3" style="color: hsl(0, 0%, 100%);"><span><?php echo $pagename ?></span></h2>
		</div>
	</div>
</div>
<?php elseif ( is_single() ) : ?>
<div class="x-section">
    
	<div class="x-bg" aria-hidden="true">
		<div class="x-bg-layer-lower-image" style=" background-image: url(/wp-content/uploads/2018/07/grassbg-1800x427.jpg); background-repeat: no-repeat; background-position: center; background-size: cover;"></div>  
		<div class="x-bg-layer-upper-color" style=" background-color: hsla(144, 100%, 16%, 0.73);"></div>
	</div>
  
	<div class="x-container max width">
		<div class="x-column x-sm x-1-1">
			<h2 class="h-custom-headline mtn h3" style="color: hsl(0, 0%, 100%);"><span><?php echo single_post_title(); ?></span></h2>
		</div>
	</div>
</div>
<?php endif;
}
add_action('x_after_view_global__slider-below', 'blog_page');
// =============================================================================