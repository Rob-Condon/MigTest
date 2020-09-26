<?php

/**
 * Shortcode handler : Instagram Feed
 */

/*
 * => VARS & INFO
 * ---------------------------------------------------------------------------*/

$randnum = rand(0,5000); 


//
// Dynamic classes
//

$link_target    = ( ($link_target == 1) ? "_blank" : "_self" );
$enable_link    = ( ($enable_link == 1) ? "<a href=\"{{link}}\" target=\"$link_target\"></a>" : "" );
$no_caption     = ( ($show_caption == 1) ? "show-caption" : "no-caption" );
$show_caption   = ( ($show_caption == 1) ? '<p class="insta-caption">{{caption}}</p>' : "" );


// Image Columns
switch ( $image_columns ) {
  case 'single_column':
    $image_columns = 'eacs-col-1';
    break;

  case 'two_columns':
    $image_columns = 'eacs-col-2';
    break;

  case 'three_columns':
    $image_columns = 'eacs-col-3';
    break;

  case 'five_columns':
    $image_columns = 'eacs-col-5';
    break;

  case 'six_columns':
    $image_columns = 'eacs-col-6';
    break;

  default: // NONE
    $image_columns  = 'eacs-col-4';
    break;
}

// Class, ID, Styles
$instagram_feed_id = "eacs-instagram-feed-".$randnum;
$class = "eacs-instagram-feed " . " ". $image_columns . " ". $no_caption . " " . $class;

?>

<div <?php echo cs_atts( array( 'id' => $id, 'class' => $class, 'style' => $style ) ); ?>>
	<div id="<?= $instagram_feed_id ?>" class="eacs-insta-grid">
	</div>
</div>


<script type="text/javascript">

(function ($) {
    'use strict';

  $(window).load(function(){

    var feed = new Instafeed({
      get: '<?= $feed_source ?>',
      tagName: '<?= $hashtag ?>',
      userId: <?= $user_id ?>,
      clientId: '<?= $client_id ?>',
      accessToken: '<?= $access_token ?>',
      limit: '<?= $max_visible_images ?>,',
      resolution: '<?= $image_resolution ?>',
      sortBy: '<?= $sort_images ?>',
      target: '<?= $instagram_feed_id ?>',
      template: '<div class="eacs-insta-feed eacs-insta-box"><div class="eacs-insta-feed-inner"><div class="eacs-insta-feed-wrap"><div class="eacs-insta-img-wrap"><img src="{{image}}" /></div><div class="eacs-insta-info-wrap"><div class="eacs-insta-likes-comments"><p>[x_icon type="heart-o"] {{likes}}</p> <p>[x_icon type="comment-o"] {{comments}}</p> </div><?= $show_caption ?></div><?= $enable_link ?></div></div></div>',
      after: function() {
        var el = document.getElementById('<?= $instagram_feed_id ?>');
        if (el.classList)
          el.classList.add('show');
        else
          el.className += ' ' + 'show';
      }
    });
    feed.run();

    $('.eacs-insta-grid').masonry({
      itemSelector: '.eacs-insta-feed',
      percentPosition: true,
      columnWidth: '.eacs-insta-box'
    });

  });
    
}(jQuery));

</script>

<style type="text/css">

.eacs-instagram-feed <?php echo '#'.$instagram_feed_id; ?> .eacs-insta-feed-inner {
  padding: <?php echo $image_padding; ?>;
}

.eacs-instagram-feed <?php echo '#'.$instagram_feed_id; ?> .eacs-insta-feed-wrap::after {
  background-color: <?php echo $overlay_color; ?>;
}

.eacs-instagram-feed <?php echo '#'.$instagram_feed_id; ?> .eacs-insta-likes-comments > p {
  color: <?php echo $like_comments_color; ?>;
}

.eacs-instagram-feed <?php echo '#'.$instagram_feed_id; ?> .eacs-insta-info-wrap {
  color: <?php echo $caption_text_color; ?>;
}

</style>