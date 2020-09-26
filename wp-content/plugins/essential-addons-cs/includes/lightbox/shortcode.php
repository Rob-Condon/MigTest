<?php

/**
 * Shortcode handler : Lightbox
 */

/*
 * => VARS & INFO
 * ---------------------------------------------------------------------------*/

$lightbox_id = sanitize_key( 'eacs-lightbox-'.uniqid() );


//
// Dynamic classes
//


$parsedContent = html_entity_decode( $lightbox_content );
$parsedContent = str_replace(
  array( '&lsqb;', '&rsqb;' ),
  array( '[', ']' ),
  $parsedContent
);

$btn_class = 'x-btn';
if ( $button_size !== 'default' ) $btn_class .= ' '.$button_size;

$enable_overlay     = ( ($enable_overlay  == 1) ? "enabled" : "disabled" );

//
// Lightbox Template
//

$popup_template = '<div id= "popup-'.esc_js($lightbox_id).'" class="eacs-lightbox-popup lity overlay-'.esc_js($enable_overlay).'" role="dialog" aria-label="Dialog Window (Press escape to close)" tabindex="-1"><div class="lity-wrap" data-lity-close role="document"><div class="lity-loader" aria-hidden="true">Loading...</div><div class="lity-container"><div class="lity-content"></div><button class="lity-close eacs-lightbox-close" style="background-color: '.esc_js($close_btn_bg_color).'; color: '.esc_js($close_btn_color).'" type="button" aria-label="Close (Press escape to close)" data-lity-close>&times;</button></div></div></div>';

$btn_js = '';
ob_start();
if ( $trigger_on === 'button' ):
?>

<div <?php echo cs_atts( array( 'id' => $id, 'class' => $class, 'style' => $style ) ); ?>>
  <a id="btn-<? echo $lightbox_id; ?>"
    href="#"
    class="eacs-lightbox-btn <? echo esc_attr($btn_class); ?>">
    <? echo $button_text; ?>
  </a>
</div>

<?php endif; ?>

<?php if ( $lightbox_type === 'lightbox-image' ): ?>

<div id="<?php echo $lightbox_id; ?>" class="lity-hide">
  <div class="eacs-lightbox-container" style="background-color: <?php echo $content_bg_color; ?>; max-width: <?php echo $popup_max_width; ?>px; padding: <?php echo $popup_padding; ?>; border-radius: <?php echo $popup_border_radius; ?>px">
    <div class="eacs-lightbox-content">
      <img src="<?php echo $lightbox_image; ?>">
    </div>
  </div>
</div>

<?php elseif ($lightbox_type === 'lightbox-content'): ?>

<div id="<?php echo $lightbox_id; ?>" class="lity-hide">
  <div class="eacs-lightbox-container" style="background-color: <?php echo $content_bg_color; ?>; max-width: <?php echo $popup_max_width; ?>px; padding: <?php echo $popup_padding; ?>; border-radius: <?php echo $popup_border_radius; ?>px">
    <div class="eacs-lightbox-content">
         <?php echo do_shortcode( $parsedContent ); ?>
    </div>
  </div>
</div>

<?php else: ?>

<div id="<?php echo $lightbox_id; ?>" class="lity-hide">
  <div class="eacs-lightbox-container" style="background-color: <?php echo $content_bg_color; ?>; max-width: <?php echo $popup_max_width; ?>px; padding: <?php echo $popup_padding; ?>; border-radius: <?php echo $popup_border_radius; ?>px">
    <div class="eacs-lightbox-content">
      <div class="eacs-iframe-container">      
        <iframe allowfullscreen="" src="<?php echo $lightbox_url; ?>" frameborder="0"></iframe>
      </div>
    </div>
  </div>
</div>

<?php endif; ?>

<script>
  jQuery(document).ready(function($) {
    var lightbox = null;
    
<?php if ( $trigger_on === 'button' ): ?>

    <?php if ( $lightbox_type === 'lightbox-url'): ?>

        $("#btn-<?php echo $lightbox_id; ?>").click(function(e){
          e.preventDefault();
          lightbox = lity("<?php echo $lightbox_url; ?>", { template: '<?php echo $popup_template; ?>' });
        });

    <?php else: ?>
        $("#btn-<?php echo $lightbox_id; ?>").click(function(e){
          e.preventDefault();
          lightbox = lity("#<?php echo $lightbox_id; ?>", { template: '<?php echo $popup_template; ?>' });
        });

    <?php endif; ?>

<?php elseif ($trigger_on === 'element'): ?>

    <?php if ( $lightbox_type === 'lightbox-url'): ?>

        $("<?php echo $identifier; ?>").click(function(e) {
          e.preventDefault();
          lightbox = lity("<?php echo $lightbox_url; ?>", { template: '<?php echo $popup_template; ?>' });
        });

    <?php else: ?>
        $("<?php echo $identifier; ?>").click(function(e) {
          e.preventDefault();
          lightbox = lity("#<?php echo $lightbox_id; ?>", { template: '<?php echo $popup_template; ?>' });
        });
    <?php endif; ?>


<?php else: ?>

    <?php if ( $lightbox_type === 'lightbox-url'): ?>

        setTimeout(function() {
          lightbox = lity("<?php echo $lightbox_url; ?>", { template: '<?php echo $popup_template; ?>' });
        }, <?php echo floatVal($delay) * 1000; ?>);

    <?php else: ?>

        setTimeout(function() {
          lightbox = lity("#<?php echo $lightbox_id; ?>", { template: '<?php echo $popup_template; ?>' });
        }, <?php echo floatVal($delay) * 1000; ?>);
    <?php endif; ?>


<?php endif; ?>
    
  });
</script>

<style type="text/css">

<?php echo '#popup-'.$lightbox_id; ?>  {
  background-color: <?php echo $overlay_bg_color; ?>;
}
<?php echo '#popup-'.$lightbox_id.'.overlay-disabled'; ?>  {
  background-color: transparent;
}

<?php echo '#popup-'.$lightbox_id; ?>.lity-iframe .lity-container  {
  background-color: <?php echo $content_bg_color; ?>; 
  width: <?php echo $popup_width; ?>%; 
  max-width: <?php echo $popup_max_width; ?>px; 
  padding: <?php echo $popup_padding; ?>; 
  border-radius: <?php echo $popup_border_radius; ?>px;
}

</style>