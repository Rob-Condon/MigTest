<?php

/**
 * Generating A Random Value
 */
global $randnum;
$randnum = rand(0,5000);

/**
 * Shortcode handler : Post Block
 */

//
// Dynamic classes
//

// Preset Styles
$post_block_style = ( ($post_block_style   == 'post-block-style-overlay') ? "post-block-style-overlay" : "post-block-style-default" );
$hide_post_meta = ( ($hide_post_meta   == 1) ? "hide-post-meta" : "" );

// Class, ID, Styles
$post_block_id = "eacs-post-block-".$randnum;
$post_block_class      = "eacs-post-block" ." ". $post_alignment . " ". $post_block_style . " " . $hide_post_meta . " " . $class ;

// Toggle
$show_excerpt = ( ($show_excerpt   == 1) ? "true" : "false" );
$hide_featured_image = ( ($hide_featured_image   == 1) ? "true" : "false" );
$meta_position = ( ($meta_position   == 'entry-footer') ? "entry-footer" : "entry-header" );

/* Get Post Categories */
$post_categories =  $category;
if( !empty( $post_categories ) ) {
    $post_categories = explode( ',', $category );
    foreach ( $post_categories as $key=>$value ) {
        $categories[] = $value;
        $categories_id[] = get_cat_ID( $value );
    }
    $categories_id_string = implode( ',' , $categories_id );

    /* Get All Post Count */
    $total_post = 0;
    foreach( $categories_id as $cat ) {
        $post_category = get_category( $cat );
        $total_post = $total_post + $post_category->category_count;
    }
}else {
    $categories_id_string = '';
    if( $post_type == 'portfolio' ) {
        $total_post = wp_count_posts( 'x-portfolio' )->publish;
    }else {
        $total_post = wp_count_posts( $post_type )->publish;
    }
}

?>


<div id="<?= $post_block_id ?>">
	<div id="<?= $id ?>" class="<?= $post_block_class ?>" style="<?= $style ?>" >
		<?php echo do_shortcode("[eacs_post_block class=\"eacs-post-appender-{$randnum}\" type=\"$post_type\" count=\"$max_post_count\" excerpt_length=\"$excerpt_length\" offset=\"$offset\" category=\"$category\" show_excerpt=\"$show_excerpt\" meta_position=\"$meta_position\" post_icon_type=\"$post_icon_type\" no_sticky=\"true\" no_image=\"$hide_featured_image\"]") ?>
	</div>
    <?php if( $post_type == 'post' && $show_loadmore == true ) : ?>
    <div class="eacs-load-more-button-wrap">
        <button class="eacs-load-more-button" id="eacs-load-more-btn-<?php echo $randnum; ?>">
          <div class="eacs-btn-loader button__loader"></div>
            <span><?php esc_html_e( $loadmore_text, 'essential-addons-cs' ); ?></span>
        </button>
    </div>

    <script type="text/javascript">
        jQuery(document).ready(function($) {

          'use strict';
          var options = {
            siteUrl: '<?php echo home_url( '/' ); ?>',
            totalPosts: <?php echo $total_post; ?>,
            loadMoreBtn: 'eacs-load-more-btn-<?php echo $randnum; ?>',
            postContainer: 'eacs-post-appender-<?php echo $randnum; ?>',
            postStyle: 'block',
          }

          var settings = {
            stylePreset: '<?php echo $post_block_style; ?>',
            postType: '<?php echo $post_type; ?>',
            perPage: parseInt( <?php echo $max_post_count ?>, 10 ),
            showImage: <?php echo $hide_featured_image; ?>,
            showExcerpt: <?php echo $show_excerpt; ?>,
            showMeta: '<?php echo $hide_post_meta; ?>',
            metaPosition: '<?php echo $meta_position; ?>',
            excerptLength: parseInt( <?php echo $excerpt_length; ?>, 10 ),
            btnText: '<?php echo $loadmore_text; ?>',
            categories: '<?php echo $categories_id_string; ?>',
          }

          loadMore( options, settings );

        });

    </script>
    <?php endif; ?>
</div>

<style type="text/css">


<?php echo '#'.$post_block_id; ?> .eacs-post-block-item {
    background-color: <?php echo $post_background_color; ?>;
}
<?php echo '#'.$post_block_id; ?> .eacs-entry-overlay {
    background-color: <?php echo $thumbnail_overlay_color; ?>;
}

<?php echo '#'.$post_block_id; ?> .post-block-style-overlay .eacs-entry-wrapper {
    background-color: <?php echo $thumbnail_overlay_color; ?>;
}

<?php echo '#'.$post_block_id; ?> .eacs-post-block-item {
    margin: <?php echo $item_spacing; ?>;
}

<?php echo '#'.$post_block_id; ?> .eacs-entry-title, <?php echo '#'.$post_block_id; ?> .eacs-entry-title a {
    color: <?php echo $post_title_color; ?>;
    font-size: <?php echo $post_title_font_size; ?>px;
}
<?php echo '#'.$post_block_id; ?> .eacs-entry-title:hover, <?php echo '#'.$post_block_id; ?> .eacs-entry-title a:hover {
    color: <?php echo $post_title_hover_color; ?>;
}

<?php echo '#'.$post_block_id; ?> .eacs-grid-post-excerpt p {
    color: <?php echo $post_excerpt_color; ?>;
}
<?php echo '#'.$post_block_id; ?> .eacs-entry-meta, <?php echo '#'.$post_block_id; ?> .eacs-entry-meta a {
    color: <?php echo $post_meta_color; ?>;
}
/* Load More Button Style */
<?php echo '#'.$post_block_id; ?> .eacs-load-more-button {
    font-size: <?php echo $loadmore_font_size; ?>px;
    color: <?php echo $loadmore_font_color; ?>;
    border: <?php echo $loadmore_border_size; ?>px solid <?php echo $loadmore_border_main_color; ?>;
    border-radius: <?php echo $loadmore_border_radius; ?>px;
    background-color: <?php echo $loadmore_background_color; ?>;
    padding: <?php echo $loadmore_button_padding; ?>;
}
<?php echo '#'.$post_block_id; ?> .eacs-load-more-button:hover {
    color: <?php echo $loadmore_font_hover_color; ?>;
    border-color: <?php echo $loadmore_border_hover_color; ?>;
    background-color: <?php echo $loadmore_background_hover_color; ?>;
}
<?php echo '#'.$post_block_id; ?> .eacs-post-block-item .eacs-entry-thumbnail {
  height: <?php echo $featured_image_height; ?>px;
}
</style>


