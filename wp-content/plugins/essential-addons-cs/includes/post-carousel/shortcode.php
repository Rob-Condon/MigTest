<?php

/**
 * Shortcode handler : Post Carousel
 */

?>


<?php

/*
 * => VARS & INFO
 * ---------------------------------------------------------------------------*/


$randnum = rand(0,5000);

//
// Dynamic classes
//


// Add border class

$add_border   = ( ($add_border == 1) ? "slide-border-enabled" : "" );

// Pagination position
switch ( $pagination_position ) {
  case 'nav_top_left':
    $nav_position = 'nav-top-left';
    break;

  case 'nav_top_right':
    $nav_position = 'nav-top-right';
    break;

  default: // NONE
    $nav_position  = 'nav-left-right';
    break;
}


// Toggle
$show_excerpt = ( ($show_excerpt   == 1) ? "true" : "false" );
$hide_featured_image = ( ($hide_featured_image   == 1) ? "true" : "false" );
$auto_play   = ( ($auto_play   == 1) ? "true" : "false" );
$centered_slides  = ( ($centered_slides == 1) ? "true" : "false" );
$auto_height      = ( ($auto_height == 1) ? "true" : "false" );
$loop        = ( ($loop == 1) ? "true" : "false" );
$draggable   = ( ($draggable == 1) ? "true" : "false" );
$hide_post_meta = ( ($hide_post_meta   == 1) ? "hide-post-meta" : "" );


// Class, ID, Styles
$post_carousel_id = "eacs-post-carousel-".$randnum;
$post_carousel_class = "eacs-post-carousel swiper-container-wrap" . " " . $add_border . " " . $nav_position . " " . $hide_post_meta . " " . $post_alignment ;


?>

<div <?php echo cs_atts( array( 'id' => $id, 'class' => $class, 'style' => $style ) ); ?>>
  <div id="<?= $post_carousel_id; ?>">
    <div class="<?php echo $post_carousel_class; ?>">
      <div class="swiper-container">
        <?php echo do_shortcode("[eacs_post_carousel type=\"$post_type\" count=\"$max_post_count\" excerpt_length=\"$excerpt_length\"  offset=\"$offset\" category=\"$category\" show_excerpt=\"$show_excerpt\" meta_position=\"$meta_position\" post_icon_type=\"$post_icon_type\" no_sticky=\"true\" no_image=\"$hide_featured_image\"]") ?>

        <?php if ( $dot_nav == 1 ): ?>
        <div class="swiper-pagination swiper-pagination-<?= $logo_carousel_id ?>"></div>
        <?php endif; ?>
        <?php if ( $arrow_nav == 1 ): ?>
        <div class="swiper-navigation-wrapper">
          <div class="swiper-button-next">
            <i class="x-icon x-icon-angle-right" data-x-icon="" aria-hidden="true"></i>
          </div>
          <div class="swiper-button-prev">
            <i class="x-icon x-icon-angle-left" data-x-icon="" aria-hidden="true"></i>
          </div>
        </div>
        <?php endif; ?>
      </div>
    </div>
	</div>

<script type="text/javascript">

  jQuery(document).ready(function($) {

    function createPostCarousel() {
      var mySwiper = new Swiper ("<?= '#'.$post_carousel_id ?> .swiper-container", {
        autoplay: <?= $auto_play ?>,
        autoplay: {
          delay: <?= $autoplay_delay ?>,
        },
        speed: <?= $transition_speed ?>,
        loop: <?= $loop ?>,
        slidesPerView: <?= $max_visible_items ?>,
        spaceBetween: <?= $space_between ?>,
        draggable: <?= $draggable ?>,
        autoHeight: <?= $auto_height ?>,
        centeredSlides: <?= $centered_slides ?>,
        pagination: {
          el: '.swiper-pagination',
          clickable: true,
        },
        navigation: {
          nextEl: '.swiper-button-next',
          prevEl: '.swiper-button-prev',
        },
        breakpoints: {
            480: {
                slidesPerView:  <?= $max_visible_items_mobile ?>,
            },
            768: {
                slidesPerView:  <?= $max_visible_items_tablet ?>,
            }
        }
      });
    };
    createPostCarousel();
  });
</script>
</div>

<style type="text/css">

<?php echo '#'.$post_carousel_id; ?> .eacs-post-carousel.slide-border-enabled .eacs-grid-post-holder {
  border: <?= $post_border_width ?>px solid <?= $post_border_color?>;
}

<?php echo '#'.$post_carousel_id; ?> .swiper-pagination-bullet {
  background-color: <?php echo $bullet_nav_color; ?>;
}
<?php echo '#'.$post_carousel_id; ?> .swiper-pagination-bullet-active {
  background-color: <?php echo $active_bullet_nav_color; ?>;
}
<?php echo '#'.$post_carousel_id; ?> .swiper-button-next,
<?php echo '#'.$post_carousel_id; ?> .swiper-button-prev {
  background-color: <?php echo $arrow_nav_bg_color; ?>;
  color: <?php echo $arrow_nav_color; ?>;
}

<?php echo '#'.$post_carousel_id; ?> .eacs-grid-post-holder {
    background-color: <?php echo $post_background_color; ?>;
}
<?php echo '#'.$post_carousel_id; ?> .eacs-entry-overlay {
    background-color: <?php echo $thumbnail_overlay_color; ?>;
}

<?php echo '#'.$post_carousel_id; ?> .eacs-entry-title, <?php echo '#'.$post_carousel_id; ?> .eacs-entry-title a {
    color: <?php echo $post_title_color; ?>;
    font-size: <?php echo $post_title_font_size; ?>px;
}
<?php echo '#'.$post_carousel_id; ?> .eacs-entry-title:hover, <?php echo '#'.$post_carousel_id; ?> .eacs-entry-title a:hover {
    color: <?php echo $post_title_hover_color; ?>;
}

<?php echo '#'.$post_carousel_id; ?> .eacs-grid-post-excerpt p {
    color: <?php echo $post_excerpt_color; ?>;
}
<?php echo '#'.$post_carousel_id; ?> .eacs-entry-meta, <?php echo '#'.$post_carousel_id; ?> .eacs-entry-meta a {
    color: <?php echo $post_meta_color; ?>;
}

</style>


