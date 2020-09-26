<?php

// =============================================================================
// VIEWS/INTEGRITY/CONTENT.PHP
// -----------------------------------------------------------------------------
// Standard post output for Integrity.
// =============================================================================

?>
<?php if (is_blog()) { ?>
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="x-section blog-lists">
		<div class="x-container marginless-columns">
			<div class="x-column x-sm x-1-4">
			  <div class="entry-featured">
				<?php x_featured_image(); ?>
			  </div>
			</div>
			
			<div class="x-column x-sm x-3-4">
			  <div class="entry-wrap">
				<?php x_get_view( 'integrity', '_content', 'post-header' ); ?>
				<?php x_get_view( 'global', '_content' ); ?>
			  </div>
			  <?php x_get_view( 'integrity', '_content', 'post-footer' ); ?>
			</div>
		</div>
	</div>
	</article>
<?php
} elseif (is_single()) {
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <div class="entry-featured">
    <?php x_featured_image(); ?>
  </div>
  <div class="entry-wrap">
    <?php x_get_view( 'integrity', '_content', 'post-header' ); ?>
    <?php x_get_view( 'global', '_content' ); ?>
  </div>
  <?php x_get_view( 'integrity', '_content', 'post-footer' ); ?>
</article>
<?php
} ?>
