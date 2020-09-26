<?php

/**
 * Shortcode handler : Countdown
 */

/*
 * => VARS & INFO
 * ---------------------------------------------------------------------------*/

$randnum = rand(0,5000); 


//
// Dynamic classes
//
$add_border   = ( ($add_border == 1) ? "border-enabled" : "" );
$show_separator   = ( ($show_separator == 1) ? "eacs-countdown-show-separator" : "" );
$show_label_block   = ( ($show_label_block == 1) ? "eacs-countdown-label-block" : "eacs-countdown-label-inline" );


// $due_date = date("M d Y", strtotime($countdown_date));


// Class, ID, Styles
$countdown_id = "eacs-countdown-".$randnum;
$class = "eacs-countdown " . " ". $show_label_block. " ". $add_border. " ". $show_separator. " " . $class;
?>

<div <?php echo cs_atts( array( 'id' => $id, 'class' => $class, 'style' => $style ) ); ?>>
	<div id="<?php echo $countdown_id ?>">
    <div class="eacs-countdown-inner">
      <ul class="eacs-countdown-items" data-date="<?php echo $countdown_date; ?>">
          <?php if (($show_days == 1) ) : ?><li class="eacs-countdown-item"><div class="eacs-countdown-days"><span data-days class="eacs-countdown-digits">00</span><?php if ( ! empty ($countdown_days_label) ) : ?><span class="eacs-countdown-label"><?php echo $countdown_days_label; ?></span><?php endif; ?></div></li><?php endif; ?>

          <?php if (($show_hours == 1) ) : ?><li class="eacs-countdown-item"><div class="eacs-countdown-hours"><span data-hours class="eacs-countdown-digits">00</span><?php if ( ! empty ($countdown_hours_label) ) : ?><span class="eacs-countdown-label"><?php echo $countdown_hours_label; ?></span><?php endif; ?></div></li><?php endif; ?>

         <?php if (($show_minutes == 1) ) : ?><li class="eacs-countdown-item"><div class="eacs-countdown-minutes"><span data-minutes class="eacs-countdown-digits">00</span><?php if ( ! empty ($countdown_minutes_label) ) : ?><span class="eacs-countdown-label"><?php echo $countdown_minutes_label; ?></span><?php endif; ?></div></li><?php endif; ?>

         <?php if (($show_seconds == 1) ) : ?><li class="eacs-countdown-item"><div class="eacs-countdown-seconds"><span data-seconds class="eacs-countdown-digits">00</span><?php if ( ! empty ($countdown_seconds_label) ) : ?><span class="eacs-countdown-label"><?php echo $countdown_seconds_label; ?></span><?php endif; ?></div></li><?php endif; ?>
      </ul>
      <div class="clearfix"></div>
    </div>
	</div>
</div>

<script type="text/javascript">

(function ($) {
    'use strict';

  $("<?php echo '#'.$countdown_id ?> .eacs-countdown-items").countdown();
    
}(jQuery));

</script>

<style type="text/css">

.eacs-countdown <?php echo '#'.$countdown_id; ?>  .eacs-countdown-inner .eacs-countdown-item {
  background-color: <?php echo $item_bg_color; ?>;
  padding: <?php echo $item_padding; ?>;
}

body:not(.rtl) .eacs-countdown <?php echo '#'.$countdown_id; ?> .eacs-countdown-inner .eacs-countdown-item:not(:last-of-type) {
  margin-right: <?php echo $item_spacing; ?>px;
}

body.rtl .eacs-countdown <?php echo '#'.$countdown_id; ?> .eacs-countdown-inner .eacs-countdown-item:not(:first-of-type) {
  margin-right: <?php echo $item_spacing; ?>px;
}


.eacs-countdown <?php echo '#'.$countdown_id; ?>  .eacs-countdown-items .eacs-countdown-digits {
  font-size: <?php echo $digit_font_size; ?>px;
  color: <?php echo $digit_text_color; ?>;
}

.eacs-countdown <?php echo '#'.$countdown_id; ?>  .eacs-countdown-items .eacs-countdown-label{
  font-size: <?php echo $label_font_size; ?>px;
  color: <?php echo $label_text_color; ?>;
}

.eacs-countdown.border-enabled <?php echo '#'.$countdown_id; ?> .eacs-countdown-items .eacs-countdown-item {
  border: <?= $item_border_width ?>px solid <?= $item_border_color?>;
}

.eacs-countdown.eacs-countdown-show-separator  <?php echo '#'.$countdown_id; ?> .eacs-countdown-digits::after {
  left: calc(100% + calc(<?php echo $item_spacing; ?>px / 4));
  color: <?php echo $digit_text_color; ?>;
}

.eacs-countdown.eacs-countdown-show-separator <?php echo '#'.$countdown_id; ?> .eacs-countdown-items .eacs-countdown-item 

@media only screen and (max-width: 979px) {
.eacs-countdown <?php echo '#'.$countdown_id; ?>  .eacs-countdown-items .eacs-countdown-digits {
  font-size: calc(<?php echo $digit_font_size; ?>px / 2);
}
.eacs-countdown <?php echo '#'.$countdown_id; ?>  .eacs-countdown-items .eacs-countdown-label {
  font-size: calc(<?php echo $label_font_size; ?>px / 1.5);
}
}

@media only screen and (max-width: 480px) {

.eacs-countdown <?php echo '#'.$countdown_id; ?> .eacs-countdown-inner .eacs-countdown-item {
  margin: 0 calc(<?php echo $item_spacing; ?>px / 2) calc(<?php echo $item_spacing; ?>px / 2) 0!important;
}

.eacs-countdown <?php echo '#'.$countdown_id; ?>  .eacs-countdown-items .eacs-countdown-digits {
  font-size: calc(<?php echo $digit_font_size; ?>px / 3);
}
.eacs-countdown <?php echo '#'.$countdown_id; ?>  .eacs-countdown-items .eacs-countdown-label {
  font-size: calc(<?php echo $label_font_size; ?>px / 1.75);
}

}
</style>