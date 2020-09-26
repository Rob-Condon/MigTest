<?php

/**
 * Shortcode handler : Interactive Promo
 */

/*
 * => VARS & INFO
 * ---------------------------------------------------------------------------*/

$randnum = rand(0,5000); 


//
// Dynamic classes
//

$link_target   = ( ($link_target == 1) ? "_blank" : "_self" );

// Effect
switch ( $promo_effect ) {
  case 'effect-sadie':
    $promo_effect = 'effect-sadie';
    break;

  case 'effect-layla':
    $promo_effect = 'effect-layla';
    break;

  case 'effect-oscar':
    $promo_effect = 'effect-oscar';
    break;

  case 'effect-marley':
    $promo_effect = 'effect-marley';
    break;

  case 'effect-ruby':
    $promo_effect = 'effect-ruby';
    break;

  case 'effect-roxy':
    $promo_effect = 'effect-roxy';
    break;

  case 'effect-bubba':
    $promo_effect = 'effect-bubba';
    break;

  case 'effect-romeo':
    $promo_effect = 'effect-romeo';
    break;

  case 'effect-sarah':
    $promo_effect = 'effect-sarah';
    break;

  case 'effect-chico':
    $promo_effect = 'effect-chico';
    break;

  case 'effect-milo':
    $promo_effect = 'effect-milo';
    break;

  case 'effect-apollo':
    $promo_effect = 'effect-apollo';
    break;

  case 'effect-jazz':
    $promo_effect = 'effect-jazz';
    break;

  case 'effect-ming':
    $promo_effect = 'effect-ming';
    break;

  default: // NONE
    $promo_effect  = 'effect-lily';
    break;
}
// Class, ID, Styles
$interactive_promo_id = "eacs-interactive-promo-".$randnum;
$class = "eacs-interactive-promo " . $class;

?>

<div <?php echo cs_atts( array( 'id' => $id, 'class' => $class, 'style' => $style ) ); ?>>
	<div id="<?= $interactive_promo_id ?>">
		<figure class="<?= $promo_effect ?>">
			<img src="<?php echo $image; ?>" alt="<?php echo $alt_tag; ?>"/>
			<figcaption>
				<div>
					<?php if ( $heading ) : ?>
						<h2 style="color:<?php echo $heading_color;?>"> <?php echo $heading; ?></h2>
					<?php endif; ?>
					<p><?php echo $content; ?></p>
				</div>
				<a href="<?php echo $promo_url;?>" target="<?php echo $link_target;?>"></a>
			</figcaption>			
		</figure>
	</div>
</div>

<style type="text/css">

.eacs-interactive-promo <?php echo '#'.$interactive_promo_id; ?> figure {
  background-color: <?php echo $overlay_color; ?>;
}
.eacs-interactive-promo <?php echo '#'.$interactive_promo_id; ?> figure p {
  color: <?php echo $content_color; ?>;
}
</style>