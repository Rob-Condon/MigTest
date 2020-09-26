<?php

/**
 * Shortcode handler : Post Timeline
 */

?>


<?php

/*
 * => VARS & INFO
 * ---------------------------------------------------------------------------*/

global $randnum;
$randnum = rand(0,5000);

//
// Dynamic classes
//


// Class, ID, Styles
$post_timeline_id = "eacs-post-timeline-".$randnum;
$post_timeline_class      = "eacs-post-timeline" . " " . " " . $class ;

// Toggle
$show_excerpt = ( ($show_excerpt   == 1) ? "true" : "false" );
$hide_featured_image = ( ($hide_featured_image   == 1) ? "true" : "false" );

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

<div id="<?= $post_timeline_id ?>">
	<div id="<?= $id ?>" class="<?= $post_timeline_class ?>" style="<?= $style ?>" >
		<?php echo do_shortcode("[eacs_post_timeline class=\"eacs-post-timeline-appender-{$randnum}\" type=\"$post_type\" count=\"$max_post_count\" excerpt_length=\"$excerpt_length\" offset=\"$offset\" no_sticky=\"true\" category=\"$category\" show_excerpt=\"$show_excerpt\" no_image=\"$hide_featured_image\"]") ?>
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
            postContainer: 'eacs-post-timeline-appender-<?php echo $randnum; ?>',
            postStyle: 'timeline',
          }

          var settings = {
            postType: '<?php echo $post_type; ?>',
            perPage: parseInt( <?php echo $max_post_count ?>, 10 ),
            showImage: <?php echo $hide_featured_image; ?>,
            showExcerpt: <?php echo $show_excerpt; ?>,
            excerptLength: <?php echo $excerpt_length; ?>,
            btnText: '<?php echo $loadmore_text; ?>',
            categories: '<?php echo $categories_id_string; ?>',
          }

          loadMore( options, settings );

        });

    </script>
    <?php endif; ?>
</div>




<style type="text/css">


<?php echo '#'.$post_timeline_id; ?> .eacs-timeline-bullet {
    background-color: <?php echo $timeline_bullet_color; ?>;
    border-color:  <?php echo $timeline_bullet_border_color; ?>;

}

<?php echo '#'.$post_timeline_id; ?> .eacs-timeline-post:after {
    background-color: <?php echo $timeline_line_color; ?>;
}

<?php echo '#'.$post_timeline_id; ?> .eacs-timeline-post-inner {
    border-color: <?php echo $timeline_border_arrow_color; ?>;
}

<?php echo '#'.$post_timeline_id; ?> .eacs-timeline-post-inner:after {
    border-color: transparent transparent transparent <?php echo $timeline_border_arrow_color; ?>;
}
<?php echo '#'.$post_timeline_id; ?> .eacs-timeline-post:nth-child(2n) .eacs-timeline-post-inner:after {
    border-color: transparent <?php echo $timeline_border_arrow_color; ?> transparent transparent;
}

<?php echo '#'.$post_timeline_id; ?> .eacs-timeline-post time {
    background-color:  <?php echo $timeline_date_bg_color; ?>;
    color: <?php echo $timeline_date_color; ?>;
}

<?php echo '#'.$post_timeline_id; ?> .eacs-timeline-post time:before {
    border-bottom: 5px solid <?php echo $timeline_date_bg_color; ?>;
}
/* Load More Button Style */
<?php echo '#'.$post_timeline_id; ?> .eacs-load-more-button {
    font-size: <?php echo $loadmore_font_size; ?>px;
    color: <?php echo $loadmore_font_color; ?>;
    border: <?php echo $loadmore_border_size; ?>px solid <?php echo $loadmore_border_main_color; ?>;
    border-radius: <?php echo $loadmore_border_radius; ?>px;
    background-color: <?php echo $loadmore_background_color; ?>;
    padding: <?php echo $loadmore_button_padding; ?>;
}
<?php echo '#'.$post_timeline_id; ?> .eacs-load-more-button:hover {
    color: <?php echo $loadmore_font_hover_color; ?>;
    border-color: <?php echo $loadmore_border_hover_color; ?>;
    background-color: <?php echo $loadmore_background_hover_color; ?>;
}
</style>


