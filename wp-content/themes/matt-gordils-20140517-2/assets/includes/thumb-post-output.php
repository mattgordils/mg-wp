<a class="fade" href="<? the_permalink(); ?>">
  <div class="thumb-wrap">
    <?php 
      if ( has_post_thumbnail() ) { 
      the_post_thumbnail( 'thumb-size' ); 
      } 
    ?>
    <?php if (get_field('hover_image')) {?>
      <?php $image_id = get_field('hover_image'); ?>
      <?php $size = 'thumb-size' ?>
      <?php $image = wp_get_attachment_image_src( $image_id, $size );
      // url = $image[0];
      // width = $image[1];
      // height = $image[2];
      ?>
      <img class="hover-image" src="<?php echo $image[0]; ?>" width="<?php echo $image[1]; ?>" height="<?php echo $image[2]; ?>" />
    <?php } ?>
  </div>
</a>