<?php

/**
 * Shortcode handler : Product Carousel
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

// Preset Styles
switch ( $preset_style ) {
  case 'preset-theme-1':
    $preset_style = 'eacs-product-simple';
    break;

  case 'preset-theme-2':
    $preset_style = 'eacs-product-reveal';
    break;

  case 'preset-theme-3':
    $preset_style = 'eacs-product-overlay';
    break;

  default: // none
    $preset_style  = 'eacs-product-no-style';
    break;
}

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
$auto_play   = ( ($auto_play   == 1) ? "true" : "false" );
$centered_slides  = ( ($centered_slides == 1) ? "true" : "false" );
$auto_height      = ( ($auto_height == 1) ? "true" : "false" );
$loop        = ( ($loop == 1) ? "true" : "false" );
$pause_hover = ( ($pause_hover == 1) ? "true" : "false" );
$draggable   = ( ($draggable == 1) ? "true" : "false" );
$show_rating   = ( ($show_rating == 1) ? "show_rating" : "hide_rating" );


// Class, ID, Styles
$product_carousel_id = "eacs-product-carousel-".$randnum;
$class      = "eacs-product-carousel swiper-container-wrap" . " " . $add_border  . " " . $preset_style  . " " . $show_rating . " " . $nav_position . " " . $class ;

?>

<div <?php echo cs_atts( array( 'id' => $id, 'class' => $class, 'style' => $style ) ); ?>>
  <div id="<?= $product_carousel_id ?>">
    <div class="swiper-container">
        <?php echo do_shortcode("[recent_products per_page=\"$max_product_count\" category=\"$category\"]") ?>

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

    function createProductCarousel() {

      $('.eacs-product-carousel .swiper-container .woocommerce .products').addClass('swiper-wrapper');
      $('.eacs-product-carousel .swiper-container .woocommerce .product').addClass('swiper-slide');

      var mySwiper = new Swiper ("<?= '#'.$product_carousel_id ?> .swiper-container .woocommerce", {

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
    createProductCarousel();
  });
</script> 

<style type="text/css">

.eacs-product-carousel <?php echo '#'.$product_carousel_id; ?> .woocommerce li.product {
  background-color: <?php echo $product_bg_color; ?>;
  color: <?php echo $product_text_color; ?>;
}

.eacs-product-carousel <?php echo '#'.$product_carousel_id; ?> .woocommerce ul.products li.product h3, .eacs-product-carousel <?php echo '#'.$product_carousel_id; ?> .woocommerce ul.products li.product h3 a, .eacs-product-carousel <?php echo '#'.$product_carousel_id; ?> .woocommerce ul.products li.product .price, .eacs-product-carousel <?php echo '#'.$product_carousel_id; ?> .woocommerce ul.products li.product .price .amount {
  color: <?php echo $product_text_color; ?>;
}

.eacs-product-carousel.slide-border-enabled <?php echo '#'.$product_carousel_id; ?> .woocommerce li.product {
  border: <?= $product_border_width ?>px solid <?= $product_border_color?>;
}

.eacs-product-carousel <?php echo '#'.$product_carousel_id; ?> .swiper-pagination-bullet {
  background-color: <?php echo $bullet_nav_color; ?>;
}
.eacs-product-carousel <?php echo '#'.$product_carousel_id; ?> .swiper-pagination-bullet-active {
  background-color: <?php echo $active_bullet_nav_color; ?>;
}
.eacs-product-carousel <?php echo '#'.$product_carousel_id; ?> .swiper-button-next,
.eacs-product-carousel <?php echo '#'.$product_carousel_id; ?> .swiper-button-prev {
  background-color: <?php echo $arrow_nav_bg_color; ?>;
  color: <?php echo $arrow_nav_color; ?>;
}

.eacs-product-carousel <?php echo '#'.$product_carousel_id; ?> .woocommerce li.product .entry-product, .eacs-product-carousel.eacs-product-reveal <?php echo '#'.$product_carousel_id; ?> .woocommerce li.product .entry-wrap, .eacs-product-carousel.eacs-product-overlay <?php echo '#'.$product_carousel_id; ?> .woocommerce li.product .entry-wrap::before, .eacs-product-carousel.eacs-product-reveal <?php echo '#'.$product_carousel_id; ?> .woocommerce li.product:hover .entry-wrap::before {
  background-color: <?php echo $product_bg_color; ?>;
  color: <?php echo $product_text_color; ?>;
}

.eacs-product-carousel:not(.eacs-product-no-style) <?php echo '#'.$product_carousel_id; ?> .woocommerce li.product .entry-header .button {
    background-color: <?php echo $cart_bg_color; ?>;
    border-color: <?php echo $cart_border_color; ?>;
    color: <?php echo $cart_text_color; ?>;
}


</style>


