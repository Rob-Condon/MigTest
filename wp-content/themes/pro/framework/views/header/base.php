<?php

// =============================================================================
// VIEWS/HEADER/BASE.PHP
// -----------------------------------------------------------------------------
// Declares the DOCTYPE for the site, includes the <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">, opens the <body>
// element as well as the .x-root <div> and .x-site <div>.
// =============================================================================

$x_root_atts = x_atts( apply_filters( 'x_root_atts', array( 'id' => 'x-root', 'class' => 'x-root' ) ) );
$x_site_atts = x_atts( apply_filters( 'x_site_atts', array( 'id' => 'x-site', 'class' => 'x-site site' ) ) );

?>

<!DOCTYPE html>

<html class="no-js" <?php language_attributes(); ?>>

<head>
  <?php wp_head(); ?>
  
  <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-147433958-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-147433958-1');
</script>

</head>

<body <?php body_class(); ?>>

  <div <?php echo $x_root_atts; ?>>

    <?php do_action( 'x_before_site_begin' ); ?>

    <div <?php echo $x_site_atts; ?>>

    <?php do_action( 'x_after_site_begin' ); ?>