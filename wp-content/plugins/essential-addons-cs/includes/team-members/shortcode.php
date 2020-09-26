<?php
/**
 * Shortcode: Team Members
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

// Style Preset
switch ( $style_preset ) {
  case 'preset_overlay':
    $preset_style = 'eacs-team-members-overlay';
    break;

  default: // NONE
    $preset_style  = 'eacs-team-members-simple';
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


// Class, ID, Styles
$team_members_id = "eacs-team-slider-".$randnum;
$class       = "eacs-team-slider swiper-container-wrap " .$preset_style . " " . $slide_alignment . " " . $add_border . " " . $nav_position . " " . $class ;

// Toggle
$auto_play        = ( ($auto_play   == 1) ? "true" : "false" );
$loop             = ( ($loop == 1) ? "true" : "false" );
$centered_slides  = ( ($centered_slides == 1) ? "true" : "false" );
$draggable        = ( ($draggable == 1) ? "true" : "false" );
$auto_height      = ( ($auto_height == 1) ? "true" : "false" );
$draggable        = ( ($draggable == 1) ? "true" : "false" );



/*
 * => ELEMENT HTML
 * ---------------------------------------------------------------------------*/
?>

<div <?php echo cs_atts( array( 'id' => $id, 'class' => $class, 'style' => $style ) ); ?>>
  <div id="<?= $team_members_id ?>" class="swiper-container">
      <div class="swiper-wrapper">
        <?php echo do_shortcode( $content ); ?>
      </div>
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

<script type="text/javascript">

  jQuery(document).ready(function($) {

    function createTeamCarousel() {
      var mySwiper = new Swiper ("<?= '#'.$team_members_id ?>", {
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
    createTeamCarousel();
  });
</script> 

<style type="text/css">
  .eacs-team-slider.slide-border-enabled <?php echo '#'.$team_members_id; ?> .eacs-team-item {
    border: <?= $logo_border_width ?>px solid <?= $logo_border_color?>;
  }
  .eacs-team-slider <?php echo '#'.$team_members_id; ?> .swiper-pagination-bullet {
    background-color: <?php echo $bullet_nav_color; ?>;
  }
  .eacs-team-slider <?php echo '#'.$team_members_id; ?> .swiper-pagination-bullet-active {
    background-color: <?php echo $active_bullet_nav_color; ?>;
  }
  .eacs-team-slider <?php echo '#'.$team_members_id; ?> .swiper-button-next,
  .eacs-team-slider <?php echo '#'.$team_members_id; ?> .swiper-button-prev {
    background-color: <?php echo $arrow_nav_bg_color; ?>;
    color: <?php echo $arrow_nav_color; ?>;
  }
</style>

