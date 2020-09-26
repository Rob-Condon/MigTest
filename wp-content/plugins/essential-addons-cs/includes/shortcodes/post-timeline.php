<?php


// Recent Post with excerpt
// ==============================================


function eacs_post_timeline( $atts ) {
    global $randnum;
  extract( shortcode_atts( array(
    'id'           => '',
    'class'        => '',
    'style'        => '',
    'type'         => 'post',
    'count'        => '',
    'category'     => '',
    'offset'       => '',
    'orientation'  => '',
    'show_excerpt' => 'true',
    'excerpt_length' => '',
    'no_sticky'    => '',
    'no_image'     => '',
    'fade'         => ''
  ), $atts, 'eacs_post_timeline' ) );

  $allowed_post_types = apply_filters( 'cs_recent_posts_post_types', array( 'post' => 'post' ) );
  $type = ( isset( $allowed_post_types[$type] ) ) ? $allowed_post_types[$type] : 'post';

  $id            = ( $id           != ''     ) ? 'id="' . esc_attr( $id ) . '"' : '';
  $class         = ( $class        != ''     ) ? 'eacs-post-timeline row ' . esc_attr( $class ) : 'eacs-post-timeline row';
  $style         = ( $style        != ''     ) ? 'style="' . $style . '"' : '';
  $count         = ( $count        != ''     ) ? $count : 9999;
  $category      = ( $category     != ''     ) ? $category : '';
  $category_type = ( $type         == 'post' ) ? 'category_name' : 'portfolio-category';
  $offset        = ( $offset       != ''     ) ? $offset : 0;
  $orientation   = ( $orientation  != ''     ) ? ' ' . $orientation : ' horizontal';
  $show_excerpt  = ( $show_excerpt == 'true' );
  $excerpt_length   = ( $excerpt_length      != ''     ) ? $excerpt_length : 50;
  $no_sticky     = ( $no_sticky    == 'true' );
  $no_image      = ( $no_image     == 'true' ) ? $no_image : '';
  $fade          = ( $fade         == 'true' ) ? $fade : 'false';

  $js_params = array(
    'fade' => ( $fade == 'true' )
  );

  $data = cs_generate_data_attributes( 'recent_posts', $js_params );

  $output = "<div {$id} class=\"{$class}{$orientation}\" {$style} {$data} data-fade=\"{$fade}\" >";

    $q = new WP_Query( array(
      'orderby'             => 'date',
      'post_type'           => "{$type}",
      'posts_per_page'      => "{$count}",
      'offset'              => "{$offset}",
      "{$category_type}"    => "{$category}",
      'ignore_sticky_posts' => $no_sticky
    ) );

    if ( $q->have_posts() ) : while ( $q->have_posts() ) : $q->the_post();

      if ( $no_image == 'true' ) {
        $image_output       = '';
        $image_output_class = 'no-image';
      } else {
        $image              = wp_get_attachment_image_src( get_post_thumbnail_id(), 'entry-cropped' );
        $bg_image           = ( $image[0] != '' ) ? ' style="background-image: url(' . $image[0] . ');"' : '';
        $image_output       = '<div class="eacs-timeline-post-image"' . $bg_image . '></div>';
        $image_output_class = 'with-image';
      }


        $trimmed_excerpt =  wp_trim_words( cs_get_raw_excerpt(), $excerpt_length, '...' );
        $excerpt = ( $show_excerpt ) ? '<div class="eacs-timeline-post-excerpt"><p>' . preg_replace('/<a.*?more-link.*?<\/a>/', '', $trimmed_excerpt ) . '</p></div>' : '';


      $output .= '<article id="post-' . get_the_ID() . '" class="eacs-timeline-post eacs-timeline-column' .' ' . implode( ' ', get_post_class() ) . '">'
                .'<div class="eacs-timeline-bullet"></div>'
                 . '<div class="eacs-timeline-post-inner">'
                   . '<a class="eacs-timeline-post-link" href="' . get_permalink( get_the_ID() ) . '" title="' . esc_attr( sprintf( __( 'Permalink to: "%s"', 'essential-addons-cs' ), the_title_attribute( 'echo=0' ) ) ) . '">'
                    .'<time datetime="'. get_the_date() .'">' . get_the_date() . '</time>'
                     . $image_output
                       . $excerpt
                        .'<div class="eacs-timeline-post-title">'
                          .' <h2>'  . get_the_title() . '</h2>'
                        .'</div>'
                   . '</a>'
                 . '</div>'
               . '</article>';

    endwhile; endif; wp_reset_postdata();

  $output .= '</div>';

  return $output;
}

add_shortcode( 'eacs_post_timeline', 'eacs_post_timeline' );