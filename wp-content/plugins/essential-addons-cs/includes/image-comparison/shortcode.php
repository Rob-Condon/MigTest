<?php

/**
 * Shortcode handler : Image Comparison
 */

/*
 * => VARS & INFO
 * ---------------------------------------------------------------------------*/

$img_comp_id = sanitize_key( 'img-comp-'.uniqid() );

//
// Dynamic classes
//


// Class, ID, Styles
$class = "eacs-img-comp " . $class;

?>

<div <?php echo cs_atts( array( 'id' => $id, 'class' => $class, 'style' => $style ) ); ?>>
  <div id="<?php echo $img_comp_id; ?>" class="eacs-img-comp-container cocoen" <?php if ( $container_width_control === true ):?> style="max-width: <?php echo $container_max_width; ?>px;" <?php endif; ?>>
    <img class="eacs-before-img" src="<?php echo $image_before; ?>" alt="<?php echo $image_before_alt; ?>">
    <img class="eacs-after-img" src="<?php echo $image_after; ?>" alt="<?php echo $image_before_alt; ?>">
  </div>
</div>

<script type="text/javascript">
  new Cocoen(document.getElementById('<?= $img_comp_id?>'));
</script>

<style type="text/css">

.cocoen-drag + .cocoen-drag {
	display: none;
}

<?php echo '#'.$img_comp_id; ?> .cocoen-drag {
  background-color: <?php echo $comp_line_color; ?>;
}

<?php echo '#'.$img_comp_id; ?> .cocoen-drag::before {
  border-color: <?php echo $comp_grabber_color; ?>;
}

<?php echo '#'.$img_comp_id; ?>.eacs-img-comp-container {
  border-radius: <?php echo $container_border_radius ?>px;
}


<?php
if ( $container_add_border === true ):
?>

<?php echo '#'.$img_comp_id; ?>.eacs-img-comp-container {
  border: <?php echo $container_border_width ?>px solid <?= $container_border_color; ?>;
}

<?php endif; ?>

</style>