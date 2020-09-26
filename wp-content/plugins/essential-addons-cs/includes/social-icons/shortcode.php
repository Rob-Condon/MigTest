<?php
/**
 * Shortcode: Social Icons
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


// Icon Style
switch ( $icon_style ) {
  case 'icon_rounded':
    $icon_style = 'eacs-icon-rounded';
    break;

  case 'icon_circle':
    $icon_style = 'eacs-icon-circle';
    break;

  default: // NONE
    $icon_style  = 'eacs-icon-square';
    break;
}

// Icon Animation
switch ( $icon_animation ) {
  case 'icon_animation_spin':
    $icon_animation = 'eacs-animation-spin';
    break;

  case 'icon_animation_bounce':
    $icon_animation = 'eacs-animation-bounce';
    break;

  default: // NONE
    $icon_animation  = '';
    break;
}

// Add border class

$add_border   = ( ($add_border == 1) ? "icon-border-enabled" : "" );

// Class, ID, Styles
$social_icons_id = "eacs-social-icons-".$randnum;
$class       = "eacs-social-icons " . " " . $add_border ." ". $icon_style ." ". $class ;


/*
 * => ELEMENT HTML
 * ---------------------------------------------------------------------------*/
?>

<div <?php echo cs_atts( array( 'id' => $id, 'class' => $class, 'style' => $style ) ); ?>>
  <div id="<?= $social_icons_id ?>">
    <ul class="eacs-social-links <?php echo $icon_animation; ?>">
      <?php echo do_shortcode( $content ); ?>
    </ul>
  </div>
</div>

<script type="text/javascript">
  (function ($) {
      $('.eacs-social-links-item > a').mouseover(function(){
          $(this).css({'color' : $(this).attr('data-hover-color'), 'background-color' : $(this).attr('data-hover-bg-color')});
      });
      $('.eacs-social-links-item > a').mouseout(function(){
          $(this).css({'color' : $(this).attr('data-color'), 'background-color' : $(this).attr('data-bg-color')});
      });
      
  }(jQuery));
</script>


<style type="text/css">

.eacs-social-icons <?php echo '#'.$social_icons_id; ?> .eacs-social-links-item {
  margin: <?php echo $icon_margin; ?>;
}

.eacs-social-icons <?php echo '#'.$social_icons_id; ?> .eacs-social-links-item > a {
  font-size: <?php echo $icon_font_size; ?>px;
  width: <?php echo $icon_width; ?>px;
  height: <?php echo $icon_height; ?>px;
  line-height: <?php echo $icon_height; ?>px;
}

.eacs-social-icons.icon-border-enabled <?php echo '#'.$social_icons_id; ?> .eacs-social-links-item > a {
  border: <?= $icon_border_width ?>px solid <?= $icon_border_color?>;
}


</style>

