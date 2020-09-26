<?php

/**
 * Shortcode definition
 */

$randnum = rand(0, 5000);
$button_id = "eacs-creative-button-" . $randnum;

$transparent_defaults = array('border_main_color', 'border_hover_color', 'background_color');
foreach ($transparent_defaults as $var) if (!$$var) $$var = 'transparent';

// Button Styles

switch ( $button_style ) {
  case 'winona':
    $button_style = 'winona';
    break;

  case 'ujarak':
    $button_style = 'ujarak';
    break;

  case 'wayra':
    $button_style = 'wayra';
    break;

  case 'tamaya':
    $button_style = 'tamaya';
    break;

  case 'rayen':
    $button_style = 'rayen';
    break;

  case 'pipaluk':
    $button_style = 'pipaluk';
    break;

  case 'moema':
    $button_style = 'moema';
    break;

  case 'wave':
    $button_style = 'wave';
    break;

  case 'aylen':
    $button_style = 'aylen';
    break;

  case 'saqui':
    $button_style = 'saqui';
    break;

  case 'wapasha':
    $button_style = 'wapasha';
    break;

  case 'nuka':
    $button_style = 'nuka';
    break;

  case 'antiman':
    $button_style = 'antiman';
    break;

  case 'quidel':
    $button_style = 'quidel';
    break;

  case 'shikoba':
    $button_style = 'shikoba';
    break;

  default: // NONE
    $button_style  = 'default';
    break;
}

$class .= " eacs-creative-button" . " ".'eacs-creative-button--'.$button_style." ". $button_id;
?>

<a <?php echo cs_atts(array('id' => $id, 'class' => $class, 'style' => $style)); ?>
    href="<?php echo $href; ?>" data-text="<?php echo $alt_content;?>"
<?php echo ($new_window === true) ? 'target="_blank"' : 'target="_self"'; ?>
>
<?php
    if ($icon_toggle === true) {
        $icon_markup = "[x_icon type=\"{$icon_type}\"]";

        if ( $icon_placement == 'notext' ) {
            $icon_only = 'true';
            $content = $icon_markup;
        } elseif ( $icon_placement == 'before' ) {
            $content = $icon_markup . " " . $content;
        } elseif ( $icon_placement == 'after' ) {
            $content .= " " . $icon_markup;
        }
    }

 echo '<span>'. $content; '</span>'
?>
</a>

<style type="text/css">

a.<?php echo $button_id; ?> {
    border: <?php echo $border_size; ?>px solid <?php echo $border_main_color; ?>;
    border-radius: <?php echo $border_radius; ?>px;
    color: <?php echo $font_color; ?>;
    padding: <?php echo $button_padding ?>;
    font-size: <?php echo $font_size ?>px;
    background-color: <?php echo $background_color; ?>;
    <?php echo $block === true ? 'display: block; float: none;' : ''; ?>
}

a.<?php echo $button_id; ?>:hover {
    color: <?php echo $font_hover_color; ?>;
    border: <?php echo $border_size; ?>px solid <?php echo $border_hover_color; ?>;
    background-color: <?php echo $background_hover_color; ?>;
}

<?php if ( $button_style === 'winona' ): ?>

    a.<?php echo $button_id; ?>.eacs-creative-button--winona::after,
    a.<?php echo $button_id; ?>.eacs-creative-button--winona > span {
        padding: <?php echo $button_padding ?>;
    }
    a.<?php echo $button_id; ?>.eacs-creative-button--winona::after {
        color: <?php echo $font_hover_color; ?>;
    }

<?php elseif ($button_style === 'ujarak'): ?>

    a.<?php echo $button_id; ?>.eacs-creative-button--ujarak::before {
        background-color: <?php echo $background_hover_color; ?>;
        border-radius: <?php echo $border_radius; ?>px;
    }

<?php elseif ($button_style === 'wayra'): ?>

    a.<?php echo $button_id; ?>.eacs-creative-button--wayra:hover::before {
        background-color: <?php echo $background_hover_color; ?>;
    }

<?php elseif ($button_style === 'tamaya'): ?>

    a.<?php echo $button_id; ?>.eacs-creative-button--tamaya::before,
    a.<?php echo $button_id; ?>.eacs-creative-button--tamaya::after {
        background-color: <?php echo $background_color; ?>;
        color: <?php echo $font_color; ?>;
    }

    a.<?php echo $button_id; ?>.eacs-creative-button--tamaya:hover {
        background-color: <?php echo $background_hover_color; ?>;
    }

    a.<?php echo $button_id; ?>.eacs-creative-button--tamaya::before {
        padding: <?php echo $button_padding ?>;
    }

<?php elseif ($button_style === 'rayen'): ?>


    a.<?php echo $button_id; ?>.eacs-creative-button--rayen::before {
        background-color: <?php echo $background_hover_color; ?>;
    }
    a.<?php echo $button_id; ?>.eacs-creative-button--rayen::before,
    a.<?php echo $button_id; ?>.eacs-creative-button--rayen > span {
        padding: <?php echo $button_padding ?>;
    }

<?php elseif ($button_style === 'pipaluk'): ?>

    a.<?php echo $button_id; ?>.eacs-creative-button--pipaluk::before {
        border: 1px solid <?php echo $border_hover_color; ?>;
    }
    a.<?php echo $button_id; ?>.eacs-creative-button--pipaluk::after {
        background-color: <?php echo $background_color; ?>;
    }

    <?php elseif ($button_style === 'wave'): ?>

    a.<?php echo $button_id; ?>.eacs-creative-button--wave:hover {
        background-color: <?php echo $background_color; ?>;
    }
    a.<?php echo $button_id; ?>.eacs-creative-button--wave::before,
    a.<?php echo $button_id; ?>.eacs-creative-button--wave:hover::before {
        background-color: <?php echo $background_hover_color; ?>;
    }

<?php elseif ($button_style === 'aylen'): ?>

    a.<?php echo $button_id; ?>.eacs-creative-button--aylen::before {
        background-color: <?php echo $background_color; ?>;
    }

    a.<?php echo $button_id; ?>.eacs-creative-button--aylen::after {
        background-color: <?php echo $background_hover_color; ?>;
    }

<?php elseif ($button_style === 'saqui'): ?>

    a.<?php echo $button_id; ?>.eacs-creative-button--saqui:hover {
        color: <?php echo $background_hover_color; ?>;
    }
    a.<?php echo $button_id; ?>.eacs-creative-button--saqui::after {
        color: <?php echo $font_hover_color; ?>;
        padding: <?php echo $button_padding ?>;
    }

<?php elseif ($button_style === 'wapasha'): ?>

    a.<?php echo $button_id; ?>.eacs-creative-button--wapasha::before {
        border: <?php echo $border_size; ?>px solid <?php echo $border_hover_color; ?>;
    }

<?php elseif ($button_style === 'nuka'): ?>

    a.<?php echo $button_id; ?>.eacs-creative-button--nuka::before,
    a.<?php echo $button_id; ?>.eacs-creative-button--nuka::after {
        background-color: <?php echo $background_color; ?>;
    }

    a.<?php echo $button_id; ?>.eacs-creative-button--nuka:hover::after {
        background-color: <?php echo $background_hover_color; ?>;
    }

<?php elseif ($button_style === 'antiman'): ?>

    a.<?php echo $button_id; ?>.eacs-creative-button--antiman::after {
        background-color: <?php echo $background_color; ?>;
    }

    a.<?php echo $button_id; ?>.eacs-creative-button--antiman::before {
        border: <?php echo $border_size; ?>px solid <?php echo $border_hover_color; ?>;
    }


<?php elseif ($button_style === 'quidel'): ?>

    a.<?php echo $button_id; ?>.eacs-creative-button--quidel::before {
        background-color: <?php echo $border_hover_color; ?>;
    }
    a.<?php echo $button_id; ?>.eacs-creative-button--quidel::after {
        background-color: <?php echo $background_color; ?>;
    }
    a.<?php echo $button_id; ?>.eacs-creative-button--quidel:hover::after {
        background-color: <?php echo $background_hover_color; ?>;
    }

<?php else: ?>

    /* No other CSS required */

<?php endif; ?>

</style>