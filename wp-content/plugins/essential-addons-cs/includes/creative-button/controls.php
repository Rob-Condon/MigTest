<?php

/**
 * Element Controls : EA Creative Button
 */

return array(
    'content' => array(
        'type' => 'text',
        'ui' => array(
            'title' => __('Text', 'essential-addons-cs'),
            'tooltip' => __('Enter your text.', 'essential-addons-cs'),
        ),
        'context' => 'content',
        'suggest' => __('Click Me!', 'essential-addons-cs'),
    ),

    'alt_content' => array(
        'type' => 'text',
        'ui' => array(
            'title' => __('Secondary Text', 'essential-addons-cs'),
            'tooltip' => __('Enter your secondary text (applicable for some styles)', 'essential-addons-cs'),
        ),
        'suggest' => __('Go!', 'essential-addons-cs'),
    ),

    'href' => array(
        'type' => 'text',
        'ui' => array(
            'title' => __('Link', 'essential-addons-cs'),
            'tooltip' => __('Link button to.', 'essential-addons-cs'),
        ),
        'suggest' => __('#', 'essential-addons-cs'),
    ),
    'new_window' => array(
        'type' => 'toggle',
        'ui' => array(
            'title' => __('Open link in new window', 'cs-powerpack'),
            'tooltip' => __('Will open the link in a new tab/window.', 'cs-powerpack'),
        )
    ),

    // Button Style

    'button_style' => array(
        'type' => 'select',
        'ui' => array(
            'title' => __('Button Style', 'essential-addons-cs'),
            'tooltip' => __('Select button style.', 'essential-addons-cs'),
        ),
        'options' => array(
            'choices' => array(
                array('value' => 'default', 'label' => __('Default', 'essential-addons-cs')),
                array('value' => 'winona', 'label' => __('Winona', 'essential-addons-cs')),
                array('value' => 'ujarak', 'label' => __('Ujarak', 'essential-addons-cs')),
                array('value' => 'wayra', 'label' => __('Wayra', 'essential-addons-cs')),
                array('value' => 'tamaya', 'label' => __('Tamaya', 'essential-addons-cs')),
                array('value' => 'rayen', 'label' => __('Rayen', 'essential-addons-cs')),
                array('value' => 'pipaluk', 'label' => __('Pipaluk', 'essential-addons-cs')),
                array('value' => 'moema', 'label' => __('Moema', 'essential-addons-cs')),
                array('value' => 'wave', 'label' => __('Wave', 'essential-addons-cs')),
                array('value' => 'aylen', 'label' => __('Aylen', 'essential-addons-cs')),
                array('value' => 'saqui', 'label' => __('Saqui', 'essential-addons-cs')),
                array('value' => 'wapasha', 'label' => __('Wapasha', 'essential-addons-cs')),
                array('value' => 'nuka', 'label' => __('Nuka', 'essential-addons-cs')),
                array('value' => 'antiman', 'label' => __('Antiman', 'essential-addons-cs')),
                array('value' => 'quidel', 'label' => __('Quidel', 'essential-addons-cs')),
                array('value' => 'shikoba', 'label' => __('Shikoba', 'essential-addons-cs')),
            )
        ),
        'suggest' => 'default',
    ),

    'font_size' => array(
        'type' => 'number',
        'ui' => array(
            'title' => __('Button Font Size', 'essential-addons-cs'),
            'tooltip' => __('Set button font size in pixel value', 'essential-addons-cs'),
        ),
        'suggest' => __('16', 'essential-addons-cs'),
    ),


    'font_color' => array(
        'type' => 'color',
        'ui' => array(
            'title' => __('Font Color', 'essential-addons-cs'),
        ),
        'suggest' => __('#ffffff', 'essential-addons-cs'),
    ),
    'font_hover_color' => array(
        'type' => 'color',
        'ui' => array(
            'title' => __('Font Hover Color', 'essential-addons-cs'),
        ),
        'suggest' => __('#00a94e', 'essential-addons-cs'),
    ),

    'border_main_color' => array(
        'type' => 'color',
        'ui' => array(
            'title' => __('Border Color', 'essential-addons-cs'),
        ),
        'suggest' => __('#00a94e', 'essential-addons-cs'),
    ),
    'border_hover_color' => array(
        'type' => 'color',
        'ui' => array(
            'title' => __('Border Hover Color', 'essential-addons-cs'),
        ),
        'suggest' => __('#00a94e', 'essential-addons-cs'),
    ),

    'background_color' => array(
        'type' => 'color',
        'ui' => array(
            'title' => __('Background Color', 'essential-addons-cs'),
        ),
        'suggest' => __('#ffffff', 'essential-addons-cs'),
    ),

    'background_hover_color' => array(
        'type' => 'color',
        'ui' => array(
            'title' => __('Background Hover Color', 'essential-addons-cs'),
        ),
        'suggest' => __('#00a94e', 'essential-addons-cs'),
    ),

    'border_size' => array(
        'type' => 'number',
        'ui' => array(
            'title' => __('Button Border Width (px)', 'essential-addons-cs'),
            'tooltip' => __('Set border width in pixel value', 'essential-addons-cs'),
        ),
        'suggest' => __('2', 'essential-addons-cs'),
    ),


    'border_radius' => array(
        'type' => 'number',
        'ui' => array(
            'title' => __('Border Radius (px)', 'essential-addons-cs'),
            'tooltip' => __('Set border radius in pixel value', 'essential-addons-cs'),
        ),
        'suggest' => __('2', 'essential-addons-cs'),
    ),

    'block' => array(
        'type' => 'toggle',
        'ui' => array(
            'title' => __('Block', 'essential-addons-cs'),
            'tooltip' => __('Select to make your button go fullwidth.', 'essential-addons-cs'),
        ),
        'suggest' => false,
    ),

    // Button Padding

    'button_padding' => array(
        'type' => 'dimensions',
        'ui' => array(
            'title'   => __( 'Button Padding', 'essential-addons-cs' )
        )
    ),

    'icon_toggle' => array(
        'type' => 'toggle',
        'ui' => array(
            'title' => __('Enable Icon', 'essential-addons-cs'),
            'tooltip' => __('Select if you would like to add an icon to your button.', 'essential-addons-cs'),
        ),
        'suggest' => false,
    ),

    'icon_placement' => array(
        'type' => 'select',
        'condition' => array('icon_toggle' => true),
        'ui' => array(
            'title' => __('Icon Placement', 'essential-addons-cs'),
            'tooltip' => __('Place the icon before or after the button text, or even override the button text.',
                'essential-addons-cs'),
        ),
        'options' => array(
            'choices' => array(
                array('value' => 'notext', 'label' => __('Icon Only', 'cornerstone')),
                array('value' => 'before', 'label' => __('Before', 'cornerstone')),
                array('value' => 'after', 'label' => __('After', 'cornerstone'))
            )
        ),
        'suggest' => 'before',
    ),

    'icon_type' => array(
        'type' => 'icon-choose',
        'condition' => array('icon_toggle' => true),
        'ui' => array(
            'title' => __('Icon', 'essential-addons-cs'),
            'tooltip' => __('Icon to be displayed inside your button.', 'essential-addons-cs'),
        ),
        'condition' => array( 'icon_toggle' => true ),
        'suggest' => 'lightbulb-o',
    ),
);