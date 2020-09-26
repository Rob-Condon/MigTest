<?php

/**
 * Shortcode definition : Social Icons Item
 */

$link_target   = ( ($link_target == 1) ? "_blank" : "_self" );

$style  = "background-color: $icon_bg_color; color: $icon_color; " . $style ;
?>

<li class="eacs-social-links-item"><a href="<?php echo $link_url;?>" target="<?php echo $link_target;?>" data-color="<?php echo $icon_color;?>" data-bg-color="<?php echo $icon_bg_color;?>" data-hover-color="<?php echo $icon_hover_color;?>" data-hover-bg-color="<?php echo $icon_hover_bg_color;?>" <?php echo cs_atts( array( 'id' => $id, 'class' => $class, 'style' => $style ) ); ?>>[x_icon type="<?php echo $social_icon;?>"]</a></li>